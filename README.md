# 🌐 Developer Portfolio Template

[![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://php.net)
[![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)](https://developer.mozilla.org/en-US/docs/Web/JavaScript)
[![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)](https://developer.mozilla.org/en-US/docs/Web/HTML)
[![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)](https://developer.mozilla.org/en-US/docs/Web/CSS)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white)](https://getbootstrap.com)
[![MIT License](https://img.shields.io/badge/License-MIT-yellow.svg?style=for-the-badge)](https://opensource.org/licenses/MIT)

<br>

<div align="center">
  <img src="https://raw.githubusercontent.com/matheussesso/portfolio-devmat/refs/heads/main/public/assets/img/imgdemo.gif" alt="Demo do Portfolio" width="600" style="margin-bottom: 20px;" />
</div>

<br>

A simple, modern, responsive portfolio template built with pure PHP and a bit of Javascript, featuring multi-language support, dark/light theme toggle, and an elegant interface. Perfect for developers looking to create their own portfolio website.

## Features

- **Multi-language support** (Portuguese 🇧🇷 | English 🇺🇸)
- **Dark/Light theme** with smooth transitions
- **Responsive design** for all devices
- **Interactive portfolio** with project filtering
- **Clean URLs** with custom routing
- **SEO optimized** with translated meta tags
- **Google Analytics** ready


## Project Structure

```
portfolio-devmat/
├── library/                      # System logic
│   ├── config.php                # Configs
│   ├── language.php              # Language system
│   ├── projects.php              # Portfolio projects data
│   └── languages/                # Translation files
│       ├── pt.php                # Portuguese
│       └── en.php                # English
├── public/                       # Public files
│   ├── index.php                 # Main router
│   └── assets/                   # Static resources
│       ├── css/styles.css        # Main styles
│       ├── js/                   # JavaScript files
│       ├── img/                  # Images
│       └── cv/                   # Resume PDF
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
1. **Copy and edit your information** in `library/config.sample.php` to `library/config.php`
1. **Copy and edit your projects** in `library/projects.sample.php` to `library/projects.php`
2. **Replace images** in `public/assets/img/`
3. **Update projects** in `library/projects.php`
4. **Configure Google Analytics** in `views/includes/header.php`

## Usage

### Language Configuration
Configure languages in `library/config.php`:
```php
'language' => [
    'default_language' => 'en',
    'available_languages' => ['en', 'pt'],
    'auto_detect_browser_language' => true,
    'store_in_session' => true
]
```

### Adding Projects
Edit `library/projects.php`:
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

### Customization
- **Colors**: Edit CSS variables in `public/assets/css/styles.css`
- **Fonts**: Update Google Fonts link in header
- **Content**: Modify translation files in `library/languages/`

## Technical Features
- **Clean URLs** with custom routing
- **Multi-language system** with browser detection
- **Dark/Light theme** with localStorage persistence
- **Interactive portfolio** with filtering and search
- **Responsive design** for all devices
- **SEO optimized** with translated meta tags

## Contributing

Contributions are welcome! Please:

1. **Fork** the project
2. **Create** a feature branch (`git checkout -b feature/AmazingFeature`)
3. **Commit** your changes (`git commit -m 'Add some AmazingFeature'`)
4. **Push** to the branch (`git push origin feature/AmazingFeature`)
5. **Open** a Pull Request

## License

This project is licensed under the **MIT License** - see the [LICENSE](LICENSE) file for details.

## Author

**Matheus Sesso**
- **Website**: [devmat.com.br](https://devmat.com.br)
- **LinkedIn**: [matheussesso](https://linkedin.com/in/matheussesso)
- **GitHub**: [@matheussesso](https://github.com/matheussesso)

---

**If this project helped you, consider giving it a star!** ⭐ 
