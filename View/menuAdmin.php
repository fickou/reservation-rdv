<!DOCTYPE html>

<html>
    <head>
        <style>
            .tab_bord {
                position: absolute;
                top: 1%;  Position /*verticale du texte */
                
            }

            a{
                color:black;
            }

            .tab_bord > ul{
                list-style-type: none; /* enlever le point */
                display: flex;
            }

            .tab{
                background-color:rgb(216, 219, 222);
                list-style-type: none; /* enlever le point */
                display: none;
                color:white;
                width:100%;
            }

            .tab a{
                text-decoration: none;
            }

            .tab_bord > li a{
                display: block;
                text-decoration: none;
            }

            .sous_tab:hover .tab{
                display: block;
            }

            .sous_tab a{
                text-decoration: none;
            }
            details a{
                margin-left:5%;
            }
        </style>
    </head>
    <body>
    <div class="tab_bord">
                <ul>
                    <li class='sous_tab'>
                        <a href=''>Home</a>
                        <ul class='tab'>
                            <p>Tableau de bord</p>
                            <li><a href="../View/admin_home.php">Accueil</a></li>
                            <li>
                                <details>
                                    <summary>Medecins</summary>
                                    <a href="listeMedecin.php">Liste des Medecins</a></br>
                                    <a href="formMed.php">Ajouter un Medecin</a>
                                </details>
                            </li>
                            <li>
                                <details>
                                    <summary>Patients</summary>
                                    <a href="listePatient.php">Liste des Patients</a></br>
                                    <a href="formPatient.php">Ajouter un Patient</a>
                                </details>
                            </li>
                            <li><a href="listeSpec.php">Spécialités</a></li>
                            <li>
                                <details>
                                    <summary>RDV</summary>
                                    <a href="listePatient.php">Liste des rendez-vous</a></br>
                                    <a href="formRdv.php">Ajouter un rendez-vous</a>
                                </details>
                               
                            </li>
                            <li><a href="specialites.php">jour férié</a></li>
                            <li><a href="specialites.php">Messages</a></li>
                            <li><a href="specialites.php">Calendrier</a></li>
                            <p></p>
                            <li><a href="specialites.php">Contact</a></li>
                            <li><a href="formAdmin.php">Utilisateur</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
    </body>
</html>