
-- REGISTRAR

BEGIN; 
                                                -- :cantidad(20 ESTUDIANTES),:id_secciones(4->D),:id_anos,(3->3AÑO):estado(1)
INSERT INTO secciones_años(cantidad,id_secciones, id_anos,estado) VALUES(20,4,3,1 );
SET @id_secciones_años = LAST_INSERT_ID();
                                                    -- cedula_docente , id_seccion_registrada
INSERT INTO docente_guia(id_docente,id_ano_seccion) VALUES( 30019081 , @id_secciones_años); 
                                        -- id_año_academico, id_seccion_registrada
INSERT INTO ano_secciones(id_anos,id_secciones) VALUES(2, @id_secciones_años);

COMMIT;
                 
-- MODIFICAR 


BEGIN;
    LOCK TABLES secciones_años WRITE, docente_guia WRITE;
    
        UPDATE secciones_años 
            SET cantidad = 30,
                id_secciones = 2,
                id_anos = 4
        WHERE id = 55;

    UPDATE docente_guia
        SET id_docente = 30019081
         WHERE id_ano_seccion = 55;

    UNLOCK TABLES;
COMMIT; 


-------- 8. Cómo realizar transacciones con procedimientos almacenados ---------------------

DROP PROCEDURE IF EXISTS transaccion_en_mysql;

DELIMITER $$

CREATE PROCEDURE transaccion_en_mysql()
BEGIN 
    DECLARE Error BOOLEAN DEFAULT FALSE;
    
    DECLARE EXIT HANDLER FOR SQLEXCEPTION, SQLWARNING 
    BEGIN 
        -- Manejar errores
        SET Error = TRUE;
        ROLLBACK TO sp1; 
    END; 

    START TRANSACTION; 

    -- Insertar datos
    INSERT INTO secciones_años(cantidad, id_secciones, id_anos, estado) VALUES(20, 4, 3, 1);
    SET @id_secciones_años = LAST_INSERT_ID();
    
    INSERT INTO docente_guia(id_docente, id_ano_seccion) VALUES(30019081, @id_secciones_años); 
    INSERT INTO ano_secciones(id_anos, id_secciones) VALUES(2, @id_secciones_años);
    
    -- Establecer el SAVEPOINT después de la inserción
    SAVEPOINT sp1;
    
    -- Actualizar 
    UPDATE secciones_años 
    SET cantidad = 30,
        id_secciones = 2,
        id_anos = 4
    WHERE id = 56;

    UPDATE docente_guia
    SET id_docente = 300190123
    WHERE id_ano_seccion = 56;

    -- Si no hay errores, confirmar la transacción
    IF NOT Error THEN
        COMMIT; 
    END IF;
END $$

DELIMITER ;

CALL transaccion_en_mysql();
