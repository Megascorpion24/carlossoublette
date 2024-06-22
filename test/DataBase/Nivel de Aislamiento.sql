

--  **todo------------ Tabla Maestra y Tabla Detalle-----------
-- 
-- Tabla Maestra: materias 
-- Tabla Detalle: años_materias y materias_docentes

-- ***? ---------READ-UNCOMMITTED ----------- 

-- **** Transacción 1

START TRANSACTION;


INSERT INTO materias (nombre, estado) VALUES ('QUIMICA', 1);
SET @id_materia = LAST_INSERT_ID();
INSERT INTO años_materias (id_anos, id_materias) VALUES (1, @id_materia);
INSERT INTO materias_docentes (estado, id_materias, id_docente) VALUES (1, @id_materia, 30019081);
SAVEPOINT sp1;

-- Insertar la primera materia y crear un punto de guardado
INSERT INTO materias (nombre, estado) VALUES ('CASTELLANO', 1);
SET @id_materia1 = LAST_INSERT_ID();
INSERT INTO años_materias (id_anos, id_materias) VALUES (4, @id_materia1);
INSERT INTO materias_docentes (estado, id_materias, id_docente) VALUES (1, @id_materia, 30019082);


-- Simulación de concurrencia (5seg)
SELECT SLEEP(5);
ROLLBACK TO sp1;

COMMIT;

SELECT * FROM materias WHERE nombre='QUIMICA';
SELECT * FROM materias WHERE nombre='CASTELLANO';


-- **** Transacción 2
--  READ UNCOMMITTED es el más bajo y permite que una transacción lea datos que aún no han 
--  sido confirmados (committed) por otras transacciones. 

-- Abre una nueva sesión en otra consola o terminal y ejecuta:
SET SESSION TRANSACTION ISOLATION LEVEL READ UNCOMMITTED;

START TRANSACTION;
-- Leer los datos que aún no se han confirmado en Transacción 1
SELECT * FROM materias WHERE nombre = 'QUIMICA' AND estado = 1;
-- Actualizar un registro basado en la lectura anterior
UPDATE materias SET estado = 0 WHERE nombre = 'QUIMICA';
COMMIT;


-- Consulta final para verificar el estado de las tablas
SELECT * FROM materias WHERE nombre='QUIMICA';
SELECT * FROM materias WHERE nombre='CASTELLANO';



-- *****? ---------READ-COMMITTED----------- 

-- **** Transacción 1

START TRANSACTION;

INSERT INTO materias (nombre, estado) VALUES ('DEPORTE', 1);
SET @id_materia = LAST_INSERT_ID();
INSERT INTO años_materias (id_anos, id_materias) VALUES (2, @id_materia);
INSERT INTO materias_docentes (estado, id_materias, id_docente) VALUES (1, @id_materia, 30019082);


-- T1 no ha confirmado la transacción aún
-- Simulación de concurrencia (5seg)
SELECT SLEEP(5);
-- Ahora sí, el commit en Transacción 1
COMMIT;

SELECT * FROM materias WHERE nombre = 'DEPORTE';
SELECT * FROM materias WHERE nombre = 'INGLES';

-- **** Transacción 2

SET TRANSACTION ISOLATION LEVEL READ COMMITTED;
START TRANSACTION;

SELECT * FROM materias WHERE nombre = 'INGLES' AND estado = 1;
UPDATE materias SET estado = 0 WHERE nombre = 'INGLES';
-- T2 NO verá la nueva materia, porque T1 no ha confirmado
COMMIT;

SELECT * FROM materias WHERE nombre = 'DEPORTE';
SELECT * FROM materias WHERE nombre = 'INGLES';




-- *****? --------REPEATABLE-READ----------- 
-- REPEATABLE READ en MySQL es un nivel que proporciona un alto grado de consistencia en las transacciones al garantizar que las filas leídas por una transacción no cambien mientras la transacción está en curso, incluso si otras transacciones realizan modificaciones en esas filas.

-- En MySQL, el nivel de aislamiento REPEATABLE READ se establece automáticamente cuando inicias una transacción sin especificar explícitamente otro nivel de aislamiento. No es necesario escribir REPEATABLE READ como una instrucción separada, ya que es el comportamiento predeterminado para las transacciones en MySQL.

-- **** TRANSSACCION 1
START TRANSACTION;
-- Ejemplo de INSERT
INSERT INTO materias (nombre, estado) VALUES ('MATEMÁTICA', 1);
SET @id_materia = LAST_INSERT_ID();
INSERT INTO años_materias (id_anos, id_materias) VALUES (3, @id_materia);
INSERT INTO materias_docentes (estado, id_materias, id_docente) VALUES (1, @id_materia, 30019082);

-- Ejemplo de UPDATE
UPDATE materias SET nombre = "INGLÉS BASICO" WHERE nombre = 'INGLES';

-- Ejemplo de DELETE

SELECT id INTO @id_materia FROM materias WHERE nombre = 'DEPORTE';
DELETE FROM años_materias WHERE id_materias = @id_materia;
DELETE FROM materias_docentes WHERE id_materias = @id_materia;
DELETE FROM materias WHERE id = @id_materia;


-- Simulación de concurrencia (4 segundos)
SELECT SLEEP(4);
-- Commit en Transacción 1
COMMIT;

SELECT * FROM materias WHERE nombre = 'INGLÉS BASICO';
SELECT * FROM materias WHERE nombre = 'DEPORTE';


-- **** Transacción 2

START TRANSACTION;

-- Ejemplo de INSERT
INSERT INTO materias (nombre, estado) VALUES ('CASTELLANO', 1);
SET @id_materia = LAST_INSERT_ID();
INSERT INTO años_materias (id_anos, id_materias) VALUES (3, @id_materia);

ROLLBACK;

-- SELECTs en Transacción 2
SELECT * FROM materias WHERE nombre = 'MATEMÁTICA';
SELECT * FROM materias WHERE nombre = 'INGLES';
SELECT * FROM materias WHERE nombre = 'DEPORTE';
-- T2 no verá los cambios realizados por T1 debido al nivel de aislamiento REPEATABLE READ
-- Commit en Transacción 2
COMMIT;

-- Consulta final para verificar los datos
SELECT * FROM materias WHERE estado = 1;


-- *****? --------SERIALIZABLE----------- 

-- **** Transacción 1
SET TRANSACTION ISOLATION LEVEL SERIALIZABLE;
START TRANSACTION;

-- Insertar la primera materia y crear un punto de guardado
INSERT INTO materias (nombre, estado) VALUES ('CASTELLANO', 1);
SET @id_materia = LAST_INSERT_ID();
INSERT INTO años_materias (id_anos, id_materias) VALUES (5, @id_materia);
INSERT INTO materias_docentes (estado, id_materias, id_docente) VALUES (1, @id_materia, 30019082);

-- Simulación de concurrencia (6 segundos)
SELECT * FROM materias WHERE nombre = 'CASTELLANO';
SELECT SLEEP(6);
-- Commit en Transacción 1
COMMIT;


-- **** Transacción 2
START TRANSACTION;

-- Ejemplo de UPDATE
UPDATE materias SET nombre = 'LITERATURA' WHERE nombre = 'CASTELLANO';

-- T2 no verá los cambios realizados por T1 debido al nivel de aislamiento SERIALIZABLE
-- Commit en Transacción 2
COMMIT;

-- Consulta final para verificar los datos
SELECT * FROM materias WHERE nombre = 'LITERATURA';
