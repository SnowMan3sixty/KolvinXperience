DROP TABLE IF EXISTS usuari;
DROP TABLE IF EXISTS experiencia;
DROP TABLE IF EXISTS categoria;

CREATE TABLE usuari (
    id int AUTO_INCREMENT,
    nom varchar(30),
    contraseña varchar(30),
    email varchar(30),
    admin_role boolean,
    PRIMARY KEY (id)
);
CREATE TABLE categoria (
    id int AUTO_INCREMENT,
    nombre varchar(30),
    PRIMARY KEY (id)
);
CREATE TABLE experiencia (
    id int AUTO_INCREMENT,
    titol varchar(30),
    data_creacio timestamp,
    data_publicacio date,
    descripcio varchar(1000),
    url_imatge varchar(1000),
    likes int,
    dislikes int,
    estado int,
    id_categoria int,     
    PRIMARY KEY (id),
    FOREIGN KEY experiencia(id_categoria) REFERENCES categoria(id)   
);

INSERT INTO usuari (nom,contraseña,email,admin_role)
values 
    ('admin','admin','admin@admin.com',1),
    ('user','1234','user@user.com',0);

INSERT INTO categoria (nombre)
values
    ('prueba1'),
    ('prueba2');


