<?php
/**
 * Home Section Configurations
 * 
 * This file contains all customizable configurations for the home section of the portfolio.
 * Edit the information below to customize your portfolio.
 */

return [
    // Personal Information
    'personal' => [
        'name' => 'Jonny Person',
        'profile_image' => 'assets/img/user-image.png',
        'profile_image_alt' => 'Foto do Desenvolvedor',
        'whatsapp_number' => '5511999999999',
        'email' => 'contato@example.com',
        'cv_file' => 'assets/cv/resume.pdf'
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

    // Skills - Badges that appear in the home section
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
        'Vue.js',
        'HTML',
        'CSS',
        'Tailwind',
        'Bootstrap',

        // CMS
        'WordPress',
        'Joomla',

        // Database
        'Database',
        'SQL',
        'MySQL',
        'MongoDB',

        // DevOps & Tools
        'Docker',
        'Linux',
        'Bash',
        'Git'
    ],

    // Interface Settings
    'interface' => [
        // Maximum skills to display (0 = all)
        'max_skills_display' => 0,
        
        // Shuffle skills on each load
        'shuffle_skills' => false,
        
        // Show "scroll to portfolio" indicator
        'show_scroll_indicator' => true,
        
        // Show "View Portfolio" button
        'show_portfolio_button' => true
    ],

    // Animations and Effects
    'animations' => [
        // Enable background code animation
        'background_codes' => true,
        
        // Code elements that appear in the background (animation)
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
        'default_language' => 'pt',
        
        // Available languages
        'available_languages' => ['pt', 'en'],
        
        // Auto-detect browser language
        'auto_detect_browser_language' => true,
        
        // Store language in user session
        'store_in_session' => true
    ]
];
