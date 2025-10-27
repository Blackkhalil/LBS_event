<?php
/**
 * Authentication Controller
 * Handles login, registration, and session management
 */

require_once __DIR__ . '/../models/User.php';

class AuthController {
    private $userModel;
    
    public function __construct() {
        $this->userModel = new User();
    }
    
    /**
     * Handle user login
     */
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $password = $_POST['password'];
            
            if (empty($email) || empty($password)) {
                return ['success' => false, 'message' => 'Tous les champs sont requis'];
            }
            
            $result = $this->userModel->login($email, $password);
            
            if ($result['success']) {
                // Start session
                session_start();
                $_SESSION['user_id'] = $result['id'];
                $_SESSION['user_type'] = $result['type'];
                $_SESSION['user_nom'] = $result['nom'];
                $_SESSION['user_prenom'] = $result['prenom'];
                $_SESSION['user_email'] = $result['email'];
                
                // Redirect based on user type
                $redirectUrl = ($result['type'] === 'super_admin') 
                    ? '/public/index_super_admin.php' 
                    : '/public/index_admin.php';
                
                header('Location: ' . $redirectUrl);
                exit();
            }
            
            return $result;
        }
        
        return ['success' => false, 'message' => 'Méthode non autorisée'];
    }
    
    /**
     * Handle user registration
     */
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
            $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $password = $_POST['mot_de_passe'];
            $confirmPassword = $_POST['confirm_password'];
            
            // Validate inputs
            if (empty($nom) || empty($prenom) || empty($email) || empty($password)) {
                return ['success' => false, 'message' => 'Tous les champs sont requis'];
            }
            
            if ($password !== $confirmPassword) {
                return ['success' => false, 'message' => 'Les mots de passe ne correspondent pas'];
            }
            
            if (strlen($password) < 6) {
                return ['success' => false, 'message' => 'Le mot de passe doit contenir au moins 6 caractères'];
            }
            
            // Determine user type (default to admin for now)
            $userType = 'admin';
            
            $result = $this->userModel->register($nom, $prenom, $email, $password, $userType);
            
            if ($result['success']) {
                header('Location: /public/login.php');
                exit();
            }
            
            return $result;
        }
        
        return ['success' => false, 'message' => 'Méthode non autorisée'];
    }
    
    /**
     * Handle user logout
     */
    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        
        header('Location: /public/login.php');
        exit();
    }
    
    /**
     * Check if user is logged in
     */
    public function isLoggedIn() {
        session_start();
        return isset($_SESSION['user_id']);
    }
    
    /**
     * Require authentication
     */
    public function requireAuth() {
        if (!$this->isLoggedIn()) {
            header('Location: /public/login.php');
            exit();
        }
    }
    
    /**
     * Get current user
     */
    public function getCurrentUser() {
        if (!$this->isLoggedIn()) {
            return null;
        }
        
        return [
            'id' => $_SESSION['user_id'],
            'type' => $_SESSION['user_type'],
            'nom' => $_SESSION['user_nom'],
            'prenom' => $_SESSION['user_prenom'],
            'email' => $_SESSION['user_email']
        ];
    }
}

