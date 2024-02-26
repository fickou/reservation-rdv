
<!DOCTYPE html>
<html>
<head>
    <title>Prise de Rendez-vous Médical</title>
    <style>
        body{
            text-align:center;
        }
        .header{
            width:100%;
            height: 70px;
            background-color: rgb(76, 158, 222);
        }
        .container{
            margin-top:2px;
            border:1px solid black;
            width:40%;
            position: relative;
            left:30%;
        }

        input{
            height: 25px;
        }

        select{
            height: 25px;
        }

        .image{
            width:100%;
            height: 350px;
        }

        .formulaire{
            position: absolute;
            top:1%;
            left:10%;
            color:white;
        }

        footer{
            background-color: rgb(76, 158, 222);
            color: white;
        }
        
    </style>
</head>
<body>
    <div class='header'>

    </div>
<div class='container'>
    <img src='../rdv.jpeg' class='image'>
    <div class='formulaire'>
    <h2>Prise de Rendez-vous Médical</h2>
    
    <form action="process.php" method="post">
        <label for="date">Date du rendez-vous:</label><br>
        <input type="date" id="date_rdv" name="date_rdv" required><br><br>

        <label for="time">Heure du rendez-vous:</label><br>
        <input type="time" id="heure_rdv" name="heure_rdv" required><br><br>

        <label for="spec">Spécialité:</label><br>
        <select id="id_spec" name="id_spec" required>
            <option value="">Sélectionner une spécialité</option>
            <?php 
                try {
                    // Connexion à la base de données 
                    $conn = new PDO('mysql:host=localhost;dbname=gestionreservation','root', '');
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    // Récupération des spécialités depuis la base de données
                    $sql = "SELECT id_spec, nom_spec FROM specialite WHERE valide_spec=1";
                    $result = $conn->query($sql);

                    // Affichage des spécialités dans le menu déroulant
                    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='" . $row["id_spec"] . "'>" . $row["nom_spec"] . "</option>";
                    }
                } catch (PDOException $e) {
                    echo "Erreur de connexion à la base de données : " . $e->getMessage();
                } finally {
                    // Fermeture de la connexion à la base de données
                    $conn = null;
                }
            ?>
        </select><br><br>

        <label for="doctor">Médecin:</label><br>
        <select id="id_med" name="id_med" required>
            <option value="">Sélectionner un médecin</option>
            <?php 
                // Vérifier si une spécialité a été sélectionnée
                if (isset($_POST['id_spec'])) {
                    $specId = $_POST['id_spec'];

                    // Connexion à la base de données 
                    try {
                        $conn = new PDO('mysql:host=localhost;dbname=gestionreservation','root', '');
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        // Récupération des médecins correspondant à la spécialité sélectionnée
                        $sql = "SELECT id_med, nom_med, prenom_med FROM medecin WHERE id_spec = ?";
                        $sql_req = $conn->prepare($sql);
                        $sql_req->bindParam($specId);
                        $sql_req->execute();

                        // Affichage des médecins dans le menu déroulant
                        while ($row = $sql_req->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option value='" . $row["id_med"] . "'>" . $row["nom_med"] . " " . $row["prenom_med"] . "</option>";
                        }
                    } catch (PDOException $e) {
                        echo "Erreur de connexion à la base de données : " . $e->getMessage();
                    } finally {
                        // Fermeture de la connexion à la base de données
                        $conn = null;
                    }
                }
            ?>
        </select><br><br>

        <input type="submit" value="Prendre Rendez-vous">
    </form>
    </div>
    </div>
    <footer>
        <p>Ce service de prise de rendez-vous médical en ligne vous permet de planifier facilement vos consultations avec nos médecins qualifiés. Remplissez le formulaire ci-dessus en sélectionnant la date, l'heure et le médecin de votre choix, puis cliquez sur "Prendre Rendez-vous". Nous vous contacterons pour confirmer votre rendez-vous. Merci de nous faire confiance pour votre santé.</p>
    </footer>
</body>
</html>
