<?php

    class Message
    {
        public $type_eme;
        public $question;
        public $reponse;

        public function __construct($type_eme,$question,$reponse)
        {
            $this->type_eme;
            $this->question;
            $this->reponse;
        }

        public function getTypeEme(){
            return $this->type_eme;
        }

        public function getQuestion(){
            return $this->question;
        }

        public function getReponse(){
            return $this->reponse;
        }
    }
?>