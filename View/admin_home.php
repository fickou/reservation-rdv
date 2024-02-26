<?php include ('../Control/controller.php');
    $controller = new Controller();
    
?>

<!DOCTYPE html>

<html>
    <head>
        <style>
            .header {
                justify-content: space-between;
                align-items: center;
                height: 70px;
                position: relative;
            }
           
            .header> ul{
                list-style-type: none; /* enlever le point */
                margin: 0;
                padding: 0;
                display: flex;
            }
            .logo{
                width: 70%;
                padding-top: 2%;
                margin-right: auto;
                height: 50%;
                margin-right: 50%;
            }

            .nav{
                background-color: rgb(76, 158, 222);
                padding-top:2%;
                text-align:center;
                height:70px;
                width: 30%;
                position: relative;
            }

            .nav a{
                text-decoration: none;
                color:white;
            }

            .sous_nav{
                list-style-type: none;
                display: none;
                position: absolute;
                left: 5%;
                z-index: 2;
            }

            .sous_nav a{
                text-decoration: none;
                color:black;
            }

            .nav:hover .sous_nav{
                display: block;
            }

            .photo{
                position: relative;
                width : 100%;
                height: 350px;
            }

            .container {
                position: relative;
                color: white; /* Couleur du texte */
                z-index: 1;
            }
            details a{
                margin-left:35px;
            }

            .footer-content{
                text-align:center;
                color:white;    
            }
            footer{
                background-color: rgb(76, 158, 222);
            }
        </style>
        
    </head>
    <body>
        <div class='header'>
            <ul >
                <li ><img src='../logo.jpg' class='logo'></li>
                <li class='nav'>
                    <a href='#'>Gestion des utilisateurs</a>
                    <ul class='sous_nav'>
                        <li><a href="listeMedecin.php">Les prestataires</a></li>
                        <li><a href='listePatient.php'>Les patients</a></a>
                    </ul>
                </li>
                <li class='nav'>
                    <a href='#'>Gestion des contenus</a>
                    <ul class='sous_nav'>
                        <li><a href="#">Contenu statistique</a></li>
                        <li><a href='#'>Pages aides</a></a>
                        <li><a href='#'>Les FQS</a></a>
                    </ul>
                </li>
                <li class='nav'><a href='#'>Commentaires et avis</a></li>
                <li class='nav'>
                    <a href='#'>Salutations</a>
                    <ul class='sous_nav'>
                        <li><a href="#">Modifier mon profil</a></li>
                        <li><a href='deconnexion.php'>Se deconnecter</a></a>
                    </ul>
                </li>
            </ul>
        </div>
        <div class='container'>
            <img src='../admin.jpeg' class='photo'>

            <!-- un tableau de bord avec les infortains : accueil, medecins,patient,specialite-->
            
           <?php include('menuAdmin.php'); ?>
        </div>
        <footer>
            <div class="footer-content">
                Bienvenue sur notre plateforme de gestion administrateur. Ici, vous pouvez gérer les utilisateurs, les contenus, les commentaires et bien plus encore.</br>
                N'hésitez pas à explorer les différentes fonctionnalités et à nous contacter si vous avez des questions ou des préoccupations.
            </div>
        </footer>
    </body>
</html>