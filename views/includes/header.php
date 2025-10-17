<?php 
require_once __DIR__ . '/../../src/language.php';
$currentLang = Language::getCurrentLanguage();
$langAttribute = $currentLang === 'en' ? 'en' : 'pt-br';

// Load home configuration for SEO data
$homeConfig = include __DIR__ . '/../../src/configs.php';

// Get current URL for canonical and og:url
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
$currentUrl = $protocol . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$baseUrl = $protocol . "://" . $_SERVER['HTTP_HOST'];
$canonicalUrl = $protocol . "://" . $_SERVER['HTTP_HOST'] . parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
?>
<!DOCTYPE html>
<html lang="<?php echo $langAttribute; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Primary Meta Tags -->
    <title><?php echo __('meta_title'); ?></title>
    <meta name="title" content="<?php echo __('meta_title'); ?>">
    <meta name="description" content="<?php echo __('meta_description'); ?>">
    <meta name="keywords" content="<?php echo __('meta_keywords'); ?>">
    <meta name="author" content="<?php echo htmlspecialchars($homeConfig['personal']['name']); ?>">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="googlebot" content="index, follow">
    <link rel="canonical" href="<?php echo htmlspecialchars($canonicalUrl); ?>">
    
    <!-- Alternate Language Links (hreflang) -->
    <?php foreach(Language::getAvailableLanguages() as $lang): ?>
    <link rel="alternate" hreflang="<?php echo $lang === 'pt' ? 'pt-BR' : $lang; ?>" 
          href="<?php echo htmlspecialchars($baseUrl . Language::getCurrentUrl($lang)); ?>">
    <?php endforeach; ?>
    <link rel="alternate" hreflang="x-default" href="<?php echo htmlspecialchars($baseUrl); ?>">
  
    <!-- Open Graph Meta Tags -->
    <meta property="og:type" content="website">
    <meta property="og:locale" content="<?php echo $currentLang === 'en' ? 'en_US' : 'pt_BR'; ?>">
    <meta property="og:title" content="<?php echo __('og_title'); ?>">
    <meta property="og:description" content="<?php echo __('og_description'); ?>">
    <meta property="og:image" content="<?php echo $baseUrl; ?>/assets/img/meta-img.png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="<?php echo __('og_title'); ?>">
    <meta property="og:url" content="<?php echo htmlspecialchars($currentUrl); ?>">
    <meta property="og:site_name" content="<?php echo htmlspecialchars($homeConfig['personal']['name']); ?>">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@matheussesso">
    <meta name="twitter:creator" content="@matheussesso">
    <meta name="twitter:title" content="<?php echo __('twitter_card_title'); ?>">
    <meta name="twitter:description" content="<?php echo __('twitter_card_description'); ?>">
    <meta name="twitter:image" content="<?php echo $baseUrl; ?>/assets/img/meta-img.png">
    <meta name="twitter:image:alt" content="<?php echo __('twitter_card_title'); ?>">
    
    <!-- Additional SEO Meta Tags -->
    <meta name="theme-color" content="#00d4ff">
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/icon" href="assets/img/favicon.png"/>
    
    <!-- Structured Data - JSON-LD Schema.org -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Person",
        "name": "<?php echo htmlspecialchars($homeConfig['personal']['name']); ?>",
        "url": "<?php echo htmlspecialchars($baseUrl); ?>",
        "image": "<?php echo $baseUrl; ?>/assets/img/user-image.jpg",
        "jobTitle": "<?php echo __('full_stack_developer'); ?>",
        "description": "<?php echo __('intro_text'); ?>",
        "email": "<?php echo htmlspecialchars($homeConfig['personal']['email']); ?>",
        "sameAs": [
            <?php
            $socialLinks = [];
            if ($homeConfig['social_links']['linkedin']['enabled']) {
                $socialLinks[] = '"' . htmlspecialchars($homeConfig['social_links']['linkedin']['url']) . '"';
            }
            if ($homeConfig['social_links']['github']['enabled']) {
                $socialLinks[] = '"' . htmlspecialchars($homeConfig['social_links']['github']['url']) . '"';
            }
            if ($homeConfig['social_links']['youtube']['enabled']) {
                $socialLinks[] = '"' . htmlspecialchars($homeConfig['social_links']['youtube']['url']) . '"';
            }
            if ($homeConfig['social_links']['twitter']['enabled']) {
                $socialLinks[] = '"' . htmlspecialchars($homeConfig['social_links']['twitter']['url']) . '"';
            }
            if ($homeConfig['social_links']['dev']['enabled']) {
                $socialLinks[] = '"' . htmlspecialchars($homeConfig['social_links']['dev']['url']) . '"';
            }
            if ($homeConfig['social_links']['medium']['enabled']) {
                $socialLinks[] = '"' . htmlspecialchars($homeConfig['social_links']['medium']['url']) . '"';
            }
            echo implode(",\n            ", $socialLinks);
            ?>
        ],
        "knowsAbout": [
            <?php
            $skills = array_map(function($skill) {
                return '"' . htmlspecialchars($skill) . '"';
            }, $homeConfig['skills']);
            echo implode(",\n            ", $skills);
            ?>
        ]
    }
    </script>
    
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebSite",
        "name": "<?php echo htmlspecialchars($homeConfig['personal']['name']); ?> - Portfolio",
        "url": "<?php echo htmlspecialchars($baseUrl); ?>",
        "description": "<?php echo __('meta_description'); ?>",
        "inLanguage": ["pt-BR", "en"],
        "author": {
            "@type": "Person",
            "name": "<?php echo htmlspecialchars($homeConfig['personal']['name']); ?>"
        }
    }
    </script>
    
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "ProfilePage",
        "mainEntity": {
            "@type": "Person",
            "name": "<?php echo htmlspecialchars($homeConfig['personal']['name']); ?>",
            "jobTitle": "<?php echo __('full_stack_developer'); ?>",
            "url": "<?php echo htmlspecialchars($baseUrl); ?>"
        }
    }
    </script>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/styles.css">

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-SJCHPBE4YF"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-SJCHPBE4YF');
    </script>
   
</head>

<body>
<!-- Header Controls -->
<div class="header-controls">
    <!-- Theme Toggle Button -->
    <button id="theme-toggle" aria-label="<?php echo __('theme_toggle'); ?>" class="theme-toggle-btn">
        <i class="fas fa-moon"></i>
    </button>
    
    <!-- Language Selector -->
    <div class="language-selector">
        <div class="language-toggle" onclick="toggleLanguageMenu()">
            <img src="assets/img/flags/<?php echo Language::getLanguageFlag($currentLang); ?>.png" 
                 alt="<?php echo __('flag_' . Language::getLanguageFlag($currentLang) . '_alt'); ?>" 
                 class="current-flag">
            <span class="current-lang"><?php echo strtoupper($currentLang); ?></span>
            <i class="fas fa-chevron-down"></i>
        </div>
        <div class="language-menu" id="languageMenu">
            <?php foreach(Language::getAvailableLanguages() as $lang): ?>
                <?php if($lang !== $currentLang): ?>
                    <a href="<?php echo Language::getCurrentUrl($lang); ?>" class="language-option">
                        <img src="assets/img/flags/<?php echo Language::getLanguageFlag($lang); ?>.png" 
                             alt="<?php echo __('flag_' . Language::getLanguageFlag($lang) . '_alt'); ?>">
                        <span><?php echo Language::getLanguageName($lang); ?></span>
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>
