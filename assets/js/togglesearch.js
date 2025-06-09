document.addEventListener('DOMContentLoaded', function() {
   
    // Hamburger menu logic
    const hamburger = document.getElementById('navbar-hamburger');
    const menu = document.querySelector('.menu-wrapper');
    const body = document.body;

    if (hamburger && menu) {
        hamburger.addEventListener('click', () => {
            hamburger.classList.toggle('active');
            menu.classList.toggle('active');
            body.classList.toggle('no-scroll', menu.classList.contains('active'));
        });
    }
});