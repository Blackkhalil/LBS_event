<?php
session_start();
include 'connexion.php';

if (isset($_POST['connect'])) {
    $email = $_POST['login_email']; 
    $password = $_POST['login_password']; 

    $stmt_super_admin = $con->prepare("SELECT * FROM super_admin WHERE email = ?");
    $stmt_super_admin->bind_param("s", $email);
    $stmt_super_admin->execute();
    $result_super_admin = $stmt_super_admin->get_result();

    if ($result_super_admin->num_rows > 0) {
        $row = $result_super_admin->fetch_assoc();
        if ($password === $row["mot de passe"]) { 
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            header('location:../Acceuil/index_super_admin.php');
            exit(); 
        } else {
            echo showAlert("Nom d'utilisateur ou mot de passe incorrect");
        }
    } else {
        $stmt_admin = $con->prepare("SELECT * FROM admin WHERE email = ?");
        $stmt_admin->bind_param("s", $email);
        $stmt_admin->execute();
        $result_admin = $stmt_admin->get_result();

        if ($result_admin->num_rows > 0) {
            $row = $result_admin->fetch_assoc();
            if ($password === $row["mot de passe"]) { 
                $_SESSION["login"] = true;
                $_SESSION["id"] = $row["id"];
                header('location:../Acceuil/index_admin.php');
                exit(); 
            } else {
                echo showAlert("Nom d'utilisateur ou mot de passe incorrect");
            }
        } else {
            echo showAlert("Utilisateur non enregistré");
        }
    }
}

function showAlert($message) {
    return '<div class="alert alert-danger d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                <div>' . $message . '</div>
            </div>';
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion & Inscription</title>
    
    <link rel="stylesheet" href="login.css">
</head>
<body>
  
    <div class="container">
        <div class="login-form">
            <h3>Bienvenue sur LBS Event, le site de gestion des événements de Lomé Business School ! </h3>
            <p>Lomé Business School est fière de vous présenter son tout nouveau site de gestion des événements. Cette plateforme a été conçue pour vous faciliter la planification, l'organisation et la gestion de vos événements, qu'il s'agisse de conférences, d'ateliers, de séminaires ou de tout autre type de rassemblement.</p>
            <form method="POST">
                <div class="form-group">
                    <label for="login_email"></label>
                    <input type="email" id="login_email" name="login_email" placeholder="E-mail" required>
                </div>
                <div class="form-group">
                    <label for="login_password"></label>
                    <input type="password" id="login_password" name="login_password" placeholder="Password">
                </div>
                <button type="submit" name="connect">Valider</button>
                <div class="P">
                    <p>Vous n'aviez pas de Compte LBS Event ? Enregistrez-vous</p> <a class="nav-link" href="../Page de fonctionalité/register.php">Inscription</a>
                </div>
            </form>
            <div class="slidebar">
                <div class="slidebar-img">
                    <img src="../Image/pop-up.webp"  alt="">
                </div>
            </div>
        </div>
    </div>
</body>
</html>
