document.addEventListener('DOMContentLoaded', function() {
    // Search toggle logic
    const searchToggle = document.querySelector('.search-toggle');
    const searchContainer = document.querySelector('.search-container');
    const searchInput = document.querySelector('.search-input');

    if (searchToggle && searchContainer && searchInput) {
        searchToggle.addEventListener('click', function() {
            searchContainer.classList.toggle('active');
            if (searchContainer.classList.contains('active')) {
                searchInput.focus();
            }
        });
    }

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