<?php
class ModelePDO
{
    //Attributs utiles pour la connexion
    protected static string $serveur = MySqlConfig::SERVEUR;
    protected static string $base = MySqlConfig::BASE;
    protected static string $utilisateur = MySqlConfig::UTILISATEUR;
    protected static string $passe = MySqlConfig::MOT_DE_PASSE;

    //Attributs utiles pour la manipulation PDO de la BD
    protected static mixed $pdoCnxBase = null;
    protected static mixed $pdoStResults = null;
    protected static string $requete = "";
    protected static mixed $resultat = null;

    protected static function seConnecter()
    {
        if (!isset(self::$pdoCnxBase)) { //S'il n'y a pas encore eu de connexion
            try {
                self::$pdoCnxBase = new PDO(
                    'mysql:host=' . self::$serveur . ';dbname=' . self::$base,
                    self::$utilisateur,
                    self::$passe
                );
                self::$pdoCnxBase->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$pdoCnxBase->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                self::$pdoCnxBase->query("SET CHARACTER SET utf8"); //méthode de la classe PDO
            } catch (Exception $e) {
                echo 'Erreur : ' . $e->getMessage() . '<br />'; // méthode de la classe Exception
                echo 'Code : ' . $e->getCode(); // méthode de la classe Exception
            }
        }
    }

    protected static function seDeconnecter()
    {
        self::$pdoCnxBase = null;
        // Si on n'appelle pas la méthode, la déconnexion a lieu en fin de script
    }

        protected static function select(string $champs, string $table, $conditions = null, array $parametres = []) // ajout d'un paramètre pour sécuriser getPremierTupleByChamp
    {
        self::seConnecter();
        self::$requete = "SELECT $champs FROM $table";

        if ($conditions != null) {
            self::$requete .= " WHERE $conditions ";
        }
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->execute($parametres);
        return self::$pdoStResults;
    }

    protected static function getLesTuples(mixed $table)
    {
        self::select("*", $table);
        self::$resultat = self::$pdoStResults->fetchAll(PDO::FETCH_OBJ);
        self::$pdoStResults->closeCursor();
        return self::$resultat;
    }

    protected static function getPremierTupleByChamp(string $table, string $nomChamp, string $valeurChamp)
    {
        self::select("*", $table, "$nomChamp = :valeur", [':valeur' => $valeurChamp]);
        self::$resultat = self::$pdoStResults->fetch(PDO::FETCH_OBJ);
        self::$pdoStResults->closeCursor();
        return self::$resultat; //un seul tuple retourné : utilisation de fetch()
    }

    protected static function supprimerTupleByChamp(string $table, string $nomChamp, string $valeurChamp)
    {
        self::seConnecter();
        self::$requete = "DELETE FROM " . $table . " WHERE " . $nomChamp . " = :valeurChamp";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->bindValue(':valeurChamp', $valeurChamp);
        self::$pdoStResults->execute();
        self::$pdoStResults->closeCursor();
    }

    protected static function modifierAttribut(string $table, int $id, string $nomChamp, string $valeurChamp)
    {
        self::seConnecter();
        self::$requete = "UPDATE " . $table . " SET " . $nomChamp . " = :valeurChamp WHERE  id = :id";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->bindValue(':valeurChamp', $valeurChamp);
        self::$pdoStResults->bindValue(':id', $id);
        self::$pdoStResults->execute();
        self::$pdoStResults->closeCursor();
    }
}
