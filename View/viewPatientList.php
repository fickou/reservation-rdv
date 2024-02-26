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
                            <th>Password</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Date naissance</th>
                            <th>Numéro téléphone</th>
                            <th>Sexe</th>
                            <th colspan='2'>Opération</th>
                        </tr>
                        <?php foreach ($patients as $value): ?>
                            <tr>
                                <td><?php echo $value->getEmailPat(); ?></td>
                                <td><?php echo $value->getPasswordPat(); ?></td>
                                <td><?php echo $value->getNomPat(); ?></td>
                                <td><?php echo $value->getPrenomPat(); ?></td>
                                <td><?php echo $value->getDateNaisPat(); ?></td>
                                <td><?php echo $value->getNumTelPat(); ?></td>
                                <td><?php echo $value->getSexePat(); ?></td>
                                <td><a href='#'>Modifier</a></td>
                                <td><a href='suppPatient.php?id_pat=<?php echo $value->getEmailPat(); ?>'>Supprimer</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>