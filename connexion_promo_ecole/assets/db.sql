CREATE DATABASE espace_etudiant;

USE espace_etudiant;

CREATE TABLE promotion(
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_ecole INT,
    nom_promotion VARCHAR(255),
    mot_de_passe VARCHAR(100),
    FOREIGN KEY (id_ecole) REFERENCES ecole(id)
  
);

CREATE TABLE ecole(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom_ecole varchar(255)

);