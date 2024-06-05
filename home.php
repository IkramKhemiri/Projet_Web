<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="home.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body >
   <div class="container">
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
                    <a class="nav-link " href="blog.php" target="_blank"><img src="writing.gif" alt="Blog " title="Blog" class="img-fluid ">Blog</a>
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
       <section class="home" >
        <video src="1.mp4" loop autoplay muted></video>
        <!--<div>
            <h1>Votre prochaine aventure commence ici !</h1>
            <p>"Préparez-vous à embarquer pour une aventure extraordinaire ! Chez [Nom de l'agence de voyage],</p>
            <p> nous sommes passionnés par la découverte de nouveaux horizons et l'exploration de destinations fascinantes à travers le monde</p>
            <div><center><button type="button">Reserver maintenant</button></center></div>
        </div>--> 
        <div class="wrapper" id="wrapper">
            <div class="form-box contact">
                <h2>Contact</h2>
                <form action="contact.php" method="post">
                    <span class="icon-close" onclick="closepopup()"><ion-icon name="close-outline"></ion-icon></span>
                    <div class="input-box">
                        <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                        <input  type="text" name="nm" required>
                        <label >Nom et Prénom</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
                        <input type="email" name="em" required>
                        <label >Email</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><ion-icon name="call-outline"></ion-icon></span>
                        <input type="tel" name="tln" required>
                        <label >Téléphone</label>
                    </div>
                    <div class="message">
                        <span class="icon"></ion-icon><ion-icon name="create-outline"></ion-icon></span>
                        <label for=""><textarea id="msg" name="msg"  cols="35" rows="6" style="background-color: transparent;"></textarea>Mesaage</label>
                    </div>
                    <button type="submit" class="btn">Envoyer</button>
                </form>
            </div>
            <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
        </div> 
        <div class="trip">
            <form action="">
                <div>
                    <label for="">Pays</label>
                    <input type="text" placeholder="Entrez un pays">
                </div>
                <div>
                    <label for="">Ville</label>
                    <input type="text" placeholder="Entrez une ville">
                </div>
                <div>
                    <label for="">Région</label>
                    <input type="text" placeholder="Entrez une région">
                </div>
                <input type="submit" value="voir">
            </form>
          
      </section>
      
<!--<section class="home">
    <video autoplay loop muted plays-inline><source src="video.mp4"></video>
    <h1>Votre prochaine aventure commence ici !</h1>
    <div><center><button type="button">Reserver maintenant</button></center></div>
    
</section>-->
        <section id="offre">
            <h1 class="title">Offre du mois</h1>
            <div class="img-desc">
                <div class="left">
                    <video src="venise.mp4" autoplay loop muted></video>
                </div>
                <div class="right">
                    <h3>Venise</h3>
                    <p>Envie d'une escapade enchanteresse ? Embarquez pour Venise et laissez-vous transporter dans un monde où le passé rencontre le présent. Réservez dès maintenant pour une aventure authentique dans la Cité des Doges !</p>
                    <a href="reservation.php?destination=venise">Voir Plus</a>
                </div>
            </div>
        </section>
        <section id="destination">
            <h1 class="title">Destinations populaires</h1>
            <div class="content">
                <div class="box">
                    <img src="paris.jpg" alt="">
                    <div class="content">
                        <div>
                            <h4>Paris</h4>
                            <p>Meilleur tarif sur le marché </p>
                            <p>Ebérgement + Excursion</p>
                            <p>A partir de</p><h4>2100DT</h4>
                            <a href="reservation.php?destination=paris">Voir Plus</a>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <img src="greece.jpg" alt="">
                    <div class="content">
                        <div>
                            <h4>Grèce</h4>
                            <p>Meilleur tarif sur le marché </p>
                            <p>Ebérgement + Excursion</p>
                            <p>A partir de</p><h4>3664DT</h4>
                            <a href="reservation.php?destination=grèce">Voir Plus</a>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <img src="morocco.jpg" alt="">
                    <div class="content">
                        <div>
                            <h4>Maroc</h4>
                            <p>Meilleur tarif sur le marché </p>
                            <p>Hotel 4* + Transport</p>
                            <p>A partir de</p><h4>1990DT</h4>
                            <a href="reservation.php?destination=maroc">Voir Plus</a>
                        </div>   
                    </div>
                </div>
                <div class="box">
                    <img src="dubai.jpg" alt="">
                    <div class="content">
                        <div>
                            <h4>Dubai</h4>
                            <p>Meilleur tarif sur le marché </p>
                            <p>Hotel 4* + Transport</p>
                            <p>A partir de</p><h4>1990DT</h4>
                            <a href="reservation.php?destination=dubai">Voir Plus</a>
                        </div>   
                    </div>
                </div>
                <div class="box">
                    <img src="thailande.jpg" alt="">
                    <div class="content">
                        <div>
                            <h4>Thailande</h4>
                            <p>Meilleur tarif sur le marché </p>
                            <p>Hotel 4* + Transport</p>
                            <p>A partir de</p><h4>3499DT</h4>
                            <a href="reservation.php?destination=thailande">Voir Plus</a>
                        </div>   
                    </div>
                </div> <div class="box">
                    <img src="suisse.jpg" alt="">
                    <div class="content">
                        <div>
                            <h4>Suisse</h4>
                            <p>Meilleur tarif sur le marché </p>
                            <p>Hotel 4* + Transport</p>
                            <p>A partir de</p><h4>2690DT</h4>
                            <a href="reservation.php?destination=suisse">Voir Plus</a>
                        </div>   
                    </div>
                </div>
            </div>


        </section>
        <section class="garanties"> 
            <div >
             <h1 class="title">Nos 5 garanties </h1>
              <div class="garantie">
                  <div class="element">
                        <div class="divimg"><img src=1.png alt=""></div>
                        <div>
                            <p >Une proximité des clients :
                              34 points de vente sur tout le territoire tunisien </p>
                        </div>
                  </div>
                    <div class="element">
                        <div><img src=2.png alt=""></div>
                        <div >
                            <p >Un call-center 
                              toujours à l'écoute de nos clients même en période de grand flux.</p>
                        </div>
                  </div>
                    <div class="element">
                        <div ><img src=3.png alt=""></div>
                        <div >
                            <p > Des tarifs les plus attractifs du marché (en TTC)    </p>
                        </div>
                  </div>
                    <div class="element" >
                        <div><img src=4.png alt=""></div>
                        <div>
                            <p > Une exhaustivité de l'offre 
                              Plus de 884.000 hôtels dans le monde </p>
                        </div>
                  </div>
                  <div class="element">
                    <div ><img src=5.png alt=""></div>
                    <div>
                        <p > Plus de 18 ans d'expérience sur le marché </p>
                    </div>
              </div>
              </div>
            </div>
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

        
        </footer>
    </div>
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