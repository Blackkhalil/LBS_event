<?php
/**
 * Event Model
 * Handles event management
 */

require_once __DIR__ . '/../config/database.php';

class Event {
    private $conn;
    
    public function __construct() {
        $this->conn = getDbConnection();
    }
    
    /**
     * Create a new event
     */
    public function create($data) {
        $stmt = $this->conn->prepare("
            INSERT INTO evenement (nom, partenaire, created_at, update_at, admin_idadmin, super_admin_idsuper_admin) 
            VALUES (?, ?, NOW(), NOW(), ?, ?)
        ");
        
        $stmt->bind_param(
            "ssii", 
            $data['nom'], 
            $data['partenaire'], 
            $data['admin_id'], 
            $data['super_admin_id']
        );
        
        if ($stmt->execute()) {
            return ['success' => true, 'id' => $this->conn->insert_id];
        } else {
            return ['success' => false, 'message' => $stmt->error];
        }
    }
    
    /**
     * Get all events
     */
    public function getAll($adminId = null, $userType = 'admin') {
        $query = "SELECT e.*, 
                         a.nom as admin_nom, a.prenom as admin_prenom,
                         sa.nom as super_admin_nom, sa.prenom as super_admin_prenom
                  FROM evenement e
                  LEFT JOIN admin a ON e.admin_idadmin = a.idadmin
                  LEFT JOIN super_admin sa ON e.super_admin_idsuper_admin = sa.idsuper_admin";
        
        if ($adminId !== null) {
            if ($userType === 'super_admin') {
                $query .= " WHERE e.super_admin_idsuper_admin = ?";
            } else {
                $query .= " WHERE e.admin_idadmin = ?";
            }
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("i", $adminId);
        } else {
            $stmt = $this->conn->prepare($query);
        }
        
        $stmt->execute();
        $result = $stmt->get_result();
        
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    /**
     * Get event by ID
     */
    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM evenement WHERE idevenement = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        return $result->fetch_assoc();
    }
    
    /**
     * Update event
     */
    public function update($id, $data) {
        $stmt = $this->conn->prepare("
            UPDATE evenement 
            SET nom = ?, partenaire = ?, update_at = NOW() 
            WHERE idevenement = ?
        ");
        
        $stmt->bind_param("ssi", $data['nom'], $data['partenaire'], $id);
        
        return $stmt->execute();
    }
    
    /**
     * Delete event
     */
    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM evenement WHERE idevenement = ?");
        $stmt->bind_param("i", $id);
        
        return $stmt->execute();
    }
}

