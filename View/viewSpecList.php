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
                width:70%;
                height: 100%;
                border: 1px solid black;
                text-align:center;
            }
            .container{
                margin-left:10%;
                display: flex;
            }
            .menu{
                background-color: rgb(76, 158, 222);
                width:20%;
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
                            <th>Nom spécialité</th>
                            <th>Options</th>
                        </tr>
                        <?php foreach ($specialites as $value): ?>
                            <tr>
                                <td><?php echo $value->getNomSpec(); ?></td>
                                <td><a href='#'>Modifier</a></td>
                                <td><a href='<?php  ?>'>Supprimer</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>