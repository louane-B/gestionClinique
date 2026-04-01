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

            //Methode permettant d'ajouter un nouveau patient dans une clinique...
            public function ajouterPatient($patientDTO)
            {
                try
                {
                    $pdo = new PDO($this->stringConnexion, $this->usager, $this->password);
                    $ins = $pdo->prepare("INSERT INTO patients (noDossier, noAssuranceMaladie, nom, prenom, adresse, ville, province, codePostal, telephone, courriel, idClinique)" .
                                            "VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                    $ins->execute(array($patientDTO->getnoDossier(), $patientDTO->getnoAssuranceMaladie(), $patientDTO->getnom(), $patientDTO->getPrenom(), $patientDTO->getadresse(), $patientDTO->getville(), $patientDTO->getProvince(), $patientDTO->getCodePostal(), $patientDTO->getTelephone(), $patientDTO->getCourriel(), $patientDTO->getIdClinique() ));
                }
                catch (PDOException $e){
                    echo "Erreur SQL : " . $e->getMessage();
                    throw $e;
                }
            }

            //Méthode permettant de supprimer une clinique par son nom...
		    public function supprimerPatient($nomPatien, $prenomPatient)
		    {
			    try
			    {
				    $pdo = new PDO($this->stringConnexion,$this->usager,$this->password);
				    $ins = $pdo->prepare("DELETE FROM patients " . 
				                                "WHERE nom=? AND prenom=?");
				    $ins->execute(array($nomPatien, $prenomPatient));
			    }	
			    catch(Exception $e){}
		    }

            //Méthode permettant de modifier le Dossier d'un patient avec un dto de type patients...
		    public function modifierPatient($patientDTO)
		    {
			    try
			    {
				    $pdo = new PDO($this->stringConnexion,$this->usager,$this->password);
				    $ins = $pdo->prepare("UPDATE patients " . 
				                            "SET noAssuranceMaladie=?,nom=?,prenom=?,adresse=?,ville=?,province=?,codePostal=?,telephone=?,courriel=?,idClinique=? " . 
									        "WHERE noDossier=?");
				    $ins->execute(array($patientDTO->getnoAssuranceMaladie(),$patientDTO->getNom(),$patientDTO->getPrenom(),$patientDTO->getAdresse(),$patientDTO->getVille(),$patientDTO->getprovince(), $patientDTO->getCodePostal(), $patientDTO->getTelephone(), $patientDTO->getCourriel(), $patientDTO->getIdClinique(), $patientDTO->getNoDossier()));
			    }	
			    catch(Exception $e){
                    echo "Erreur SQL : " . $e->getMessage();
                }
		    }

            //Méthode permettant d'obtenir une clinique par son nom...
		    public function obtenirPatient($noDossier)
		    {
			    $patient = null;
			    try
			    {
				    $pdo = new PDO($this->stringConnexion,$this->usager,$this->password);
				    $ins = $pdo->prepare("SELECT * " . 
				                            "FROM patients " . 
									        "WHERE noDossier=?");
				    $ins->setFetchMode(PDO::FETCH_ASSOC);
				    $ins->execute(array($noDossier));
				    $resultat = $ins->fetch();
				    $patient = new PatientDTO($resultat["noDossier"], $resultat["noAssuranceMaladie"], $resultat["nom"], $resultat["prenom"], $resultat["adresse"], $resultat["ville"], $resultat["province"], $resultat["codePostal"], $resultat["telephone"], $resultat["courriel"], $resultat["idClinique"]);
			    }	
			    catch(Exception $e){}

			    return $patient;
			
		    }
        }


?>