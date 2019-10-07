drop table if exists test;

create database test;

use test;

create table questions(
questions_id int primary key auto_increment,
genre varchar(50) not null,
sub_genre varchar(50) not null,
questions_format varchar(20) not null,
level int not null
);

insert into questions(genre,sub_genre,questions_format,level) values('Humanities','History','Typing',5);

create table choices(
choices_id int primary key auto_increment,
questions_id int not null,
choices varchar(50) not null,
foreign key fk_questions_id(questions_id) references questions(questions_id));

create table answer(
answer_id int primary key auto_increment,
questions_id int not null,
choices_id int,
answer varchar(30) not null,
foreign key fk_questions_id(questions_id) references questions(questions_id),
foreign key fk_choices_id(choices_id) references choices(choices_id));

create table statement(
statement_id int primary key auto_increment,
questions_id int not null,
statement varchar(100) not null,
foreign key fk_questions_id(questions_id) references questions(questions_id));