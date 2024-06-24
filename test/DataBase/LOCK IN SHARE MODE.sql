-- **todo --------Transacciones Concurrentes sin Bloqueo------
-- 
-- Tabla Maestra: materias 
-- Tabla Detalle: años_materias 
--
-- Tabla Puente: materias_docentes(para registra y eliminar correctamente)

-- **? ---Transacciones Concurrentes sin Bloqueo---
-- ** Transacción 1
START TRANSACTION;
-- Ejemplo de INSERT
SELECT * FROM materias WHERE nombre = 'QUIMICA';
UPDATE materias SET nombre = 'QUIMICA NIVEL I' WHERE nombre = 'QUIMICA';

INSERT INTO materias (nombre, estado) VALUES ('GEOGRAFIA', 1);
SET @id_materia = LAST_INSERT_ID();
INSERT INTO años_materias (id_anos, id_materias) VALUES (3, @id_materia);
INSERT INTO materias_docentes (estado, id_materias, id_docente) VALUES (1, @id_materia, 30019082);

-- Simulación de concurrencia (4 segundos)
SELECT SLEEP(4);
COMMIT;

SELECT * FROM materias WHERE estado = 1;


-- ** Transacción 2
START TRANSACTION;

-- Ejemplo de DELETE
SELECT id INTO @id_materia FROM materias WHERE nombre = 'QUIMICA';
DELETE FROM años_materias WHERE id_materias = @id_materia;
DELETE FROM materias_docentes WHERE id_materias = @id_materia;
DELETE FROM materias WHERE id = @id_materia;
COMMIT;

SELECT * FROM materias WHERE estado = 1;

-- **? Transacciones Concurrentes con Bloqueo de Modo Compartido (LOCK IN SHARE MODE)
-- Ahora, agregamos un bloqueo de modo compartido para asegurarnos de que una transacción no elimine una fila que otra transacción está utilizando.

-- ** Transacción 1
START TRANSACTION;
-- Seleccionar la materia con bloqueo en modo compartido
SELECT * FROM materias WHERE nombre= 'GEOGRAFIA' LOCK IN SHARE MODE;
UPDATE materias SET estado = 0 WHERE nombre = 'GEOGRAFIA';

SELECT SLEEP(4);
COMMIT;

-- Consulta final para verificar los datos
SELECT * FROM materias WHERE nombre= 'GEOGRAFIA';


-- ** Transacción 2

START TRANSACTION;

-- Intentar ACTUALIZAR una materia (esta operación esperará hasta que la transacción 1 complete)
SELECT id INTO @id_materia FROM materias WHERE nombre = 'GEOGRAFIA' LIMIT 1;

DELETE FROM años_materias WHERE id_materias = @id_materia;
DELETE FROM materias_docentes WHERE id_materias = @id_materia;
DELETE FROM materias WHERE id = @id_materia;

COMMIT;

-- Consulta final para verificar los datos
SELECT * FROM materias WHERE nombre= 'GEOGRAFIA';