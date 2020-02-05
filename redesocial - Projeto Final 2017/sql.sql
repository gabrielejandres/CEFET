create schema cadastro default char set utf8;

use cadastro;

create table usuarios(
	id int not null,
	nome varchar(100) not null,
    sobrenome varchar(100) not null,
    sexo varchar(60),
    email varchar(255),
    username varchar(255),
    senha varchar(500),
    salt int,
	primary key(id)
);

create table amigos(
	id_pessoa int not null,
    id_amigo int not null,
    status_amizade varchar(255),
	primary key(id_pessoa, id_amigo)
);

create table mensagens(
	remetente int not null,
    destinatario int not null,
    mensagem text not null,
    data varchar(255) not null
);

insert into usuarios(id,nome,sobrenome,sexo,email,username,senha,salt)
	values
		(1,'Root', 'ROOT', 'F', 'root@root.com', 'root', '3a45f7dfcf8c66d5126bd43c0a6eea6ce4c37bd598ecf0dd2d19cab2b324d17069cc13abd90ee921fccee1ad8d70b1e71ce2156aa29d7e221712d4dd0817b680', 28336),
        (2, 'Alok', 'Peres', 'M', 'alok@gmail.com', 'alokperes', '1a1946c70c025d131ed665c7f226c1cfcf0c306b5f09ded6b74fbf88d1a22eb1afd501de20ee1157f476c5713093099d002ec83c36008e630a512f65b369cae1', 28969),
        (3, 'Demi', 'Lovato', 'F', 'demi@gmail.com', 'demilovato', '9e849b79aac1f537f48dd214d8e72a835e678cb784a4fba7540f47aa4adb3bc59fb014095c1c0cbfdea2de7e22ca1014729095aab0a10eaa8090026b495b4237', 23726);

insert into usuarios(id,nome,sobrenome,sexo,email,username,senha,salt)
	values
		(4, 'Justin', 'Bieber', 'M', 'justin@gmail.com', 'justinbieber','848eec745579ed9786bac494cfe77bc55c0cd07cee3a8636d2d22f5656fe90b5e7f50d7be30d06351b021fb12025d6fc0b20bd95badf26b47232bb0dfdcbb31f', 8828),
        (5, 'Selena', 'Gomez', 'F', 'selena@gmail.com', 'selenagomez', 'b7c4a367922c48d59b2aa954fe9d1a50df81321d89f7ef542ee549100a201e91e3a59c9a82d13fcaa1a10e5777c6dfb670fc3d3b140b48c29bd183e09584ff8a', 17884),
        (6, 'Niall', 'Horan', 'M', 'niall@gmail.com', 'niallhoran', '2f9cd85e0c958e27244a9d6df717915401e3608dc35e6621a39099f577d699aacc337696577f509b14aa4930ee47dbc1dfb934132f8f218f7e9ef60ebb211b1e', 30437);
insert into amigos(id_pessoa,id_amigo,status_amizade)
	values
		(3,2,'Confirmado'),
        (4,6,'Solicitado'),
        (4,5,'Confirmado'),
        (1,5,'Confirmado');
        
insert into mensagens(remetente,destinatario,mensagem,data)
	values
		(3,2,'oiiiii','2017-12-01 14:59'),
        (2,3,'oiiiiiiiiiii demi','2017-12-01 15:00');
        
