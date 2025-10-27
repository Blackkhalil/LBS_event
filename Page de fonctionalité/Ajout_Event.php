<?php
// Inclure le fichier de connexion à la base de données
include 'connexion.php';

// Vérifions si l'utilisateur est connecté et récupérer son identifiant
session_start();
if (isset($_SESSION['admin_id'])) {
    $admin_id = $_SESSION['admin_id'];

    // Assurons nous que les données sont envoyées via la méthode POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Échapper les entrées utilisateur pour éviter les attaques par injection SQL
        $nom_evenement = mysqli_real_escape_string($con, $_POST['nom_evenement']);
        $partenaire = mysqli_real_escape_string($con, $_POST['partenaire']);
        $date = $_POST['date'];
        $lieu = mysqli_real_escape_string($con, $_POST['lieu']); // Assurez-vous d'échapper cette entrée aussi

        // Requête SQL pour insérer les données dans la table "evenement"
        $sql = "INSERT INTO evenement (nom_evenement, partenaire, date, lieu, admin_idadmin) VALUES ('$nom_evenement', '$partenaire', '$date', '$lieu', '$admin_id')";
        
        // Exécution de la requête
        $result = mysqli_query($con, $sql);
        
        // Vérifions si l'insertion a réussi
        if ($result) {
            // Redirection vers la page "Evenement"
            header("Location: Evenement.php");
            exit();
        } else {
            echo "Erreur lors de l'ajout de l'événement: " . mysqli_error($con);
        }
    }
} else {
    echo "Vous devez être connecté pour ajouter un événement.";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un événement</title>
    <!-- Chargement des fichiers CSS de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- CSS personnalisé -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- En-tête -->
    <?php include 'header.php'; ?>

    <!-- Contenu principal -->
    <div class="container mt-5">
        <h2 class="text-center mb-4">Ajouter un événement</h2>
        <!-- Formulaire d'ajout d'événement -->
        <form method="post">
            <div class="form-group">
                <label for="nom">Nom de l'événement:</label>
                <input type="text" class="form-control" id="nom" name="nom_evenement" required>
            </div>
            <div class="form-group">
                <label for="categorie">Catégorie:</label>
                <input type="text" class="form-control" id="categorie" name="categorie" required>
            </div>
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>
            <div class="form-group">
                <label for="lieu">Lieu:</label>
                <input type="text" class="form-control" id="lieu" name="lieu" required>
            </div>
            <div class="form-group">
                <label for="partenaire">Partenaire:</label>
                <select id="partenaire" class="form-control" name="partenaire" required>
                    <option value="partenaire1">Partenaire 1</option>
                    <option value="partenaire2">Partenaire 2</option>
                    <!-- Ajoutons ici les autres options pour les partenaires -->
                </select>
            </div>
            <!-- Bouton de soumission du formulaire -->
            <button type="submit" class="btn btn-primary" name="connect">Ajouter</button>
        </form>
    </div>

    <!-- Chargement des fichiers JavaScript de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7WQhUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
