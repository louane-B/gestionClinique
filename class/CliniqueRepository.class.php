<?php
        // Importation des dépendances...
        require_once("Repository.class.php");
        require_once("cliniqueDTO.class.php");

        class CliniqueRepository extends Repository
        {
            private static $instance;
            
            private function __construct()
            {
                // Private constructor to prevent instantiation outside the class
            }
            
            public static function getInstance()
            {
                if (!isset(self::$instance)) 
                {
                    self::$instance = new self;
                }
                
                return self::$instance;
            }

            public function obtenirListeClinique()
            {
                try
                {
                    $pdo = new PDO($this->stringConnexion, $this->usager, $this->password);
                    $ins = $pdo->prepare("SELECT * FROM cliniques;");
                    $ins->setFetchMode(PDO::FETCH_ASSOC);
                    $ins->execute();
                    $tab = $ins->fetchAll();

                    $listeClinique = array();

                    for($i = 0; $i < count($tab); $i++)
                    {
                        array_push($listeClinique, new CliniqueDTO($tab[$i]["nom"], $tab[$i]["adresse"], $tab[$i]["ville"], $tab[$i]["province"], $tab[$i]["codePostal"], $tab[$i]["telephone"], $tab[$i]["courriel"]));
                    }
                }
                catch (PDOException $e){}

                return $listeClinique;
            }

            //Méthode permettant d'obtenir une clinique par son nom...
		    public function obtenirClinique($nomClinique)
		    {
			    $clinique = null;
			    try
			    {
				    $pdo = new PDO($this->stringConnexion,$this->usager,$this->password);
				    $ins = $pdo->prepare("SELECT * " . 
				                            "FROM cliniques " . 
									        "WHERE nom=?");
				    $ins->setFetchMode(PDO::FETCH_ASSOC);
				    $ins->execute(array($nomClinique));
				    $resultat = $ins->fetch();
				    $clinique = new CliniqueDTO($resultat["nom"], $resultat["adresse"], $resultat["ville"], $resultat["province"], $resultat["codePostal"], $resultat["telephone"], $resultat["courriel"]);
			    }	
			    catch(Exception $e){}

			    return $clinique;
			
		    }
            
            // fonction qui permet d'ajouter nouvelle clinique
            public function ajouterClinique($cliniqueDTO)
            {
                try
                {
                    $pdo = new PDO($this->stringConnexion, $this->usager, $this->password);
                    $ins = $pdo->prepare("INSERT INTO cliniques (nom, adresse, ville, province, codePostal, telephone, courriel)" .
                                            "VALUES (?, ?, ?, ?, ?, ?, ?)");
                    $ins->execute(array($cliniqueDTO->getNom(), $cliniqueDTO->getAdresse(), $cliniqueDTO->getVille(), $cliniqueDTO->getProvince(), $cliniqueDTO->getCodePostal(), $cliniqueDTO->getTelephone(), $cliniqueDTO->getCourriel()));
                } 
                catch (PDOException $e){
                    echo "Erreur SQL : " . $e->getMessage();
                    throw $e;
                }
            }

            //Méthode permettant de modifier une clinique avec un dto de type clinique...
		    public function modifierClinique($cliniqueDTO)
		    {
			    try
			    {
				    $pdo = new PDO($this->stringConnexion,$this->usager,$this->password);
				    $ins = $pdo->prepare("UPDATE cliniques " . 
				                            "SET adresse=?,ville=?,province=?,codePostal=?,telephone=?,courriel=? " . 
									        "WHERE nom=?");
				    $ins->execute(array($cliniqueDTO->getAdresse(),$cliniqueDTO->getVille(),$cliniqueDTO->getProvince(),$cliniqueDTO->getCodePostal(),$cliniqueDTO->getTelephone(),$cliniqueDTO->getCourriel(), $cliniqueDTO->getNom()));
			    }	
			    catch(Exception $e){
                    echo "Erreur SQL : " . $e->getMessage();
                    throw $e;
                }
		    }

            //Méthode permettant de supprimer une clinique par son nom...
		    public function supprimerClinique($nomClinique)
		    {
			    try
			    {
				    $pdo = new PDO($this->stringConnexion,$this->usager,$this->password);
				    $ins = $pdo->prepare("DELETE FROM cliniques " . 
				                                "WHERE nom=?");
				    $ins->execute(array($nomClinique));
			    }	
			    catch(Exception $e){}
		    }

            //Méthode permettant d'obtenir le id d'une clinique par son nom...
		    public function obtenirIdClinique($nomClinique)
		    {
                $pdo = new PDO($this->stringConnexion,$this->usager,$this->password);
			    $ins = $pdo->prepare("SELECT id FROM cliniques " . 
								        "WHERE nom=?");
				    $ins->setFetchMode(PDO::FETCH_ASSOC);
				    $ins->execute(array($nomClinique));
				    $resultat = $ins->fetch();
				    $idPatient = $resultat["id"];
				    return $idPatient;
		    }

        }
?>