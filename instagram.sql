CREATE DATABASE instagram;
USE instagram;

CREATE TABLE posts(
	id int primary key auto_increment,
    imagem varchar(256),
    descricao varchar(1000)
);