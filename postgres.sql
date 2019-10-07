create table questions(
questions_id serial primary key,
genre varchar(50) not null,
sub_genre varchar(50) not null,
questions_format varchar(20) not null,
level integer not null,
foreign key (genre) references genre(genre),
foreign key (sub_genre) references sub_genre(sub_genre),
foreign key (questions_format) references questions_format(questions_format)
);

insert into questions(genre,sub_genre,questions_format,level) values('Entertainment','Music','Typing',3);
insert into questions(genre,sub_genre,questions_format,level) values('Sience','Biology','Typing',2);
insert into questions(genre,sub_genre,questions_format,level) values('Comic_Animation_Game','Comic_Novel','Typing',2);

insert into questions(genre,sub_genre,questions_format,level) values('Humanities','History','Effect',4);
insert into questions(genre,sub_genre,questions_format,level) values('Sports','Baseball','Effect',1);

insert into questions(genre,sub_genre,questions_format,level) values('Society','Geography','Cube',1);
insert into questions(genre,sub_genre,questions_format,level) values('LifeStyle','Gourmet_Life','Cube',1);



create table choices(
choices_id serial primary key,
questions_id integer not null,
choices varchar(50),
foreign key (questions_id) references questions(questions_id));


insert into choices(questions_id,choices) values(4,'織豊時代');
insert into choices(questions_id,choices) values(5,'福浦和也');
insert into choices(questions_id,choices) values(6,'ちとせからすやま');
insert into choices(questions_id,choices) values(7,'BULGARI');



create table answer(
answer_id serial primary key,
questions_id integer not null,
choices_id integer,
answer varchar(30) not null,
foreign key (questions_id) references questions(questions_id),
foreign key (choices_id) references choices(choices_id));


insert into answer(questions_id,answer) values(1,'バラ');
insert into answer(questions_id,answer) values(2,'よねづけんし');
insert into answer(questions_id,answer) values(3,'とがしよしひろ');
insert into answer(questions_id,choices_id,answer) values(4,1,'しょくほうじだい');
insert into answer(questions_id,choices_id,answer) values(5,1,'ふくうらかずや');
insert into answer(questions_id,choices_id,answer) values(6,1,'ちとせからすやま');
insert into answer(questions_id,choices_id,answer) values(7,1,'BULGARI');


create table statement(
statement_id serial primary key,
questions_id integer not null,
statement varchar(100) not null,
foreign key (questions_id) references questions(questions_id));


insert into statement(questions_id,statement) values(1,'リンゴは〇〇科？');
insert into statement(questions_id,statement) values(2,'『Lemon』を歌ったのは〇〇〇〇？');
insert into statement(questions_id,statement) values(3,'『HUNTER*HUNTER』の作者は〇〇〇〇？');
insert into statement(questions_id,statement) values(4,'織田信長と豊臣秀吉が生きた時代のこと');
insert into statement(questions_id,statement) values(5,'2019年に引退した元ロッテのプロ野球選手');
insert into statement(questions_id,statement) values(6,'東京都世田谷区の地名');
insert into statement(questions_id,statement) values(7,'イタリアのブランド');















-- references table --

create table genre(
    id serial not null primary key,
    genre varchar(20) not null unique
);

insert into genre values (1, 'Sience');
insert into genre values (2, 'Humanities');
insert into genre values (3, 'Society');
insert into genre values (4, 'LifeStyle');
insert into genre values (5, 'Entertainment');
insert into genre values (6, 'Sports');
insert into genre values (7, 'Comic_Animation_Game');

create table sub_genre(
    id serial not null primary key,
    genre varchar(20) not null,
    sub_genre varchar(20) not null unique,
    foreign key (genre) references genre(genre)
);

insert into sub_genre values (1, 'Sience','Physics_Chemistry');
insert into sub_genre values (2, 'Sience','Biology');
insert into sub_genre values (3, 'Sience','Science_Others');
insert into sub_genre values (4, 'Humanities','History');
insert into sub_genre values (5, 'Humanities','Language_Literature');
insert into sub_genre values (6, 'Humanities','Humanities_Others');
insert into sub_genre values (7, 'Society','Politics_Economy');
insert into sub_genre values (8, 'Society','Geography');
insert into sub_genre values (9, 'Society','Society_Others');
insert into sub_genre values (10, 'LifeStyle','Gourmet_Life');
insert into sub_genre values (11, 'LifeStyle','Hobby');
insert into sub_genre values (12, 'LifeStyle','LifeStyle_Others');
insert into sub_genre values (13, 'Entertainment','TV_Cinema');
insert into sub_genre values (14, 'Entertainment','Music');
insert into sub_genre values (15, 'Entertainment','Entertainment_Others');
insert into sub_genre values (16, 'Sports','Baseball');
insert into sub_genre values (17, 'Sports','Football');
insert into sub_genre values (18, 'Sports','Sports_Others');
insert into sub_genre values (19, 'Comic_Animation_Game','Comic_Novel');
insert into sub_genre values (20, 'Comic_Animation_Game','Animation');
insert into sub_genre values (21, 'Comic_Animation_Game','Game_Toys');

create table questions_format(
    id serial not null primary key,
    questions_format_type varchar(20) not null,
    questions_format varchar(20) not null unique
);

insert into questions_format values (1, 'select','marubatu');
insert into questions_format values (2, 'select','Four_Choices');
insert into questions_format values (3, 'select','Association');
insert into questions_format values (4, 'anagram','Sorting');
insert into questions_format values (5, 'anagram','Letter_Panel');
insert into questions_format values (6, 'anagram','Slot');
insert into questions_format values (7, 'typing','Typing');
insert into questions_format values (8, 'typing','Effect');
insert into questions_format values (9, 'typing','Cube');
insert into questions_format values (10, 'multi_select','Order_Guessing');
insert into questions_format values (11, 'multi_select','Many_Answers');
insert into questions_format values (12, 'multi_select','Wire_Knot');
insert into questions_format values (13, 'others','Groupping');
insert into questions_format values (14, 'others','First_Served');
insert into questions_format values (15, 'others','One_Way');
insert into questions_format values (16, 'others','Ramdom');

