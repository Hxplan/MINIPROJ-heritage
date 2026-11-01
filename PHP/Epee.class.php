<?php

require_once "Arme.class.php";

class Epee extends Arme
{
    #region Champs

    private float $_longueurLame;
    private int $_tranchant;

    #endregion

    #region Propriétés

    /**     get     **/
    public function __get(mixed $propriete)
    {
        switch ($propriete) {
            case "longueurLame":
                return $this->_longueurLame;
            case "tranchant":
                return $this->_tranchant;
            default:
                return parent::__get($propriete);
        }
    }

    /**     set     **/
    public function __set(mixed $propriete, mixed $value)
    {
        switch ($propriete) {
            case "longueurLame":
                $this->setLongueurLame($value);
                break;
            case "tranchant":
                $this->setTranchant($value);
                break;
            default:
                parent::__set($propriete, $value);
        }
    }

    #endregion

    #region Constructeur

    public function __construct(int $id, string $nom, int $degatsBase, float $poids, float $longueurLame, int $tranchant)
    {
        parent::__construct($id, $nom, $degatsBase, $poids);
        $this->setLongueurLame($longueurLame);
        $this->setTranchant($tranchant);
    }

    public function __destruct()
    {
    }

    #endregion

    #region Assesseurs (getteur/setteur)

    /**     get/set de longueurLame     **/
    public function getLongueurLame(): float
    {
        return $this->_longueurLame;
    }

    public function setLongueurLame(float $longueurLame): void
    {
        if ($longueurLame <= 0) {
            throw new Exception("La longueur de lame doit être positive.");
        }
        $this->_longueurLame = $longueurLame;
    }

    /**     get/set de tranchant     **/
    public function getTranchant(): int
    {
        return $this->_tranchant;
    }

    public function setTranchant(int $tranchant): void
    {
        if ($tranchant < 0) {
            throw new Exception("Le tranchant ne peut pas être négatif.");
        }
        $this->_tranchant = $tranchant;
    }

    #endregion

    #region Méthodes

    public function calculerPuissance(): float
    {
        return parent::calculerPuissance() + $this->_tranchant;
    }

    #endregion

    #region Méthodes redéfinies

    public function __toString(): string
    {
        return parent::__toString() . " | Épée (Lame: " . $this->_longueurLame . " cm, Tranchant: " . $this->_tranchant . ")";
    }

    public function toString(): string
    {
        return $this->__toString();
    }

    #endregion
}
?>