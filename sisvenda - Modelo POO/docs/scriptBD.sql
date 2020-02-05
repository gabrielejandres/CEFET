create database dbsisvenda;
use dbsisvenda;

create table categoria(
id int auto_increment,
descricao varchar(30),
primary key (id));

create table produto(
id int auto_increment,
nome varchar(50),
descricao varchar(200),
preco float,
idcategoria int,
primary key (id),
foreign key (idcategoria) references categoria(id));

create table cliente(
id int auto_increment primary key, 
nome varchar(50), 
cpf varchar(14), 
login varchar(8), 
endereco varchar(50), 
senha varchar(30)
); 

create table venda(
id int auto_increment primary key,
dataven date,
hora time,
idcliente int,
foreign key (idcliente) references cliente(id) 
);

create table item (
id int auto_increment primary key,
idvenda int,
idproduto int,
qtd float,
foreign key (idproduto) references produto(id),
foreign key (idvenda) references venda(id)
);

alter table produto
	change column promocao promocao float;





