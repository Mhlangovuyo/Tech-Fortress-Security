// Mobile nav toggle
const toggle = document.getElementById('menu-toggle');
const navLinks = document.querySelector('nav ul');
toggle.addEventListener('change', () => navLinks.classList.toggle('show'));

// Scroll reveal effect
const reveals = document.querySelectorAll('.reveal');
const options = { threshold: 0.2 };

const revealObserver = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('active');
    }
  });
}, options);

reveals.forEach(sec => revealObserver.observe(sec));
