
-- 1. Création et de la base de données
CREATE DATABASE IF NOT EXISTS miniprojet_heritage DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE miniprojet_heritage;

-- Suppression des tables si elles existent déjà
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
-- ============================================================================
CREATE TABLE epee (
    id INT NOT NULL,
    longueurLame DOUBLE NOT NULL,
    tranchant INT NOT NULL,
    PRIMARY KEY (id),
    CONSTRAINT fk_epee_arme FOREIGN KEY (id) REFERENCES arme(id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
