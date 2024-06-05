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

// Fonction pour animer les éléments lorsque le document est chargé
window.onload = function() {
    var body = document.querySelector('body');
    animateElements(body);
};

// Fonction pour animer les éléments du body
function animateElements(body) {
    // Animation pour le titre de la partie
    var titrePartie = body.querySelector('.titre-partie');
    fadeIn(titrePartie);

    // Animation pour les sous-titres
    var sousTitres = body.querySelectorAll('.sous-titre');
    sousTitres.forEach(function(sousTitre) {
        fadeIn(sousTitre);
    });

    // Animation pour les images
    var images = body.querySelectorAll('img');
    images.forEach(function(image) {
        fadeIn(image);
    });

    // Animation pour les paragraphes
    var paragraphes = body.querySelectorAll('p');
    paragraphes.forEach(function(paragraphe) {
        fadeIn(paragraphe);
    });
}

// Fonction pour l'animation de fondu en entrée
function fadeIn(element) {
    var opacity = 0;
    var timer = setInterval(function() {
        if (opacity >= 1) {
            clearInterval(timer);
        }
        element.style.opacity = opacity;
        opacity += 0.05;
    }, 50);
}