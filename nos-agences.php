<?php
session_start(); // Démarrer la session

// Vérifier si l'utilisateur est connecté
if(isset($_SESSION['user_id'])) {
    // Connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "projet_web";

    try {
        $bdd = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Mettre à jour last_page et last_activity dans la table des sessions
        $stmt_update = $bdd->prepare("UPDATE sessions SET last_page = ?, last_activity = NOW() WHERE user_id = ?");
        $stmt_update->execute([$_SERVER['REQUEST_URI'], $_SESSION['user_id']]);
    } catch(PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos Agences</title>
    <link rel="stylesheet" href="nos-agences.css">
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
    <section id="agences-container">

        <div class="agence">
            <img src="a1.jpg" alt="agence 1" class="img-agence">

            <div class="local">
                <img src="local.png" alt="local" class="agence-icone" >
                <label>Aéroport Tunis Carthage Hall (en face de l’ONTT)</label>
            </div>

            <div class="tel">
                <img src="tel.png" alt="tel" class="agence-icone" >
                <label> 24 604 604</label>
            </div>

            <div class="agence-mail">
                <img src="mail.png" alt="mail" class="agence-icone" >
                <a href="mailto:respaeroport@NextTravel.com">respaeroport@NextTravel.com</a>
            </div>

            <div class="time">
                <img src="time.png" alt="time" class="agence-icone" >
                <label> Lundi: Jour de repos <br> Du Mardi au Dimanche : De 09h30 à 16h30</label>
            </div>

            <button class="agence-submit" onclick="window.location.href='https://www.google.tn/maps/place/Traveltodo+Agence+A%C3%A9roport+Tunis+Carthage/data=!4m7!3m6!1s0x12fd3532050615ab:0x73b34330ce22dff9!8m2!3d36.8458827!4d10.2190856!16s%2Fg%2F11b5vv44bh!19sChIJqxUGBTI1_RIR-d8izjBDs3M?authuser=0&hl=fr&rclk=1'">VOIR SUR CARTE</button>
        </div>

        <div class="agence">
            <img src="a2.jpg" alt="agence 2" class="img-agence">

            <div class="local">
                <img src="local.png" alt="local" class="agence-icone" >
                <label>Carthage Magasin n°2, Complexe Culturel - Carthage Dermech.</label>
            </div>

            <div class="tel">
                <img src="tel.png" alt="tel" class="agence-icone" >
                <label>  70 103 103/29 595 000</label>
            </div>

            <div class="agence-mail">
                <img src="mail.png" alt="mail" class="agence-icone" >
                <a href="mailto:respcarthage@traveltodo.com">respcarthage@traveltodo.com</a>
            </div>

            <div class="time">
                <img src="time.png" alt="time" class="agence-icone" >
                <label> Du Lundi au Vendredi : 08h30 à 15h00<br>Samedi: 08h30 à 13h00<br>Dimanche: Jour de repos</label>
            </div>

            <button class="agence-submit" onclick="window.location.href='https://www.google.tn/maps/place/Traveltodo+Agence+Carthage/data=!4m7!3m6!1s0x12e2b4c811c64fcf:0x7a376b2801aeb15b!8m2!3d36.8497428!4d10.3259865!16s%2Fg%2F11bbrg_wsg!19sChIJz0_GEci04hIRW7GuAShrN3o?authuser=0&hl=fr&rclk=1'">VOIR SUR CARTE</button>
        </div>

        <div class="agence">
            <img src="a3.jpg" alt="agence 3" class="img-agence">

            <div class="local">
                <img src="local.png" alt="local" class="agence-icone" >
                <label>Centre Urbain Nord Immeuble Cercle des bureaux, en face de la clinique Les Jasmins, 1082 Tunis</label>
            </div>

            <div class="tel">
                <img src="tel.png" alt="tel" class="agence-icone" >
                <label> 70 103 103 / 27 397 218</label>
            </div>

            <div class="agence-mail">
                <img src="mail.png" alt="mail" class="agence-icone" >
                <a href="mailto:respcenterurbain@traveltodo.com">respcenterurbain@traveltodo.com</a>
            </div>

            <div class="time">
                <img src="time.png" alt="time" class="agence-icone" >
                <label> Du Lundi au Vendredi: 08h30 à 15h00 <br> Samedi: 08h30 à 13h00<br>Dimanche:Jour de repos</label>
            </div>

            <button class="agence-submit" onclick="window.location.href='https://www.google.tn/maps/place/Traveltodo+agence+Centre+Urbain+Nord/data=!4m7!3m6!1s0x12fd34c5fb8d44e5:0x5313822a18ffa08f!8m2!3d36.8472828!4d10.1984041!16s%2Fg%2F11bwhbknt7!19sChIJ5USN-8U0_RIRj6D_GCqCE1M?authuser=0&hl=fr&rclk=1'">VOIR SUR CARTE</button>

        </div>

        <div class="agence">
            <img src="a4.jpg" alt="agence 4" class="img-agence">

            <div class="local">
                <img src="local.png" alt="local" class="agence-icone" >
                <label>CHARGUIA II Rue des entrepreneurs, Immeuble Sofide.</label>
            </div>

            <div class="tel">
                <img src="tel.png" alt="tel" class="agence-icone" >
                <label> 70 103 103/28 276 077</label>
            </div>

            <div class="agence-mail">
                <img src="mail.png" alt="mail" class="agence-icone" >
                <a href="mailto:respcharguia@traveltodo.com">respcharguia@traveltodo.com</a>
            </div>

            <div class="time">
                <img src="time.png" alt="time" class="agence-icone" >
                <label>Du Lundi au Vendredi: 08h30 à 15h00 <br> Samedi: 08h30 à 13h00<br>Dimanche:Jour de repos</label>
            </div>

            <button class="agence-submit" onclick="window.location.href='https://www.google.tn/maps/place/Traveltodo+CHARGUIA+II+Tunis/data=!4m7!3m6!1s0x12e2cb2cef97577b:0x909192e42ec25081!8m2!3d36.8589686!4d10.2078792!16s%2Fg%2F1tctts33!19sChIJe1eX7yzL4hIRgVDCLuSSkZA?authuser=0&hl=fr&rclk=1'">VOIR SUR CARTE</button>
        </div>

        <div class="agence">
            <img src="a5.jpg" alt="agence 5" class="img-agence">

            <div class="local">
                <img src="local.png" alt="local" class="agence-icone" >
                <label>Géant Tunis city  (situé à l'accueil de l'hyper marché Géant )</label>
            </div>

            <div class="tel">
                <img src="tel.png" alt="tel" class="agence-icone" >
                <label> 28 714 699</label>
            </div>

            <div class="agence-mail">
                <img src="mail.png" alt="mail" class="agence-icone" >
                <a href="mailto:resptuniscity@traveltodo.com">resptuniscity@traveltodo.com</a>
            </div>

            <div class="time">
                <img src="time.png" alt="time" class="agence-icone" >
                <label> Mardi: Jour de repos <br>Du Lundi au Dimanche : De 09h30 à 16h30</label>
            </div>

            <button class="agence-submit" onclick="window.location.href='https://www.google.tn/maps/place/Traveltodo+Agence+Tunis+City+G%C3%A9ant/data=!4m7!3m6!1s0x12e2cd024eee649f:0x1dd82a0d2de08529!8m2!3d36.900267!4d10.123078!16s%2Fg%2F1q62dt6jq!19sChIJn2TuTgLN4hIRKYXgLQ0q2B0?authuser=0&hl=fr&rclk=1'">VOIR SUR CARTE</button>

        </div>
        <div class="agence">
            <img src="a6.jpg" alt="agence 6" class="img-agence">

            <div class="local">
                <img src="local.png" alt="local" class="agence-icone" >
                <label> Ennasr II 48 Rue Docteur Slaim Ammar(En face de Monoprix).</label>
            </div>

            <div class="tel">
                <img src="tel.png" alt="tel" class="agence-icone" >
                <label>70 103 103/27 689 271</label>
            </div>

            <div class="agence-mail">
                <img src="mail.png" alt="mail" class="agence-icone" >
                <a href="mailto:respennasr2@traveltodo.com">respennasr2@traveltodo.com</a>
            </div>

            <div class="time">
                <img src="time.png" alt="time" class="agence-icone" >
                <label> Du Lundi au Vendredi: 09h00 à 15h30 <br> Samedi: 09h00 à 15h30 <br>Dimanche:Jour de repos</label>
            </div>

            <button class="agence-submit" onclick="window.location.href='https://www.google.tn/maps/place/Traveltodo+Agence+Ennasr+2/data=!4m7!3m6!1s0x12fd334e090cfc01:0xcfcf0806866c1251!8m2!3d36.8562313!4d10.1582294!16s%2Fg%2F1tp6lq64!19sChIJAfwMCU4z_RIRURJshgYIz88?authuser=0&hl=fr&rclk=1'">VOIR SUR CARTE</button>

        </div>

        <div class="agence">
            <img src="a7.jpg" alt="agence 7" class="img-agence">

            <div class="local">
                <img src="local.png" alt="local" class="agence-icone" >
                <label>Ezzahra Avenue Habib Bourguiba , Magazin 4 , Ezzahra Centre</label>
            </div>

            <div class="tel">
                <img src="tel.png" alt="tel" class="agence-icone" >
                <label> 70 103 103 / 27 571 745</label>
            </div>

            <div class="agence-mail">
                <img src="mail.png" alt="mail" class="agence-icone" >
                <a href="mailto:respezzahra@traveltodo.com">respezzahra@traveltodo.com</a>
            </div>

            <div class="time">
                <img src="time.png" alt="time" class="agence-icone" >
                <label>Du Lundi au Vendredi: 08h30 à 15h30 <br>Samedi: 08h30 à 14h00 <br>Dimanche:Jour de repos </label>
            </div>

            <button class="agence-submit" onclick="window.location.href='https://www.google.tn/maps/place/Traveltodo+Agence+Ezzahra/data=!4m7!3m6!1s0x12fd49a0feab6e13:0x97be764f977de866!8m2!3d36.739733!4d10.302427!16s%2Fg%2F1q62m_1yb!19sChIJE26r_qBJ_RIRZuh9l092vpc?authuser=0&hl=fr&rclk=1'">VOIR SUR CARTE</button>

        </div>

        <div class="agence">
            <img src="a8.jpg" alt="agence 8" class="img-agence">

            <div class="local">
                <img src="local.png" alt="local" class="agence-icone" >
                <label> La Marsa 2 Rue Pascal 2070 en face de Gourmet/ à coté du lycée Cailloux</label>
            </div>

            <div class="tel">
                <img src="tel.png" alt="tel" class="agence-icone" >
                <label>  70 103 103 / 27 846 138</label>
            </div>

            <div class="agence-mail">
                <img src="mail.png" alt="mail" class="agence-icone" >
                <a href="mailto:respmarsa@traveltodo.com">respmarsa@traveltodo.com</a>
            </div>

            <div class="time">
                <img src="time.png" alt="time" class="agence-icone" >
                <label> Du Lundi au Vendredi: 08h30 à 15h00 <br> Samedi: 08h30 à 13h00 <br>Dimanche:Jour de repos </label>
            </div>

            <button class="agence-submit" onclick="window.location.href='https://www.google.tn/maps/place/Traveltodo+Agence+La+Marsa/data=!4m7!3m6!1s0x12e2b48e08bf301f:0x6642826e3e381667!8m2!3d36.8788937!4d10.3334822!16s%2Fg%2F11b5yj7ky3!19sChIJHzC_CI604hIRZxY4Pm6CQmY?authuser=0&hl=fr&rclk=1'">VOIR SUR CARTE</button>
        </div>
    </section>

    
    <script src="nos-agences.js"></script>
</body>

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
