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
        'title' => __('project_cfo_prescription'),
        'url' => 'https://prescricao.cfo.org.br/',
        'domain' => 'prescricao.cfo.org.br',
        'image' => 'assets/img/portfolio/sistema-prescricao-cfo.gif',
        'description' => __('desc_cfo_prescription'),
        'technologies' => 'PHP, SQL, TCPDF, Certificado Digital, API Rest, JavaScript, HTML5, CSS3, Bootstrap, MySQL, Docker'
    ],
    [
        'title' => __('project_adasa'),
        'url' => 'https://www.adasa.df.gov.br/',
        'domain' => 'adasa.df.gov.br',
        'image' => 'assets/img/portfolio/site-adasa.gif',
        'description' => __('desc_adasa'),
        'technologies' => 'PHP, Joomla, HTML, CSS, JavaScript, SQL Server, Windows Server'
    ],
    [
        'title' => __('project_plataforma_universidade'),
        'url' => 'https://intranet.belago.com/',
        'domain' => 'intranet.belago.com',
        'image' => 'assets/img/portfolio/sistema-universidade.gif',
        'description' => __('desc_plataforma_universidade'),
        'technologies' => 'PHP, JavaScript, SQL, WordPress, LearnDash, BuddyBoss, GamiPress, API Rest, API Microsoft Graph, MySQL'
    ],
    [
        'title' => __('project_cfo_website'),
        'url' => 'https://website.cfo.org.br/',
        'domain' => 'website.cfo.org.br',
        'image' => 'assets/img/portfolio/site-cfo.gif',
        'description' => __('desc_cfo_website'),
        'technologies' => 'PHP, WordPress, HTML5, CSS3, JavaScript, Bootstrap, MySQL, Docker'
    ],
    [
        'title' => __('project_i9brasil'),
        'url' => 'https://i9br.com.br/',
        'domain' => 'i9br.com.br',
        'image' => 'assets/img/portfolio/site-i9brasil.gif',
        'description' => __('desc_i9brasil'),
        'technologies' => 'PHP, WordPress, SQL, JavaScript, HTML5, CSS3, MySQL, Apache2'
    ],
    [
        'title' => __('project_plataforma_refatorando'),
        'url' => 'https://app.refatorando.com.br/',
        'domain' => 'app.refatorando.com.br',
        'image' => 'assets/img/portfolio/sistema-refatorando.gif',
        'description' => __('desc_plataforma_refatorando'),
        'technologies' => 'PHP, JavaScript, SQL, WordPress, LearnDash, BuddyBoss, GamiPress, API Rest, MySQL'
    ],
    [
        'title' => __('project_devmat'),
        'url' => 'https://devmat.com.br/',
        'domain' => 'devmat.com.br',
        'image' => 'assets/img/portfolio/site-devmat.gif',
        'description' => __('desc_devmat'),
        'technologies' => 'PHP, JavaScript, Bootstrap, API Rest, Open Source'
    ],
    [
        'title' => __('project_cfo_consultations'),
        'url' => 'https://consultas.cfo.org.br/',
        'domain' => 'consultas.cfo.org.br',
        'image' => 'assets/img/portfolio/sistema-consultas-cfo.png',
        'description' => __('desc_cfo_consultations'),
        'technologies' => 'PHP, PhpSpreadsheet, TCPDF, JavaScript, HTML5, CSS3, DataTables, Bootstrap, MySQL, SQL Server, Docker'
    ],
    [
        'title' => __('project_cfo_btg'),
        'url' => 'https://btg.cfo.org.br/',
        'domain' => 'btg.cfo.org.br',
        'image' => 'assets/img/portfolio/lp-btgcfo.gif',
        'description' => __('desc_cfo_btg'),
        'technologies' => 'PHP, API Rest, JavaScript, HTML5, CSS3, Bootstrap'
    ],
    [
        'title' => __('project_cfo_ciosp'),
        'url' => 'https://ciosp.cfo.org.br/',
        'domain' => 'ciosp.cfo.org.br',
        'image' => 'assets/img/portfolio/lp-ciospcfo.gif',
        'description' => __('desc_cfo_ciosp'),
        'technologies' => 'JavaScript, HTML5, CSS3, Bootstrap'
    ],
    [
        'title' => __('project_proeduc'),
        'url' => 'https://www.colegioproeduc.com.br/',
        'domain' => 'colegioproeduc.com.br',
        'image' => 'assets/img/portfolio/sistema-colegio-proeduc.gif',
        'description' => __('desc_proeduc'),
        'technologies' => 'PHP, TCPDF, Python, WordPress, HTML5, CSS3, JavaScript, MySQL, Docker'
    ],
    [
        'title' => __('project_tibiaking'),
        'url' => 'https://www.tibiaking.com.br/',
        'domain' => 'tibiaking.com.br',
        'image' => 'assets/img/portfolio/site-tibiaking.gif',
        'description' => __('desc_tibiaking'),
        'technologies' => 'PHP, Invision Community, JavaScript, HTML5, CSS3, MySQL, VPS, Ubuntu Server, nginx'
    ],
    [
        'title' => __('project_darkhumor'),
        'url' => 'https://darkhumor-api.ddns.net/',
        'domain' => 'darkhumor-api.ddns.net',
        'image' => 'assets/img/portfolio/sistema-api-darkhumor.gif',
        'description' => __('desc_darkhumor'),
        'technologies' => 'PHP, CodeIgniter, API Rest, Open Source'
    ],
    [
        'title' => __('project_obf'),
        'url' => 'https://obf.com.br/',
        'domain' => 'obf.com.br',
        'image' => 'assets/img/portfolio/site-obf.png',
        'description' => __('desc_obf'),
        'technologies' => 'PHP, WordPress, MySQL, Apache2, VPS, Ubuntu Server, Docker'
    ],
];

// Load configuration to check if shuffle is enabled
$homeConfig = include __DIR__ . '/configs.php';

// Shuffle projects only if configured
if (isset($homeConfig['interface']['shuffle_projects']) && $homeConfig['interface']['shuffle_projects']) {
    shuffle($projects);
} 
