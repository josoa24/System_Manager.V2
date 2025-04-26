-- This script will be used during imports in Console

CREATE TABLE photos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50),
    created_at DATETIME DEFAULT NOW()
);

CREATE TABLE admins (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_school INT,
    email VARCHAR(50) UNIQUE,
    password VARCHAR(100),
    created_at DATETIME DEFAULT NOW()
);

CREATE TABLE schools (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50),
    created_at DATETIME DEFAULT NOW()
);

CREATE TABLE branchs (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_school INT,
    name VARCHAR(50),
    created_at DATETIME DEFAULT NOW()
);

CREATE TABLE sessions (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_school INT,
    id_branch INT,
    name VARCHAR(50),
    rentree DATE,
    created_at DATETIME DEFAULT NOW()
);

CREATE TABLE levels (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_school INT,
    id_branch INT,
    id_session INT,
    name VARCHAR(50),
    created_at DATETIME DEFAULT NOW()
);

CREATE TABLE students (
    id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(50),
    name VARCHAR(50),
    gender CHAR(1),
    address VARCHAR(50),
    phone VARCHAR(15),
    id_photo INT,
    created_at DATETIME DEFAULT NOW()
);

CREATE TABLE tranches (
    id INT PRIMARY KEY AUTO_INCREMENT,
    times INT DEFAULT 1,
    created_at DATETIME DEFAULT NOW()
);

CREATE TABLE inscriptions (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_student INT,
    id_school INT,
    id_level INT,
    id_admin INT,
    id_session INT,
    id_branch INT,
    id_tranche INT,
    -- Firy no tokony aloha
    montant DOUBLE,
    created_at DATETIME DEFAULT NOW()
);

CREATE TABLE inscription_payments (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_inscription INT,
    created_at DATETIME DEFAULT NOW()
);

CREATE TABLE inscriptions_droits (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_inscription INT,
    created_at DATETIME DEFAULT NOW()
);

CREATE TABLE droits (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50),
    montant DOUBLE,
    created_at DATETIME DEFAULT NOW()
);

