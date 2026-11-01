<?php 
class Client extends Membre{
        #region Champs
    private $_rue = "inconnu";
    private $_codePostal = "inconnu";
    private $_ville = "inconnu";

    #endregion

    #region Propriétés

    /**     get     **/
    public function __get(mixed $propriete){
        switch ($propriete){
            case "rue" : return $this->_rue;
            break;
            case "_codePostal" : return $this->_codePostal;
            break;
            case "ville" : return $this->_ville;
            break;
            default : return parent::__get($propriete);
        }
    }

    /**     set     **/
    public function __set(mixed $propriete, mixed $value){
        switch ($propriete){

            case "rue" : $this->_rue = $value;
            break;
            case "codePostal" : $this->_codePostal = $value;
            break;
            case "ville" : $this->_ville = $value;
            break;
            default : parent::__set($propriete, $value);
        }
    }

    #endregion

    #region Constructeur

    public function __construct(string $login, string $passe, $prenom=null, $nom=null, $rue=null, $codePostal=null, $ville=null){

    parent::__construct($login, $passe, $prenom, $nom);
    
    if ($rue != null)
        $this->rue = $rue;
    if ($codePostal != null)
        $this->codePostal = $codePostal;
    if ($ville != null)
        $this->ville = $ville;
    }

    public function __destruct(){
    }

    #endregion

    #region Méthodes

    // public static function getNbMembres(){
    //     return self::$nbMembres;
    // }

    #endregion

    #region Méthodes redéfinies

    public function __tostring() {
        return parent::__tostring() . " - " . strtoupper($this->ville);
    }

    #endregion



}
?>