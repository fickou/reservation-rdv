<?php
require_once('../Model/model.php');

class Controller
{
    public $model;

    //constructeur
    public function __construct()
    {
        $this->model = new Model();
    }
    
    //liste des patients
    public function invokePatient()
    {
        /*$this->model->creationTable();*/
        $patients = $this->model->getPatientList();
        include '../View/viewPatientList.php';
    }

    //insertion d'un patient
    public function invokeInsertPatient()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // récupérer les valeurs des champs du formulaire
            $email_pat = $_POST['email_pat'];
            $password_pat = $_POST['password_pat'];
            $nom_pat = $_POST['nom_pat'];
            $prenom_pat = $_POST['prenom_pat'];
            $date_nais_pat = $_POST['date_nais_pat'];
            $num_tel_pat = $_POST['num_tel_pat'];
            $sexe_pat = $_POST['sexe_pat'];

            // Appelle de la méthode du modèle pour insérer le patient
            $this->model->insertPatient($email_pat, $password_pat, $nom_pat, $prenom_pat, $date_nais_pat, $num_tel_pat, $sexe_pat);
        }
    }

    //liste des medecins
    public function invokeMedecin()
    {
        
        $medecins = $this->model->getMedecinList();
        include '../View/viewMedecinList.php';
    }

    public function invokeMedecinDetails($id_med)
    {

        $medecin = $this->model->getMedecin($id_med);
        include '../View/detailsMed.php';
    }

    //insertion d'un medecin
    public function invokeInsertMedecin()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // récupérer les valeurs des champs du formulaire
            $email_med = $_POST['email_med'];
            $password_med = md5($_POST['password_med']);
            $nom_med = $_POST['nom_med'];
            $prenom_med = $_POST['prenom_med'];
            $date_nais_med = $_POST['date_nais_med'];
            $num_tel_med = $_POST['num_tel_med'];
            $sexe_med = $_POST['sexe_med'];
            $adresse_med = $_POST['adresse_med'];
            $latitude = $_POST['latitude'];
            $longitude = $_POST['longitude'];
            $photo = $_POST['diplome_med'];
            $id_spec = $_POST['id_spec'];

            //echo $id_spec;
            // Appelle de la méthode du modèle pour insérer le medecin
            $this->model->insertMedecin($email_med, $password_med, $nom_med, $prenom_med, $date_nais_med,
            $num_tel_med, $sexe_med,$adresse_med,$latitude,$longitude,$photo,$id_spec);

             
        }
    }

    //insertion d'une d'une spécialité
    public function invokeInsertSpecialite()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //recuper le champ du formulaire
            $nom_spec = $_POST['specialite'];

            $this->model->insertSpecialite($nom_spec);
        }
    }

    //liste spécialitées
    public function invokeListeSpecialite()
    {
        $specialites = $this->model->getSpecialiteList();
        include '../View/viewSpecList.php';
    }

    //insertion d'un administrateur
    public function invokeInsertAdmin()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Récupérez les données du formulaire
            $nom_admin = $_POST['nom_admin'];
            $prenom_admin = $_POST['prenom_admin'];
            $email_admin = $_POST['email_admin'];
            $num_tel_admin = $_POST['num_tel_admin'];
            $password_admin = $_POST['password_admin'];
    
            // Appelle de la méthode du modèle pour insérer l'administrateur
            $this->model->insertAdmin($nom_admin, $prenom_admin, $email_admin, $num_tel_admin, $password_admin);
        }
    }

    //liste des rendez-vous
    public function invokeRdvListe()
    {
        $rdv = $this->model->getRdvList();
    }

    //liste des messages
    public function invokeMessageListe()
    {
        $rdv = $this->model->getMessageList();
    }

    //suppression d'un medecin
    public function invokeSuppMedecin($id_med)
    {
            $this->model->suppMedecin($id_med);
    }

    //suppression d'un patient
    public function invokeSuppPatient($id_pat)
    {
            $this->model->suppPatient($id_pat);
    }
}
?>
