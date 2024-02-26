<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <title>Prise de rendez-vous medicale</title>
        <style>
            .header {
                justify-content: space-between;
                align-items: center;
                height: 70px;
            }

            .header ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
                display: flex;
            }

            .header .logo {
                margin-right: auto; /* Pour pousser le logo à gauche */
            }

            .header .acc{
                background-color: rgb(76, 158, 222);
                width: 20%;
                height: 70px;
                text-align:center;
                padding-top: 2%;
            }

            .header .med{
                background-color: rgb(76, 158, 222);
                height: 70px;
                width: 35%;
                text-align:center;
                padding-top: 2%;
            }

            .header .con{
                background-color: rgb(76, 158, 222);
                height: 70px;
                width:25%;
                text-align:center;
                padding-top: 2%;
            }

            .header .blanc{
                width:10%;
            }

            .header li a {
                text-decoration: none;
                color: white;
            }
            .photo{
                width : 100%;
                height: 300px;
            }

            .logo{
                width: 70%;
                height: 50%;
                padding-top: 2%;
                margin-right: 50%;
            }

            .bottom {
                display: flex;
                justify-content: space-around;
                background-color: lightgray;
                height: 100px;
            }

            .tab1,
            .tab2,
            .tab3 {
                width: 30%;
                height: 100px;
                background-color: white;
                border-radius: 20px;
                display: flex;
                justify-content: space-around;
                font-size: 100%;
            }

            

            .container {
                position: relative;
                color: white; /* Couleur du texte */
            }

            .text {
                position: absolute;
                top: 1%; /* Position verticale du texte */
                left: 1%; /* Position horizontale du texte */
            }

            .bottom_img{
                width:100px;
                height:90px;
            }
        </style>
    </head>
    <body>
        <div class='header'>
            <ul>
                <li ><img src='logo.jpg' class='logo'></li>
                <li class='blanc'></li>
                <li class='acc'><a href='index.php'>ACCUEIL</a>
                <li class='med'><a href='View/formMed.php'>MEDECIN ? REJOIGNEZ-NOUS</a>
                <li class='con'><a href='View/login.php'>SE CONNECTER</a>
            </ul>
        </div>
        <div class='container'>
            <img src='medecin.jpg' class='photo'>
            <div class="text">
                <p>DOCTOR vous permet prendre</br>
                     un rendez-vous en ligne avec un médecin</br>
                     et c'est gratit
                </p>
            </div>
        </div>
        <div class='bottom'>
            <div class='tab1'>
                <div class='gauche'>
                    <img src='rdv.png' class='bottom_img'>
                </div>
                <div class='droite'>
                    <a href='View/formRdv.php'>Prendre RDV</a>
                    <p>Choirsir otre medecin</br>et prendre un rendez-</br>vous</p>
                </div>
            </div>
            <div class='tab2'>
                <div class='gauche'>
                    <img src='gRdv.jpeg' class='bottom_img'>
                </div>
                <div class='droite'>
                    <a href='#'>Gérer rendez-</br>vous</a>
                    <p>Modifier ou annuler</br>vos rendez-vous</p>
                </div>
            </div>
            <div class='tab3'>
                <div class='gauche'>
                    <img src='besoin.png' class='bottom_img'>
                </div>
                <div class='droite'>
                    <a href='#'>Besoin d'aide</a>
                    <p>Comment</br>ça marche ?</p>
                </div>
            </div>
        </div>
    </body>
</html>

<?php
//include('Control/controller.php');

//$controller = new Controller();
//$controller->invoke();
?>
