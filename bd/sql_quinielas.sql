CREATE DATABASE db_quinielas;

use db_quinielas;


CREATE TABLE acceso (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(30) NOT NULL,
    app_s VARCHAR(50) NOT NULL,
    usuario VARCHAR(20) NOT NULL,
    pass_a VARCHAR(30) NOT NULL,
    tipo_usuario ENUM('Administrador', 'Cliente', 'Soporte_ti')
)  ENGINE=INNODB;

CREATE TABLE equipos (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(25)
)  ENGINE=INNODB;


CREATE TABLE ligas (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(200) NOT NULL,
    fecha_registro DATETIME
)  ENGINE=INNODB;

CREATE TABLE jornadas (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    id_ligas INT(11),
    nombre VARCHAR(20) NOT NULL,
    estado ENUM('A', 'D')
);

CREATE TABLE encuentros (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    id_jornada INT(11) NOT NULL,
    posicion_partido INT(2) NOT NULL,
    id_eq_local INT(11) NOT NULL,
    id_eq_visi INT(11) NOT NULL,
    resultado ENUM('L', 'E', 'V', 'S/R') DEFAULT 'S/R'
)  ENGINE=INNODB;

CREATE TABLE quinielas (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    id_jornada INT(11) NOT NULL,
    id_acceso INT(11) NOT NULL,
    nombre_quiniela VARCHAR(25) NOT NULL
)  ENGINE=INNODB;


CREATE TABLE puntos (
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    id_quiniela INT(11) NOT NULL,
    voto_a ENUM('L', 'E', 'V')
)  ENGINE=INNODB;



