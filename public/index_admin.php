<?php
/**
 * Admin Dashboard
 * LBS Events - Event Management System
 */

session_start();
require_once __DIR__ . '/../src/config/database.php';
require_once __DIR__ . '/../src/controllers/AuthController.php';

$authController = new AuthController();
$authController->requireAuth();

$user = $authController->getCurrentUser();

$pageTitle = 'Tableau de bord - Admin';

ob_start();
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h2 class="mb-4">Bienvenue, <?php echo htmlspecialchars($user['prenom'] . ' ' . $user['nom']); ?>!</h2>
            <p class="lead">Bienvenue sur LBS Event, le site de gestion des événements de Lomé Business School !</p>
            <p class="mb-4">Lomé Business School est fière de vous présenter son tout nouveau site de gestion des événements. Cette plateforme a été conçue pour vous faciliter la planification, l'organisation et la gestion de vos événements, qu'il s'agisse de conférences, d'ateliers, de séminaires ou de tout autre type de rassemblement.</p>
        </div>
    </div>
    
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Mes Événements</h5>
                    <a href="pages/evenements.php" class="btn btn-primary">Voir mes événements</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Ajouter un Événement</h5>
                    <a href="pages/ajouter-evenement.php" class="btn btn-primary">Nouvel événement</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Historique</h5>
                    <a href="pages/historique.php" class="btn btn-primary">Voir historique</a>
                </div>
            </div>
        </div>
    </div>
    
    <h3 class="mb-4">Nos Partenaires</h3>
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="assets/images/Logo_esilv_png_blanc.png" class="card-img-top" alt="ESILV">
                <div class="card-body">
                    <h5 class="card-title">ESILV</h5>
                    <p class="card-text">L'École supérieure d'ingénieurs Léonard-de-Vinci est l'une des 204 écoles d'ingénieurs françaises accréditées au 1ᵉʳ septembre 2020 à délivrer un diplôme d'ingénieur.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="assets/images/boa-togo-logo.png" class="card-img-top" alt="BOA Togo">
                <div class="card-body">
                    <h5 class="card-title">BOA Togo</h5>
                    <p class="card-text">BOA Express est le service de transfert d'argent du Groupe BANK OF AFRICA.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="assets/images/photo_2024-03-04_19-31-21.jpg" class="card-img-top" alt="Intello">
                <div class="card-body">
                    <h5 class="card-title">INTELLO</h5>
                    <p class="card-text">Partenaire technologique innovant.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/../src/includes/header.php';
echo $content;
include __DIR__ . '/../src/includes/footer.php';
?>

