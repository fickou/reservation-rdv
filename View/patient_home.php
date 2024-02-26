<!DOCTYPE html>

<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Accueil medecin</title>
        <style>
            nav{
                width:100%;
            }

                        /* Positionner le logo à gauche */
            .logo {
                margin-right:auto;
                width:15%;
                height: 35px;
                padding-top:2%
            }

            /* Couleur blanche pour les éléments li */
            .droite li {
                color: white;
            }
            /* Styles pour la barre de navigation */
            .droite {
                position: absolute;
                top: 0;
                right: 0;
              background-color:rgb(76,158,222);
                font-size: 150%;
                width: 80%;
                height: 12%;
                color: white;

            }

            /* Styles pour les éléments de la barre de navigation */
            .droite ul {
                list-style-type: none;
                padding: 0;
                margin: 0;
                display: flex;
            }
            
            .dispo{width:21%;text-align:center;height:60px;padding-top:2%}
            .noti{width:21%;text-align:center;height:60px;padding-top:2%}
            .spec{width:21%;text-align:center;height:60px;padding-top:2%}
            .accu{width:21%;text-align:center;height:60px;padding-top:2%}
            .pro{width:21%;height:60px;padding-top:2%; position: absolute;text-align: right;left:70%}
            .bord{width:21%;text-align:center;height:60px;padding-top:2%}

            /* Styles pour les liens de la barre de navigation */
            .droite a {
                text-decoration: none;
                color: white;
            }

            .droite a:hover {
                text-decoration: underline;
            }
            .footer{
                height: 146px;
                background-color:lightgray;
              
            }
            .tab1{
                background-color: white;
                border-radius: 25px;
                height: 145px;
               font-size: 150%;
                width: 30%;
                float: left;
                margin-left:1%;
                
            }
            .tab2{
               
                background-color: white;
                border-radius: 25px;
                height: 145px;
               width: 30%;
              font-size: 150%;
                float: right;
                margin-right: 1%;
             
             
            }
            .tab3{
                background-color: white;
               border-radius: 20px;
               height: 145px;
               width: 30%;
               font-size: 150%;
                float: right;
                margin-right: 4%;
                
             
            }
            p{
                margin: 5%;
            }
            .photo{
                border-radius: 20px;
                width: 30%;
                height: 100px;
                float: left;
                
            }
            .tab_bord {
                        display: none;
                        position: absolute;
                        margin-top: 4%;
                        text-align:left;
                        left: 30px;
                        width: 118%;
                        height: 320px;
                        background-color:rgb(232, 227, 227);
                        z-index: 9999;
                        color: black;
                        font size: 20%;
                    }

                    .tab_bord.show {
                        display: block;
                    }
                    .menu{
                        display: none;
                        position: absolute;
                        top: 20%;
                        left: 20px;
                        width: 14%;
                       
                        background-color:rgb(232, 227, 227);
                        z-index: 9999;
                        color: white;
                        font: size 25%;
                    }

                    .menu.show {
                        display: block;
                    }

                    button {
                        position: absolute;
                        top: 90px;
                        left: 20px;
                    }

            .profil{
                text-align: left;
                height: 180px;
                background-color:lightgray;
            }
            .photo_profil{
                width: 50%;
                height: 50px;
                left:1px;
                border-radius: 30px;
                padding-top: 20px;
                background-color:lightgray;
            }
            .profil .modifier{
                float: right;
                padding-bottom:16px;
                color:black;
                margin: 2%;
            }
            .bouton {
                
                height: 30px;
                width: 95%;
                 margin: 5px;
                 background-color:lightgray;
            }
         .bouton a{
                color:black;  
                }
                    .image{
                    margin-top: 0.5%;
                    width: 100%;
                    position: relative;
                    height: 368px;

            }
            summary,p{
                color:black;
            }
            div
            .email
            {
                color:black;
            }

            {
                margin 1%;
            }
            
        </style>
    </head>
    <body>
        <div class="container">
            <header>
                <nav>
                    <div class='log'>
                    <img src="../logo.jpg" class="logo">
                    </div>
                    <div class="droite">
                        <ul>
                        <li class='accu'>
                                <a href="patient_home.php">Accueil</a>
                            </li>
                        <li class='dispo'>
                                <a href="FormRdv.php">Prendre RDV</a>
                            </li>
                            <li class='noti'>
                                <a href="notification.php">Notification</a>
                            </li>

                            <li class='spec'>
                                <a href="recherche_service.php">Recherche</a>
                            </li>
                            <li class='pro'>
                            <a href="#" onclick="afficher_tab_bord()">Profil</a>
                                <div class="tab_bord" id="tab_bord">
                                    <div class="profil">
                                            <a href="modifier_med.php"><img src="../modifier.jpg" class="photo_profil"></a>
                                        <a href="modifierAdmin.php" class="modifier">Modifier</a>

                                        <a  class="email" href="contact.php">Email</a>
                                        <p>Telephone</br>adresse</p>
                                    </div>
                                    <div class="elements">
                                    <div class="bouton">  
                                    <a href="compte.php">Gerer mon compte</a>
                                 </div>
                            <div class="bouton">
                                <a href="deconnexion.php">Déconnexion</a>
                            </div>
                            <div class="bouton">
                                <a href="supprimer.php">Supprimer mon compte</a>
                            </div>
                            
                        </div> 
                    </div>
                </div>

                <script>
                    function afficher_tab_bord() {
                        var tabBord = document.getElementById("tab_bord");
                        tabBord.classList.toggle("show");
                    }
                </script>
                                            </li>
                                        </ul>
                                    </div>
                                </nav>
                            </header>
                        </div>
                        <div>
                    <img src="../patient.jpg" class="image">
                    <button onclick="afficher_Menu()">Menu</button>
                    <div class="menu" id="menu">
                        <div class="element">
                        <div class="bouton">
                             <a href="patient_home.php" class="bouton">Accueil</a>
                         </div>
                            <div class="bouton">
                             <a href="reservation.php" class="bouton">Liste des réservations</a>
                         </div>
                         <div>
                                <div class="bouton">
                                    <a href="FormRdv.php">Prendre RDV</a>
                                </div>
                                <div class="bouton">
                                    <a href="recherche_servive.php">Services</a>
                                </div>
        
            </div>
            <div class="bouton">
                <a href="calendrier_dispo.php">Calendrier</a>
            </div>
           
            <div class="bouton">
                <a href="otification.php">Notification</a>
            </div> <div class="bouton">
                <a href="aide.php">Aide</a>
            </div>

            <div class="bouton">
                <a href="parametre.php">Paramètres</a>
            </div>
            <div class="bouton">
                <a href="deconnexion.php">Déconnexion</a>
            </div>
        </div> 
    </div>
</div>
<script>
    function afficher_Menu() {
        var tabBord = document.getElementById("menu");
        tabBord.classList.toggle("show");
    }
</script>


        <div class="footer">
            <div class="tab1">
                <a href="#"><img class="photo" src="../avis.png"></a>
                <a href="#">Avis et Evaluation</a><br>
                <p>Evaluer les medecins et donner vos avis</p>
            </div>
            <div class="tab2">
                <a href="#"><img class="photo" src="../calendrier.png"></a>
                <a href="#">Calendrier de disponibilité</a><br>
                <p>Pour afficher les plages horaires disponible pour les différents services</p>
            </div>
            <div class="tab3">
                <a href="#"><img class="photo" src="../service.png"></a>
                <a href="#">Recherche de services</a>
                <p>Rechercher un service disponible à coté de votre lieu derendez-vous</p>
            </div>
        </div>
    </body>
</html>