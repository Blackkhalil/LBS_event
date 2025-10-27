<?php
/**
 * Add Event Page
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
$success = null;
$error = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'nom' => filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING),
        'partenaire' => filter_input(INPUT_POST, 'partenaire', FILTER_SANITIZE_STRING),
        'admin_id' => $user['type'] === 'admin' ? $user['id'] : null,
        'super_admin_id' => $user['type'] === 'super_admin' ? $user['id'] : 1
    ];
    
    $result = $eventModel->create($data);
    
    if ($result['success']) {
        $success = 'Événement ajouté avec succès!';
    } else {
        $error = 'Erreur lors de l\'ajout de l\'événement.';
    }
}

$pageTitle = 'Ajouter un Événement';

ob_start();
?>

<div class="container mt-4">
    <h2 class="mb-4">Ajouter un Événement</h2>
    
    <?php if ($success): ?>
        <div class="alert alert-success"><?php echo htmlspecialchars($success); ?></div>
    <?php endif; ?>
    
    <?php if ($error): ?>
        <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
    <?php endif; ?>
    
    <form method="POST">
        <div class="form-group">
            <label for="nom">Nom de l'événement</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
        </div>
        
        <div class="form-group">
            <label for="partenaire">Partenaire</label>
            <select class="form-control" id="partenaire" name="partenaire" required>
                <option value="ESILV">ESILV</option>
                <option value="BOA Togo">BOA Togo</option>
                <option value="Intello">Intello</option>
            </select>
        </div>
        
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Ajouter l'événement</button>
            <a href="evenements.php" class="btn btn-secondary">Annuler</a>
        </div>
    </form>
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/../../src/includes/header.php';
echo $content;
include __DIR__ . '/../../src/includes/footer.php';
?>

