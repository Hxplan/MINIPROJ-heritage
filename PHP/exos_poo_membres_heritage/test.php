<?php

require_once "membre.class.php";
require_once "MySqlConfig.class.php";
require_once "ModelePDO.class.php";
require_once "gestionBD.class.php";

#region Premier tests
// MES TESTS

// $monMembre = new Membre("g.Lagaffe", "passe", "Gaston", "LAGAFFE");
// $leMembre = new Membre("unlog", "unpasse");
// try      
// {
//     $leNom = $monMembre->rue;
//     echo $leNom . "<br>";
// }
// catch(Exception $ex)
// {
//     echo $ex->getMessage() . "<br><br>";
    
// }

// echo $monMembre . "<br>";

// $lePrenom = $monMembre->nom = "Dupont";
// $monMembre->nom = "hey";
// echo $monMembre;

// echo $monMembre . "<br>";
// echo $leMembre . "<br>";

// var_dump($monMembre);
// echo "il y a " . Membre::getNbMembres() . " membres <br>";

// //unset($leMembre);
// //echo "il y a " . Membre::getNbMembres() . " membres";

// $lesMembres = array();
// $lesMembres[] = $monMembre;
// $lesMembres[] = $leMembre;


// echo "<br>Les login des membres :<br>";
// foreach ($lesMembres as $unMembre){
//     echo "- " . $unMembre->login . "<br>";
// }

#endregion

#region test de collections
// TEST DE COLLECTIONS :

// $lesMembres = array();
// $lesMembres[] = new Membre("logToto","passToto","prenomToto","toto");
// $lesMembres[] = new Membre("logTata","passTata","prenomTata","tata");

// foreach ($lesMembres as $unMembre){
//     echo "- " . $unMembre->login . "<br>";
// }
#endregion

#region test BDD
// TEST BDD
// $lesMembresBD = GestionBD::getLesMembres();
// var_dump($lesMembresBD);

// $unMembreBD = GestionBD::getMembreById(1);
// var_dump($unMembreBD);

// $autreMembreBD = GestionBD::getMembreByLogin("lmartin");
// var_dump($autreMembreBD);

// $nbMembreBD = GestionBD::getNbMembres();
// echo "Nombre de membre de la base : " . $nbMembreBD;

//GestionBD::addMembre(3, "Dupont", "Jean", "jdupont", "passDupont");
//var_dump(GestionBD::getLesMembres());

//$monMembre = new Membre("g.Lagaffe", "passe", "Gaston", "LAGAFFE");

//GestionBD::addMembre($monMembre);
//var_dump(GestionBD::getLesMembres());

//GestionBD::setPasseMembrebyId(1, "1noauPass");
//var_dump(GestionBD::getLesMembres());

// GestionBD::addMembre(null,5, "TEST", "test", "tTest", "passTest");
//var_dump(GestionBD::getLesMembres());

//GestionBD::supprimerMembre(null, 5);
//var_dump(GestionBD::getLesMembres());
#endregion

#region TESTS HERITAGE

require_once 'Membre.class.php';
require_once 'Client.class.php';

//GestionBD::addClient(null, "Dupont", "Jean", "jdupont", "motdepasse123", "10 rue de la Paix", "75000", "Paris");
//GestionBD::addMembre(null,5, "TEST", "test", "tTest", "passTest");
//$testMembre = GestionBD::getMembreById(5);
//GestionBD::addClient($testMembre,null, null, null, null, "1 rue test", "34500", "Béziers");

var_dump(GestionBD::getLesMembres());
var_dump(GestionBD::getLesClients());


#endregion
?>