<?php
class GestionBD extends ModelePDO
{
    #region Champs statiques



    #endregion

    #region Propriétés

    /**     get     **/
    // public function __get(mixed $propriete){
    //     switch ($propriete){
    //         case "pdoCnxBase" : return $this->pdoCnxBase;
    //         break;
    //         case "pdoStResults" : return $this->pdoStResults;
    //         break;
    //         default: throw new Exception("propriété '$propriete' inconnue");
    //     }
    // }

    // /**     set     **/
    // public function __set(mixed $propriete, mixed $value){
    //     switch ($propriete){
    //         case "pdoCnxBase" : $this->_nom = $value;
    //         break;
    //         case "pdoStResults" : $this->_nom = $value;
    //         break;
    //         default: throw new Exception("propriété '$propriete' inconnue");
    //     }
    // }

    #endregion

    #region Constructeur



    #endregion

    #region Méthodes

    //fonctions Membres

    //get
    public static function getLesMembres()
    {
        return self::getLesTuples('membre');
    }

    public static function getMembreById(int $id)
    {
        return self::getPremierTupleByChamp("membre", "id", $id);
    }

    public static function getMembreByLogin(string $login)
    {
        return self::getPremierTupleByChamp("membre", "login", $login);
    }

    //set
    public static function setPasseMembrebyId(int $id, mixed $nouveauPasse)
    {
        self::modifierAttribut("membre", $id, "passe", $nouveauPasse);
    }

    //supprimer
    public static function supprimerMembreById(int $id)
    {
        self::supprimerTupleByChamp("membre", "id", $id);
    }

    public static function supprimerMembreByLogin(string $login)
    {
        self::supprimerTupleByChamp("membre", "login", $login);
    }

    //get nombre
    public static function getNbMembres()
    {
        self::seConnecter();

        self::$requete = "SELECT Count(*) as nbMembre";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetch();

        self::$pdoStResults->closeCursor();

        return self::$resultat->nbMembre;
    }

    //ajouter
    public static function addMembre($leMembre = null, $id = null, $nom = null, $prenom = null, $login = null, $passe = null)
    {
        self::seConnecter();

        if ($leMembre != null) {
            $req = self::$pdoCnxBase->query("SELECT MAX(id) FROM membre");
            $idMembre = $req->fetchColumn() + 1;
        }

        self::$requete = "INSERT INTO membre (id, nom, prenom, login, passe) VALUES (:id, :nom, :prenom, :login, :passe);";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);

        if ($leMembre != null) {
            self::$pdoStResults->bindValue('id', $idMembre);
            self::$pdoStResults->bindValue('nom', $leMembre->nom);
            self::$pdoStResults->bindValue('prenom', $leMembre->prenom);
            self::$pdoStResults->bindValue('login', $leMembre->login);
            self::$pdoStResults->bindValue('passe', $leMembre->passe);
        } else {
            self::$pdoStResults->bindValue('id', $id);
            self::$pdoStResults->bindValue('nom', $nom);
            self::$pdoStResults->bindValue('prenom', $prenom);
            self::$pdoStResults->bindValue('login', $login);
            self::$pdoStResults->bindValue('passe', $passe);
        }

        self::$pdoStResults->execute();
        self::$pdoStResults->closeCursor();
    }

    //fonctions Clients

    //get
    public static function getLesClients()
    {
        return self::getLesTuples('client');
    }

    public static function getClientById(int $id)
    {
        return self::getPremierTupleByChamp("client", "id", $id);
    }

    public static function getClientByLogin(string $login)
    {
        return self::getPremierTupleByChamp("client", "login", $login);
    }

    public static function getClientByVille(string $ville)
    {
        return self::getPremierTupleByChamp("client", "login", $ville);
    }

    public static function getClientByCP(string $CP)
    {
        return self::getPremierTupleByChamp("client", "login", $CP);
    }

    //set
    public static function setPasseClientbyId(int $id, mixed $nouveauPasse)
    {
        self::modifierAttribut("client", $id, "passe", $nouveauPasse);
    }

    //supprimer
    public static function supprimerClientById(int $id)
    {
        self::supprimerTupleByChamp("client", "idMembre", $id);
    }

    //get nombre
    public static function getNbClients()
    {
        self::seConnecter();

        self::$requete = "SELECT Count(*) as nbclient";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetch();

        self::$pdoStResults->closeCursor();

        return self::$resultat->nbclient;
    }

    //ajouter
    public static function addClient($leMembre = null, $nom = null, $prenom = null, $login = null, $passe = null, $rue = null, $codePostal = null, $ville = null)
    {
        self::seConnecter();

        if ($leMembre == null) {
            self::addMembre(null, null, $nom, $prenom, $login, $passe);
            $nouveauMembre = self::getMembreByLogin($login);
            $idClient = $nouveauMembre->id;
        } 
        else{
            $monMembre = self::getPremierTupleByChamp("membre", "login", $leMembre->login);
            $idClient = $monMembre->id;
        }

        self::$requete = "INSERT INTO client (idMembre, rue, codePostal, ville) VALUES (:id, :rue, :codePostal, :ville);";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);

        self::$pdoStResults->bindValue(':id', $idClient);
        self::$pdoStResults->bindValue(':rue', $rue);
        self::$pdoStResults->bindValue(':codePostal', $codePostal);
        self::$pdoStResults->bindValue(':ville', $ville);

        self::$pdoStResults->execute();
        self::$pdoStResults->closeCursor();
    }
    #endregion

    #region Méthodes redéfinies



    #endregion
}
