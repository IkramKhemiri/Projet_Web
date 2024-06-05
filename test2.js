document.getElementById('search-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent form submission

    var destination = document.getElementById('destination').value.toLowerCase().trim();
    switch (destination) {
        case "nice":
            window.location.href = 'nice1.html';
            break;
        case "paris":
            window.location.href = 'paris1.html';
            break;
        case "madrid":
            window.location.href = 'madrid1.html';
            break;
        case "monastir":
            window.location.href = 'monastir1.html';
            break;
        case "rome":
            window.location.href = 'index1.html';
            break;
        default:
            alert('Destination not found.');
    }
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