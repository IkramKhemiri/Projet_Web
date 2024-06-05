document.addEventListener("DOMContentLoaded", function () {
  const phoneNumber = document.querySelector("#phone-number");

  phoneNumber.addEventListener("mouseover", function () {
    const tooltip = document.querySelector("#phone-tooltip");
    tooltip.style.display = "block";
  });

  phoneNumber.addEventListener("mouseout", function () {
    const tooltip = document.querySelector("#phone-tooltip");
    tooltip.style.display = "none";
  });

  // Récupérer les éléments des liens d'inscription et de mot de passe oublié
  var inscriptionLink = document.querySelector("#inscription-link");
  var passwordResetLink = document.querySelector("#password-reset-link");

  // Récupérer les éléments des formulaires d'inscription et de mot de passe oublié
  var inscriptionForm = document.querySelector("#inscription-form");
  var passwordResetForm = document.querySelector("#password-reset-form");

  // Ajouter des événements de clic aux liens
  inscriptionLink.addEventListener("click", function () {
    // Afficher le formulaire d'inscription et masquer le formulaire de mot de passe oublié
    inscriptionForm.style.display = "block";
    passwordResetForm.style.display = "none";
  });

  passwordResetLink.addEventListener("click", function () {
    // Afficher le formulaire de mot de passe oublié et masquer le formulaire d'inscription
    passwordResetForm.style.display = "block";
    inscriptionForm.style.display = "none";
  });

  // Fonction pour masquer tous les formulaires sauf celui spécifié
  function masquerAutresFormulaires(formulaire) {
    // Sélectionner tous les formulaires
    var tousFormulaires = document.querySelectorAll(
      ".inscription-form, .password-reset-form, .login-form"
    );
    // Masquer tous les formulaires sauf celui spécifié
    tousFormulaires.forEach(function (form) {
      if (form !== formulaire) {
        form.style.display = "none";
      }
    });
  }

  // Ajouter des événements de clic aux liens d'inscription et de mot de passe oublié
  inscriptionLink.addEventListener("click", function () {
    // Afficher le formulaire d'inscription et masquer les autres formulaires
    inscriptionForm.style.display = "block";
    masquerAutresFormulaires(inscriptionForm);
  });

  passwordResetLink.addEventListener("click", function () {
    // Afficher le formulaire de mot de passe oublié et masquer les autres formulaires
    passwordResetForm.style.display = "block";
    masquerAutresFormulaires(passwordResetForm);
  });

  // Retour à la connexion depuis les formulaires d'inscription et de mot de passe oublié
  var inscriptionBackLink = document.querySelector("#inscription-back-link");
  var passwordResetBackLink = document.querySelector(
    "#password-reset-back-link"
  );

  inscriptionBackLink.addEventListener("click", function () {
    // Masquer le formulaire d'inscription
    inscriptionForm.style.display = "none";
    // Afficher le formulaire de connexion
    document.querySelector(".login-form").style.display = "block";
  });

  passwordResetBackLink.addEventListener("click", function () {
    // Masquer le formulaire de mot de passe oublié et afficher le formulaire de connexion
    passwordResetForm.style.display = "none";
    document.querySelector(".login-form").style.display = "block";
  });
});

document.addEventListener("DOMContentLoaded", function () {
  // Récupérer le bouton Facebook
  var facebookBtn = document.getElementById("facebook-btn");

  // Ajouter un écouteur d'événements au bouton Facebook
  facebookBtn.addEventListener("click", function () {
    // Rediriger vers l'URL de votre choix pour la connexion via Facebook
    window.location.href = "https://votresite.com/login/facebook"; // Remplacez par l'URL de votre page de connexion via Facebook
  });

  // Récupérer le bouton Google
  var googleBtn = document.getElementById("google-btn");

  // Ajouter un écouteur d'événements au bouton Google
  googleBtn.addEventListener("click", function () {
    // Rediriger vers l'URL de votre choix pour la connexion via Google
    window.location.href = "https://votresite.com/login/google"; // Remplacez par l'URL de votre page de connexion via Google
  });

  // Récupérer le bouton Apple
  var appleBtn = document.getElementById("apple-btn");

  // Ajouter un écouteur d'événements au bouton Apple
  appleBtn.addEventListener("click", function () {
    // Rediriger vers l'URL de votre choix pour la connexion via Apple
    window.location.href = "https://votresite.com/login/apple"; // Remplacez par l'URL de votre page de connexion via Apple
  });
});
