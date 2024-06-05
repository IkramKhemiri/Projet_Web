<?php
// Vérification si le formulaire a été soumis
if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    // Vérification si tous les champs sont remplis
    if (!empty($_POST['nm']) && !empty($_POST['em']) && !empty($_POST['tln']) && !empty($_POST['msg']) ) {
        // Les champs sont remplis, vous pouvez traiter les données du formulaire
        // Connexion à la base de données
        $servername = "localhost"; // Adresse du serveur MySQL
        $username = 'root'; // Nom d'utilisateur MySQL
        $password = ''; // Mot de passe MySQL
        $dbname = "contact"; // Nom de la base de données

        try {
            // Connexion à la base de données avec PDO
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // Définir le mode d'erreur de PDO sur Exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Récupérer les données soumises par le formulaire
            $nom = $_POST['nm'];
            $email = $_POST['em'];
            $telephone = $_POST['tln'];
            $msg = $_POST['msg'];
           

            // Requête d'insertion des données dans la table contact
            $sql = "INSERT INTO contact (nom, email, telephone, msg) VALUES (:nom, :email, :telephone, :msg)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':telephone', $telephone);
            $stmt->bindParam(':msg', $msg);
          

            // Exécution de la requête
            $stmt->execute();
            echo"Les informations ont été ajoutées avec succès à la base de données.";
           
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
