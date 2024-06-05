<?php
// Inclure le fichier de configuration pour établir la connexion à la base de données
require_once 'config.php';

// Vérifier si des données ont été soumises
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du premier formulaire
    $date_arrivee = isset($_POST['date_arrivee']) ? $_POST['date_arrivee'] : '';
    $date_depart = isset($_POST['date_depart']) ? $_POST['date_depart'] : '';

    // Récupération des données du deuxième formulaire
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
    $adultes = isset($_POST['adultes']) ? $_POST['adultes'] : '';
    $enfants = isset($_POST['enfants']) ? $_POST['enfants'] : '';
    $lits_bebe = isset($_POST['lits_bebe']) ? $_POST['lits_bebe'] : '';

    try {
        // Requête d'insertion des données dans la table de la base de données
        $sql = "INSERT INTO ati (DATE_DARRIVEE, DATE_DEPART, NOMBRE, ADULTES, ENFANTS, LITS_BEBE) VALUES (:date_arrivee, :date_depart, :nombre, :adultes, :enfants, :lits_bebe)";

        // Préparation de la requête
        $stmt = $conn->prepare($sql);

        // Exécution de la requête et gestion des erreurs
        $stmt->bindParam(':date_arrivee', $date_arrivee);
        $stmt->bindParam(':date_depart', $date_depart);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':adultes', $adultes);
        $stmt->bindParam(':enfants', $enfants);
        $stmt->bindParam(':lits_bebe', $lits_bebe);

        if ($stmt->execute()) {
            echo "Données insérées avec succès.";
        } else {
            // Utilisation de errorInfo() pour obtenir les informations sur l'erreur
            echo "Erreur lors de l'insertion des données: " . $stmt->errorInfo()[2];
        }
    } catch(PDOException $e) {
        echo "Erreur: " . $e->getMessage();
    }

    // Fermeture de la connexion à la base de données
    $conn = null;
}
?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Login Form - Modal</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons'>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <!-- Form-->
  <div class="form">
  <div class="form-toggle"></div>
  <div class="form-panel one">
    <div class="form-header">
      <h1>Veuillez sélectionner</h1>
    </div>
    <div class="form-content">
      <form method="POST">
        <div class="form-group">
          <label for="date_arrivee">Date d'arrivée</label>
          <input type="date" id="date_arrivee" name="date_arrivee" required="required">
        </div>
        <div class="form-group">
          <label for="date_depart">Date de départ</label>
          <input type="date" id="date_depart" name="date_depart" required="required">
        </div>
        <!-- Move the submit button inside this form -->
    


        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input type="text" id="nombre" name="nombre" required="required" pattern="[0-9]+"/>
        </div>
        <div class="form-group">
          <label for="adultes">Adulte(s)</label>
          <input type="text" id="adultes" name="adultes" required="required" pattern="[0-9]+"/>
        </div>
        <div class="form-group">
          <label for="enfants">Enfant(s)</label>
          <input type="text" id="enfants" name="enfants" required="required" pattern="[0-9]+"/>
        </div>
        <div class="form-group">
          <label for="lits_bebe">Lits bébé</label>
          <input type="text" id="lits_bebe" name="lits_bebe" required="required" pattern="[0-9]+"/>
       
        </div>
        <div class="form-group">
          <button type="submit">Soumettre</button>
        </div>
      </form>
    </div>
  </div>
  <div class="form-panel two">
    <div class="form-header">
      <h1>Veuillez sélectionner les chambres :</h1>
    </div>
    <div class="form-content">
      <form method="POST">
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input type="text" id="nombre" name="nombre" required="required" pattern="[0-9]+"/>
        </div>
        <div class="form-group">
          <label for="adultes">Adulte(s)</label>
          <input type="text" id="adultes" name="adultes" required="required" pattern="[0-9]+"/>
        </div>
        <div class="form-group">
          <label for="enfants">Enfant(s)</label>
          <input type="text" id="enfants" name="enfants" required="required" pattern="[0-9]+"/>
        </div>
        <div class="form-group">
          <label for="lits_bebe">Lits bébé</label>
          <input type="text" id="lits_bebe" name="lits_bebe" required="required" pattern="[0-9]+"/>
        </div>
        <!-- Remove the submit button from this form -->
      </form>
    </div>
  </div>
</div>



  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src='http://codepen.io/andytran/pen/vLmRVp.js'></script>
  <script src="js/index.js"></script>
</body>
</html>

