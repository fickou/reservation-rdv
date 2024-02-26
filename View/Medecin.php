<?php
// Vérifiez si l'identifiant du médecin est présent dans l'URL
if(isset($_GET['id_med'])){
    include('../Control/controller.php');
    $controller = new Controller();

    // Récupérer l'identifiant du médecin à partir de l'URL
    $id_medecin = $_GET['id_med'];
    
    // Invoquer la méthode pour afficher les détails du médecin en utilisant l'identifiant
    $medecin = $controller->invokeMedecinDetails($id_medecin);
    include '../View/detailsMed.php';
}
?>
