create database dbprojetohospital char set 'utf8';

use dbprojetohospital;

create table Medico(
	id int auto_increment,
    nome varchar(50),
    area varchar(50),
    
    primary key(id)
);

create table Paciente(
	id int auto_increment not null,
    nome varchar(50),
	sobrenome varchar(50),
	cpf varchar(50),
    endereco varchar(50),
	email varchar(50),
	telefone varchar(50),
	celular varchar(50),
	rg varchar(50),
    dataNascimento varchar(50),
    
    primary key(id)
);

create table Disponibilidade(
	id_medico int,
    diaSemana varchar(50),
    horaInicio varchar(50),
    horaFim varchar(50),
    
    primary key(id_medico),
    FOREIGN KEY (id_medico) REFERENCES Medico(id)
);

create table Agendamento(
	id_medico int,
    id_paciente int,
    dia varchar(50),
    horario varchar(50),
    
    primary key(id_medico, id_paciente),
    FOREIGN KEY (id_medico) REFERENCES Medico(id),
    FOREIGN KEY (id_paciente) REFERENCES Paciente(id)
);

