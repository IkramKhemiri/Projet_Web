<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Réservation</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

h2 {
    text-align: center;
    color: #333;
}

.form-container {
    width: 50%;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    margin-bottom: 5px;
    color: #333;
}

input[type="text"],
input[type="date"],
input[type="submit"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
    box-sizing: border-box;
}

input[type="submit"] {
    background-color: #007bff;
    color: #fff;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}
</style>
<body>
    <h2>Modifier Réservation</h2>
    <form action="modifier_reservation.php" method="post" class="form-container">
        <label for="id_reservation">ID Réservation :</label><br>
        <input type="text" id="id_reservation" name="id_reservation" required><br><br>
        
        <label for="nouvelle_date_depart">Nouvelle Date de Départ :</label><br>
        <input type="date" id="nouvelle_date_depart" name="nouvelle_date_depart" required><br><br>
        
        <label for="nouvelle_date_retour">Nouvelle Date de Retour :</label><br>
        <input type="date" id="nouvelle_date_retour" name="nouvelle_date_retour" required><br><br>
        
        <input type="submit" value="Modifier">
    </form>
</body>
</html>

<?php
// Connexion à la base de données
try {
    $bdd = new PDO('mysql:host=localhost;dbname=reservation', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
    exit();
}

// Vérification si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $id_reservation = $_POST["id_reservation"];
    $nouvelle_date_depart = $_POST["nouvelle_date_depart"];
    $nouvelle_date_retour = $_POST["nouvelle_date_retour"];

    // Requête SQL pour mettre à jour les dates de départ et d'arrivée de la réservation
    $sql = "UPDATE reservation SET date_depart = :nouvelle_date_depart, date_retour = :nouvelle_date_retour WHERE id = :id_reservation";

    try {
        // Préparation de la requête
        $stmt = $bdd->prepare($sql);
        // Liaison des paramètres
        $stmt->bindParam(':id_reservation', $id_reservation);
        $stmt->bindParam(':nouvelle_date_depart', $nouvelle_date_depart);
        $stmt->bindParam(':nouvelle_date_retour', $nouvelle_date_retour);
        // Exécution de la requête
        $stmt->execute();
        
        // Redirection vers une page de confirmation
        echo"reservation modifiée avec succès";
        exit();
    } catch(PDOException $e) {
        echo "Erreur lors de la modification de la réservation : " . $e->getMessage();
        exit();
    }
}
?>
