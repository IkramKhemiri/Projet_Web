<?php
session_start();
// Vérifier si le formulaire a été soumis
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier les informations d'identification
    $nom_admin_valide = "nexttravel@admin";
    $mot_de_passe_valide = "nexttravel2024";

    $nom_admin = $_POST['nom_admin'];
    $mot_de_passe = $_POST['mot_de_passe'];

    if($nom_admin === $nom_admin_valide && $mot_de_passe === $mot_de_passe_valide) {
        // Redirection vers la page d'administration si les informations sont correctes
        
        header("Location: pageadmin.php");
        exit();
    } else {
        // Afficher un message d'erreur si les informations sont incorrectes
        
       
        header("Location: admin.php");
        echo  "<script>alert('Informations incorrectes');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Admin</title>
</head>
<style>



.container {
    box-shadow: #007bff;
    box-sizing: border-box;
    text-align: center;
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

a {
    display: block;
    padding: 10px;
    background-color: #007bff; /* Couleur bleu clair */
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    margin-bottom: 10px; /* Espacement entre les liens */
}

a:hover {
    background-color: #0056b3; /* Couleur bleu foncé au survol */
}

</style>
<body >
 
   <div class="container">
   <center> <h2>Salut, au maître de la base de données !Prêt à jongler avec les réservations comme un pro ? 🚀</h2></center>
        <!-- Lien pour la suppression -->
        <a href="suppression.php">Supprimer une réservation</a><br><br>
        <!-- Lien pour l'ajout -->
        <a href="ajouter-res.php">Ajouter une réservation</a><br><br>
        <!-- Lien pour la modification -->
        <a href="modifier_reservation.php">Modifier une réservation</a><br><br>
        <a href="deconnexion.php">Déconnexion</a>
    </div>
   
</body>
</html>
