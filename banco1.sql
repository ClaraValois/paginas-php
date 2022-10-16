create schema almox1;
use almox1;

 create table area_depar(
id_area integer auto_increment primary key,
depar varchar (40)
 );
CREATE TABLE servidor ( 
 id_servidor integer auto_increment primary key,
 nome varchar(40),  
 cpf varchar (15), 
 telefone varchar (11),  
 email varchar (80),  
 senha varchar (8),
id_area integer not null,
nivel varchar (15),
foreign key (id_area)  references area_depar (id_area)); 
