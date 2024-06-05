document.getElementById('trip-form').addEventListener('submit', function (event) {
    event.preventDefault();

    const form = event.target;
    const from = form.from.value;
    const to = form.to.value;
    const tripType = form.trip-type.value;
    const date = form.date.value;
    const passengers = form.passengers.value;
    const baggage = form.baggage.checked;
    const directFlight = form.direct-flight.checked;
    const flexibility = form.flexibility.value;

    if (!from || !to) {
        alert('Veuillez saisir à la fois le lieu de départ et le lieu de destination.');
        return;
    }
    
    if (tripType === 'aller-retour' && !date) {
        alert('Veuillez saisir une date de retour.');
        return;
    }
    
    if (!flexibility) {
        alert('Veuillez sélectionner une option de flexibilité.');
    }
    
    if (!passengers) {
        alert('Veuillez sélectionner le nombre de passagers.');
    }

    if (!cabinClass) {
        alert('Veuillez sélectionner une classe de cabine.');
    }

    alert('Votre voyage a été planifié avec succès!');
    alert(`De : ${from}, À : ${to}, Type de voyage : ${tripType}, Date : ${date}, Passagers : ${passengers}, Bagages : ${baggage ? 'Oui' : 'Non'}, Vol direct : ${directFlight ? 'Oui' : 'Non'}, Flexibilité : ${flexibility}`);
    
});

document.addEventListener('DOMContentLoaded', () => {
    const passengerForm = document.getElementById('passengerForm');
    const addAdult = document.getElementById('addAdult');
    const removeAdult = document.getElementById('removeAdult');
    const addChild = document.getElementById('addChild');
    const removeChild = document.getElementById('removeChild');
    const addInfant = document.getElementById('addInfant');
    const removeInfant = document.getElementById('removeInfant');
    const adultCount = document.getElementById('adultCount');
    const childrenCount = document.getElementById('childrenCount');
    const infantsCount = document.getElementById('infantsCount');

    let adults = 1;
    let children = 0;
    let infants = 0;

    function updateCount() {
        adultCount.textContent = adults;
        childrenCount.textContent = children;
        infantsCount.textContent = infants;
    }

    addAdult.addEventListener('click', () => {
        if (adults < 9) {
            adults++;
            updateCount();
        }
    });

    removeAdult.addEventListener('click', () => {
        if (adults > 1) {
            adults--;
            updateCount();
        }
    });

    addChild.addEventListener('click', () => {
        if (children < 9) {
            children++;
            updateCount();
        }
    });

    removeChild.addEventListener('click', () => {
        if (children > 0) {
            children--;
            updateCount();
        }
    });

    addInfant.addEventListener('click', () => {
        if (infants < 9) {
            infants++;
            updateCount();
        }
    });

    removeInfant.addEventListener('click', () => {
        if (infants > 0) {
            infants--;
            updateCount();
        }
    });

    passengerForm.addEventListener('submit', e => {
        e.preventDefault();
    });
});




document.addEventListener("DOMContentLoaded", function() {
    var images = document.querySelectorAll(".slider img");
    var currentImageIndex = 0;
  
    setInterval(function() {
      images[currentImageIndex].classList.remove("active");
      currentImageIndex = (currentImageIndex + 1) % images.length;
      images[currentImageIndex].classList.add("active");
    }, 3000); 
  });
  

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
