<?php
class Membre{
    #region Champs
    private $_nom = "inconnu";
    private $_prenom = "inconnu";
    private $_login = "inconnu";
    private $_passe = "inconnu";
    private static $nbMembres = 0;

    #endregion

    #region Propriétés

    /**     get     **/
    public function __get(mixed $propriete){
        switch ($propriete){
            case "nom" : return $this->_nom;
            break;
            case "prenom" : return $this->_prenom;
            break;
            case "login" : return $this->_login;
            break;
            case "passe" : return $this->_passe;
            break;
            default: throw new Exception("propriété '$propriete' inconnue");
        }
    }

    /**     set     **/
    public function __set(mixed $propriete, mixed $value){
        switch ($propriete){

            case "nom" : $this->_nom = $value;
            break;
            case "prenom" : $this->_prenom = $value;
            break;
            case "login" : $this->_login = $value;
            break;
            case "passe" : $this->_passe = $value;
            break;
            default: throw new Exception("propriété '$propriete' inconnue");
        }
    }

    #endregion

    #region Constructeur

    public function __construct(string $login, string $passe, $prenom=null, $nom=null){
    $this->login = $login;
    $this->passe = $passe;
    
    if ($prenom != null)
        $this->prenom = $prenom;
    if ($nom != null)
        $this->nom = $nom;

    self::$nbMembres++;

    }

    public function __destruct(){
        self::$nbMembres--;
    }

    #endregion

    // #region Assesseurs (getteur/setteur)

    // /**     get/set de nom     **/

    // public function getNom(){
    //     return $this->_nom;
    // }

    // public function setNom(mixed $nom){
    //     $this->_nom = $nom;
    // }

    // /**     get/set de prenom     **/
    // public function getPrenom(){
    //     return $this->_prenom;
    // }

    // public function setPrenom(mixed $prenom){
    //     $this->_prenom = $prenom;
    // }

    // /**     get/set de login     **/
    // public function getLogin(){
    //     return $this->_login;
    // }

    // public function setLogin(mixed $login){
    //     $this->_login = $login;
    // }

    // #endregion


    #region Méthodes

    public static function getNbMembres(){
        return self::$nbMembres;
    }

    #endregion

    #region Méthodes redéfinies

    public function __tostring() {
    return $this->prenom . " " . $this->nom;
    }

    #endregion
}
