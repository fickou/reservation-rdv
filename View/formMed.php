<?php
    session_start(); 
    require_once('../Control/controller.php');
    $controller = new Controller();                                                                                                                     
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription medecin</title>
    <style>

            nav{
                width:100%;
            }
            .logo {
                margin-right:auto;
                width:15%;
                height: 35px;
                padding-top:2%
            }
        input,select{
            font-size: 30px;
            margin: 5px;
            border-radius: 20px;
            width: 50%;
        }
        #diplome_med{
            font-size: 30px;
            margin: 5px;
            border-radius: 20px;
            width: 60%;
        }

        button {
            font-size: 30px;
             margin : 5px;
             border-radius: 20px;
             width:30%;
             margin-left: 35%;
             background-color:rgb(76,158,222);
             
        }
        .ins{
            margin-left: 35%;
        }
           

       form
        { 
            position: absolute;
             top: 1%;
            left: 25%;
            width:50%;
            
            /*background-color:rgb(76,158,222);*/
           
           
          
            
        }

        .image{
                    margin-top: 0.5%;
                    width: 100%;
                    height: 930px;
                    position: relative;
                    
        }

        .input-group {
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }

        .input-group label {
            margin:1%;
            width: 30%;
            text-align: left;
            font-size: 140%;

        }

        .input-group input,
        .input-group select {
            width: 60%;
            height:35px;
            font-size: 140%;
        }
        .text-center
        {
            
            text-align: center;
        }
       .corp 
        {
           
          padding-left: 0%;
          position:absolute;
           
        }


        

    </style>
</head>
<body>
<body>
        <div class="container">
            <header>
                <nav>
                    <div class='log'>
                        <img src="../logo.jpg" class="logo">
                    </div>
    </div>
<div class="corp">
    <img src="../inscritmed.jpg" class="image">
      
    <form method="post">
        <h1 class="text-center">Inscription medecin</h1>  
            <div class="input-group">
                <label for="nom">Nom:</label>
                <input type="text" id="nom_med" name="nom_med" required>
            </div>

            <div class="input-group">
                <label for="prenom">Prénom:</label>
                <input type="text" id="prenom_med" name="prenom_med" required>
            </div>

            <div class="input-group">
                <label for="email">Email:</label>
                <input type="text" id="email_med" name="email_med" required>
            </div>

            <div class="input-group">
                <label for="password">Mot de passe:</label>
                <input type="password" id="password_med" name="password_med" required>
            </div>

            <div class="input-group">
                <label for="confpwd">Confirmation mot de passe:</label>
                <input type="password" id="confpwd" name="confpwd" required>
            </div>

            <div class="input-group">
                <label for="sexe">Sexe:</label>
                <select id="sexe_med" name="sexe_med">
                    <option value="sexe">sexe</option>
                    <option value="M">Masculin</option>
                    <option value="F">Féminin</option>
                </select>
            </div>


            <div class="input-group">
                <label for="date_nais_med">Date de naissance :</label>
                <input type="date" id="date_nais_med" name="date_nais_med" required>
            </div>

            <div class="input-group">
                <label for="adresse">Adresse:</label>
                <input type="text" id="adresse_med" name="adresse_med" required>
            </div>

            <div class="input-group">
                <label for="num_tel_med">Téléphone:</label>
                <input type="text" id="num_tel_med" name="num_tel_med" required>
            </div>

            <div class="input-group">
                <label for="specialite">Specialite :</label>
                <select id="id_spec" name="id_spec" required>
                    <option value="">Sélectionner une spécialité</option>
                    <?php 
                        try {
                            // Connexion à la base de données 
                            $conn = new PDO('mysql:host=localhost;dbname=gestionreservation','root', '');
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            // Récupération des spécialités depuis la base de données
                            $sql = "SELECT id_spec, nom_spec FROM specialite WHERE valide_spec=1";
                            $result = $conn->query($sql);

                            // Affichage des spécialités dans le menu déroulant
                            while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option value=". $row["id_spec"] .">" . $row["nom_spec"] . "</option>";
                            }
                        } catch (PDOException $e) {
                            echo "Erreur de connexion à la base de données : " . $e->getMessage();
                        } finally {
                            // Fermeture de la connexion à la base de données
                            $conn = null;
                        }
                    ?>
                </select>
            </div>

            <div class="input-group">
                <label for="longitude_med">Longitude:</label>
                <input type="number" id="longitude" name="longitude" required>
            </div>

            <div class="input-group">
                <label for="latitude_med">Latitude:</label>
                <input type="number" id="latitude" name="latitude" required>
            </div>
            <div class="input-group">
                <label for="file">Diplome:</label>
                <input type="file" id="diplome_med" name="diplome_med" required>
            </div>
            <button name="btn-valide" type="submit">S'inscrire </button>
            <p><a href='login.php'>Se connecter</p>
            <?php $controller->invokeInsertMedecin() ?>
        </form>
    </div>
</body>
</html>
