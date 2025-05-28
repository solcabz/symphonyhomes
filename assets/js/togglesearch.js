document.addEventListener('DOMContentLoaded', function() {
    var searchToggle = document.querySelector('.search-toggle');
    var searchContainer = document.querySelector('.search-container');
    var searchInput = document.querySelector('.search-input');

    if (searchToggle && searchContainer && searchInput) {
        searchToggle.addEventListener('click', function() {
            searchContainer.classList.toggle('active');
            if (searchContainer.classList.contains('active')) {
                searchInput.style.display = 'block';
                searchInput.focus();
            } else {
                searchInput.style.display = 'none';
            }
        });
    }
});

document.addEventListener('DOMContentLoaded', function() {
    var searchToggle = document.querySelector('.search-toggle');
    var searchContainer = document.querySelector('.search-container');
    var searchInput = document.querySelector('.search-input');

    if (searchToggle && searchContainer && searchInput) {
        searchToggle.addEventListener('click', function() {
            searchContainer.classList.toggle('active');
            if (searchContainer.classList.contains('active')) {
                searchInput.style.display = 'block';
                searchInput.focus();
            } else {
                searchInput.style.display = 'none';
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