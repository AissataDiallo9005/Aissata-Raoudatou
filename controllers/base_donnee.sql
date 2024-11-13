CREATE DATABASE projet_php;

SHOW DATABASES;

use projet_php;

CREATE TABLE  Etudiants( 
matricule VARCHAR(50) PRIMARY KEY , nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) 
NOT NULL, sexe VARCHAR(1) NOT NULL,tel bigint(50),date_naiss DATE NOT NULL);

ALTER TABLE etudiants ADD COLUMN email VARCHAR(50) NOT NULL;

CREATE TABLE  enseignants( 
id INT PRIMARY KEY AUTO_INCREMENT , nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) 
NOT NULL, tel bigint(50) NOT NULL, email VARCHAR(50) NOT NULL, matiere VARCHAR(50) NOT NULL);

CREATE TABLE salles (idSalle INT PRIMARY KEY AUTO_INCREMENT, num INT NOT NULL, nbre INT NOT NULL);
 
CREATE TABLE cours (
    idCours INT PRIMARY KEY AUTO_INCREMENT,
    matricule VARCHAR(50) ,id INT,idSalle INT,
    FOREIGN KEY (matricule) REFERENCES etudiants(matricule),
    FOREIGN KEY (id) REFERENCES enseignants(id),
    FOREIGN KEY (idSalle) REFERENCES salles(idSalle));

CREATE TABLE utilisateurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    compte VARCHAR(50) UNIQUE NOT NULL,
    motpasse VARCHAR(255) NOT NULL
);

INSERT INTO utilisateurs (compte, motpasse)
VALUES ('root123@gmail.com', 'admin');  
