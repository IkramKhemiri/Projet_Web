<?php
session_start(); // Démarrer la session

// Vérifier si l'utilisateur est connecté
if(!isset($_SESSION['user_id'])) {
    // Rediriger vers la page de connexion
    header("Location: connection.php");
    exit; // Arrêter l'exécution du reste du code
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['trip-submit'])) {
    // Valider et tester les champs remplis
    if (empty($_POST['from']) || empty($_POST['to']) || empty($_POST['date'])) {
        echo "Veuillez remplir tous les champs obligatoires.";
        exit;
    }

    // Valider la date pour qu'elle soit postérieure à la date actuelle
    $date = $_POST['date'];
    $today = date('Y-m-d');
    if ($date < $today) {
        echo "Veuillez sélectionner une date valide.";
        exit;
    }

    // Connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "projet_web";

    try {
        $bdd = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Récupérer l'ID de l'utilisateur connecté
        $user_id = $_SESSION['user_id'];

        // Insérer les données du formulaire dans la table des vols
        $stmt = $bdd->prepare("INSERT INTO  `projet_web`.`vols` (user_id, from_location, to_location, trip_type, date, baggage, direct_flight, flexibility, cabin_class) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$user_id, $_POST['from'], $_POST['to'], $_POST['trip-type'], $_POST['date'], isset($_POST['baggage']), isset($_POST['direct-flight']), $_POST['flexibility'], $_POST['cabin-class']]);
        
        echo "Vol réservé avec succès !";

         // Mettre à jour last_page et last_activity dans la table des sessions
        $stmt_update = $bdd->prepare("UPDATE  `projet_web`.`sessions` SET last_page = ?, last_activity = NOW() WHERE user_id = ?");
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
    <title>Planificateur de voyage</title>
    <link rel="stylesheet" href="vols.css">
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
            <li class="header-li"><a href="hotels.html">Hotels</a></li>
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
    <h1 id="titre">Planifiez votre voyage</h1>
    <!-- Formulaire de réservation de vol -->
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="from">D'où partez-vous ?<span class="required">*</span></label>
        <input type="text" id="from" name="from" required />

        <label for="to">Où allez-vous ?<span class="required">*</span></label>
        <input type="text" id="to" name="to" required />

        <label for="trip-type">Type de voyage</label>
        <select id="trip-type" name="trip-type">
            <option value="aller-retour">Aller/Retour</option>
            <option value="aller-simple">Aller simple</option>
            <option value="multi-destination">Multi destination</option>
        </select>

        <label for="date">Date</label>
        <input type="date" id="date" name="date" />

        <label for="baggage">Avec bagage</label>
        <input type="checkbox" id="baggage" name="baggage" />

        <label for="direct-flight">Vol Direct</label>
        <input type="checkbox" id="direct-flight" name="direct-flight" />

        <br>
        <br>

        <label for="flexibility">Flexibilité</label>
        <select id="flexibility" name="flexibility">
            <option value="0 jour">0 Jour</option>
            <option value="+1jour">+1 Jour</option>
            <option value="+2jours">+2 Jours</option>
            <option value="-1jour">-1 Jour</option>
            <option value="-2jour">-2 Jours</option>
            <option value="+/-1jour">+/-1 Jour</option>
        </select>
        <div>
            <label for="cabin-class">Classe de cabine</label>
            <select id="cabin-class" name="cabin-class">
                <option value="Economy">Économique</option>
                <option value="Business">Affaires</option>
                <option value="First">Première</option>
            </select>
        </div>
        <input type="submit" name="trip-submit" value="Réserver le Vol" />
    </form>
    <br>
    <h3 class="element">Réservez votre Vol & achetez vos billets d’avion aux meilleurs tarifs</h3>
    <div class="slider">
        <img src="1.jpg" alt="Image 1">
        <img src="2.jpg" alt="Image 2">
        <img src="3.jpg" alt="Image 3">
        <img src="4.jpg" alt="Image 4">
        <img src="5.jpg" alt="Image 5">
        <img src="6.jpg" alt="Image 6">
        <img src="7.jpg" alt="Image 7">
        <img src="8.jpg" alt="Image 8">
      </div>
    <p>Vous êtes en train de planifier votre prochain voyage, pour découvrir une nouvelle destination, pour un voyage en famille, pour une virée entre amis ou pour un voyage d'affaires ? Vous souhaitez dénicher les billets d’avion qui respectent votre budget et qui vous permettent de profiter de votre voyage ? Next_Travel vous propose les meilleures offres et vous facilite la réservation de vos billets d’avion à prix imbattables selon votre plan de voyage et surtout selon votre budget !</p>
    <h3 class="element">Trouvez votre Vol & comparez les meilleures offres</h3>
    <p>Au départ des aéroports de la Tunisie et de partout dans le monde, nous vous proposons les meilleures offres des compagnies aériennes nationales et internationales : Tunisair, Nouvelair, Air France, Lufthansa, Qatar Airways Turkish Airlines,… Recherchez vos billets d’avion selon vos critères et vos besoins. Comparez puis selectionnez le vol qui respecte vos dates, vos horaires de départs et d’arrivée et surtout votre budget.</p>
    <h3 class="element">Achetez vos billets d’avion en ligne et voyagez malin</h3>
    <!-- 
    <div id="video_container">
        <video autoplay muted loop><source src="vols.mp4" type="video/mp4"></video>
    </div>
    -->
    <p>Vous avez réussi à trouver le vol qui vous convient à prix imbattable sur Next_Travel ! Commandez alors vos billets d’avion et payez-les en ligne en toute sécurité et en quelques clics. Vos billets vous seront envoyés par mail sous forme de billet électronique.</p>
    <p>Vous pouvez aussi passer à l’agence Next_Travel la plus proche de chez vous pour finaliser le paiement et la réservation de votre billet d’avion.</p>
    <p>Notre conseil : Réservez vos billets d’avion 3 à 6 mois à l'avance et partez à la découverte du monde. Vous profiterez ainsi des meilleures offres possibles vers la destination de vos rêves : Paris, Rome, Londres, Istanbul et plus encore.</p>
    <p>N’hésitez pas à nous contacter si vous avez besoin d’aide ou si vous hésitez pour la réservation et l’achat de billet d’avion en ligne.</p>
    <p>Next_Travel vous souhaite une bonne recherche et surtout les plus beaux des voyages !</p>

    <h3 id="airline">Réserver un vol pas cher avec la compagnie de choix</h3>
    <ul id="airline-list">
        <li><a id="airline-tunisair" href="https://www.tunisair.com/" target="_blank" rel="noopener noreferrer"><img src="tunisair.jpg" alt="الخطوط التونسية - TUNISAIR"></a></li>
        <li><a id="airline-qatar" href="https://www.qatarairways.com/" target="_blank" rel="noopener noreferrer"><img src="qatar.jpg" alt="QATAR - القطرية AIRWAYS"></a></li>
        <li><a id="airline-turkish" href="https://www.turkishairlines.com/" target="_blank" rel="noopener noreferrer"><img src="turkish.jpg" alt="TURKISH - AIRLINES"></a></li>
        <li><a id="airline-maroc" href="https://www.royalairmaroc.com/" target="_blank" rel="noopener noreferrer"><img src="maroc.jpg" alt="المخطوط الملكية المغربية - royal air maroc"></a></li>
        <li><a id="airline-emirates" href="https://www.emirates.com/" target="_blank" rel="noopener noreferrer"><img src="emirates.jpg" alt="Emirates"></a></li>
        <li><a id="airline-france" href="https://www.airfrance.com/" target="_blank" rel="noopener noreferrer"><img src="france.jpg" alt="AIRFRANCE"></a></li>
    </ul>
    
    <script src="vols.js"></script>
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
