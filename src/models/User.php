<?php
/**
 * User Model
 * Handles user authentication and management
 */

require_once __DIR__ . '/../config/database.php';

class User {
    private $conn;
    
    public function __construct() {
        $this->conn = getDbConnection();
    }
    
    /**
     * Register a new user
     */
    public function register($nom, $prenom, $email, $password, $userType = 'admin') {
        // Hash password securely
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        // Check if user already exists
        if ($this->userExists($email)) {
            return ['success' => false, 'message' => 'Cet email est déjà enregistré'];
        }
        
        // Determine table based on user type
        $table = ($userType === 'super_admin') ? 'super_admin' : 'admin';
        $idField = ($userType === 'super_admin') ? 'idsuper_admin' : 'idadmin';
        
        $stmt = $this->conn->prepare("INSERT INTO $table (nom, prenom, email, `mot de passe`) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nom, $prenom, $email, $hashedPassword);
        
        if ($stmt->execute()) {
            return ['success' => true, 'message' => 'Inscription réussie'];
        } else {
            return ['success' => false, 'message' => 'Erreur lors de l\'inscription'];
        }
    }
    
    /**
     * Login user
     */
    public function login($email, $password) {
        // Try super_admin first
        $stmt = $this->conn->prepare("SELECT idsuper_admin as id, nom, prenom, email, `mot de passe` FROM super_admin WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['mot de passe'])) {
                return [
                    'success' => true,
                    'type' => 'super_admin',
                    'id' => $user['id'],
                    'nom' => $user['nom'],
                    'prenom' => $user['prenom'],
                    'email' => $user['email']
                ];
            }
        }
        
        // Try admin
        $stmt = $this->conn->prepare("SELECT idadmin as id, nom, prenom, email, `mot de passe` FROM admin WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['mot de passe'])) {
                return [
                    'success' => true,
                    'type' => 'admin',
                    'id' => $user['id'],
                    'nom' => $user['nom'],
                    'prenom' => $user['prenom'],
                    'email' => $user['email']
                ];
            }
        }
        
        return ['success' => false, 'message' => 'Email ou mot de passe incorrect'];
    }
    
    /**
     * Check if user exists
     */
    private function userExists($email) {
        // Check in both tables
        $stmt1 = $this->conn->prepare("SELECT * FROM admin WHERE email = ?");
        $stmt1->bind_param("s", $email);
        $stmt1->execute();
        
        if ($stmt1->get_result()->num_rows > 0) {
            return true;
        }
        
        $stmt2 = $this->conn->prepare("SELECT * FROM super_admin WHERE email = ?");
        $stmt2->bind_param("s", $email);
        $stmt2->execute();
        
        return $stmt2->get_result()->num_rows > 0;
    }
    
    /**
     * Get user by ID
     */
    public function getUserById($id, $userType) {
        $table = ($userType === 'super_admin') ? 'super_admin' : 'admin';
        $idField = ($userType === 'super_admin') ? 'idsuper_admin' : 'idadmin';
        
        $stmt = $this->conn->prepare("SELECT * FROM $table WHERE $idField = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        return $result->fetch_assoc();
    }
}

