/**
 * Theme management module
 * Handles the switching between light and dark themes and persists the user's preference
 */

// Get DOM elements
const themeToggleBtn = document.getElementById('theme-toggle');
const body = document.body;

/**
 * Updates the theme toggle button icon based on current theme
 * Changes between sun and moon icons depending on dark/light mode
 */
function updateThemeIcon() {
    const icon = themeToggleBtn.querySelector('i');
    if (body.classList.contains('dark-theme')) {
        icon.classList.remove('fa-moon');
        icon.classList.add('fa-sun');
    } else {
        icon.classList.remove('fa-sun');
        icon.classList.add('fa-moon');
    }
}

/**
 * Loads the saved theme preference from localStorage
 * Applies the theme to the body element and updates the toggle icon
 */
function loadTheme() {
    const theme = localStorage.getItem('theme');
    if (theme === 'dark') {
        body.classList.add('dark-theme');
    }
    updateThemeIcon();
}

// Add click event listener to theme toggle button
themeToggleBtn.addEventListener('click', () => {
    // Toggle dark theme class
    body.classList.toggle('dark-theme');
    
    // Save theme preference to localStorage
    if (body.classList.contains('dark-theme')) {
        localStorage.setItem('theme', 'dark');
    } else {
        localStorage.setItem('theme', 'light');
    }
    
    // Update the toggle button icon
    updateThemeIcon();
});

// Initialize theme on page load
loadTheme();
