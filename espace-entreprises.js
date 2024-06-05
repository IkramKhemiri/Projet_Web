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


    