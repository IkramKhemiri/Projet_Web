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


  document.addEventListener("DOMContentLoaded", function() {
    const articleContainers = document.querySelectorAll(".article-container");

    articleContainers.forEach(articleContainer => {
      const img = articleContainer.querySelector(".img-article");
      const hoverOverlay = articleContainer.querySelector(".hover-overlay");
      const dots = articleContainer.querySelectorAll(".dot");

      function getImagePosition() {
        const rect = img.getBoundingClientRect();
        const parentRect = articleContainer.getBoundingClientRect();
        const x = rect.left - parentRect.left;
        const y = rect.top - parentRect.top;
        return { x, y };
      }

      articleContainer.addEventListener("mouseenter", function() {
        const imagePosition = getImagePosition();
        hoverOverlay.style.top = `${imagePosition.y}px`;
        hoverOverlay.style.left = `${imagePosition.x}px`;
        hoverOverlay.style.opacity = 1;
        dots.forEach(dot => {
          dot.style.opacity = 1;
        });
      });

      articleContainer.addEventListener("mouseleave", function() {
        hoverOverlay.style.opacity = 0;
        dots.forEach(dot => {
          dot.style.opacity = 0;
        });
      });
    });
  });