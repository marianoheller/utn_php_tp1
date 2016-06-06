CREATE DATABASE curso_utn;

use curso_utn;

CREATE TABLE curso (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    nombre VARCHAR(100), 
    turno VARCHAR(100)
);
CREATE TABLE alumno (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    nombre VARCHAR(100), 
    edad TINYINT,
    curso_id BIGINT UNSIGNED,
    CONSTRAINT FOREIGN KEY(curso_id) REFERENCES curso (id)
);


INSERT INTO curso (nombre, turno) VALUES ('Professional Webmaster', 'Noche');
INSERT INTO curso (nombre, turno) VALUES ('Experto Universitario en PHP', 'Tarde');
INSERT INTO curso (nombre, turno) VALUES ('Professional Webmaster', 'Tarde');
INSERT INTO curso (nombre, turno) VALUES ('Professional Webmaster (vacio)', 'Mañana');
INSERT INTO curso (nombre, turno) VALUES ('Experto Universitario en PHP', 'Mañana');
INSERT INTO curso (nombre, turno) VALUES ('Experto Universitario en PHP', 'Noche');

INSERT INTO alumno(nombre, edad, curso_id) VALUES('Juan Perez', 25, 1);
INSERT INTO alumno(nombre, edad, curso_id) VALUES('Jorge Gonzalez', 30, 2);
INSERT INTO alumno(nombre, edad, curso_id) VALUES('Maria Lopez', 28, 3);
INSERT INTO alumno(nombre, edad, curso_id) VALUES('Julian Sanchez', 34, 1);
INSERT INTO alumno(nombre, edad, curso_id) VALUES('Carlos SinCurso', 38, NULL);
INSERT INTO alumno(nombre, edad, curso_id) VALUES('Julian Heras', 24, 2);
INSERT INTO alumno(nombre, edad, curso_id) VALUES('Roberto Sanchez', 34, 3);
INSERT INTO alumno(nombre, edad, curso_id) VALUES('Juan Carlos', 35, 1);