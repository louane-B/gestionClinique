<?php
    session_start();

    //Importation de l'en-tête...
    require_once(__DIR__ . "/../partials/header.php");
    //Importation des dependences...
    require_once(__DIR__ . "/../class/PatientRepository.class.php");
?>
<?php
    //si la variable action ne contient pas de valeur...
    if(!isset($_GET["action"]))
        //On l'initialise a l'action par défault...
        $_GET["action"] = "afficherListePatient";
    //selon l'action...
    switch ($_GET["action"])
    {
        case "afficherListePatient":
            //Préparation de la liste des patients pour la vue...
            $listePatient= PatientRepository::getInstance()->obtenirListePatient();
            //Importation de la vue...
            require_once(__DIR__ . "/../views/afficherListePatient.php");
            break;
    }
?>
<?php
    //Importation du pied de page...
    include(__DIR__ . "/../partials/footer.php");
?>