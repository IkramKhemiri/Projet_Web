<?php
// Vérification si le formulaire a été soumis
if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    // Vérification si tous les champs sont remplis
    if (!empty($_POST['Nom']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['omraType']) && !empty($_POST['dates'])) {
        // Les champs sont remplis, vous pouvez traiter les données du formulaire
        // Connexion à la base de données
        $servername = "localhost"; // Adresse du serveur MySQL
        $username = 'root'; // Nom d'utilisateur MySQL
        $password = ''; // Mot de passe MySQL
        $dbname = "reservation"; // Nom de la base de données

        try {
            // Connexion à la base de données avec PDO
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // Définir le mode d'erreur de PDO sur Exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Récupérer les données soumises par le formulaire
            $nom = $_POST['Nom'];
            $email = $_POST['email'];
            $telephone = $_POST['phone'];
            $typeOmra = $_POST['omraType'];
            $dateReservation = $_POST['dates'];

            // Requête d'insertion des données dans la table reservationOmra
            $sql = "INSERT INTO reservationOmra (nom, email, telephone, typeOmra, dateReservation) VALUES (:nom, :email, :telephone, :typeOmra, :dateReservation)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':telephone', $telephone);
            $stmt->bindParam(':typeOmra', $typeOmra);
            $stmt->bindParam(':dateReservation', $dateReservation);

            // Exécution de la requête
            $stmt->execute();

           // Envoyer un e-mail de confirmation au client
           $to = $email;
           ini_set("SMTP", "smtp.gmail.com");
           ini_set("smtp_port", "587");
           $subject = "Confirmation de réservation";
           $message = "Cher $nom,\n\nNous avons bien reçu votre réservation. Nous vous contacterons bientôt pour finaliser les détails.\n\nCordialement,\n[Next Travel]";
           $headers = "From: malakjebali@gmail.com";

           mail($to, $subject, $message, $headers);

           echo "Réservation effectuée avec succès ! Un e-mail de confirmation a été envoyé à votre adresse.";
       } catch(PDOException $e) {
           echo "Erreur : " . $e->getMessage();
       }

        // Fermer la connexion à la base de données
        $conn = null;
    } else {
        // Afficher un message d'erreur si tous les champs ne sont pas remplis
        echo "Veuillez remplir tous les champs du formulaire.";
    }
}
?>
