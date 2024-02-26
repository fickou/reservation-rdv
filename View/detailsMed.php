
<!DOCTYPE html>
<html>
<head>
    <style>
    </style>
</head>
<body>
    <div class='container'>
        <div class='menu'>
            <?php include('menuAdmin.php'); ?>
        </div>
        <div class='details'>
            
            <div class='element'>
                <p>Email: <?php echo $medecin->getEmailmed(); ?></p>
                <!-- Ajoutez d'autres détails du médecin ici -->
            </div>
        </div>
    </div>
</body>
</html>
