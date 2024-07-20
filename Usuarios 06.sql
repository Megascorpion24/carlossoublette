

/*Crear Usuario Administrador*/
CREATE USER 'administrador_bd'@'localhost' IDENTIFIED VIA mysql_native_password USING '';GRANT ALL PRIVILEGES ON *.* TO 'administrador'@'localhost' REQUIRE NONE WITH GRANT OPTION MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;
/*-------------------------*/



/*Crear Usuario Operador*/
CREATE USER 'operador'@'localhost' IDENTIFIED VIA mysql_native_password USING '';GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, DROP, RELOAD, FILE, INDEX, ALTER, SHOW DATABASES, CREATE TEMPORARY TABLES, LOCK TABLES, REPLICATION SLAVE, REPLICATION CLIENT, CREATE VIEW, EVENT, TRIGGER, SHOW VIEW, CREATE ROUTINE, ALTER ROUTINE, EXECUTE ON *.* TO 'operador'@'localhost' REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;
/*-------------------------*/



/*analista de base de datos*/
CREATE USER 'analista de base de datos'@'localhost' IDENTIFIED VIA mysql_native_password USING '';GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, DROP, FILE, INDEX, ALTER, CREATE TEMPORARY TABLES, CREATE VIEW, EVENT, TRIGGER, SHOW VIEW, CREATE ROUTINE, ALTER ROUTINE, EXECUTE ON *.* TO 'analista de base de datos'@'localhost' REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;
/*-------------------------*/


/*auditor de base de datos*/
CREATE USER 'auditor de base de datos'@'localhost' IDENTIFIED VIA mysql_native_password USING '';GRANT SELECT ON *.* TO 'auditor de base de datos'@'localhost' REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0; 
/*-------------------------*/



/*usuarios normales de la base de datos*/
CREATE USER 'usuarios normales de la base de datos'@'localhost' IDENTIFIED VIA mysql_native_password USING '';GRANT SELECT ON *.* TO 'usuarios normales de la base de datos'@'localhost' REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0; 
/*-------------------------*/


/*usuarios básicos de la aplicación web TUTOR*/
CREATE USER 'tutor'@'localhost' IDENTIFIED VIA mysql_native_password USING '';GRANT USAGE ON colegiocarlossoublette.* TO 'tutor'@'localhost' REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;
GRANT SELECT, LOCK TABLES ON `colegiocarlossoublette`.* TO 'tutor'@'localhost';
GRANT UPDATE ON `colegiocarlossoublette`.`dolar_venezuela` TO 'tutor'@'localhost';
 GRANT UPDATE, UPDATE ON `colegiocarlossoublette`.`deudas` TO 'tutor'@'localhost'; 
 GRANT UPDATE ON `colegiocarlossoublette`.`montos` TO 'tutor'@'localhost'; 
  GRANT INSERT ON `colegiocarlossoublette`.`pagos` TO 'tutor'@'localhost'; 
 GRANT INSERT, UPDATE, REFERENCES ON `colegiocarlossoublette`.`bitacora` TO 'tutor'@'localhost';

/*-------------------------*/

/*usuarios básicos de la aplicación web DOCENTE*/
CREATE USER 'docente'@'localhost' IDENTIFIED VIA mysql_native_password USING '';GRANT USAGE ON colegiocarlossoublette.* TO 'docente'@'localhost' REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;
GRANT SELECT, REFERENCES ON `colegiocarlossoublette`.`años` TO 'docente'@'localhost';
GRANT SELECT ON `colegiocarlossoublette`.`eventos` TO 'docente'@'localhost';
GRANT SELECT ON `colegiocarlossoublette`.`eventos_docente` TO 'docente'@'localhost';
 GRANT SELECT ON `colegiocarlossoublette`.`estudiante_ficha` TO 'docente'@'localhost'; 
 GRANT SELECT ON `colegiocarlossoublette`.`estudiantes` TO 'docente'@'localhost'; 
 GRANT SELECT ON `colegiocarlossoublette`.`estudiantes_tutor` TO 'docente'@'localhost'; 
 GRANT SELECT ON `colegiocarlossoublette`.`horario_ano` TO 'docente'@'localhost'; 
 GRANT SELECT ON `colegiocarlossoublette`.`horario_docente` TO 'docente'@'localhost'; 
 GRANT SELECT ON `colegiocarlossoublette`.`materia_horario_docente` TO 'docente'@'localhost'; 
 GRANT SELECT ON `colegiocarlossoublette`.`secciones` TO 'docente'@'localhost'; 
 GRANT SELECT ON `colegiocarlossoublette`.`secciones_años` TO 'docente'@'localhost'; 
 GRANT SELECT ON `colegiocarlossoublette`.`ano_academico` TO 'docente'@'localhost';
 GRANT SELECT ON `colegiocarlossoublette`.`años` TO 'docente'@'localhost';
 GRANT SELECT ON `colegiocarlossoublette`.`materias_docentes` TO 'docente'@'localhost';
