CREATE TABLE Client (
    idMembre INT,
    rue VARCHAR(150),
    codePostal VARCHAR(5),
    ville VARCHAR(100),
    PRIMARY KEY (idMembre),
    FOREIGN KEY (idMembre) REFERENCES Membre(idMembre)
);