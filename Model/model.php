<?php
  include ('patient.php');
  include ('medecin.php');
  include ('calendrier.php');
  include ('jourFerier.php');
  include ('message.php');
  include ('rendezVous.php');
  include ('specialite.php');

class Model
{
    private static $db; //PDO instance

    //connexion à la base de données
    public function init(){
        self::$db = new PDO('mysql:host=localhost;dbname=gestionreservation','root', '');
        self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    //creation de table
    public function creationTable(){
        $this->init(); // Assurer que la connexion à la base de données est établie

        // requêtes de création de table
        $sql_admin = "CREATE TABLE administrateur(
            id_admin INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            email_admin varchar(30),
            nom_admin varchar(25),
            prenom_admin varchar(25),
            num_tel_admin varchar(12),
            password_admin varchar(30)
            )";
        self::$db->exec($sql_admin); 

        $sql_pat = "CREATE TABLE patient(
            id_pat INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            email_pat varchar(30),
            password_pat varchar(30),
            prenom_pat varchar(25),
            nom_pat varchar(25),
            date_nais_pat date,
            num_tel_pat varchar(12),
            sexe_pat char
        )";
        self::$db->exec($sql_pat);

        $sql_med = "CREATE TABLE medecin(
            id_med INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            email_med varchar(30),
            password_med varchar(30),
            prenom_med varchar(25),
            nom_med varchar(25),
            date_nais_med date,
            num_tel_med varchar(12),
            sexe_med char,
            latitude numeric(5),
            longitude numeric(5),
            valide_med INT
        )";
        self::$db->exec($sql_med);

        $sql_cal = "CREATE TABLE calendrier(
            id_cal INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            id_med INT UNSIGNED,
            jour_d INT,
            jour_f INT,
            heure_d INT,
            heure_f INT,
            temps_c INT,
            FOREIGN KEY(id_med) REFERENCES medecin(id_med) ON UPDATE CASCADE ON DELETE CASCADE
        )";
        self::$db->exec($sql_cal);

        $sql_rdv = "CREATE TABLE rendez_vous(
            id_rdv INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            id_med INT UNSIGNED,
            id_pat INT UNSIGNED,
            heure_rdv datetime,
            FOREIGN KEY(id_med) REFERENCES medecin(id_med) ON UPDATE CASCADE ON DELETE CASCADE,
            FOREIGN KEY(id_pat) REFERENCES patient(id_pat) ON UPDATE CASCADE ON DELETE CASCADE
        )";
        self::$db->exec($sql_rdv);

        $sql_spec = "CREATE TABLE specialite(
            id_spec INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            nom_spec varchar(15),
            valide_spec INT
        )";
        self::$db->exec($sql_spec);

        $sql_jf = "CREATE TABLE jour_ferier(
            id_jour INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            id_med INT UNSIGNED,
            date_f  date,
            FOREIGN KEY(id_med) REFERENCES medecin(id_med) ON UPDATE CASCADE ON DELETE CASCADE
        )";
        self::$db->exec($sql_jf);

        $sql_mes = "CREATE TABLE messages(
            id_mes INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            id_eme INT UNSIGNED,
            type_eme varchar(25),
            question text,
            reponse text,
            FOREIGN KEY(id_eme) REFERENCES medecin(id_med) ON UPDATE CASCADE ON DELETE CASCADE,
            FOREIGN KEY(id_eme) REFERENCES patient(id_pat) ON UPDATE CASCADE ON DELETE CASCADE
        )";
        self::$db->exec($sql_mes);
    }

    //diriger l'utilisateur vers la page d'accueil lui correspond apres avoir vérifier les informations de connexion
    public function redirectionUser()
    {
        // Vérifier si les données de connexion ont été soumises via POST
        if(isset($_POST['email_user']) && isset($_POST['password_user'])) {
            $email_user = $_POST['email_user'];
            $password_user = $_POST['password_user'];

            // Assurer que les champs ne sont pas vides
            if (!empty($email_user) && !empty($password_user)) {
                $this->init(); // Assurer que la connexion à la base de données est établie

                // Vérifier si l'utilisateur est un administrateur
                $sql_req_admin = "SELECT * FROM administrateur WHERE email = :email AND password = :password";
                $trait_admin = $this->db->prepare($sql_req_admin);
                $trait_admin->execute(array(':email' => $email_user, ':password' => $password_user));
                $resultat_admin = $trait_admin->fetch(PDO::FETCH_ASSOC);

                if ($resultat_admin) {
                    // Rediriger vers la page d'accueil de l'administrateur
                    header('Location: admin_home.php');
                    exit;
                }

                // Vérifier si l'utilisateur est un médecin
                $sql_req_medecin = "SELECT * FROM medecin WHERE email = :email AND password = :password";
                $trait_medecin = $this->db->prepare($sql_req_medecin);
                $trait_medecin->execute(array(':email' => $email_user, ':password' => $password_user));
                $resultat_medecin = $trait_medecin->fetch(PDO::FETCH_ASSOC);

                if ($resultat_medecin) {
                    // Rediriger vers la page d'accueil du médecin
                    header('Location: medecin_home.php');
                    exit;
                }

                // Vérifier si l'utilisateur est un patient
                $sql_req_patient = "SELECT * FROM patient WHERE email = :email AND password = :password";
                $trait_patient = $this->db->prepare($sql_req_patient);
                $trait_patient->execute(array(':email' => $email_user, ':password' => $password_user));
                $resultat_patient = $trait_patient->fetch(PDO::FETCH_ASSOC);

                if ($resultat_patient) {
                    // Rediriger vers la page d'accueil du patient
                    header('Location: patient_home.php');
                    exit;
                }
            }
        }

        // Si les données de connexion sont manquantes ou incorrectes, rediriger vers la page de connexion
        header('Location: login.php');
        exit;
    }


    // Insertion d'un administrateur
    public function insertAdmin($nom_admin, $prenom_admin, $email_admin, $num_tel_admin, $password_admin)
    {
        try {
            $this->init(); // Assurer que la connexion à la base de données est établie

            $sql_req = self::$db->prepare('INSERT INTO administrateur (nom_admin, prenom_admin, email_admin, num_tel_admin, password_admin)
                                        VALUES (?, ?, ?, ?, ?)');
            if ($sql_req->execute(array($nom_admin, $prenom_admin, $email_admin, $num_tel_admin, $password_admin))) {
                echo "Insertion réussie.";
            } else {
                echo "Erreur lors de l'insertion.";
            }
        } catch (PDOException $e) {
            echo "Erreur PDO: " . $e->getMessage();
        }
    }


    //récupération de tout les visiteurs
    public function getPatientList()
    {
        $this->init(); // Assurer que la connexion à la base de données est établie

        $sql_req = self::$db->query('SELECT * FROM patient');
        $patients = [];
        while ($donne = $sql_req->fetch()) {
            $patients[] = new Patient($donne['email_pat'], $donne['password_pat'],$donne['nom_pat'],
            $donne['prenom_pat'],$donne['date_nais_pat'],$donne['num_tel_pat'],$donne['sexe_pat']);
        }
        return $patients;
    }

    //insertion d'un patient
    public function insertPatient($email_pat, $password_pat, $nom_pat, $prenom_pat, $date_nais_pat, $num_tel_pat, $sexe_pat)
    {
        // Assurer que la connexion à la base de données est établie
        $this->init();

        // Vérifier si l'email existe déjà dans la table patient
        $sql_check = self::$db->prepare('SELECT COUNT(*) AS count FROM patient WHERE email_pat = ?');
        $sql_check->execute(array($email_pat));
        $result = $sql_check->fetch(PDO::FETCH_ASSOC);

        if ($result['count'] > 0) {
            echo "L'email $email_pat est déjà utilisé. Veuillez choisir un autre email.";
        } else {
            $sql_req = self::$db->prepare('INSERT INTO patient (email_pat, password_pat, nom_pat, prenom_pat, date_nais_pat, num_tel_pat, sexe_pat) 
                VALUES (?, ?, ?, ?, ?, ?, ?)');
            if ($sql_req->execute(array($email_pat, $password_pat, $nom_pat, $prenom_pat, $date_nais_pat, $num_tel_pat, $sexe_pat))) {
                echo "Insertion réussie.";
            } else {
                echo "Erreur lors de l'insertion.";
            }
        }
    }

    //récupération de tout les prestataires de service
    public function getMedecinList()
    {
        try {
            $this->init(); // Assurer que la connexion à la base de données est établie

            $sql_req = self::$db->query('SELECT * FROM medecin');
            $medecins = [];
            while ($donne = $sql_req->fetch()) {
                $medecins[] = new Medecin($donne['email_med'], $donne['password_med'],$donne['nom_med'],
                $donne['prenom_med'],$donne['date_nais_med'],$donne['num_tel_med'],$donne['sexe_med'],
                $donne['adresse_med'],$donne['latitude'],$donne['longitude'],$donne['valide_med'],$donne['photo']);
            }
            return $medecins;
        } catch (PDOException $e) {
            // Gérer l'erreur de requête SQL
            echo "Erreur SQL: " . $e->getMessage();
            return []; // Retourner un tableau vide en cas d'erreur
        }
    }

    // Méthode pour récupérer la liste des médecins depuis la base de données
    public function getMedecins()
    {
        $this->init(); // Assurer que la connexion à la base de données est établie

        $sql_req = self::$db->query('SELECT id_med, nom_med FROM medecin');
        $medecins = $sql_req->fetchAll(PDO::FETCH_ASSOC);

        return $medecins;
    }

    // Méthode pour récupérer la liste des spécialités depuis la base de données
    public function getSpecialites()
    {
        $this->init(); // Assurer que la connexion à la base de données est établie

        $sql_req = self::$db->query('SELECT id_spec, nom_spec FROM specialite');
        $specialites = $sql_req->fetchAll(PDO::FETCH_ASSOC);

        return $specialites;
    }

    //insertion d'un medecin
    public function insertMedecin($email_med, $password_med, $nom_med, $prenom_med, $date_nais_med,
                                    $num_tel_med, $sexe_med,$adresse_med,$latitude,$longitude,$photo,$id_spec)
    {
        // Assurer que la connexion à la base de données est établie
        $this->init();

        $sql_check = self::$db->prepare('SELECT COUNT(*) AS count FROM medecin WHERE email_med = ?');
        $sql_check->execute(array($email_med));
        $result = $sql_check->fetch(PDO::FETCH_ASSOC);

        if ($result['count'] > 0) {
            echo "L'email $email_med est déjà utilisé. Veuillez choisir un autre email.";
        }
        else {
            $sql_req = self::$db->prepare('INSERT INTO medecin (email_med, password_med, nom_med,
                                            prenom_med, date_nais_med, num_tel_med, sexe_med,
                                            adresse_med,latitude,longitude,photo) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
            if ($sql_req->execute(array($email_med, $password_med, $nom_med, $prenom_med, $date_nais_med,
                                        $num_tel_med, $sexe_med,$adresse_med,$latitude,$longitude,$photo))) {
                echo "Insertion réussie.";
            } else {
                echo "Erreur lors de l'insertion.";
            }
        }
    }


    //liste des specialité
    public function getSpecialiteList()
    {
        $this->init(); // Assurer que la connexion à la base de données est établie

        $sql_req = self::$db->query('SELECT * FROM specialite');
        $specialites = [];
        while ($donne = $sql_req->fetch()){
            $specialites[] = new Specialite($donne['nom_spec'],$donne['valide_spec']);
        }
        return $specialites;
    }

    //insertion d'une spécialité
    public function insertSpecialite($nom_spec)
    {
        try {

            // Assurer que la connexion à la base de données est établie
            $this->init();

            $sql_req = self::$db->prepare('INSERT INTO specialite(nom_spec) VALUES(?)');
            if ($sql_req->execute(array($nom_spec))) {
                echo "Insertion réussie.";
            } else {
                echo "Erreur lors de l'insertion.";
            }
        } 
        catch (PDOException $e) {
            echo "Erreur PDO: " . $e->getMessage();
        }
    }

    //liste des rendez-vous
    public function getRdvList()
    {
        $this->init(); // Assurer que la connexion à la base de données est établie

        $sql_req = self::$db->query('SELECT * FROM rendez_vous');
        $rdv = [];
        while ($donne = $sql_req->fetch()){
            $rdv[] = new Rdv($donne['heure_rdv']);
        }
        return $rdv;
    }

    //liste des messages
    public function getMessageList()
    {
        $this->init(); // Assurer que la connexion à la base de données est établie

        $sql_req = self::$db->query('SELECT * FROM specialite');
        $messages = [];
        while ($donne = $sql_req->fetch()){
            $messages[] = new Message($donne['type_eme'],$donne['question'],$donne['reponse']);
        }
        return $messages;
    }

    public function getReservation()
    {
        $this->init(); // Assurer que la connexion à la base de données est établie

        // Vérifier si le médecin est connecté

        if(isset($_SESSION['id_med'])) {
            // Le médecin est connecté

            // Récupérer l'identifiant du médecin connecté
            $id_med = $_SESSION['id_med'];

            try {
                $sql = "SELECT * FROM rendez_vous WHERE id_med = ?";
                $statement = $this->db->prepare($sql);
                $statement->execute(array($id_med));

                $reservations = $statement->fetchAll(PDO::FETCH_ASSOC);

                // Retourner les réservations
                return $reservations;
            } catch(PDOException $e) {
                return "Erreur lors de la récupération des réservations : " . $e->getMessage();
            }
        } else {
            return "Erreur: Médecin non connecté";
        }
    }

    //suppression d'un medecin
    public function suppMedecin($id_med)
    {
        $this->init(); // Assurer que la connexion à la base de données est établie
        try {
            $sql_req = "DELETE FROM medecin WHERE email_med = ?";
            $sql_traitement = self::$db->prepare($sql_req);
            $sql_traitement->execute(array($id_med));
            echo "Utilisateur supprimé avec succès.";
            header('Location: ../View/listeMedecin.php');
        } catch (PDOException $e) {
            echo "Erreur lors de la suppression de l'utilisateur : " . $e->getMessage();
        }
    }

    //suppression d'un patient
    public function suppPatient($id_pat)
    {
        $this->init(); // Assurer que la connexion à la base de données est établie
        try {
            $sql_req = "DELETE FROM patient WHERE email_pat = ?";
            $sql_traitement = self::$db->prepare($sql_req);
            $sql_traitement->execute(array($id_pat));
            echo "Utilisateur supprimé avec succès.";
            header('Location: ../View/listePatient.php');
        } catch (PDOException $e) {
            echo "Erreur lors de la suppression de l'utilisateur : " . $e->getMessage();
        }
    }
}

?>
