<?php
// Configuration de la base de données
$host = 'localhost'; // Adresse du serveur
$db   = 'mvc_todo'; // Nom de la base de données
$user = 'root'; // Nom d'utilisateur (par défaut pour WAMP/XAMPP)
$pass = ''; // Mot de passe (par défaut vide pour WAMP/XAMPP)

// Créer une connexion à la base de données
try {
    $pdo = new PDO("mysql:host=$host", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Création de la base de données
    $pdo->exec("CREATE DATABASE IF NOT EXISTS $db");
    echo "Base de données '$db' créée avec succès.<br>";

    // Sélectionner la base de données
    $pdo->exec("USE $db");

    // Création de la table des tâches
    $pdo->exec("CREATE TABLE IF NOT EXISTS tasks (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        description TEXT,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");
    echo "Table 'tasks' créée avec succès.";

} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

// Fermer la connexion
$pdo = null;
?>
