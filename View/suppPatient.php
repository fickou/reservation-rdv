<?php

// Vérifiez si l'e-mail du médecin est présent dans l'URL
if(isset($_GET['id_pat'])){
    include('../Control/controller.php');
    $controller = new Controller();

    // Récupérer l'e-mail du médecin à partir de l'URL
    $email_patient = $_GET['id_pat'];

    // Appeler la méthode pour supprimer le médecin avec l'e-mail spécifié
    $controller->invokeSuppPatient($email_patient);
}
?>