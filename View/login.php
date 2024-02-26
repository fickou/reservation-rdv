<?php
    session_start();                                                                                                                        
    
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
                
                position: absolute;
                top: 10%; /* Position verticale du texte */
                left: 25%; /* Position horizontale du texte */
                width: 50%;
                height:300px;
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

            .pwd{
                margin-left:15%;
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
            <img src='../login.png' class='photo'>
            <div class="formulaire">
            <form action="../Model/traitementCon.php" method="post">
                    <p class='centrer' style='color:black; font-size:50px;margin-top:-5px'>Connexion</p>
                    <p class='centrer'>
                        <input type="email" name="email_user" placeholder="Email" required>
                    </p>
                    <p class='centrer'>
                        <input type="password" name="password_user" placeholder="Mot de passe" required>
                    </p>
                    <p class='pwd'><a href="#">Mot de passe oublier</a></p>
                    <p class='centrer'>
                        <input type="submit" name="bounton" value="Connexion">
                    </p>
                    <div class='centrer'><a href="#">Créer un compte</a></div>
                    
                </form>
            </div>
        </div>
    </body>
</html>