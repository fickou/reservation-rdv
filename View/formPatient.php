<?php
    session_start(); 
    require_once('../Control/controller.php');
    $controller = new Controller();                                                                                                                     
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription patecin</title>
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
        #diplome_pat{
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
        }
           

        .form
        { 
            width:70%;
            text-align:center;
            border: 1px;
            background-color:rgb(76,158,222);
            
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
            padding-top:10px;
       
        }
       .corp
        {
            padding-left: 25%;
           
        }
        p{
            text-align: center;
            font-size:200%;
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
    <div class="form">
    <h1 class="text-center">Inscription patient</h1>    
        <form method="post">
            <div class="input-group">
                <label for="nom">Nom:</label>
                <input type="text" id="nom_pat" name="nom_pat" required>
            </div>

            <div class="input-group">
                <label for="prenom">Prénom:</label>
                <input type="text" id="prenom_pat" name="prenom_pat" required>
            </div>

            <div class="input-group">
                <label for="email">Email:</label>
                <input type="text" id="email_pat" name="email_pat" required>
            </div>

            <div class="input-group">
                <label for="password">Mot de passe:</label>
                <input type="password" id="pwd_pat" name="password_pat" required>
            </div>

            <div class="input-group">
                <label for="confpwd">Confirmation mot de passe:</label>
                <input type="password" id="confpwd" name="confpwd" required>
            </div>

            <div class="input-group">
                <label for="sexe">Sexe:</label>
                <select id="sexe_pat" name="sexe_pat">
                    <option value="sexe">sexe</option>
                    <option value="M">Masculin</option>
                    <option value="F">Féminin</option>
                </select>
            </div>

            <div class="input-group">
                <label for="date_nais_pat">Date de naissance :</label>
                <input type="date" id="date_nais_pat" name="date_nais_pat" required>
            </div>

            <div class="input-group">
                <label for="num_tel_pat">Téléphone:</label>
                <input type="text" id="num_tel_pat" name="num_tel_pat" required>
            </div>
            <button name="btn-valide" type="submit">S'inscrire </button>
            <p><a href='login.php'>Se connecter</p>
            <?php $controller->invokeInsertPatient() ?>
        </form>
    </div>
    </div>
</body>
</html>
