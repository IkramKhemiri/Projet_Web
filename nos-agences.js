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

const agences = document.querySelectorAll('.agence');

function apparitionProgressive() {
    agences.forEach((agence, index) => {
        agence.style.opacity = '0'; 
        agence.style.transition = `opacity 1s ease ${index * 0.5}s`; 
        function delayOpacityChange() {
            setTimeout(() => {
                agence.style.opacity = '1'; 
            }, 1500 + index * 100); 
        }
        delayOpacityChange();
    });
}

window.addEventListener('load', apparitionProgressive);

