<?php

        class cliniqueDTO
        {
            private string $nom;
            private string $adresse;
            private string $ville;
            private string $province;
            private string $codePostal;
            private string $telephone;
            private string $courriel;

            public function __construct($nom = "", $adresse = "", $ville = "", $province = "", $codePostal = "", $telephone = "", $courriel = "")
            {
                $this->nom = $nom;
                $this->adresse = $adresse;
                $this->ville = $ville;
                $this->province = $province;
                $this->codePostal = $codePostal;
                $this->telephone = $telephone;
                $this->courriel = $courriel;
            }

            public function __toString()
            {
                return $this->nom . "|" . $this->adresse . "|" . $this->ville . "|" . $this->province . "|" . $this->codePostal . "|" . $this->telephone . "|" . $this->courriel;
            }


            public function getNom(): string
            {
                return $this->nom;
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
        }

?>