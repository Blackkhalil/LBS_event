<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partenaires - Lome Business School</title>
    <!-- Chargement du fichier CSS de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

<?php
    include 'header.php';
    ?>

<!-- Contenu principal -->
<div class="container mt-4">
    <h2 class="mb-4">Nos partenaires</h2>
    <!-- Grille Bootstrap pour afficher les partenaires -->
    <div class="row">
        <!-- Colonne pour chaque partenaire (taille md-4) -->
        <div class="col-md-4 mb-4">
            <!-- Carte Bootstrap pour présenter le partenaire -->
            <div class="card">
                <!-- Image du partenaire -->
                <img src="../Image/Logo_esilv_png_blanc.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <!-- Titre du partenaire -->
                    <h5 class="card-title">ESILV</h5>
                    <!-- Description du partenaire -->
                    <p class="card-text">L'École supérieure d'ingénieurs Léonard-de-Vinci est l'une des 204 écoles d'ingénieurs françaises accréditées au 1ᵉʳ septembre 2020 à délivrer un diplôme d'ingénieur. Membre de la Conférence des grandes écoles.</p>
                    <!-- Lien pour en savoir plus -->
                    <a href="#" class="btn btn-primary">En savoir plus</a>
                    <!-- Cadre pour l'évolution de l'événement -->
                    <div class="event-progress mt-2">
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
                        </div>
                        <div class="event-status mt-2">
                            <span class="badge badge-success">En cours</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ajoutez autant de col-md-4 que nécessaire pour afficher tous les partenaires -->
        <!-- Colonne pour chaque partenaire (taille md-4) -->
        <div class="col-md-4 mb-4">
            <!-- Carte Bootstrap pour présenter le partenaire -->
            <div class="card">
                <!-- Image du partenaire -->
                <img src="../Image/boa-togo-logo.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <!-- Titre du partenaire -->
                    <h5 class="card-title">BOA togo</h5>
                    <!-- Description du partenaire -->
                    <p class="card-text">BOA Express est le service de transfert d'argent du Groupe BANK OF AFRICA.</p>
                    <!-- Lien pour en savoir plus -->
                    <a href="#" class="btn btn-primary">En savoir plus</a>
                    <!-- Cadre pour l'évolution de l'événement -->
                    <div class="event-progress mt-2">
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                        </div>
                        <div class="event-status mt-2">
                            <span class="badge badge-warning">En attente</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ajoutez autant de col-md-4 que nécessaire pour afficher tous les partenaires -->
    </div>
</div>

<!-- Pied de page -->
<footer class="bg-dark text-white text-center py-4 mt-4">
    <!-- Texte de copyright -->
    <p>&copy; 2024 LBS Event</p>
</footer>

<!-- Chargement des fichiers JavaScript de Bootstrap -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
