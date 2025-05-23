CREATE DATABASE espace_etudiant;

USE espace_etudiant;

CREATE TABLE users(
    id INT AUTO_INCREMENT PRIMARY KEY,
    ecole VARCHAR(50),
    mot_de_passe VARCHAR(100)
);

CREATE TABLE promotions(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255),
    ecole VARCHAR(50),
    mot_de_passe VARCHAR(100)
);