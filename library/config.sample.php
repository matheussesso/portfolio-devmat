<?php
/**
 * Home Section Configuration
 * 
 * This file contains all customizable settings for the portfolio home section.
 * Edit the information below to customize your portfolio.
 * 
 * @package Portfolio
 */

return [
    // Personal Information
    'personal' => [
        'name' => 'Jonny Person',
        'profile_image' => 'assets/img/user-image.jpg',
        'profile_image_alt' => 'Developer Photo',
        'whatsapp_number' => '5561999999999',
        'email' => 'jonny@person.com',
        'cv_file' => 'assets/cv/portfolio.pdf'
    ],

    // Social Media Links
    'social_links' => [
        'linkedin' => [
            'url' => 'https://www.linkedin.com/',
            'enabled' => true
        ],
        'github' => [
            'url' => 'https://github.com/',
            'enabled' => true
        ],
        'youtube' => [
            'url' => 'https://www.youtube.com/',
            'enabled' => true
        ],
        'dev' => [
            'url' => 'https://dev.to/',
            'enabled' => true
        ],
        'medium' => [
            'url' => 'https://medium.com/',
            'enabled' => true
        ],
        'twitter' => [
            'url' => 'https://twitter.com/',
            'enabled' => true
        ]
    ],

    // Skills - Badges displayed in the home section
    'skills' => [
        // Backend
        'PHP',
        'Laravel',
        'CodeIgniter',
        'Node.js',
        'Python',
        'API',

        // Frontend
        'JavaScript',
        'React',
        'Angular',
        'Vue.js',
        'HTML',
        'CSS',
        'Tailwind',
        'Bootstrap',

        // CMS
        'WordPress',
        'Joomla',
        'Drupal',

        // Database
        'Database',
        'SQL',
        'MySQL',
        'PostgreSQL',
        'MongoDB',

        // DevOps & Ferramentas
        'Docker',
        'Linux',
        'Bash',
        'Git',
        'Agile Methods',
    ],

    // Interface Settings
    'interface' => [
        // Maximum number of skills to display (0 = all)
        'max_skills_display' => 0,
        
        // Shuffle skills on each page load
        'shuffle_skills' => false,
        
        // Shuffle projects on each page load
        'shuffle_projects' => false,
        
        // Show "scroll to portfolio" indicator
        'show_scroll_indicator' => true,
        
        // Show "View Portfolio" button
        'show_portfolio_button' => true
    ],

    // Animations and Effects
    'animations' => [
        // Enable background code animation
        'background_codes' => true,
        
        // Code elements that appear in the background animation
        'background_code_elements' => [
            '{}',
            '==',
            '>=',
            '&&',
            '()',
            '||',
            '=>'
        ],
        
        // Animation speed (in seconds)
        'animation_duration' => 20
    ],

    // Language Settings
    'language' => [
        // Default site language (pt, en)
        'default_language' => 'en',
        
        // Available languages
        'available_languages' => ['pt', 'en'],
        
        // Automatically detect browser language
        'auto_detect_browser_language' => true,
        
        // Store language preference in user session
        'store_in_session' => true
    ]
];
