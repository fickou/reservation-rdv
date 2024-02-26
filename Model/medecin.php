<?php

    class Medecin
    {
        public $email_med;
        public $password_med;
        public $nom_med;
        public $prenom_med;
        public $date_nais_med;
        public $num_tel_med;
        public $sexe_med;
        public $adresse_med;
        public $latitude;
        public $longitude;
        public $photo;
        public $id_spec;

        public function __construct($email_med, $password_med, $nom_med, $prenom_med,
                                    $date_nais_med, $num_tel_med, $sexe_med, $adresse_med,
                                    $latitude, $longitude,$photo,$id_spec)
        {
            $this->email_med = $email_med;
            $this->password_med = $password_med;
            $this->nom_med = $nom_med;
            $this->prenom_med = $prenom_med;
            $this->date_nais_med = $date_nais_med;
            $this->num_tel_med = $num_tel_med;
            $this->sexe_med = $sexe_med;
            $this->adresse_med = $adresse_med; 
            $this->latitude = $latitude;
            $this->longitude = $longitude;
            $this->photo = $photo;
            $this->id_spec = $id_spec;
        }


        public function getEmailmed(){
            return $this->email_med;
        }

        public function getPasswordmed(){
            return $this->password_med;
        }

        public function getNommed(){
            return $this->nom_med;
        }

        public function getPrenommed(){
            return $this->prenom_med;
        }

        public function getDateNaismed(){
            return $this->date_nais_med;
        }

        public function getNumTelmed(){
            return $this->num_tel_med;
        }

        public function getSexemed(){
            return $this->sexe_med;
        }

        public function getAdressemed(){
            return $this->adresse_med;
        }

        public function getLatitude(){
            return $this->latitude;
        }

        public function getLongitude(){
            return $this->longitude;
        }

        public function getValidemed(){
            return $this->valide_med;
        }

        public function getPhoto(){
            return $this->photo;
        }
    }
?>