GRANT SELECT ON `colegiocarlossoublette`.`notificaciones` TO 'docente'@'localhost'; 
GRANT SELECT, INSERT, UPDATE, REFERENCES ON `colegiocarlossoublette`.`bitacora` TO 'docente'@'localhost';
GRANT SELECT ON `colegiocarlossoublette`.`ano_estudiantes` TO 'docente'@'localhost';
GRANT SELECT ON `colegiocarlossoublette`.`docente_guia` TO 'docente'@'localhost';
GRANT SELECT ON `colegiocarlossoublette`.`ano_secciones` TO 'docente'@'localhost';
GRANT SELECT ON `colegiocarlossoublette`.`docente_horario` TO 'docente'@'localhost';
GRANT SELECT ON `colegiocarlossoublette`.`materias` TO 'docente'@'localhost';
GRANT SELECT ON `colegiocarlossoublette`.`años_materias` TO 'docente'@'localhost';
GRANT SELECT ON `colegiocarlossoublette`.`ficha_medica` TO 'docente'@'localhost';

GRANT SELECT ON `colegiocarlossoublette`.`docentes` TO 'docente'@'localhost';


 GRANT LOCK TABLES ON `colegiocarlossoublette`.* TO 'docente'@'localhost'; 

/*-------------------------*/

/*usuarios avanzados de la aplicación web SUPERUSUARIO*/
CREATE USER superusuario@'localhost' IDENTIFIED VIA mysql_native_password USING '';GRANT USAGE ON colegiocarlossoublette.* TO 'superusuario'@'localhost' REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;
 GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, DROP, INDEX, ALTER, CREATE TEMPORARY TABLES, LOCK TABLES, CREATE VIEW, EVENT, TRIGGER, SHOW VIEW, CREATE ROUTINE, ALTER ROUTINE, EXECUTE ON `colegiocarlossoublette`.* TO 'superusuario'@'localhost' WITH GRANT OPTION;
/*-------------------------*/

/*usuarios avanzados de la aplicación web  DESARROLLADOR*/
CREATE USER 'desarrollador'@'localhost' IDENTIFIED VIA mysql_native_password USING '';GRANT USAGE ON colegiocarlossoublette.* TO 'desarrollador'@'localhost' REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;
 
 GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, DROP, INDEX, ALTER, CREATE TEMPORARY TABLES, LOCK TABLES, CREATE VIEW, EVENT, TRIGGER, SHOW VIEW, CREATE ROUTINE, ALTER ROUTINE, EXECUTE ON `colegiocarlossoublette`.* TO 'desarrollador'@'localhost'; 
/*-------------------------*/

/* usuario login*/
CREATE USER 'login'@'localhost' IDENTIFIED VIA mysql_native_password USING '';GRANT USAGE ON colegiocarlossoublette.* TO 'login'@'localhost' REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;
GRANT SELECT, UPDATE, REFERENCES ON `colegiocarlossoublette`.`usuarios` TO 'login'@'localhost';
GRANT SELECT, UPDATE, REFERENCES ON `colegiocarlossoublette`.`rol` TO 'login'@'localhost';
GRANT SELECT, INSERT, UPDATE, REFERENCES ON `colegiocarlossoublette`.`bitacora` TO 'login'@'localhost';
GRANT SELECT, INSERT, UPDATE ON `colegiocarlossoublette`.`rol_permiso` TO 'login'@'localhost';
GRANT SELECT, INSERT, UPDATE, REFERENCES ON `colegiocarlossoublette`.`permisos` TO 'login'@'localhost';
GRANT SELECT, INSERT, UPDATE, REFERENCES ON `colegiocarlossoublette`.`usuarios_tutor` TO 'login'@'localhost';
GRANT SELECT ON `colegiocarlossoublette`.`notificaciones` TO 'login'@'localhost'; 
GRANT LOCK TABLES ON `colegiocarlossoublette`.* TO 'login'@'localhost';

CREATE USER 'usuario_sistema'@'localhost' IDENTIFIED VIA mysql_native_password USING '***';GRANT USAGE ON *.* TO 'usuario_sistema'@'localhost' REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;
GRANT SELECT, INSERT, UPDATE, CREATE, DROP, REFERENCES, INDEX, ALTER, CREATE TEMPORARY TABLES, LOCK TABLES, CREATE VIEW, EVENT, TRIGGER, SHOW VIEW, CREATE ROUTINE, ALTER ROUTINE, EXECUTE ON `colegiocarlossoublette`.* TO 'usuario_sistema'@'localhost' WITH GRANT OPTION;


SELECT * FROM mysql.user;



