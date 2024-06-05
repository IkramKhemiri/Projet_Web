<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation de voyage</title>
    <style>
body {
font-family: Arial, sans-serif;
background-color: #f4f4f4;

}

.container {
    max-width: 200px; /* Réduire la largeur du formulaire */
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: #45a049;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    color: #333;
    text-align: center;
}

form {
    margin-top: 20px;
    text-align: center; /* Centrer les éléments du formulaire */
}

label {
    display: block;
    margin-bottom: 8px;
    color: #333;
}

input[type="text"],
input[type="email"],
input[type="date"],
input[type="number"],
select {
    width: calc(100% - 20px);
    padding: 10px;
    margin-bottom: 10px; /* Espacement entre les champs */
    border: 1px solid #ccc;
    border-radius: 5px;
}

input[type="submit"] {
    width: 40%; /* Taille du bouton */
    padding: 10px;
    background-color: #4caf50;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

</style>
</head>
<body>

<section id="reservation">
    <h2>Réservation de voyage</h2>
    <?php
    // Vérifier si la destination est spécifiée dans les paramètres GET
    if (isset($_GET['destination'])) {
        $destination = $_GET['destination'];
        // Afficher le formulaire de réservation pour la destination spécifiée
        echo "<p>Réservez votre voyage à $destination :</p>";
        // Inclure le formulaire de réservation
    ?>
    <form action="reservation.php" method="post" >
        <label for="nom">Nom :</label><br>
        <input type="text" id="nom" name="nom" required><br><br>

        <label for="email">Email :</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <input type="hidden" name="destination" value="<?php echo $destination; ?>">

        <label for="date_depart">Date de départ :</label><br>
        <input type="date" id="date_depart" name="date_depart" required><br><br>
        <label for="date_retour">Date de retour :</label><br>
        <input type="date" id="date_retour" name="date_retour" required><br><br>

        <label for="nombre_personnes">Nombre de personnes :</label><br>
        <input type="number" id="nombre_personnes" name="nombre_personnes" min="1" required><br><br>

        <input type="submit" value="Réserver">
    </form>
    <?php
    } else {
        // Si la destination n'est pas spécifiée, afficher un message d'erreur
        echo "<p>La destination n'est pas spécifiée.</p>";
    }
    ?>
    <?php
// Vérification si le formulaire est soumis
if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    // Vérification des champs requis
    if (empty($_POST['nom']) || empty($_POST['email']) || empty($_POST['destination']) || empty($_POST['date_depart']) || empty($_POST['date_retour']) || empty($_POST['nombre_personnes'])) {
        // Si un champ requis est vide, afficher un message d'erreur et rediriger vers le formulaire
        echo "Veuillez remplir tous les champs du formulaire.";
        // Vous pouvez rediriger l'utilisateur vers le formulaire de réservation
        // header('Location: formulaire_reservation.php');
        exit;
    }
    
    // Récupération des données du formulaire
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $destination = $_POST['destination'];
    $date_depart = $_POST['date_depart'];
    $date_retour = $_POST['date_retour'];
    $nombre_personnes = $_POST['nombre_personnes'];

    $currentDate = date('Y-m-d');
if ($date_depart <= $currentDate || $date_retour <= $date_depart) {
    echo "<script>alert('Erreur : Veuillez entrer des dates valides.');</script>";
    // Arrêtez l'exécution du script ou redirigez l'utilisateur vers le formulaire avec un message d'erreur
    exit;
}


    // Connexion à la base de données
    $dsn = 'mysql:host=localhost;dbname=reservation';
    $username = 'root';
    $password = '';

    try {
        $dbh = new PDO($dsn, $username, $password);
        
        // Préparation de la requête d'insertion
        $stmt = $dbh->prepare("INSERT INTO reservation (nom, email, destination, date_depart, date_retour, nombre_personnes) VALUES (:nom, :email, :destination, :date_depart, :date_retour, :nombre_personnes)");
        
        // Liaison des paramètres
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':destination', $destination);
        $stmt->bindParam(':date_depart', $date_depart);
        $stmt->bindParam(':date_retour', $date_retour);
        $stmt->bindParam(':nombre_personnes', $nombre_personnes);
        
        // Exécution de la requête
        $stmt->execute();
        
        // Affichage de la confirmation de la réservation
        echo "Votre réservation a été enregistrée avec succès.";
    } catch (PDOException $e) {
        // En cas d'erreur de connexion ou d'exécution de la requête, afficher un message d'erreur
        echo "Erreur : " . $e->getMessage();
    }
}
?>

</section>

</body>
</html>
