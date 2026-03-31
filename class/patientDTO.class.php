<?php

        class patientDTO
        {
            private int $noDossier;
            private int $noAssuranceMaladie;
            private string $nom;
            private string $prenom;
            private string $adresse;
            private string $ville;
            private string $province;
            private string $codePostal;
            private string $telephone;
            private string $courriel;
            private int $idClinique;

            public function __construct($noDossier = "", $noAssuranceMaladie = "", $nom = "", $prenom = "", $adresse = "", $ville = "", $province = "", $codePostal = "", $telephone = "", $courriel = "", $idClinique = 0)
            {
                $this->noDossier = $noDossier;
                $this->noAssuranceMaladie = $noAssuranceMaladie;
                $this->nom = $nom;
                $this->prenom = $prenom;
                $this->adresse = $adresse;
                $this->ville = $ville;
                $this->province = $province;
                $this->codePostal = $codePostal;
                $this->telephone = $telephone;
                $this->courriel = $courriel;
                $this->idClinique = $idClinique;
            }

            public function __toString()
            {
                return $this->noDossier . "|" . $this->noAssuranceMaladie . "|" . $this->nom . "|" . $this->nom . "|" . $this->prenom . "|" . $this->adresse . "|" . $this->ville . "|" . $this->province . "|" . $this->codePostal . "|" . $this->telephone . "|" . $this->courriel;
            }

            public function getNoDossier(): int
            {
                return $this->noDossier;
            }

            public function getNoAssuranceMaladie(): int
            {
                return $this->noAssuranceMaladie;
            }

            public function getNom(): string
            {
                return $this->nom;
            }

            public function getPrenom(): string
            {
                return $this->prenom;
            }

            public function getAdresse(): string
            {
                return $this->adresse;
            }

            public function getVille(): string
            {
                return $this->ville;
            }

            public function getProvince(): string
            {
                return $this->province;
            }

            public function getCodePostal(): string
            {
                return $this->codePostal;
            }

            public function getTelephone(): string
            {
                return $this->telephone;
            }

            public function getCourriel(): string
            {
                return $this->courriel;
            }

            public function getIdClinique(): int
            {
                return $this->idClinique;
            }
        }
?>