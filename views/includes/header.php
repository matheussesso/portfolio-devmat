<?php 
require_once __DIR__ . '/../../library/language.php';
$currentLang = Language::getCurrentLanguage();
$langAttribute = $currentLang === 'en' ? 'en' : 'pt-br';
?>
<!DOCTYPE html>
<html lang="<?php echo $langAttribute; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo __('meta_title'); ?></title>
    <meta content="<?php echo __('meta_description'); ?>" name="description">
    <meta content="<?php echo __('meta_keywords'); ?>" name="keywords">
  
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="<?php echo __('og_title'); ?>">
    <meta property="og:description" content="<?php echo __('og_description'); ?>">
    <meta property="og:image" content="assets/img/meta-img.png">
    <meta property="og:url" content="https://portfolio-demo.example.com/">
    <meta property="og:type" content="website">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo __('twitter_card_title'); ?>">
    <meta name="twitter:description" content="<?php echo __('twitter_card_description'); ?>">
    <meta name="twitter:image" content="assets/img/meta-img.png">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/icon" href="assets/img/favicon.png"/>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/styles.css">

    <!-- Google Analytics (Optional - Replace with your ID) -->
    <!-- 
    <script async src="https://www.googletagmanager.com/gtag/js?id=SEU-GA-ID-AQUI"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'SEU-GA-ID-AQUI');
    </script>
    -->
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
                 alt="<?php echo Language::getLanguageName($currentLang); ?>" 
                 class="current-flag">
            <span class="current-lang"><?php echo strtoupper($currentLang); ?></span>
            <i class="fas fa-chevron-down"></i>
        </div>
        <div class="language-menu" id="languageMenu">
            <?php foreach(Language::getAvailableLanguages() as $lang): ?>
                <?php if($lang !== $currentLang): ?>
                    <a href="<?php echo Language::getCurrentUrl($lang); ?>" class="language-option">
                        <img src="assets/img/flags/<?php echo Language::getLanguageFlag($lang); ?>.png" 
                             alt="<?php echo Language::getLanguageName($lang); ?>">
                        <span><?php echo Language::getLanguageName($lang); ?></span>
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>
