<?php
/**
 * Register Page
 * LBS Events - Event Management System
 */

require_once __DIR__ . '/../src/config/database.php';
require_once __DIR__ . '/../src/controllers/AuthController.php';

$authController = new AuthController();
$error = null;
$success = null;

// Handle registration
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = $authController->register();
    
    if ($result['success']) {
        $success = 'Inscription réussie ! Vous pouvez maintenant vous connecter.';
    } else {
        $error = $result['message'];
    }
}

$pageTitle = 'Inscription';

ob_start();
?>

<div class="login-container">
    <div class="login-card">
        <h2>Créer un compte</h2>
        
        <?php if ($error): ?>
            <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>
        
        <?php if ($success): ?>
            <div class="alert alert-success"><?php echo htmlspecialchars($success); ?></div>
        <?php endif; ?>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" 
                       class="form-control" 
                       id="nom" 
                       name="nom" 
                       required 
                       autofocus
                       placeholder="Votre nom">
            </div>
            
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" 
                       class="form-control" 
                       id="prenom" 
                       name="prenom" 
                       required
                       placeholder="Votre prénom">
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" 
                       class="form-control" 
                       id="email" 
                       name="email" 
                       required
                       placeholder="votre@email.com">
            </div>
            
            <div class="form-group">
                <label for="mot_de_passe">Mot de passe</label>
                <input type="password" 
                       class="form-control" 
                       id="mot_de_passe" 
                       name="mot_de_passe" 
                       required
                       minlength="6"
                       placeholder="Au moins 6 caractères">
            </div>
            
            <div class="form-group">
                <label for="confirm_password">Confirmer le mot de passe</label>
                <input type="password" 
                       class="form-control" 
                       id="confirm_password" 
                       name="confirm_password" 
                       required
                       placeholder="Confirmez votre mot de passe">
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">
                    S'inscrire
                </button>
            </div>
            
            <div class="text-center mt-3">
                <p>Vous avez déjà un compte ? 
                    <a href="/public/login.php" class="text-primary">Se connecter</a>
                </p>
            </div>
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/../src/includes/header.php';
echo $content;
include __DIR__ . '/../src/includes/footer.php';
?>

