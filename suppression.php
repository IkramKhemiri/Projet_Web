
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suppression de Réservation</title>
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

form {
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
input[type="email"],
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
    <h2>Suppression de Réservation</h2>
    <form action="suppression.php" method="post">
        <label for="nom">Nom :</label><br>
        <input type="text" id="nom" name="nom" required><br><br>
        
        <label for="email">Email :</label><br>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="destination">Destination :</label><br>
        <input type="text" id="destination" name="destination" required><br><br>
        
        <input type="submit" value="Supprimer">
    </form>
</body>
</html>
<?php
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "reservation";

   try {
       $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
       $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
    exit();
}

// Vérification si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $nom = $_POST["nom"];
    $email = $_POST["email"];
    $destination = $_POST["destination"];

    // Requête SQL pour supprimer la réservation
    $sql = "DELETE FROM reservation WHERE nom = :nom AND email = :email AND destination = :destination";

    try {
        // Préparation de la requête
        $stmt = $conn->prepare($sql);
        // Liaison des paramètres
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':destination', $destination);
        // Exécution de la requête
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            // La réservation a été supprimée avec succès
           echo"Réservation supprimée avec succès";
           
            exit();
        } else {
            // La réservation n'existe pas dans la base de données
            echo "<script>alert('La réservation à supprimer n\'existe pas.');</script>";
            
            

            
            exit();
        }
        exit();
    } catch(PDOException $e) {
        echo "Erreur lors de la suppression de la réservation : " . $e->getMessage();
        exit();
    }
}
?>
