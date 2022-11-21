create database bd_php;
use bd_php;

create table tb_Login(
id_Usuario int auto_increment primary key,
nome varchar (30) not null,
telefone char (11) not null,
email varchar (40) not null,
senha varchar (30) not null
);

select*from tb_Login


