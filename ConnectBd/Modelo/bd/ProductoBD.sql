CREATE DATABASE PRUEBAS;
create table productos(
     id int auto_increment,
     nombre varchar(50) not null,
     precio double not null,
     marca varchar(50) not null,
     primary key(id)
);
create table moviles(
     id int auto_increment,
     nombre varchar(50) not null,
     primary key(id)
);
insert into productos (nombre, precio, marca) values("COCA LATA", 10, "COCA COLA"); 
insert into productos (nombre, precio, marca) values("PEPSI LATA", 9, "PEPSI COLA"); 
