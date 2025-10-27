<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <?php
    include 'header.php';
    ?>
    
    <div class="container mt-5">
        <h1>Admin Profile</h1>
        <form>
            <div class="form-group">
                <label for="username">Nom d'utilisateur:</label>
                <input type="text" class="form-control" id="username" value="admin" readonly>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe:</label>
                <input type="password" class="form-control" id="password" value="admin123" readonly>
            </div>
            <button type="button" class="btn btn-primary" onclick="editProfile()">Modifier</button>
        </form>
    </div>

    <!-- Script pour activer l'édition -->
    <script>
        function editProfile() {
            document.getElementById("username").readOnly = false;
            document.getElementById("password").readOnly = false;
            document.getElementById("username").focus();
            document.getElementsByClassName("btn-primary")[0].innerText = "Enregistrer";
            document.getElementsByClassName("btn-primary")[0].setAttribute("onclick", "saveProfile()");
        }

        function saveProfile() {
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;
            
            // Ici, on peut ajouter le code pour enregistrer les modifications dans la base de données
            
            document.getElementById("username").readOnly = true;
            document.getElementById("password").readOnly = true;
            document.getElementsByClassName("btn-primary")[0].innerText = "Modifier";
            document.getElementsByClassName("btn-primary")[0].setAttribute("onclick", "editProfile()");
        }
    </script>
</body>
</html>
