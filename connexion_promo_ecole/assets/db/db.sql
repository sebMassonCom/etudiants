CREATE DATABASE espace_etudiant;

USE espace_etudiant;


CREATE  TABLE categorie(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom_categorie varchar(255)
);

CREATE TABLE Fichier_rendu (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_promotion INT,
    nom_fichier VARCHAR(255) NOT NULL,
    taille INT,
    date_rendu DATETIME,
    id_categorie INT,
    FOREIGN KEY (id_promotion) REFERENCES promotion(id),
    FOREIGN KEY (id_categorie) REFERENCES categorie(id)
);

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