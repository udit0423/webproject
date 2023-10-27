// Function to start counting when the element is in the viewport
function startCounting(entry, observer) {
    entry.target.classList.add('counting'); // Add a class for counting
    observer.unobserve(entry.target); // Stop observing once counting begins
  
    let valueDisplay = entry.target;
    let startValue = 0;
    let endValue = parseInt(valueDisplay.getAttribute("data-val"));
    let interval = 4000;
    let duration = Math.floor(interval / endValue);
  
    let counter = setInterval(function () {
      startValue += 1;
      valueDisplay.textContent = startValue;
      if (startValue === endValue) {
        clearInterval(counter);
      }
    }, duration);
  }
  
  // Initialize the Intersection Observer
  const observer = new IntersectionObserver((entries, observer) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting && !entry.target.classList.contains('counting')) {
        startCounting(entry, observer);
      }
    });
  }, { threshold: 0.5 });
  
  // Observe each .num element
  document.querySelectorAll(".num").forEach((valueDisplay) => {
    observer.observe(valueDisplay);
  });
  