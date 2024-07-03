-- ****todo -----------------Tablas Maestras y Tabla Puente --------
-- 
-- Tablas Maestras : docentes y materias
-- Tabla Puente : materias_docente
--
--Tabla Detalle: años_materias(para registrar correctamente)

-- ***? LOCK TABLES

-- **** TRANSSACCION 1
START TRANSACTION;
LOCK TABLES materias WRITE, materias_docentes WRITE;

SELECT id INTO @id_materia FROM materias WHERE nombre = 'LITERATURA' LIMIT 1;
UPDATE materias_docentes SET id_docente = 30019081 WHERE id_materias = @id_materia;
UPDATE materias SET nombre = "LITERATURA BASICA" WHERE id = @id_materia;

SELECT SLEEP(6);

UNLOCK TABLES;
COMMIT;

SELECT * 
FROM materias
INNER JOIN materias_docentes ON materias.id = materias_docentes.id_materias
WHERE materias.nombre = "LITERATURA BASICA";

-- **** TRANSSACCION 2

START TRANSACTION;
-- Insertar la primera materia y crear un punto de guardado
INSERT INTO materias (nombre, estado) VALUES ('FISICA', 1);
SET @id_materia = LAST_INSERT_ID();
INSERT INTO años_materias (id_anos, id_materias) VALUES (3, @id_materia);
INSERT INTO materias_docentes (estado, id_materias, id_docente) VALUES (1, @id_materia, 300190123);

COMMIT;

-- Consulta final para verificar los datos
        SELECT
            materias.id AS id_materias,
            materias.nombre AS materias,
            GROUP_CONCAT(DISTINCT años.id) AS id_anos,
            GROUP_CONCAT(DISTINCT años.anos) AS Años,
            GROUP_CONCAT(DISTINCT CONCAT(docentes.nombre, ' ', docentes.apellido) ORDER BY docentes.nombre) AS docente_nombre_apellido,
            GROUP_CONCAT(DISTINCT docentes.cedula ORDER BY docentes.nombre) AS docente_cedula
        FROM
            materias
        LEFT JOIN 
            años_materias ON materias.id = años_materias.id_materias
        LEFT JOIN
            años ON años_materias.id_anos = años.id
        LEFT JOIN
            materias_docentes ON materias.id = materias_docentes.id_materias
        LEFT JOIN
            docentes ON materias_docentes.id_docente = docentes.cedula
        WHERE
            materias.estado = 1
            AND materias_docentes.estado = 1  -- Agregar esta línea para filtrar por estado en materias_docentes
        GROUP BY
            materias.id;