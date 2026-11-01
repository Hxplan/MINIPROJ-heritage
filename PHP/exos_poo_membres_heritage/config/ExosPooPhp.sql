CREATE DATABASE ExosPooPhp;
USE ExosPooPhp;

CREATE TABLE Membre (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    login VARCHAR(30) NOT NULL UNIQUE,
    passe VARCHAR(255) NOT NULL
);

-- Étape c : enregistrements de test
INSERT INTO Membre (nom, prenom, login, passe) VALUES
('Dupont', 'Alice', 'adupont', 'passeDupont'),
('Martin', 'Lucas', 'lmartin', 'passeMartin');