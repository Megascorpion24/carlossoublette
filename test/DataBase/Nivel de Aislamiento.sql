
-- * TRANSSACCION 1

START TRANSACTION;


INSERT INTO materias (nombre, estado) VALUES ('QUIMICA', 1);
SET @id_materia = LAST_INSERT_ID();
INSERT INTO años_materias (id_anos, id_materias) VALUES (1, @id_materia);

SAVEPOINT sp1;

-- Insertar la primera materia y crear un punto de guardado
INSERT INTO materias (nombre, estado) VALUES ('CASTELLANO', 1);
SET @id_materia1 = LAST_INSERT_ID();
INSERT INTO años_materias (id_anos, id_materias) VALUES (1, @id_materia1);

-- Simulación de concurrencia (3seg)
SELECT SLEEP(3);
ROLLBACK TO sp1;
-- Aún no se hace commit aquí para simular datos no confirmados
-- COMMIT;

-- * Transacción 2
--  READ UNCOMMITTED es el más bajo y permite que una transacción lea datos que aún no han 
--  sido confirmados (committed) por otras transacciones. 

-- Abre una nueva sesión en otra consola o terminal y ejecuta:
SET SESSION TRANSACTION ISOLATION LEVEL READ UNCOMMITTED;

START TRANSACTION;

-- Leer los datos que aún no se han confirmado en Transacción 1
SELECT * FROM materias WHERE nombre = 'QUIMICA';

-- Actualizar un registro basado en la lectura anterior
UPDATE materias SET estado = 0 WHERE nombre = 'QUIMICA';

-- Confirma los cambios en Transacción 2
COMMIT;

-- Transacción 1 (Continuación)  Ahora sí, haz el commit en Transacción 1
COMMIT;

-- Consulta final para verificar el estado de las tablas
SELECT * FROM materias;
SELECT * FROM años_materias;



--Conclusión
-- Durante el SELECT SLEEP(3);, la transacción 1 está en una pausa activa, lo que significa que está en ejecución, pero no progresa en sus operaciones hasta que el tiempo de espera termine. Esta pausa permite que otra transacción (Transacción 2) interactúe con los datos, y debido al nivel de aislamiento READ UNCOMMITTED, puede leer los cambios no confirmados realizados por Transacción 1. Esto simula un entorno de concurrencia y muestra los efectos del nivel de aislamiento más bajo.