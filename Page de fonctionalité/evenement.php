<?php
// Inclure le fichier de connexion à la base de données
include 'connexion.php';

// Vérifions si l'utilisateur est connecté
session_start();
if (isset($_SESSION['admin_id'])) {
    $admin_id = $_SESSION['admin_id'];
} else {
    // Si l'utilisateur n'est pas connecté, redirigez-le vers la page de connexion
    header("Location: login.php");
    exit();
}

// Requête SQL pour récupérer tous les événements
$sql = "SELECT * FROM evenement WHERE admin_idadmin = '$admin_id'";
$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des événements</title>
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
        <h2 class="text-center mb-4">Liste des événements</h2>
        <?php if (mysqli_num_rows($result) > 0): ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nom de l'événement</th>
                        <th>Catégorie</th>
                        <th>Date</th>
                        <th>Lieu</th>
                        <th>Partenaire</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['nom_evenement']); ?></td>
                            <td><?php echo htmlspecialchars($row['categorie']); ?></td>
                            <td><?php echo htmlspecialchars($row['date']); ?></td>
                            <td><?php echo htmlspecialchars($row['lieu']); ?></td>
                            <td><?php echo htmlspecialchars($row['partenaire']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="text-center">Aucun événement trouvé.</p>
        <?php endif; ?>
    </div>

    <!-- Chargement des fichiers JavaScript de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7WQhUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
