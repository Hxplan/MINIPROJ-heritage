<?php

require_once "Arme.class.php";
require_once "Epee.class.php";

$saut = (php_sapi_name() === 'cli') ? PHP_EOL : "<br>";

#region Étape 1 : Instanciation et Collection

// 1. Instanciation et Collection
$inventaire = [];

// Ajout d'une Arme valide : (1, "Gourdin", 15, 3.0)
$inventaire[] = new Arme(1, "Gourdin", 15, 3.0);

// Ajout de 2 Épées valides :
// (2, "Excalibur", 50, 2.5, 90.0, 25)
$inventaire[] = new Epee(2, "Excalibur", 50, 2.5, 90.0, 25);
// (3, "Katana", 40, 1.5, 75.0, 35)
$inventaire[] = new Epee(3, "Katana", 40, 1.5, 75.0, 35);

#endregion

#region Étape 2 : Boucle Polymorphe

// 2. Boucle Polymorphe
echo "=== 2. Boucle Polymorphe sur l'inventaire ===" . $saut . $saut;

foreach ($inventaire as $arme) {
    echo $arme . " -> Puissance calculée : " . $arme->calculerPuissance() . $saut;
}

echo $saut;

#endregion

#region Étape 3 : Test des Exceptions (Try / Catch)

// 3. Test des Exceptions (Try / Catch)
echo "=== 3. Test des Exceptions (Try / Catch) ===" . $saut;

try {
    // Tentative de création d'une épée invalide avec une lame négative : (4, "Épée brisée", 10, 1.0, -50.0, 5)
    $epeeInvalide = new Epee(4, "Épée brisée", 10, 1.0, -50.0, 5);
    echo "Succès : " . $epeeInvalide . $saut;
} catch (Exception $e) {
    echo "Exception capturée avec succès : " . $e->getMessage() . $saut;
}

#endregion
?>