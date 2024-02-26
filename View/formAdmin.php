<?php
    session_start(); 
    require_once('../Control/controller.php');
    $controller = new Controller();                                                                                                                     
?>

<!DOCTYPE html>

<html>
    <head>
        <style>
            .header ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
                display: flex;
            }
            .header li a {
                text-decoration: none;
                color: white;
            }

            
            .header .logo {
                margin-right: auto; /* Pour pousser le logo à gauche */
            }
            .photo{
                width : 100%;
                height: 418px;
            }

            .logo{
                width: 70%;
                height: 70%;
                padding-top: 2%;
                margin-right: 50%;
            }

            .container {
                
                position: relative;
                color: white; /* Couleur du texte */
            }

            .formulaire {
                background-color: rgb(76, 158, 222);
                border: 1px solid black;
                position: absolute;
                top: 10%; /* Position verticale du texte */
                left: 25%; /* Position horizontale du texte */
                width: 50%;
                height:400px;
            }
            p{
                margin-bottom:20px;
            }
            .centrer{
                text-align:center;
                font-size:18px;
            }
            input{
                border-radius:20px;
                height:25px;
                width: 70%;
            }
            input[type="submit"] {
                width: 50%;
                height:30px;
            }

            .blanc{
                
                width:90%;
            }

            a{
                color: rgb(50, 6, 91);
            }
            
        </style>
    </head>
    <body>
        <div class="header">
            <ul>
                <li ><img src='../logo.jpg' class='logo'></li>
                <li class='blanc'></li>
            </ul>
        </div>
        <div class="container">
           
            <div class="formulaire">
            <form method='post'>
                    <p class='centrer' style='color:black; font-size:200%;margin-top:-5px'>Ajouter un administrateur</p>
                    <p class='centrer'>
                        <input type="text" name="nom_admin" placeholder="Nom" required>
                    </p>
                    <p class='centrer'>
                        <input type="text" name="prenom_admin" placeholder="Prénom" required>
                    </p>
                    <p class='centrer'>
                        <input type="email" name="email_admin" placeholder="Email" required>
                    </p>
                    <p class='centrer'>
                        <input type="tel" name="num_tel_admin" placeholder="Numro téléphone" required>
                    </p>
                    <p class='centrer'>
                        <input type="password" name="password_admin" placeholder="Mot de passe" required>
                    </p>
                   
                    <p class='centrer'>
                        <input type="submit" name="bounton" value="S'inscrire">
                    </p>
                    <div class='centrer'><a href="login.php">Se connecter</a></div>
                    <?php $controller->invokeInsertAdmin(); ?>
                </form>
            </div>
        </div>
    </body>
</html>