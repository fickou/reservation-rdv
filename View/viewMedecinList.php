<!DOCTYPE html>

<html>
    <head>
        <style>
           table{
                border-collapse: collapse;
                width:100%;
            }

            tr:not(:last-child) {
                border-bottom: 1px solid black;
            }
            th{
                height:100%;
                background-color: rgb(76, 158, 222);
            }
            .table{
                width:90%;
                height: 100%;
                border: 1px solid black;
                text-align:center;
            }
            .container{
                display: flex;
                justify-content: space-around;
            }
            .menu{
                width:10%;
                border: 1px solid black;
            }
            img{
                width:100%;
                height:100%;
            }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='menu'>
                <?php include('menuAdmin.php'); ?>
            </div>
            <div class='table'>
                <table>
                    <tbody>
                        <tr>
                            <th>Email</th>
                            
                            <th>Nom</th>
                            <th>Prenom</th>
                            
                            <th>Numéro téléphone</th>
                            
                            <th>Adresse</th>
                            
                            <th colspan='3'>Opération</th>
                            <hr>
                        </tr>
                        
                        <?php foreach ($medecins as $value): ?>
                            <tr>
                                <td><?php echo $value->getEmailmed(); ?></td>
                                
                                <td><?php echo $value->getNommed(); ?></td>
                                <td><?php echo $value->getPrenommed(); ?></td>
                                
                                <td><?php echo $value->getNumTelmed(); ?></td>
                                
                                <td><?php echo $value->getAdressemed(); ?></td>
                                
                                <td><a href='#'>Modifier</a></td>
                                <td><a href='suppMedecin.php?id_med=<?php echo $value->getEmailmed(); ?>'>Supprimer</a></td>
                                <td><a href='Medecin.php?id_med=<?php echo $value->getEmailmed(); ?>'>Details</a></td>
                            </tr>
                            
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>