const themeToggleBtn = document.getElementById('theme-toggle');
const body = document.body;

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

function loadTheme() {
    const theme = localStorage.getItem('theme');
    if (theme === 'dark') {
        body.classList.add('dark-theme');
    }
    updateThemeIcon();
}

themeToggleBtn.addEventListener('click', () => {
    body.classList.toggle('dark-theme');
    if (body.classList.contains('dark-theme')) {
        localStorage.setItem('theme', 'dark');
    } else {
        localStorage.setItem('theme', 'light');
    }
    updateThemeIcon();
});

loadTheme();
