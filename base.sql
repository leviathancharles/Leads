CREATE DATABASE IF NOT EXISTS leads;
USE leads;

CREATE TABLE IF NOT EXISTS rol(
    id  INT(11) AUTO_INCREMENT NOT NULL,
    descripcion VARCHAR(20) NOT NULL,
    CONSTRAINT pk_rol PRIMARY KEY(id)
)ENGINE=InnoDb;

INSERT INTO rol(descripcion) VALUES('Administrador'), ('Gestores');

CREATE TABLE IF NOT EXISTS usuarios(
    id INT(11) AUTO_INCREMENT NOT NULL,
    nombre  VARCHAR(25) NOT NULL,
    apellido VARCHAR(25),
    email VARCHAR(25) NOT NULL,
    password VARCHAR(100) NOT NULL,
    id_rol INT(11) NOT NULL,
    created_at DATETIME,
    updated_at DATETIME,
    CONSTRAINT pk_usuario PRIMARY KEY(id),
    CONSTRAINT fk_usario_rol FOREIGN KEY(id_rol) REFERENCES rol(id)
)ENGINE=InnoDb;

INSERT INTO usuario(nombre, apellido, email, password, id_rol) VALUES('admin', 'admin', 'admin@gmail.com', '$2y$10$/y9B0HKAEK/qr06qFzxO9OfETj.eMxPXf3hUf.1V2CQWm1KzfFA3a', 1);

CREATE TABLE IF NOT EXISTS programas(
    id INT(11) AUTO_INCREMENT NOT NULL,
    programa VARCHAR(20) NOT NULL,
    CONSTRAINT pk_programa PRIMARY KEY(id)
)ENGINE=InnoDb;

INSERT INTO programas(programa) VALUES('Bachillerato'), ('Inglés'), ('Preicfes');

CREATE TABLE IF NOT EXISTS estudiantes(
    id INT(11) AUTO_INCREMENT NOT NULL,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT  NULL,
    email VARCHAR(50) NOT NULL,
    telefono_contacto VARCHAR(10) NOT NULL,
    id_programa INT(11) NOT NULL,
    created_at DATETIME,
    updated_at DATETIME,
    CONSTRAINT pk_estudiantes PRIMARY KEY(id),
    CONSTRAINT fk_estudiante_programa FOREIGN KEY(id_programa) REFERENCES programas(id)
)ENGINE=InnoDb;

CREATE TABLE IF NOT EXISTS estado(
    id INT(11) AUTO_INCREMENT NOT NULL,
    estado VARCHAR(20) NOT NULL,
    CONSTRAINT pk_estado PRIMARY KEY(id)
)ENGINE=InnoDb;

INSERT INTO estado(estado) VALUES('NO CONTACTADO'), ('EN CONTACTO'), ('CONTACTADO');

CREATE TABLE IF NOT EXISTS contacto(
    id INT(11) AUTO_INCREMENT NOT NULL,
    usuario_id INT(11) NOT NULL,
    estudiante_id INT(11) NOT NULL,
    estado_id INT(11) NOT NULL,
    created_at DATETIME,
    updated_at DATETIME,
    CONSTRAINT pk_contacto PRIMARY KEY(id),
    CONSTRAINT fk_usuario_contacto FOREIGN KEY(usuario_id) REFERENCES usuarios(id),
    CONSTRAINT fk_estudiante_contacto FOREIGN KEY(estudiante_id) REFERENCES estudiantes(id),
    CONSTRAINT fk_estado_contacto FOREIGN KEY(estado_id) REFERENCES estado(id)
)ENGINE=InnoDb

