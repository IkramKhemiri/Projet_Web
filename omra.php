<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="omra.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>
 <div class="pricipale"> 
<header>
    
    <section class="section-header">
        <ul class="nav">
        <li>
            <a id="logo" href="home.php">
                <img src="NextTravel.png" alt="NextTravel" title="Accueil" >
            </a>
        </li>
            <li class="nav-item ">
                <a aria-current="page" class="nav-link" href="mailto:client@NextTravel.com"><img src="email.gif" alt="email " title="email" class="img-fluid">client@NextTravel.com</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="nos-agences.php"><img src="home.gif" alt="Agences" title="Agences " class="img-fluid ">Nos
                    agences</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="#" onclick="openpopup()"><img src="email.gif" alt="contact " title="contact" class="img-fluid " >Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="favorites.php" rel="noindex, nofollow"><img src="heart.gif" alt="Best " title="Best " class="img-fluid ">Favoris</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="espace-entreprises.php" target="_blank"><img src="handshake.gif"  alt="Espace entreprises" title="Espace entreprises" class="img-fluid ">Espace entreprises</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="blog.html" target="_blank"><img src="writing.gif" alt="Blog " title="Blog" class="img-fluid ">Blog</a>
            </li>
            <li class="nav-item ">

                <a class="nav-link "> <img src="dollar.gif" alt="Currency " title="Currency" class="img-fluid me-2">
                    TND
                </a>
            </li>
            <li class="nav-item">
                <a title="Se connecter compte client" class="nav-link  " >
                <button id="connection"><a href="connection.php"> <img src="userlogin.png" >Se connecter</a></button>
            </li>
        </ul>
    </section>
    <hr>
    <section id="section-header-2">
        <UL id="header-ul">
            <li class="header-li"><a href="home.php">Home</a></li>
            <li class="header-li"><a href="hotels.php">Hotels</a></li>
            <li class="header-li"><a href="vols.php">Vols</a></li>
            <li class="header-li"><a href="Omra.php">Omra</a></li>
            <li class="header-li"><a href="villas.php">Villas & Apparts</a></li>
        </UL>
        <div id="phone-number">
            <img id="phone" src="phone.gif" alt="phone">
            +216 22 222 222
        </div>
        <div id="phone-tooltip" class="tooltip">Du Lundi au vendredi de 08h30 à 19h30<br>Samedi de 08h30 à 21h<br>Dimanche de 10h à 17h30</div>
    </section>
    <hr>
</header>
<section class="image">
    <audio src="Labbaik_allahuma.mp3" autoplay></audio>
    <div class="wrapper" id="wrapper">
        <div class="form-box contact">
            <h2>Contact</h2>
            <form action="contact.php" method="post">
                <span class="icon-close" onclick="closepopup()"><ion-icon name="close-outline"></ion-icon></span>
                <div class="input-box">
                    <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                    <input type="Nom" required>
                    <label >Nom et Prénom</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
                    <input type="email" required>
                    <label >Email</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="call-outline"></ion-icon></span>
                    <input type="phone" required>
                    <label >Téléphone</label>
                </div>
                <div class="message">
                    <span class="icon"></ion-icon><ion-icon name="create-outline"></ion-icon></span>
                    <label for=""><textarea name="msg"  cols="35" rows="6" style="background-color: transparent;"></textarea>Mesaage</label>
                </div>
                <button type="submit" class="btn">Envoyer</button><button type="reset" class="btn">Annuler</button>
            </form>
        </div>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </div> 
    
   
</section>
<section class="main">
    <div class="tableau">
    <table border="1">
        <tr>
            <th>Type</th>
            <th>Chambre à deux</th>
            <th>Chambre à trois</th>
            <th>Chambre à quatre</th>
            <th>Départ-Arrivée</th>
        </tr>
        <tr>
            <td>Confort A</td>
            <td>22000 DT</td>
            <td>19000 DT</td>
            <td>18000 DT</td>
            <td>30/03 -- 13/04</td>

        </tr>
        <tr>
            <td>Confort B</td>
            <td>13000 DT</td>
            <td>10000 DT</td>
            <td>9000 DT</td>
            <td>23/03 -- 11/04 <br>30/03 -- 13/04 <br>02/04 -- 19/04</td>

        </tr>
        <tr>
            <td>Confort C</td>
            <td>12900 DT</td>
            <td>10200 DT</td>
            <td>8990 DT</td>
            <td>23/03 -- 11/04</td>

        </tr>
    </table>
    </div>
    <div class="arrow">
        <img src="arrows.gif" >
    </div>
    <div class="reservation">
        <div class="reservation" id="reservation">
            <div class="form-box contact">
                <h2>Réserver Maintenant</h2>
                <form action="reservationOmra.php" method="post">
                    <span class="icon-close" ><ion-icon name="close-outline"></ion-icon></span>
                    <div class="input-box">
                        <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                        <input type="Nom" name="Nom" required>
                        <label >Nom et Prénom</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
                        <input type="email" name="email" required>
                        <label >Email</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><ion-icon name="call-outline"></ion-icon></span>
                        <input type="phone" name="phone" required>
                        <label >Téléphone</label>
                    </div>
                    <div >
                    
                        <label >Type de Omra</label>
                        <select name="omraType" id="omraType" onchange="updateDates()">
                            <option value="Confort A">Confort A</option>
                            <option value="Confort B">Confort B</option>
                            <option value="Confort C">Confort C</option>
                        </select>
                    </div>
                    <div >
                
                        <label >Départ-Arrivée</label>
                        <select name="dates" id="dates" required >
                            <!-- Les options seront mises à jour dynamiquement -->
                        </select>
                    </div>
                    <button type="submit" class="btn">Réserver</button><button type="reset" class="btn">Annuler</button>
                </form>
            </div>
    
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</section>

