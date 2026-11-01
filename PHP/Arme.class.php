<?php

class Arme
{
    #region Champs

    private int $_id;
    private string $_nom;
    private int $_degatsBase;
    private float $_poids;

    #endregion

    #region Propriétés

    /**     get     **/
    public function __get(mixed $propriete)
    {
        switch ($propriete) {
            case "id":
                return $this->_id;
            case "nom":
                return $this->_nom;
            case "degatsBase":
                return $this->_degatsBase;
            case "poids":
                return $this->_poids;
            default:
                throw new Exception("propriété '$propriete' inconnue");
        }
    }

    /**     set     **/
    public function __set(mixed $propriete, mixed $value)
    {
        switch ($propriete) {
            case "id":
                $this->setId($value);
                break;
            case "nom":
                $this->setNom($value);
                break;
            case "degatsBase":
                $this->setDegatsBase($value);
                break;
            case "poids":
                $this->setPoids($value);
                break;
            default:
                throw new Exception("propriété '$propriete' inconnue");
        }
    }

    #endregion

    #region Constructeur

    public function __construct(int $id, string $nom, int $degatsBase, float $poids)
    {
        $this->setId($id);
        $this->setNom($nom);
        $this->setDegatsBase($degatsBase);
        $this->setPoids($poids);
    }

    public function __destruct()
    {
    }

    #endregion

    #region Assesseurs (getteur/setteur)

    /**     get/set de id     **/
    public function getId(): int
    {
        return $this->_id;
    }

    public function setId(int $id): void
    {
        $this->_id = $id;
    }

    /**     get/set de nom     **/
    public function getNom(): string
    {
        return $this->_nom;
    }

    public function setNom(string $nom): void
    {
        $this->_nom = $nom;
    }

    /**     get/set de degatsBase     **/
    public function getDegatsBase(): int
    {
        return $this->_degatsBase;
    }

    public function setDegatsBase(int $degatsBase): void
    {
        if ($degatsBase <= 0) {
            throw new Exception("Les dégâts doivent être positifs.");
        }
        $this->_degatsBase = $degatsBase;
    }

    /**     get/set de poids     **/
    public function getPoids(): float
    {
        return $this->_poids;
    }

    public function setPoids(float $poids): void
    {
        if ($poids <= 0) {
            throw new Exception("Le poids doit être positif.");
        }
        $this->_poids = $poids;
    }

    #endregion

    #region Méthodes

    public function calculerPuissance(): float
    {
        return $this->_degatsBase / $this->_poids;
    }

    #endregion

    #region Méthodes redéfinies

    public function __toString(): string
    {
        return "[" . $this->_id . "] " . $this->_nom . " - Dégâts: " . $this->_degatsBase . ", Poids: " . $this->_poids . " kg";
    }

    public function toString(): string
    {
        return $this->__toString();
    }

    #endregion
}
?>