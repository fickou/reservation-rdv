<?php
    function init(){
        $db = new PDO('mysql:host=localhost;dbname=gestionreservation','root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    // Vérifier si les données de connexion ont été soumises via POST
    if(isset($_POST['email_user']) && isset($_POST['password_user'])) {
        $email_user = $_POST['email_user'];
        $password_user = $_POST['password_user'];

        // Assurer que les champs ne sont pas vides
        if (!empty($email_user) && !empty($password_user)) {
            $db = new PDO('mysql:host=localhost;dbname=gestionreservation','root', '');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Vérifier si l'utilisateur est un administrateur
            $sql_req_admin = "SELECT * FROM administrateur WHERE email_admin = ? AND password_admin = ?";
            $trait_admin = $db->prepare($sql_req_admin);
            $trait_admin->execute(array($email_user,$password_user));
            $resultat_admin = $trait_admin->fetch(PDO::FETCH_ASSOC);

            if ($resultat_admin) {
                session_start();

                $_SESSION['id_admin'] = 1;
                // Rediriger vers la page d'accueil de l'administrateur
                header('Location: ../View/admin_home.php');
                exit;
            }

            // Vérifier si l'utilisateur est un médecin
            $sql_req_medecin = "SELECT * FROM medecin WHERE email_med = ? AND password_med = ?";
            $trait_medecin = $db->prepare($sql_req_medecin);
            $trait_medecin->execute(array($email_user,$password_user));
            $resultat_medecin = $trait_medecin->fetch(PDO::FETCH_ASSOC);

            if ($resultat_medecin) {
                session_start();

                $_SESSION['id_med'] = 1;
                // Rediriger vers la page d'accueil du médecin
                header('Location: ../View/medecin_home.php');
                exit;
            }

            // Vérifier si l'utilisateur est un patient
            $sql_req_patient = "SELECT * FROM patient WHERE email_pat = ? AND password_pat = ?";
            $trait_patient = $db->prepare($sql_req_patient);
            $trait_patient->execute(array($email_user, $password_user));
            $resultat_patient = $trait_patient->fetch(PDO::FETCH_ASSOC);

            if ($resultat_patient) {
                session_start();

                $_SESSION['id_pat'] = 1;
                // Rediriger vers la page d'accueil du patient
                header('Location: ../View/patient_home.php');
                exit;
            }

            header('Location: ../View/login.php');
            exit;
        }
    }
    

    // Si les données de connexion sont manquantes ou incorrectes, rediriger vers la page de connexion

?>