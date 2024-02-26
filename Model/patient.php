<?php

    class Patient
    {
        public $email_pat;
        public $password_pat;
        public $nom_pat;
        public $prenom_pat;
        public $date_nais_pat;
        public $num_tel_pat;
        public $sexe_pat;

        public function __construct($email_pat,$password_pat,$nom_pat,$prenom_pat,$date_nais_pat,$num_tel_pat,$sexe_pat)
        {
            $this->email_pat = $email_pat;
            $this->password_pat = $password_pat;
            $this->nom_pat = $nom_pat;
            $this->prenom_pat = $prenom_pat;
            $this->date_nais_pat = $date_nais_pat;
            $this->num_tel_pat = $num_tel_pat;
            $this->sexe_pat = $sexe_pat;
        }

        public function getEmailPat(){
            return $this->email_pat;
        }

        public function getPasswordPat(){
            return $this->password_pat;
        }

        public function getNomPat(){
            return $this->nom_pat;
        }

        public function getPrenomPat(){
            return $this->prenom_pat;
        }

        public function getDateNaisPat(){
            return $this->date_nais_pat;
        }

        public function getNumTelPat(){
            return $this->num_tel_pat;
        }

        public function getSexePat(){
            return $this->sexe_pat;
        }
    }
?>