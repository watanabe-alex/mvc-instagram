CREATE DATABASE instagram;
USE instagram;

CREATE TABLE posts(
	id int primary key auto_increment,
    imagem varchar(256),
    descricao varchar(1000)
);

CREATE TABLE usuarios(
	id int primary key auto_increment,
    nome varchar(300),
    senha varchar(300)
);