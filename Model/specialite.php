<?php

    class Specialite
    {
        public $nom_spec;
        public $valide_spec;

        public function __construct($nom_spec,$valide_spec)
        {
            $this->nom_spec = $nom_spec;
            $this->valide_spec = $valide_spec;
        }

        public function getNomSpec(){
            return $this->nom_spec;
        }

        public function getValideSpec(){
            return $this->valide_spec;
        }
    }
?>