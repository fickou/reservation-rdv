<div class="agend" onmouseover="showForm()" onmouseleave="hideForm()">Nouveau Agenda</div>
    <div class="form-container" id="formContainer">
        <form action="traitement_med.php" method="POST"> 
            <div class="input-group">
                <label for="date">Jour debut</label><br>
                <input type="date" id="jour_d" name="jour_d" required>
            </div>

            <div class="input-group">
                <label for="date">Jour fin</label><br>
                <input type="date" id="jour_f" name="jour_f" required>
            </div>

            <div class="input-group">
                <label for="time">Heure debut</label><br>
                <input type="time" id="heure_d" name="heure_d" required>
            </div>

            <div class="input-group">
                <label for="time">Heure fin</label><br>
                <input type="time" id="heure_f" name="heure_f" required>
            </div>

            <div class="input-group">
                <label for="time">Temps de consultation</label><br>
                <input type="time" id="temps_c" name="temps_c" required>
            </div>
            <button name="btn-valide" type="submit" class="enregist">Valider</button>
        </form>
    </div>

    <script>
        function showForm() {
            var formContainer = document.getElementById("formContainer");
            formContainer.style.display = "block";
        }

        function hideForm() {
            var formContainer = document.getElementById("formContainer");
            formContainer.style.display = "none";
        }
    </script>