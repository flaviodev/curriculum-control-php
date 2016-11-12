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
    profileStrings_id int not null,
    locale varchar(6) not null,
    name varchar(100) not null,
    document varchar(50) not null,
    primary key(profileStrings_id,locale),
    foreign key (profileStrings_id) references Profile (id),
    foreign key (locale) references Locale (locale)    
);

create table InstituteOfEducation (
    id int auto_increment not null,
    primary key(id)
);

create table InstituteOfEducationStrings (
    instituteOfEducation_id int not null,
    locale varchar(6) not null,
    name varchar(100) not null,
    primary key(instituteOfEducation_id,locale),
    foreign key (instituteOfEducation_id) references InstituteOfEducation (id),
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
    academicQualifications_id int not null,
    locale varchar(6) not null,
    nameOfCourse varchar(100) not null,
    primary key(academicQualifications_id,locale),
    foreign key (academicQualifications_id) references AcademicQualifications (id),
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
    employer_id int not null,
    locale varchar(6) not null,
    name varchar(100) not null,
    primary key(employer_id,locale),
    foreign key (employer_id) references Employer (id),
    foreign key (locale) references Locale (locale)    
);
