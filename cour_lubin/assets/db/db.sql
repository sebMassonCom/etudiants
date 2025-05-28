CREATE DATABASE  agence;

use agence;

CREATE TABLE immobilier(
    id INT AUTO_INCREMENT PRIMARY KEY,
    surface INT,
    prix INT,
    localisation VARCHAR(255)
 );
