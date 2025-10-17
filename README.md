# 🌐 Developer Portfolio Template

[![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://php.net)
[![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)](https://developer.mozilla.org/en-US/docs/Web/HTML)
[![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)](https://developer.mozilla.org/en-US/docs/Web/CSS)
[![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)](https://developer.mozilla.org/en-US/docs/Web/JavaScript)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white)](https://getbootstrap.com)
[![MIT License](https://img.shields.io/badge/License-MIT-yellow.svg?style=for-the-badge)](https://opensource.org/licenses/MIT)

<br>

<div align="center">
  <img src="https://raw.githubusercontent.com/matheussesso/portfolio-devmat/refs/heads/main/public/assets/img/portfolio/site-devmat.gif" alt="Demo do Portfolio" width="600" style="margin-bottom: 20px;" />
</div>

<br>

This is my personal portfolio, which I decided to share. A simple, modern, responsive portfolio template built with pure PHP and a bit of JavaScript, featuring multi-language support, dark/light theme toggle, and an elegant interface. Perfect for developers looking to create their own portfolio website.

## Features

- **Multi-language support** (Portuguese 🇧🇷 | English 🇺🇸)
- **Dark/Light theme** with smooth transitions
- **Responsive design** for all devices
- **Interactive portfolio** with project filtering
- **Articles section** with DEV.to API integration
- **Clean URLs** with custom routing
- **SEO optimized** with translated meta tags
- **Google Analytics** ready

## Project Structure

```
portfolio-devmat/
├── public/                       # Public files
│   ├── index.php                 # Main router
│   └── assets/                   # Static resources
│       ├── css/styles.css        # Main styles
│       ├── js/                   # JavaScript files
│       ├── img/                  # Images
│       └── cv/                   # Resume PDF
├── src/                          # System logic
│   ├── language.php              # Language system
│   ├── projects.php              # Portfolio projects data
│   └── languages/                # Translation files
│       ├── pt.php                # Portuguese
│       └── en.php                # English
└── views/                        # PHP templates
    ├── home.php                  # Home page
    ├── 404.php                   # Error page
    └── includes/                 # Header & footer
```

## Installation

### Requirements
- **PHP 7.4+** with extensions: `session`, `json`, `mbstring`
- **Web Server** (Apache/Nginx)
- **Mod_rewrite** enabled (Apache)

### Quick Start
```bash
git clone https://github.com/matheussesso/portfolio-devmat.git
cd portfolio-devmat
```

### Configuration
1. **Edit your info** in `src/configs.php`
2. **Replace images** in `public/assets/img/`
3. **Update projects** in `src/projects.php`
4. **Configure DEV.to username** in `public/assets/js/articles.js`
5. **Configure Google Analytics** in `views/includes/header.php`

## Usage

### Language Configuration
Configure languages in `src/config.php`:
```php
'language' => [
    'default_language' => 'en',
    'available_languages' => ['en', 'pt'],
    'auto_detect_browser_language' => true,
    'store_in_session' => true
]
```

### Adding Projects
Edit `src/projects.php`:
```php
[
    'title' => __('project_name'),
    'url' => 'https://example.com',
    'domain' => 'example.com',
    'image' => 'assets/img/portfolio/example.png',
    'description' => __('project_description'),
    'technologies' => 'PHP, JavaScript, CSS'
]
```

### Articles Configuration
Configure your DEV.to articles in `public/assets/js/articles.js`:
```javascript
const DEVTO_USERNAME = 'your-devto-username';
const DEVTO_API_URL = `https://dev.to/api/articles?username=${DEVTO_USERNAME}&per_page=10`;
```

### Customization
- **Colors**: Edit CSS variables in `public/assets/css/styles.css`
- **Fonts**: Update Google Fonts link in header
- **Content**: Modify translation files in `src/languages/`
- **Articles**: Update DEV.to username and API settings

## Articles System

The portfolio features a dynamic articles section that integrates with the **DEV.to API** to display your latest blog posts.

### Features
- **Automatic fetching** of articles from DEV.to
- **Responsive carousel** navigation with touch support
- **Article statistics** showing reactions and comments
- **Multi-language support** for article interface
- **Error handling** for API failures
- **Loading states** and smooth animations
- **Direct links** to read full articles on DEV.to

### Configuration
1. Edit your DEV.to username in `public/assets/js/articles.js`:
```javascript
const DEVTO_USERNAME = 'your-username-here';
```

2. Customize the number of articles displayed:
```javascript
const DEVTO_API_URL = `https://dev.to/api/articles?username=${DEVTO_USERNAME}&per_page=10`;
```

3. Enable/disable the articles button in `src/configs.php`:
```php
'interface' => [
    'show_articles_button' => true,
    // ... other settings
]
```

### How it Works
The system fetches articles using the DEV.to public API, displaying:
- Article title and description
- Cover image (with fallback)
- Publication date
- Reaction and comment counts
- Article tags (limited to 3)

All content is dynamically loaded and supports the site's multi-language system.

## Technical Features
- **Clean URLs** with custom routing
- **Multi-language system** with browser detection
- **Dark/Light theme** with localStorage persistence
- **Interactive portfolio** with filtering and search
- **DEV.to API integration** for dynamic articles loading
- **Responsive design** for all devices
- **SEO optimized** with translated meta tags

## License

This project is licensed under the **MIT License** - see the [LICENSE](LICENSE) file for details.

## Author

**Matheus Sesso**
- **Website**: [devmat.com.br](https://devmat.com.br)
- **LinkedIn**: [matheussesso](https://linkedin.com/in/matheussesso)
- **GitHub**: [@matheussesso](https://github.com/matheussesso)

---

**If this project helped you, consider giving it a star!** ⭐ 
