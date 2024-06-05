<?php
// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifie si tous les champs requis sont remplis
    if (!empty($_POST['capital_social']) && !empty($_POST['adresse_postale']) && !empty($_POST['adresse_email']) && !empty($_POST['mobile']) && !empty($_POST['site_web']) && !empty($_POST['industrie']) && !empty($_POST['matricule_fiscale']) && !empty($_POST['registre_commerce']) && !empty($_POST['representant_legal']) && !empty($_POST['cin'])) {
        
        try {
            // Connexion à la base de données
            $dsn = "mysql:host=localhost;dbname=projet_web";
            $username = "root";
            $password = "";

            $pdo = new PDO($dsn, $username, $password);

            // Définir le mode d'erreur de PDO sur Exception
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Préparer la requête d'insertion
            $stmt = $pdo->prepare("INSERT INTO espace_entreprise (capital_social, adresse_postale, adresse_email, num_fixe, mobile, site_web, industrie, nb_employes, matricule_fiscale, registre_commerce, representant_legal, cin) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

            // Exécuter la requête
            $stmt->execute(array(
                $_POST['capital_social'],
                $_POST['adresse_postale'],
                $_POST['adresse_email'],
                $_POST['num_fixe'],
                $_POST['mobile'],
                $_POST['site_web'],
                $_POST['industrie'],
                $_POST['nb_employes'],
                $_POST['matricule_fiscale'],
                $_POST['registre_commerce'],
                $_POST['representant_legal'],
                $_POST['cin']
            ));

            echo "Les données ont été insérées avec succès.";
        } catch (PDOException $e) {
            echo "Erreur lors de l'insertion des données : " . $e->getMessage();
        }

        // Fermer la connexion à la base de données
        $pdo = null;
    } else {
        echo "Tous les champs requis doivent être remplis.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Entreprises</title>
    <link rel="stylesheet" href="espace-entreprises.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<!-- c'est la partie du header -->
<!-- c'est la partie du header -->
<header>
    <!-- En-tête principal -->
    <section class="section-header">
        <!-- Liste de navigation principale -->
        <ul class="nav">
            <!-- Logo -->
            <li>
                <a id="logo" href="home.php">
                    <img src="NextTravel.png" alt="NextTravel" title="Accueil">
                </a>
            </li>
            <!-- Lien de contact par e-mail -->
            <li class="nav-item">
                <a aria-current="page" class="nav-link" href="mailto:client@NextTravel.com">
                    <img src="email.gif" alt="email" title="email" class="img-fluid">client@NextTravel.com</a>
            </li>
            <!-- Lien vers les agences -->
            <li class="nav-item">
                <a class="nav-link" href="nos-agences.php">
                    <img src="home.gif" alt="Agences" title="Agences" class="img-fluid">Nos agences</a>
            </li>
            <!-- Lien de contact -->
            <li class="nav-item">
                <a class="nav-link" href="contact.php">
                    <img src="email.gif" alt="contact" title="contact" class="img-fluid">Contact</a>
            </li>
            <!-- Lien vers les favoris -->
            <li class="nav-item">
                <a class="nav-link" href="favorites.php" rel="noindex, nofollow">
                    <img src="heart.gif" alt="Best" title="Best" class="img-fluid">Favoris</a>
            </li>
            <!-- Lien vers l'espace entreprises -->
            <li class="nav-item">
                <a class="nav-link" href="espace-entreprises.php" target="_blank">
                    <img src="handshake.gif" alt="Espace entreprises" title="Espace entreprises" class="img-fluid">Espace entreprises</a>
            </li>
            <!-- Lien vers le blog -->
            <li class="nav-item">
                <a class="nav-link" href="blog.php" target="_blank">
                    <img src="writing.gif" alt="Blog" title="Blog" class="img-fluid">Blog</a>
            </li>
            <!-- Sélecteur de devise -->
            <li class="nav-item">
                <img src="dollar.gif" alt="Currency" title="Currency" class="img-fluid">
                <select id="currency-select">
                    <option value="TND">TND</option>
                    <option value="USD">USD</option>
                    <option value="EUR">EUR</option>
                </select>
            </li>
            <!-- Bouton de connexion -->
            <li class="nav-item">
                <a title="Se connecter compte client" class="nav-link">
                    <button id="connection"><a href="connection.php"><img src="userlogin.png">Se connecter</a></button>
            </li>
        </ul>
    </section>
    <hr>
    <!-- Deuxième section de l'en-tête -->
    <section id="section-header-2">
        <!-- Liste de navigation secondaire -->
        <ul id="header-ul">
            <li class="header-li"><a href="home.php">Home</a></li>
            <li class="header-li"><a href="hotels.php">Hotels</a></li>
            <li class="header-li"><a href="vols.php">Vols</a></li>
            <li class="header-li"><a href="Omra.php">Omra</a></li>
            <li class="header-li"><a href="villas.php">Villas & Apparts</a></li>
        </ul>
        <!-- Numéro de téléphone -->
        <div id="phone-number">
            <img id="phone" src="phone.gif" alt="phone">
            +216 22 222 222
        </div>
        <!-- Info-bulle du numéro de téléphone -->
        <div id="phone-tooltip" class="tooltip">Du Lundi au vendredi de 08h30 à 19h30<br>Samedi de 08h30 à 21h<br>Dimanche de 10h à 17h30</div>
    </section>
    <hr>
</header>

<body>
    <img src="espace.jpg" alt="space" id="img-espace">
    <h2 id="titre-espace">Accueil | Espace entreprises</h2>

        <form id="formulaire" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="capital_social">Capital social:<span class="required">*</span></label>
            <input type="text" id="capital_social" name="capital_social" placeholder="Entrez le capital social" required>

            <label for="adresse_postale">Adresse postale:<span class="required">*</span></label>
            <input type="text" id="adresse_postale" name="adresse_postale" placeholder="Entrez l'adresse postale" required>

            <label for="adresse_email">Adresse e-mail:<span class="required">*</span></label>
            <input type="email" id="adresse_email" name="adresse_email" placeholder="Entrez l'adresse e-mail" required>

            <label for="num_fixe">N° fixe:</label>
            <input type="tel" id="num_fixe" name="num_fixe" placeholder="Entrez le numéro fixe" >

            <label for="mobile">Mobile n°:<span class="required">*</span></label>
            <input type="tel" id="mobile" name="mobile" placeholder="Entrez le numéro de mobile" required>

            <label for="site_web">Site web:<span class="required">*</span></label>
            <input type="url" id="site_web" name="site_web" placeholder="Entrez l'URL du site web" required>

            <label for="industrie">Industrie/Domaine:<span class="required">*</span></label>
            <input type="text" id="industrie" name="industrie" placeholder="Entrez l'industrie/domaine" required>

            <label for="nb_employes">Nombre d'employés:</label>
            <input type="number" id="nb_employes" name="nb_employes" placeholder="Entrez le nombre d'employés" >

            <label for="matricule_fiscale">Matricule fiscale:<span class="required">*</span></label>
            <input type="text" id="matricule_fiscale" name="matricule_fiscale" placeholder="Entrez le matricule fiscale" required>

            <label for="registre_commerce">Registre de commerce:<span class="required">*</span></label>
            <input type="text" id="registre_commerce" name="registre_commerce" placeholder="Entrez le registre de commerce" required>

            <label for="representant_legal">Représentant légal:<span class="required">*</span></label>
            <input type="text" id="representant_legal" name="representant_legal" placeholder="Entrez le représentant légal" required>

            <label for="cin">CIN n° du représentant légal:<span class="required">*</span></label>
            <input type="text" id="cin" name="cin" placeholder="Entrez le CIN du représentant légal" required>
        <div id="boutons">
            <input type="submit" value="Submit" />
            <input type="reset" value="Reset" />
        </div>
    </form>

     




</body>
<script src="espace-entreprises.js"></script>

<footer>
    <!-- Conteneur principal du pied de page -->
    <div class="footer_container">
        <!-- Section des icônes sociales -->
        <div class="sotialIcons">
            <!-- Lien vers Facebook -->
            <a href=""><i class="fa-brands fa-facebook"></i></a>
            <!-- Lien vers Instagram -->
            <a href=""><i class="fa-brands fa-instagram"></i></a>
            <!-- Lien vers Twitter -->
            <a href=""><i class="fa-brands fa-twitter"></i></a>
            <!-- Lien vers Google Plus -->
            <a href=""><i class="fa-brands fa-google-plus"></i></a>
            <!-- Lien vers YouTube -->
            <a href=""><i class="fa-brands fa-youtube"></i></a>
        </div>
    </div>
    <!-- Ligne de séparation -->
    <hr>
    <!-- Deuxième section du pied de page -->
    <div class="div2">
        <!-- Informations utiles -->
        <div>
            <h3>Informations utiles</h3>
            <ul>
                <!-- Liens utiles -->
                <a href="#">Qui sommes-nous?</a>
                <a href="#">Next Travel vous répond</a>
                <!-- Lien de contact avec un appel à une fonction JavaScript -->
                <a href="#" class="contact-link" onclick="openpopup()">Contact</a>
            </ul>
        </div>
        <!-- Section de contact -->
        <div>
            <h3>Contact</h3>
            <ul>
                <!-- Adresse -->
                <p>Adresse :</p>
                <a href="#">Tunis, Tunisie</a>
                <!-- Adresse e-mail -->
                <a href="mailto Nexttravel@gmail.com">Nexttravel@gmail.com</a>
                <!-- Numéro de téléphone -->
                <a href="#"><p>Tél:</p>(+216)55000111</a>
            </ul>
        </div>
        <!-- Applications mobiles -->
        <div>
            <h3>Applications mobiles</h3>
            <!-- Logos des magasins d'applications -->
            <div><img src="appstore.png"><img src="playstore.png"></div>
        </div>
    </div>
    <!-- Ligne de séparation -->
    <hr>
    <!-- Mention de droits d'auteur -->
    <div><center><h5 style="color: #fff;margin-top: 20px;padding: 20px; ">©2024 NextTravel - Tous droits réservés.</h5></center></div>
</footer>

</html>