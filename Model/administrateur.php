<?php

    class Administrateur
    {
        public $email_admin;
        public $nom_admin;
        public $prenom_admin;
        public $num_tel_admin;
        public $password_admin;

        public function __construct($email_admin,$nom_admin,$prenom_admin,$num_tel_admin,$password_admin)
        {
            $this->email_admin = $email_admin;
            $this->nom_admin = $nom_admin;
            $this->prenom_admin = $prenom_admin;
            $this->num_tel_admin = $num_tel_admin;
            $this->password_admin = $password_admin;
        }

        public function getEmailAdmin(){
            return $this->email_admin;
        }

        public function getNomAdmin(){
            return $this->nom_admin;
        }

        public function getPrenomAdmin(){
            return $this->prenom_admin;
        }

        public function getNumTelAdmin(){
            return $this->num_tel_admin;
        }

        public function getPasswordAdmin(){
            return $this->password_admin;
        }
    }
?>