<section class="visa">
    <h1 class="title">Conditions pour avoir le visa omra</h1>
   <ol>
    <li >Passeport (validité minimum 6 mois à partir de la date de départ)</li>
    <li>Femme seule non accompagnée par un « Mahram charai » doit être âgée d’au moins 45 ans.</li>
    <li>Les vaccins ne sont pas tous obligatoires </li>
    <li>Il n'y a pas de limite d'age</li>
   </ol>
   <h1 class="title">Promo</h1>
   <ul class="list-puce">
    <li><img src="check-mark.png">Promo pour les enfants moins de 12 ans de 300 DT</li>
    <li><img src="check-mark.png">Promo pour les personnes qui ont un visa touristique pour l'Arabie Saoudite</li>
   </ul>
   <h1 class="title">les prix incluent</h1>
   <ul class="list-puce">
    <li><img src="check-mark.png">Visa</li>
    <li><img src="check-mark.png">Transport</li>
    <li><img src="check-mark.png">Hébergement</li>
    <li><img src="check-mark.png">Assurance maladie</li>
    <li><img src="check-mark.png">Accompagnement pendant le voyage</li>
   </ul>
</section>






<footer>
    <div class="footer_container">
        <div class="sotialIcons">
            <a href=""><i class="fa-brands fa-facebook"></i></a>
            <a href=""><i class="fa-brands fa-instagram"></i></a>
            <a href=""><i class="fa-brands fa-twitter"></i></a>
            <a href=""><i class="fa-brands fa-google-plus"></i></a>
            <a href=""><i class="fa-brands fa-youtube"></i></a>
            
        </div>
    </div>
    <hr>
    <div class="div2">
        <div>
            <h3>Informations utiles</h3>
        <ul>
            <a href="#">Qui sommes-nous?</a>
            <a href="#">Next Travel vous répond</a>
            <a href="#" class="contact-link" onclick="openpopup()">Contact</a>
        </ul>
        </div>
        <div >
            <h3>Contact</h3>
        <ul>
            <p>Adresse :</p>
            <a href="#">Tunis , Tunisie</a>
            <a href="mailto Nexttravel@gmail.com">Nexttravel@gmail.com</a>
            <a href="#"><p>Tél:</p>(+216)55000111</a>
        </ul>
        </div>
        <div >
            <h3>Applications mobiles</h3>
            <div><img src="appstore.png" ><img src="playstore.png" ></div>
            
    
        </div>
        
    </div>
    <hr>
    <div><center><h5 style="color: #fff;margin-top: 20px;padding: 20px; ">©2024 NextTravel - Tous droits réservés.</h5></center></div>
</div>

<script>
    function updateDates() {
        var omraType = document.getElementById("omraType").value;
        var datesSelect = document.getElementById("dates");

        // Effacer les options précédentes
        datesSelect.innerHTML = "";

        // Ajouter les options correspondantes au type d'Omra sélectionné
        switch (omraType) {
            case "Confort A":
                addOption(datesSelect, "30/03 -- 13/04", "30/03 -- 13/04");
                break;
            case "Confort B":
                addOption(datesSelect, "23/03 -- 11/04", "23/03 -- 11/04");
                addOption(datesSelect, "30/03 -- 13/04", "30/03 -- 13/04");
                addOption(datesSelect, "02/04 -- 19/04", "02/04 -- 19/04");
                break;
            case "Confort C":
                addOption(datesSelect, "23/03 -- 11/04", "23/03 -- 11/04");
                break;
            default:
                // Par défaut, ajouter des options génériques
                addOption(datesSelect, "00/00--00/00", "00/00--00/00");
                break;
        }
    }

    function addOption(selectElement, value, text) {
        var option = document.createElement("option");
        option.value = value;
        option.text = text;
        selectElement.add(option);
    }

    // Appel initial pour mettre à jour les dates lors du chargement de la page
    window.onload = updateDates;
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const phoneNumber = document.querySelector('#phone-number');
    
        phoneNumber.addEventListener('mouseover', function() {
            const tooltip = document.querySelector('#phone-tooltip');
            tooltip.style.display = 'block';
        });
    
        phoneNumber.addEventListener('mouseout', function() {
            const tooltip = document.querySelector('#phone-tooltip');
            tooltip.style.display = 'none';
        });
    });
</Script>
<script type="text/javascript">
    let wrapper=document.getElementById("wrapper");
    function openpopup(){
        wrapper.classList.add("open-popup");
    }
    function closepopup(){
        wrapper.classList.remove("open-popup");
    }
</script>
</body>
</html>