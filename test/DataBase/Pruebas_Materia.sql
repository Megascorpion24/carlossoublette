-------------------------- 4. START TRANSACTION, COMMIT y ROLLBACK
 
-- Insertar la materia y obtener su ID
START TRANSACTION;
INSERT INTO materias (nombre, estado) VALUES ('TEATRO', 1);
SET @id_materia = LAST_INSERT_ID();
INSERT INTO años_materias (id_anos, id_materias) VALUES (1, @id_materia);
COMMIT;

-- Insertar el registro en años_materias con el ID de la materia insertada anteriormente

---------------------------5. SAVEPOINT, ROLLBACK TO SAVEPOINT y RELEASE SAVEPOINT
START TRANSACTION;

-- Insertar la primera materia y crear un punto de guardado
INSERT INTO materias (nombre, estado) VALUES ('Castellano', 1);
SET @id_materia1 = LAST_INSERT_ID();
INSERT INTO años_materias (id_anos, id_materias) VALUES (1, @id_materia1);

SAVEPOINT sp1;

-- Insertar la segunda materia
INSERT INTO materias (nombre, estado) VALUES ('Historia', 1);
SET @id_materia2 = LAST_INSERT_ID();
INSERT INTO años_materias (id_anos, id_materias) VALUES (1, @id_materia2);

-- Insertar la tercera materia
INSERT INTO materias (nombre, estado) VALUES ('Matemáticas', 1);
SET @id_materia3 = LAST_INSERT_ID();
INSERT INTO años_materias (id_anos, id_materias) VALUES (1, @id_materia3);

-- Si hay algún error, revertir la transacción hasta el punto de guardado
ROLLBACK TO sp1;

-- Confirmar la transacción
COMMIT;




-------------------BLOQUEO DE TABLA PARA ELIMINAR----------
START TRANSACTION;
LOCK TABLES años_materias WRITE, materias WRITE;

DELETE FROM años_materias WHERE id_materias = 19;
DELETE FROM materias WHERE id = 19;


UNLOCK TABLES;
COMMIT;
