<?php
/**
 * Login Page
 * LBS Events - Event Management System
 */

require_once __DIR__ . '/../src/config/database.php';
require_once __DIR__ . '/../src/controllers/AuthController.php';

$authController = new AuthController();
$error = null;

// Check if already logged in
if ($authController->isLoggedIn()) {
    $user = $authController->getCurrentUser();
    $redirectUrl = ($user['type'] === 'super_admin') 
        ? '/public/index_super_admin.php' 
        : '/public/index_admin.php';
    header('Location: ' . $redirectUrl);
    exit();
}

// Handle login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = $authController->login();
    if (!$result['success']) {
        $error = $result['message'];
    }
}

$pageTitle = 'Connexion';

ob_start();
?>

<div class="login-container">
    <div class="login-card">
        <h2>Connexion</h2>
        
        <?php if ($error): ?>
            <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>
        
        <form method="POST" action="">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" 
                       class="form-control" 
                       id="email" 
                       name="email" 
                       required 
                       autofocus
                       placeholder="votre@email.com">
            </div>
            
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" 
                       class="form-control" 
                       id="password" 
                       name="password" 
                       required
                       placeholder="••••••••">
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">
                    Se connecter
                </button>
            </div>
            
            <div class="text-center mt-3">
                <p>Vous n'avez pas de compte ? 
                    <a href="/public/register.php" class="text-primary">S'inscrire</a>
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

