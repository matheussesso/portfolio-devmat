<?php
require_once __DIR__ . '/language.php';

$projects = [
    [
        'title' => __('project_cfo_website'),
        'url' => 'https://website.cfo.org.br/',
        'domain' => 'website.cfo.org.br',
        'image' => 'assets/img/portfolio/site-cfo.png',
        'description' => __('desc_cfo_website'),
        'technologies' => 'PHP, WordPress, HTML5, CSS3, JavaScript, Bootstrap, MySQL, Docker'
    ],
    [
        'title' => __('project_cfo_consultations'),
        'url' => 'https://consultas.cfo.org.br/',
        'domain' => 'consultas.cfo.org.br',
        'image' => 'assets/img/portfolio/consultas-cfo.png',
        'description' => __('desc_cfo_consultations'),
        'technologies' => 'PHP, PhpSpreadsheet, TCPDF, JavaScript, HTML5, CSS3, DataTables, Bootstrap, MySQL, SQL Server, Docker'
    ],
    [
        'title' => __('project_cfo_prescription'),
        'url' => 'https://prescricao.cfo.org.br/',
        'domain' => 'prescricao.cfo.org.br',
        'image' => 'assets/img/portfolio/prescricao-cfo.png',
        'description' => __('desc_cfo_prescription'),
        'technologies' => 'PHP, TCPDF, Certificado Digital, API Rest, JavaScript, HTML5, CSS3, Bootstrap, MySQL, Docker'
    ],
    [
        'title' => __('project_cfo_btg'),
        'url' => 'https://btg.cfo.org.br/',
        'domain' => 'btg.cfo.org.br',
        'image' => 'assets/img/portfolio/lp-btgcfo.png',
        'description' => __('desc_cfo_btg'),
        'technologies' => 'PHP, API Rest, JavaScript, HTML5, CSS3, Bootstrap'
    ],
    [
        'title' => __('project_cfo_ciosp'),
        'url' => 'https://ciosp.cfo.org.br/',
        'domain' => 'ciosp.cfo.org.br',
        'image' => 'assets/img/portfolio/lp-ciospcfo.png',
        'description' => __('desc_cfo_ciosp'),
        'technologies' => 'JavaScript, HTML5, CSS3, Bootstrap'
    ],
    [
        'title' => __('project_adasa'),
        'url' => 'https://www.adasa.df.gov.br/',
        'domain' => 'adasa.df.gov.br',
        'image' => 'assets/img/portfolio/site-adasa.png',
        'description' => __('desc_adasa'),
        'technologies' => 'PHP, Joomla, HTML, CSS, JavaScript, SQL Server, Windows Server'
    ],
    [
        'title' => __('project_i9brasil'),
        'url' => 'https://i9br.com.br/',
        'domain' => 'i9br.com.br',
        'image' => 'assets/img/portfolio/site-i9brasil.png',
        'description' => __('desc_i9brasil'),
        'technologies' => 'PHP, WordPress, JavaScript, HTML5, CSS3, MySQL, Apache2'
    ],
    [
        'title' => __('project_proeduc'),
        'url' => 'https://www.colegioproeduc.com.br/',
        'domain' => 'colegioproeduc.com.br',
        'image' => 'assets/img/portfolio/colegio-proeduc.png',
        'description' => __('desc_proeduc'),
        'technologies' => 'PHP, TCPDF, Python, WordPress, HTML5, CSS3, JavaScript, MySQL, Docker'
    ],
    [
        'title' => __('project_tibiaking'),
        'url' => 'https://www.tibiaking.com.br/',
        'domain' => 'tibiaking.com.br',
        'image' => 'assets/img/portfolio/site-tibiaking.png',
        'description' => __('desc_tibiaking'),
        'technologies' => 'PHP, Invision Community, JavaScript, HTML5, CSS3, MySQL, VPS, Ubuntu Server, nginx'
    ],
    [
        'title' => __('project_obf'),
        'url' => 'https://obf.com.br/',
        'domain' => 'obf.com.br',
        'image' => 'assets/img/portfolio/obf.png',
        'description' => __('desc_obf'),
        'technologies' => 'PHP, WordPress, MySQL, Apache2, VPS, Ubuntu Server, Docker'
    ],
    [
        'title' => __('project_darkhumor'),
        'url' => 'https://darkhumor-api.ddns.net/',
        'domain' => 'darkhumor-api.ddns.net',
        'image' => 'assets/img/portfolio/apidarkhumor.png',
        'description' => __('desc_darkhumor'),
        'technologies' => 'PHP, CodeIgniter, API Rest, Open Source'
    ]
];

shuffle($projects); // Embaralha os projetos para exibição aleatória