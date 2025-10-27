<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>En savoir plus</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 40px 20px;
        }
        h1 {
            color: #007bff;
            text-align: center;
            margin-bottom: 30px;
        }
        .card {
            border: none;
            transition: all 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .card-title {
            color: #007bff;
            font-size: 24px;
            margin-bottom: 15px;
        }
        .card-text {
            color: #555;
            font-size: 16px;
            line-height: 1.6;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>
<body>
<?php
    include 'header.php';
    ?>
<div class="container">
    <h1>En savoir plus sur LBS Event</h1>

    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Notre Mission</h5>
            <p class="card-text">Chez LBS Event, notre mission est de fournir une plateforme de gestion d'événements intuitive et puissante pour répondre aux besoins de planification et d'organisation des entreprises et des organisations.</p>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Nos Services</h5>
            <p class="card-text">Nous offrons une gamme complète de services pour la gestion d'événements, y compris la planification, la promotion, la billetterie, la gestion des participants et bien plus encore. Notre objectif est de simplifier le processus pour que vous puissiez vous concentrer sur la réussite de votre événement.</p>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Pourquoi Choisir LBS Event ?</h5>
            <p class="card-text">Avec notre plateforme conviviale, notre équipe dévouée et nos fonctionnalités avancées, nous sommes le choix idéal pour tous vos besoins en matière de gestion d'événements. Rejoignez-nous dès aujourd'hui et découvrez la différence LBS Event.</p>
        </div>
    </div>

   
</div>

</body>
</html>
