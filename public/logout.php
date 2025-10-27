<?php
/**
 * Logout Page
 * LBS Events - Event Management System
 */

require_once __DIR__ . '/../src/controllers/AuthController.php';

$authController = new AuthController();
$authController->logout();

