document.addEventListener('DOMContentLoaded', () => {
  // 1. Fade-in Testimonials
  const cards = document.querySelectorAll('.testimonial-card');
  const observer = new IntersectionObserver((entries, obs) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
        obs.unobserve(entry.target);
      }
    });
  }, { threshold: 0.2 });
  cards.forEach(card => observer.observe(card));

  // 2. GSAP hero animation if available
  if (window.gsap) {
    gsap.from('.hero h2', { y: -50, opacity: 0, duration: 1 });
    gsap.from('.hero p', { y: 50, opacity: 0, duration: 1, delay: 0.5 });
    gsap.from('.hero .btn', { scale: 0, opacity: 0, duration: 0.5, delay: 1 });
  }

  // 3. Lazy load high-res images
  document.querySelectorAll('img[data-src]').forEach(img => {
    img.src = img.dataset.src;
    img.onload = () => img.removeAttribute('data-src');
  });

  // 4. Smooth scroll for nav links
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', e => {
      e.preventDefault();
      document.querySelector(anchor.getAttribute('href'))
        .scrollIntoView({ behavior: 'smooth' });
    });
  });
});
