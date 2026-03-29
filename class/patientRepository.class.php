<?php
        // dependences Importer...
        require_once("Repository.class.php");
        require_once("patientDTO.class.php");

        class patientRepository extends Repository
        {
            private static $instance;

            private function __construct()
            {
                //Constructeur en privé pour éviter que des objet de la classe soit créer a l'extérieur
            }

            public static function getInstance()
            {
                if (!isset(self::$instance))
                {
                    self::$instance = new self;
                }

                return self::$instance;
            }

            public function obtenirListePatient()
            {
                try
                {
                    $pdo = new PDO($this->stringConnexion, $this->usager, $this->password);
                    $ins = $pdo->prepare("SELECT * FROM patients ORDER BY nom;");
                    $ins->setFetchMode(PDO::FETCH_ASSOC);
                    $ins->execute();
                    $tab = $ins->fetchAll();

                    $listePatient = array();

                    for($i = 0; $i < count($tab); $i++)
                    {
                        array_push($listePatient, new PatientDTO($tab[$i]["noDossier"], $tab[$i]["noAssuranceMaladie"], $tab[$i]["nom"], $tab[$i]["prenom"], $tab[$i]["adresse"], $tab[$i]["ville"], $tab[$i]["province"], $tab[$i]["codePostal"], $tab[$i]["telephone"], $tab[$i]["courriel"]));
                    }
                }
                catch (PDOException $e){}

                return $listePatient;
            }

            public function obtenirPatientsParClinique(int $idClinique)
            {
                try
                {
                    $pdo = new PDO($this->stringConnexion, $this->usager, $this->password);
                    $stmt = $pdo->prepare("SELECT * FROM patients WHERE idClinique = ? ORDER BY nom;");
                    $stmt->execute([$idClinique]);

                    $listePatientParClinique = [];
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
                    {
                        $listePatientParClinique[] = new PatientDTO(
                            $row["noDossier"],
                            $row["noAssuranceMaladie"],
                            $row["nom"],
                            $row["prenom"],
                            $row["adresse"],
                            $row["ville"],
                            $row["province"],
                            $row["codePostal"],
                            $row["telephone"],
                            $row["courriel"]
                        );
                    }
                    return $listePatientParClinique;
                } 
                catch (PDOException $e){}
            }
        }


?>