<?php
/**
 * Portfolio Projects Configuration
 * 
 * This file defines the portfolio projects data structure.
 * Each project contains:
 * - title: Translated project name
 * - url: Live demo URL
 * - domain: Project's domain name
 * - image: Path to project screenshot
 * - description: Translated project description
 * - technologies: Comma-separated list of technologies used
 */

 require_once __DIR__ . '/language.php';

 $projects = [
     [
         'title' => __('project_ecommerce'),
         'url' => 'https://demo-ecommerce.example.com/',
         'domain' => 'demo-ecommerce.example.com',
         'image' => 'assets/img/portfolio/portfolio.png',
         'description' => __('desc_ecommerce'),
         'technologies' => 'PHP, Laravel, MySQL, Redis, Bootstrap, jQuery, Stripe API, Docker'
     ],
     [
         'title' => __('project_task_manager'),
         'url' => 'https://task-manager-demo.example.com/',
         'domain' => 'task-manager-demo.example.com',
         'image' => 'assets/img/portfolio/portfolio.png',
         'description' => __('desc_task_manager'),
         'technologies' => 'React, Node.js, Express, MongoDB, Socket.io, JWT, Material-UI, Docker'
     ],
     [
         'title' => __('project_blog_cms'),
         'url' => 'https://blog-cms-demo.example.com/',
         'domain' => 'blog-cms-demo.example.com',
         'image' => 'assets/img/portfolio/portfolio.png',
         'description' => __('desc_blog_cms'),
         'technologies' => 'WordPress, PHP, MySQL, Custom Plugins, Gutenberg, REST API, SEO'
     ],
     [
         'title' => __('project_api_rest'),
         'url' => 'https://api-demo.example.com/',
         'domain' => 'api-demo.example.com',
         'image' => 'assets/img/portfolio/portfolio.png',
         'description' => __('desc_api_rest'),
         'technologies' => 'PHP, CodeIgniter, JWT, Swagger, Redis, Rate Limiting, JSON, XML'
     ],
     [
         'title' => __('project_dashboard'),
         'url' => 'https://dashboard-demo.example.com/',
         'domain' => 'dashboard-demo.example.com',
         'image' => 'assets/img/portfolio/portfolio.png',
         'description' => __('desc_dashboard'),
         'technologies' => 'Vue.js, D3.js, Chart.js, Laravel API, MySQL, Google Analytics API, WebSockets'
     ],
     [
         'title' => __('project_portfolio'),
         'url' => 'https://portfolio-demo.example.com/',
         'domain' => 'portfolio-demo.example.com',
         'image' => 'assets/img/portfolio/portfolio.png',
         'description' => __('desc_portfolio'),
         'technologies' => 'HTML5, CSS3, JavaScript, SASS, Webpack, Git, Performance Optimization'
     ]
 ];

// Load configuration to check if shuffle is enabled
$homeConfig = include __DIR__ . '/config.php';

// Shuffle projects only if configured
if (isset($homeConfig['interface']['shuffle_projects']) && $homeConfig['interface']['shuffle_projects']) {
    shuffle($projects);
} 