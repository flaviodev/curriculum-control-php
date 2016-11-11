create table Profile (
    id int auto_increment not null,
    name varchar(100) not null,
    dateOfBirth date not null,
    document varchar(50) not null,
    primary key(id)
);

create table InstituteOfEducation (
    id int auto_increment not null,
    name varchar(100) not null,
    primary key(id)
);

create table AcademicQualifications (
    id int auto_increment not null,
    nameOfCourse varchar(100) not null,
    dateOfBegin date not null,
    dateOfFinish date,
    idProfile int not null,
    idInstituteOfEducation int not null,
    primary key(id),
    foreign key (idProfile) references Profile (id),
    foreign key (idInstituteOfEducation) references InstituteOfEducation (id)
);