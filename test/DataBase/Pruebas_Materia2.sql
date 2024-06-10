--------------------------- LOW_PRIORITY WRITE ----------------------------
--- Sólo se debe usar el bloqueo LOW_PRIORITY WRITE si se está seguro de que existirá un tiempo en el que no habrá hilos que pidan un bloqueo READ.

START TRANSACTION;

-- Bloquear las tablas con LOW_PRIORITY WRITE
LOCK TABLES materias LOW_PRIORITY WRITE, años_materias LOW_PRIORITY WRITE;

-- Insertar una nueva materia
INSERT INTO materias (nombre, estado) VALUES ('Deporte', 1);
SET @id_materia = LAST_INSERT_ID();

-- Insertar el registro en años_materias con el ID de la materia insertada anteriormente
INSERT INTO años_materias (id_anos, id_materias) VALUES (1, @id_materia);

-- Eliminar el registro de años_materias y materias
DELETE FROM años_materias WHERE id_materias = 19;
DELETE FROM materias WHERE id = 19;

-- Desbloquear las tablas
UNLOCK TABLES;

-- Confirmar la transacción
COMMIT;
-----------------------LOCK TABLES READ----------------------------------------------

START TRANSACTION;

-- Bloquear las tablas con bloqueo de lectura
LOCK TABLES materias READ, años_materias READ;

-- Insertar una nueva materia
INSERT INTO materias (nombre, estado) VALUES ('Deporte', 1);
SET @id_materia = LAST_INSERT_ID();

-- Insertar el registro en años_materias con el ID de la materia insertada anteriormente
INSERT INTO años_materias (id_anos, id_materias) VALUES (1, @id_materia);

-- Eliminar el registro de años_materias y materias
DELETE FROM años_materias WHERE id_materias = 19;
DELETE FROM materias WHERE id = 19;

-- Desbloquear las tablas
UNLOCK TABLES;

-- Confirmar la transacción
COMMIT;
