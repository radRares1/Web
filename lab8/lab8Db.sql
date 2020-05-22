create database lab8

create table users(
id int primary key identity(1,1),
name varchar(50) not null,
password varchar(50) not null
)

create table recepies(
rId int primary key identity(1,1),
title varchar(50),
description varchar(200),
type varchar(50))


insert into users(name,password) values('test2','test2')

insert into recepies(title,description,type) values('ciorba','de vita','principal')

insert into recepies(title,description,type) values('friptura','de porc','secundar')

insert into recepies(title,description,type) values('omleta','cu oua','mic dejun')

insert into recepies(title,description,type) values('clatite','cu gem','desert')

select * from users
select * from recepies
