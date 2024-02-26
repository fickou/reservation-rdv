<?php

    class Rdv
    {
        public $heure_rdv;

        public function __construct($heure_rdv)
        {
            $this->heure_rdv = $heure_rdv;
        }

        public function getHeureRdv(){
            return $this->heure_rdv;
        }
    }
?>