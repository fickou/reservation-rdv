<?php

    class calendrier
    {
        public $jour_d;
        public $jour_f;
        public $heure_d;
        public $heure_f;
        public $temps_c;

        public function __construct($jour_d,$jour_f,$heure_d,$heure_f,$temps_c){
            $this->jour_d = $jour_d;
            $this->jour_f = $jour_f;
            $this->heure_d = $heure_d;
            $this->heure_f = $heure_f;
            $this->temps_c = $temps_c;
        }

        public function getJourd(){
            return $this->jour_d;
        }

        public function getJourf(){
            return $this->jour_f;
        }

        public function getHeured(){
            return $this->heure_d;
        }

        public function getHeuref(){
            return $this->heure_f;
        }

        public function getTempsc(){
            return $this->temps_c;
        }
    }
?>