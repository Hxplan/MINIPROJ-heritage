-- ============================================================================
-- Mini-Projet Héritage (PHP & C#) : Domaine Arme / Epee
-- Base de données MySQL - Modélisation de l'héritage par référence
-- ============================================================================

-- 1. Création et sélection de la base de données
CREATE DATABASE IF NOT EXISTS miniprojet_heritage DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE miniprojet_heritage;

-- Suppression des tables si elles existent déjà (attention à l'ordre à cause de la clé étrangère)
DROP TABLE IF EXISTS epee;
DROP TABLE IF EXISTS arme;

-- ============================================================================
-- 2. Création de la table mère : arme
-- ============================================================================
CREATE TABLE arme (
    id INT AUTO_INCREMENT NOT NULL,
    nom VARCHAR(50) NOT NULL,
    degatsBase INT NOT NULL,
    poids DOUBLE NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================================================================
-- 3. Création de la table fille : epee (hérite de arme)
-- Le champ `id` est à la fois Clé Primaire (PK) et Clé Étrangère (FK) vers `arme(id)`
-- ============================================================================
CREATE TABLE epee (
    id INT NOT NULL,
    longueurLame DOUBLE NOT NULL,
    tranchant INT NOT NULL,
    PRIMARY KEY (id),
    CONSTRAINT fk_epee_arme FOREIGN KEY (id) REFERENCES arme(id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================================================================
-- 4. Données de test (correspondant au scénario du projet)
-- ============================================================================
-- Insertion de l'arme générique : Gourdin (id = 1)
INSERT INTO arme (id, nom, degatsBase, poids) VALUES
(1, 'Gourdin', 15, 3.0);

-- Insertion de l'épée : Excalibur (id = 2)
INSERT INTO arme (id, nom, degatsBase, poids) VALUES
(2, 'Excalibur', 50, 2.5);
INSERT INTO epee (id, longueurLame, tranchant) VALUES
(2, 90.0, 25);

-- Insertion de l'épée : Katana (id = 3)
INSERT INTO arme (id, nom, degatsBase, poids) VALUES
(3, 'Katana', 40, 1.5);
INSERT INTO epee (id, longueurLame, tranchant) VALUES
(3, 75.0, 35);

-- ============================================================================
-- 5. Requête de vérification (Jointure pour afficher tout l'inventaire)
-- ============================================================================
-- SELECT 
--     a.id, 
--     a.nom, 
--     a.degatsBase, 
--     a.poids, 
--     e.longueurLame, 
--     e.tranchant 
-- FROM arme a
-- LEFT JOIN epee e ON a.id = e.id;

