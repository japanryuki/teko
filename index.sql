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


create table Typing(
    id serial not null primary key,
    genre varchar(20) not null,
    sub_genre varchar(20) not null,
    question varchar(100) not null,
    answer varchar(8) not null,
    answer_type integer not null,
    difficulty integer not null,
    foreign key (genre) references genre(genre),
    foreign key (sub_genre) references sub_genre(sub_genre)
);

insert into Typing (genre,sub_genre,question,answer,answer_type,difficulty) values ('Sience','Biology','リンゴは〇〇科？','バラ',2,1);

insert into Typing (genre,sub_genre,question,answer,answer_type,difficulty) values ('Entertainment','Music','『Lemon』を歌ったのは〇〇〇〇？','よねづけんし',1,1);

insert into Typing (genre,sub_genre,question,answer,answer_type,difficulty) values ('Comic_Animation_Game','Comic_Novel','『HUNTER*HUNTER』の作者は〇〇〇〇？','とがしよしひろ',1,1);


create table Effect(
    id serial not null primary key,
    genre varchar(20) not null,
    sub_genre varchar(20) not null,
    question varchar(100) not null,
    question_desc varchar(30),
    answer varchar(8) not null,
    answer_type integer not null,
    difficulty integer not null,
    foreign key (genre) references genre(genre),
    foreign key (sub_genre) references sub_genre(sub_genre)
);

insert into Effect (genre,sub_genre,question,question_desc,answer,answer_type,difficulty) values ('Humanities','History','織豊時代','織田信長と豊臣秀吉が生きた時代のこと','しょくほうじだい',1,2);

insert into Effect (genre,sub_genre,question,question_desc,answer,answer_type,difficulty) values ('Sports','Baseball','福浦和也','2019年に引退した元ロッテのプロ野球選手','ふくうらかずや',1,2);

create table Cube(
    id serial not null primary key,
    genre varchar(20) not null,
    sub_genre varchar(20) not null,
    question varchar(100) not null,
    question_desc varchar(30),
    answer varchar(8) not null,
    answer_type integer not null,
    difficulty integer not null,
    foreign key (genre) references genre(genre),
    foreign key (sub_genre) references sub_genre(sub_genre)
);

insert into Cube (genre,sub_genre,question,question_desc,answer,answer_type,difficulty) values ('Society','Geography','ちとせからすやま','東京都世田谷区の地名','ちとせからすやま',1,2);

insert into Cube (genre,sub_genre,question,question_desc,answer,answer_type,difficulty) values ('LifeStyle','Gourmet_Life','BULGARI','イタリアのブランド','BULGARI',3,4);



create table select_questions(
    id serial not null primary key,
    genre varchar(20) not null,
    sub_genre varchar(20) not null,
    questions_format varchar(20) not null,
    question varchar(100) not null,
    choises1 varchar(20) not null,
    choises2 varchar(20) not null,
    choises3 varchar(20),
    choises4 varchar(20),
    answer varchar(20) not null,
    difficulty integer not null,
    foreign key (genre) references genre(genre),
    foreign key (sub_genre) references sub_genre(sub_genre),
    foreign key (questions_format) references questions_format(questions_format)
);

create table Order_Guessing_questions(
    id serial not null primary key,
    genre varchar(20) not null,
    sub_genre varchar(20) not null,
    question varchar(100) not null,
    choises_type varchar(2) not null,
    choises1 varchar(30) not null,
    choises2 varchar(30) not null,
    choises3 varchar(30) not null,
    choises4 varchar(30),
    choises5 varchar(30),
    choises6 varchar(30),
    choises7 varchar(30),
    choises8 varchar(30),
    answer varchar(20) not null,
    difficulty integer not null,
    foreign key (genre) references genre(genre),
    foreign key (sub_genre) references sub_genre(sub_genre),
);

create table Many_Answers_questions(
    id serial not null primary key,
    genre varchar(20) not null,
    sub_genre varchar(20) not null,
    question varchar(100) not null,
    choises_type varchar(2) not null,
    choises1 varchar(30) not null,
    choises2 varchar(30) not null,
    choises3 varchar(30),
    choises4 varchar(30),
    choises5 varchar(30),
    choises6 varchar(30),
    choises7 varchar(30),
    choises8 varchar(30),
    answer varchar(20) not null,
    difficulty integer not null,
    foreign key (genre) references genre(genre),
    foreign key (sub_genre) references sub_genre(sub_genre),
    foreign key (questions_format) references questions_format(questions_format)
);

create table Wire_Knot_questions(
    id serial not null primary key,
    genre varchar(20) not null,
    sub_genre varchar(20) not null,
    question varchar(100) not null,
    choises1 varchar(30) not null,
    choises2 varchar(30) not null,
    choises3 varchar(30) not null,
    choises4 varchar(30),
    choises5 varchar(30),
    choises6 varchar(30),
    choises7 varchar(30),
    choises8 varchar(30),
    answer varchar(20) not null,
    difficulty integer not null,
    foreign key (genre) references genre(genre),
    foreign key (sub_genre) references sub_genre(sub_genre),
    foreign key (questions_format) references questions_format(questions_format)
);
