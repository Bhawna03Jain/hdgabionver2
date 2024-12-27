import { toggleVisibility } from './common.js'; // Adjust the path if necessary
// Toggle visibility for mobile menu
const toggleMobileMenu = () => {
    const menucrossbox = document.getElementById('menucrossbox');
    const menubox = document.getElementById('menubox');
    const mobilenav = document.getElementById('mobile_nav');

    menucrossbox.addEventListener('click', () => mobilenav.classList.remove("visible"));
    menubox.addEventListener('click', () => mobilenav.classList.add("visible"));
};

// Scroll handling for navbar
const handleScroll = () => {
    const nav = document.getElementById('nav_bar');
    const logo = document.querySelector('#logo');

    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            nav.classList.add('scrolled');
            logo.classList.add('logo_scrolled');
        } else {
            nav.classList.remove('scrolled');
            logo.classList.remove('logo_scrolled');
        }
    });
};

// Initialize events
document.addEventListener("DOMContentLoaded", () => {
    // Language and cart dropdowns
    toggleVisibility("languageFlag", "languageDropdown");
    toggleVisibility("parent-cart", "cart-dropdown");

    // Product dropdowns for desktop and mobile
    toggleVisibility("product", "product-dropdown", "open");
    toggleVisibility("product_mobile", "product_mobile-dropdown", "open");

    // Mobile menu toggle
    toggleMobileMenu();

    // Scroll event for navbar
    handleScroll();
});
