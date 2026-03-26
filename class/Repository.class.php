<?php

        class Repository
        {
            protected string $stringConnexion="mysql:host=localhost;dbname=gestionclinique";
            protected string $usager = "root";
            protected string $password = "";

            public function __toString()
            {
                return $this->stringConnexion . "|" . $this->usager . "|" . $this->password;
            }
        }
?>