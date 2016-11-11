drop table AcademicQualificationsStrings;
drop table InstituteOfEducationStrings;
drop table ProfileStrings;
drop table AcademicQualifications;
drop table InstituteOfEducation;
drop table Profile;
drop table Locale;

create table Locale (
    locale varchar(6) not null,
    description varchar(100) not null,
    language varchar(50) not null,
    country varchar(70) not null,
    primary key(locale)
);

create table Profile (
    id int auto_increment not null,
    dateOfBirth date not null,
    primary key(id)
);

create table ProfileStrings (
    idProfile int not null,
    locale varchar(6) not null,
    name varchar(100) not null,
    document varchar(50) not null,
    primary key(idProfile,locale),
    foreign key (idProfile) references Profile (id),
    foreign key (locale) references Locale (locale)    
);

create table InstituteOfEducation (
    id int auto_increment not null,
    primary key(id)
);

create table InstituteOfEducationStrings (
    idInstituteOfEducation int not null,
    locale varchar(6) not null,
    name varchar(100) not null,
    primary key(idInstituteOfEducation,locale),
    foreign key (idInstituteOfEducation) references InstituteOfEducation (id),
    foreign key (locale) references Locale (locale)
);

create table AcademicQualifications (
    id int auto_increment not null,
    dateOfBegin date not null,
    dateOfFinish date,
    idProfile int not null,
    idInstituteOfEducation int not null,
    primary key(id),
    foreign key (idProfile) references Profile (id),
    foreign key (idInstituteOfEducation) references InstituteOfEducation (id)
);

create table AcademicQualificationsStrings (
    idAcademicQualifications int not null,
    locale varchar(6) not null,
    nameOfCourse varchar(100) not null,
    primary key(idAcademicQualifications,locale),
    foreign key (idAcademicQualifications) references AcademicQualifications (id),
    foreign key (locale) references Locale (locale)
);


--------------------------------------------------------
model_emp

drop table EmployerStrings;
drop table Employer;
drop table Locale;

create table Locale (
    locale varchar(6) not null,
    description varchar(100) not null,
    language varchar(50) not null,
    country varchar(70) not null,
    primary key(locale)
);

create table Employer (
    id int auto_increment not null,
    primary key(id)
);

create table EmployerStrings (
    idEmployer int not null,
    locale varchar(6) not null,
    name varchar(100) not null,
    primary key(idEmployer,locale),
    foreign key (idEmployer) references Employer (id),
    foreign key (locale) references Locale (locale)    
);
