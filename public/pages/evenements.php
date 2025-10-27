<?php
/**
 * Events List Page
 * LBS Events - Event Management System
 */

session_start();
require_once __DIR__ . '/../../src/config/database.php';
require_once __DIR__ . '/../../src/models/Event.php';
require_once __DIR__ . '/../../src/controllers/AuthController.php';

$authController = new AuthController();
$authController->requireAuth();

$user = $authController->getCurrentUser();

$eventModel = new Event();
$events = $eventModel->getAll($user['id'], $user['type']);

$pageTitle = 'Mes Événements';

ob_start();
?>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Mes Événements</h2>
        <a href="ajouter-evenement.php" class="btn btn-primary">
            <i class="fas fa-plus"></i> Ajouter un événement
        </a>
    </div>
    
    <?php if (count($events) > 0): ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Partenaire</th>
                    <th>Créé le</th>
                    <th>Modifié le</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($events as $event): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($event['nom']); ?></td>
                        <td><?php echo htmlspecialchars($event['partenaire']); ?></td>
                        <td><?php echo htmlspecialchars($event['created_at']); ?></td>
                        <td><?php echo htmlspecialchars($event['update_at']); ?></td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary">Modifier</button>
                            <button class="btn btn-sm btn-outline-danger">Supprimer</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-info">
            <p>Aucun événement trouvé. <a href="ajouter-evenement.php">Créer votre premier événement</a></p>
        </div>
    <?php endif; ?>
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/../../src/includes/header.php';
echo $content;
include __DIR__ . '/../../src/includes/footer.php';
?>

