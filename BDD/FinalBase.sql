CREATE DATABASE AEC;
USE AEC;
CREATE TABLE admins (
    idAdmin INT AUTO_INCREMENT PRIMARY KEY,
    idSchool INT,
    adminsName VARCHAR(50),
    adminsPassword VARCHAR(50)
);

INSERT into admins VALUES (DEFAULT, 1, "JOSOA", "JOSOA");

CREATE TABLE school (
    idSchool INT AUTO_INCREMENT PRIMARY KEY,
    schoolName VARCHAR(50)
);

INSERT INTO school VALUES (DEFAULT, "ISORAKA");

INSERT INTO school VALUES (DEFAULT, "TSARASAOTRA");

CREATE TABLE allOptions (
    idOption INT AUTO_INCREMENT PRIMARY KEY,
    optionsName VARCHAR(20)
);

INSERT INTO allOptions VALUES (DEFAULT, "ENGLISH");

INSERT INTO allOptions VALUES (DEFAULT, "CHINESE");

CREATE TABLE allSessions (
    idSession INT AUTO_INCREMENT PRIMARY KEY,
    idSchool INT,
    idOption INT,
    sessionsName VARCHAR(50),
    date DATETIME
);

CREATE TABLE cours (
    idCours INT PRIMARY KEY AUTO_INCREMENT,
    coursName VARCHAR(50)
);

INSERT INTO cours VALUES (DEFAULT, "Saturday class");

INSERT INTO cours VALUES (DEFAULT, "Daily Class");

INSERT INTO cours VALUES (DEFAULT, "Sunday class");

INSERT INTO cours VALUES (DEFAULT, "Private class");

INSERT INTO cours VALUES (DEFAULT, "Evening class");

INSERT INTO cours VALUES (DEFAULT, "Online class");

CREATE TABLE levels (
    idLevel INT AUTO_INCREMENT PRIMARY KEY,
    levelsName VARCHAR(50),
    miveau INT,
    idOption INT
);

INSERT INTO levels VALUES (DEFAULT, "LEVEL", 1, 1);

INSERT INTO levels VALUES (DEFAULT, "LEVEL", 2, 1);

INSERT INTO levels VALUES (DEFAULT, "LEVEL", 3, 1);

INSERT INTO levels VALUES (DEFAULT, "LEVEL", 4, 1);

INSERT INTO levels VALUES (DEFAULT, "HSK", 1, 2);

INSERT INTO levels VALUES (DEFAULT, "HSK", 2, 2);

INSERT INTO levels VALUES (DEFAULT, "HSK", 3, 2);

INSERT INTO levels VALUES (DEFAULT, "HSK", 4, 2);

INSERT INTO levels VALUES (DEFAULT, "HSK", 5, 2);

CREATE TABLE students (
    idStudent INT AUTO_INCREMENT PRIMARY KEY,
    studentsName VARCHAR(50),
    studentsSex VARCHAR(1),
    StudentsFirstName VARCHAR(50),
    studentsAdress VARCHAR(50),
    studentsTelephone VARCHAR(10),
    studentsPhoto VARCHAR(200)
);

CREATE TABLE roll (
    idRoll INT AUTO_INCREMENT PRIMARY KEY,
    idStudent INT,
    idSchool INT,
    idOption INT,
    idLevel INT,
    idSession INT,
    idAdmin INT,
    value INT,
    payment INT,
    date DATETIME
);

CREATE TABLE payment (
    idPayment INT AUTO_INCREMENT PRIMARY KEY,
    idSchool INT,
    idOption INT,
    idStudent INT,
    idLevel INT,
    idSession INT,
    idAdmin INT,
    montant INT,
    date DATETIME
);

CREATE TABLE teachers (
    idTeacher INT AUTO_INCREMENT PRIMARY KEY,
    teachersName VARCHAR(50),
    email VARCHAR(70),
    photo VARCHAR(100)
);

INSERT INTO
    teachers
VALUES (
        DEFAULT,
        "Nantenaina",
        "razananaivonantenaina9@gmail.com",
        "Nantenaina.jpg"
    );

INSERT INTO
    teachers
VALUES (
        DEFAULT,
        "Mike",
        "mikaiahsmith@gmail.com",
        "Mike.jpg"
    );

INSERT INTO
    teachers
VALUES (
        DEFAULT,
        "Kelly",
        "kellyntiavina@gmail.com",
        "Kelly.jpg"
    );

INSERT INTO
    teachers
VALUES (
        DEFAULT,
        "Rojo",
        "rojotianahariniaina1@gmail.com",
        "Rojo.jpg"
    );

INSERT INTO
    teachers
VALUES (
        DEFAULT,
        "Pascal",
        "ambinintsoa.pascal7@gmail.com",
        "Pascal.jpg"
    );

INSERT INTO
    teachers
VALUES (
        DEFAULT,
        "Riantsoa",
        "riantsoaarmand@gmail.com",
        "Riantsoa.jpg"
    );

INSERT INTO
    teachers
VALUES (
        DEFAULT,
        "Stella",
        "stellamalalaniaina@gmail.com",
        "Stella.jpg"
    );

INSERT INTO
    teachers
VALUES (
        DEFAULT,
        "Ianjara",
        "hariniainanjara@gmail.com",
        "Ianjara.jpg"
    );

INSERT INTO
    teachers
VALUES (
        DEFAULT,
        "Ashley",
        "megashmahonjo@gmail.com",
        "Ashley.jpg"
    );

INSERT INTO
    teachers
VALUES (
        DEFAULT,
        "Koloina",
        "ramanantohokoloina@gmail.com",
        "Koloina.jpg"
    );

INSERT INTO
    teachers
VALUES (
        DEFAULT,
        "Kasaina",
        "kolohasinak@gmail.com",
        "Kasaina.jpg"
    );

INSERT INTO
    teachers
VALUES (
        DEFAULT,
        "Faniry",
        "yrinafnathan@gmail.com",
        "Faniry.jpg"
    );

INSERT INTO
    teachers
VALUES (
        DEFAULT,
        "Erica",
        "andriantsalamaerica186@gmail.com",
        "Erica.jpg"
    );

CREATE table teacherMovement (
    idTeacher INT,
    idOption INT,
    idSchool INT,
    active BOOLEAN
);


INSERT INTO teacherMovement (idTeacher, idOption, idSchool, active) 
VALUES 
    (1, 1, 1, TRUE),
    (2, 1, 1, TRUE),
    (3, 1, 1, TRUE),
    (4, 1, 1, TRUE),
    (5, 1, 1, TRUE),
    (6, 1, 1, TRUE),
    (7, 1, 1, TRUE),
    (8, 1, 1, TRUE),
    (9, 1, 1, TRUE),
    (10, 1, 1, TRUE),
    (11, 1, 1, TRUE),
    (12, 1, 1, TRUE),
    (13, 1, 1, TRUE);


CREATE TABLE presence (
    idSchool int,
    idOption    int,
    idTeacher int,
    date date
);