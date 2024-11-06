create database tarefausu;
use tarefausu;

/*----------------------------TABELAS-----------------------------------------*/

create table tbl_usuarios(
       usu_codigo int primary key auto_increment,
       usu_nome varchar(255),
       usu_email varchar(255)
);

create table tbl_tarefas(
       tar_codigo int primary key auto_increment,
       tar_setor varchar(255),
       tar_prioridade enum('baixa','média','alta'),
       tar_descricao varchar(255),
       tar_status varchar(255)
);

/*-----------------INSERÇÃO DE CHAVES ESTRANGEIRAS----------------------------*/

alter table tbl_tarefas
add column usu_codigo int,
add constraint fk_usu_codigo
foreign key(usu_codigo)
references tbl_usuarios(usu_codigo);