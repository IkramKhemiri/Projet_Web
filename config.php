<?php

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "hotels"; 

try {
    // Connexion à la base de données MySQL en utilisant PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Configuration des options de PDO pour afficher les erreurs
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion réussie!";
} catch(PDOException $e) {
    // En cas d'erreur de connexion, afficher le message d'erreur
    echo "Connexion échouée : " . $e->getMessage();
}
?>

