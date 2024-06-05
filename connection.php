<?php
session_start(); // Démarrer la session

// Vérifier si le formulaire de connexion, d'inscription ou de récupération de mot de passe est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['form_type'])) {
    // Connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "projet_web";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Configuration pour lever les exceptions en cas d'erreur
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if ($_POST['form_type'] == 'login') {
            // Traitement du formulaire de connexion
            // Validation des données du formulaire
            $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
            $password = $_POST["password"];

            if (!$email) {
                echo "Adresse e-mail invalide.";
                exit;
            }

            // Préparation de la requête SQL pour récupérer l'utilisateur
            $stmt = $conn->prepare("SELECT id, mot_de_passe FROM  `projet_web`.`utilisateurs` WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                // Vérification du mot de passe
                if ($password === $user['mot_de_passe']) { // Comparaison en texte brut
                    // Mot de passe valide, l'utilisateur est connecté
                    $_SESSION['user_id'] = $user['id']; // Stocker l'ID de l'utilisateur dans la session

                    // Enregistrer les données de session dans la base de données
                    enregistrer_session($_SESSION['user_id'], 'connexion', 'réussie', $_SERVER['REQUEST_URI']);

                    echo "Connexion réussie. Bienvenue!";
                } else {
                    // Mot de passe incorrect
                    echo "Mot de passe incorrect.";
                }
            } else {
                // L'utilisateur n'existe pas
                echo "Cet utilisateur n'existe pas.";
            }
        } elseif ($_POST['form_type'] == 'inscription') {
            // Traitement du formulaire d'inscription
            $name = $_POST['name'];
            $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
            $password = $_POST['password'];

            if (!$email) {
                echo "Adresse e-mail invalide.";
                exit;
            }

            // Vérifier si l'utilisateur existe déjà
            $stmt = $conn->prepare("SELECT id FROM  `projet_web`.`utilisateurs` WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $existing_user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($existing_user) {
                echo "Cet utilisateur existe déjà.";
                exit;
            }

            // Préparation de la requête d'insertion
            $stmt = $conn->prepare("INSERT INTO `projet_web`.`utilisateurs` (nom, email, mot_de_passe) VALUES (:nom, :email, :mot_de_passe)");
            $stmt->bindParam(':nom', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':mot_de_passe', $password);
            $stmt->execute();

            // Après une inscription réussie, démarrer la session et stocker l'ID de l'utilisateur
            $_SESSION['user_id'] = $conn->lastInsertId(); // Récupérer l'ID de l'utilisateur nouvellement inscrit

            // Enregistrer les données de session dans la base de données
            enregistrer_session($_SESSION['user_id'], 'inscription', 'réussie', $_SERVER['REQUEST_URI']);

            echo "Inscription réussie !";
        } elseif ($_POST['form_type'] == 'password_reset') {
            // Traitement du formulaire de récupération de mot de passe
            $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

            if (!$email) {
                echo "Adresse e-mail invalide.";
                exit;
            }

            // Vérifier si l'utilisateur existe
            $stmt = $conn->prepare("SELECT id FROM  `projet_web`.`utilisateurs` WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$user) {
                echo "Cet utilisateur n'existe pas.";
                exit;
            }

            // Générer un nouveau mot de passe aléatoire
            $new_password = generateRandomPassword();

            // Mettre à jour le mot de passe dans la base de données
            $stmt = $conn->prepare("UPDATE  `projet_web`.`utilisateurs` SET mot_de_passe = :mot_de_passe WHERE email = :email");
            $stmt->bindParam(':mot_de_passe', $new_password);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            // Envoyer l'e-mail contenant le nouveau mot de passe
            $subject = "Réinitialisation de mot de passe";
            $message = "Bonjour,\n\nVotre mot de passe a été réinitialisé avec succès.\n\nNouveau mot de passe : $new_password\n\nVous pouvez vous connecter avec ce nouveau mot de passe. \n\nCordialement,\nVotre équipe NextTravel";

            $headers = "From: NextTravel <ikramkhemiri416@gmail.com>\r\n";
            $headers .= "Reply-To: ikramkhemiri416@gmail.com\r\n";
            $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

            mail($email, $subject, $message, $headers);

            echo "Un e-mail contenant le nouveau mot de passe a été envoyé à votre adresse e-mail.";
        }

    } catch(PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}


