CREATE DATABASE mvcinstagram;
USE mvcinstagram;

CREATE TABLE usuarios(
	id int primary key auto_increment,
    nome varchar(300) unique,
    senha varchar(300)
);

CREATE TABLE posts(
	id int primary key auto_increment,
    imagem varchar(256),
    descricao varchar(1000),
    usuario_id int,
    foreign key(usuario_id) references usuarios(id)
);