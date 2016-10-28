
create table profile (
    profile_id int auto_increment not null,
    name varchar(100) not null,
    date_of_birth date not null,
    document varchar(50) not null,
    primary key(profile_id)
);

create table institute_of_education (
    institute_id int auto_increment not null,
    name varchar(100) not null,
    primary key(institute_id)
);

create table academic_qualifications (
    acad_qual_id int auto_increment not null,
    name_of_course varchar(100) not null,
    date_of_begin date not null,
    date_of_finish date,
    profile_id int not null,
    institute_id int not null,
    primary key(acad_qual_id),
    foreign key (profile_id) references profile (profile_id),
    foreign key (institute_id) references institute_of_education (institute_id)
);