// Fonction pour enregistrer les données de session dans la base de données
function enregistrer_session($user_id, $nom_variable, $valeur_variable, $last_page) {
    // Connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "projet_web";
    
    try {
        $bdd = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Vérifier si une entrée avec cet ID de session existe déjà dans la table
        $stmt_check = $bdd->prepare("SELECT COUNT(*) FROM `projet_web`.`sessions`  WHERE user_id = ?");
        $stmt_check->execute([$user_id]);
        $session_exists = $stmt_check->fetchColumn();

        // Si l'utilisateur n'a pas de session, créer une nouvelle session
        if (!$session_exists) {
            // Générer un ID de session unique
            $session_id = uniqid();

            // Préparez et exécutez la requête d'insertion
            $stmt_insert = $bdd->prepare("INSERT INTO `projet_web`.`sessions`  (session_id, user_id, session_variable, session_value, last_page, last_activity) VALUES (?, ?, ?, ?, ?, NOW())");
            $stmt_insert->execute([$session_id, $user_id, $nom_variable, $valeur_variable, $last_page]);
        } else {
            // Si l'utilisateur a déjà une session, mettre à jour last_page et last_activity
            $stmt_update = $bdd->prepare("UPDATE `projet_web`.`sessions`  SET last_page = ?, last_activity = )NOW( WHERE user_id = ?");
            $stmt_update->execute([$last_page, $user_id]);
        }
    } catch(PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}

// Fonction pour générer un mot de passe aléatoire
function generateRandomPassword($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $password = '';
    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $password;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="connection.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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


<body >
    <!-- Espace blanc avec bordure arrondie contenant les formulaires -->
    <div class="connexion-container">
        <!-- Suggestions de connexion avec des réseaux sociaux -->
        <div class="social-login">
            <div class="social-option">
                <i class="fab fa-google"></i>
                <br>
                <br>
                <a href="#" class="social-link">Se connecter avec Google</a>
            </div>
            <div class="social-option">
                <i class="fab fa-apple"></i>
                <br>
                <br>
                <a href="#" class="social-link">Se connecter avec Apple</a>
            </div>
            <div class="social-option">
                <i class="fab fa-facebook"></i>
                <br>
                <br>
                <a href="#" class="social-link">Se connecter avec Facebook</a>
            </div>
        </div>
        
        <!-- Formulaire de connexion par défaut -->
        <div class="login-form">
            <h2>Connexion</h2>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" autocomplete="off">
                <input type="hidden" name="form_type" value="login">
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Mot de passe" required>
                <button type="submit">Se Connecter</button>
            </form>
            <div class="options">
                <a href="#" id="inscription-link">Inscription</a>
                <a href="#" id="password-reset-link">Mot de passe oublié ?</a>
            </div>
        </div>
        
        <!-- Formulaire d'inscription -->
        <div class="inscription-form" id="inscription-form" style="display: none;">
            <h2>Inscription</h2>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <input type="hidden" name="form_type" value="inscription">
                <input type="text" name="name" placeholder="Nom" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Mot de passe" required>
                <button type="submit">S'inscrire</button>
            </form>
            <div class="options">
                <a href="#" id="inscription-back-link">Retour à la connexion</a>
            </div>
        </div>
        
        <!-- Formulaire de récupération de mot de passe -->
        <div class="password-reset-form" id="password-reset-form" style="display: none;">
            <h2>Mot de passe oublié ?</h2>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <input type="hidden" name="form_type" value="password_reset">
                <input type="email" name="email" placeholder="Email" required>
                <button type="submit">Envoyer</button>
            </form>
            <div class="options">
                <a href="#" id="password-reset-back-link">Retour à la connexion</a>
            </div>
        </div>
        
    </div>
    <script src="connection.js"></script>

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
