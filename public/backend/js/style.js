window.addEventListener('scroll', () => {
    const navbar = document.querySelector('.navbar-container');
    if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
});