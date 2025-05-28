CREATE DATABASE espace_etudiant;

USE espace_etudiant;

CREATE TABLE users(
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_ecole INT,
    id_promotion INT,
    nom VARCHAR(255),
    mot_de_passe VARCHAR(100),
    FOREIGN KEY (id_ecole) REFERENCES ecole(id),
    FOREIGN KEY (id_promotion) REFERENCES promotion(id)
    
);

CREATE TABLE admin(
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_ecole INT,
    id_promotion INT,
    nom VARCHAR(255),
    mot_de_passe VARCHAR(100),
    FOREIGN KEY (id_ecole) REFERENCES ecole(id),
    FOREIGN KEY (id_promotion) REFERENCES promotion(id)
    
);

CREATE TABLE promotion(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom_promotion varchar(255)
);

CREATE TABLE ecole(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom_ecole varchar(255)

);