CREATE DATABASE espace_etudiant;

USE espace_etudiant;

CREATE TABLE users(
    id INT AUTO_INCREMENT PRIMARY KEY,
    ecole INT,
    promotion INT,
    nom VARCHAR(255),
    mot_de_passe VARCHAR(100)
);

CREATE TABLE promotion(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom_promotion varchar(255)
);

CREATE TABLE ecole(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom_ecole varchar(255)

);