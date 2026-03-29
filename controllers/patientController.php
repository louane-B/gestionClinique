<?php
    session_start();

    //Importation de l'en-tête...
    require_once(__DIR__ . "/../partials/header.php");
    //Importation des dependences...
    require_once(__DIR__ . "/../class/PatientRepository.class.php");
    require_once(__DIR__ . "/../class/CliniqueRepository.class.php");
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
            //Charger la liste des cliniques..
            $listeClinique = CliniqueRepository::getInstance()->obtenirListeClinique();

            //Aucun nom sélectionner...
            $nomClinique = "";
            
            //Préparation de la liste des patients pour la vue...
            $listePatient= PatientRepository::getInstance()->obtenirListePatient();
            //Importation de la vue...
            require_once(__DIR__ . "/../views/afficherListePatient.php");
            break;

        case "afficherListePatientsParClinique":
            //Charger la liste des clinique pour la liste déroulante...
            $listeClinique = CliniqueRepository::getInstance()->obtenirListeClinique();
            //Nom de la clinique qui a été sélectionner...
            $nomClinique = isset($_GET["nomClinique"]) ? $_GET["nomClinique"] : "";

            if($nomClinique != ""){
                //Trouver l'Id de la clinique...
                $idClinique = CliniqueRepository::getInstance()->obtenirIdClinique($nomClinique);

                //Afficher les patients de cette clinique
                $listePatient = PatientRepository::getInstance()->obtenirPatientsParClinique($idClinique);
            } else {
                $listePatient = [];
            }

            //Importation de la vue...
            require_once(__DIR__ . "/../views/afficherListePatient.php");
            break;
    }
?>
<?php
    //Importation du pied de page...
    include(__DIR__ . "/../partials/footer.php");
?>