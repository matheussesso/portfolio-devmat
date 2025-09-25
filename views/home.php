<?php 
include __DIR__ . '/includes/header.php'; 
include __DIR__ . '/../library/projects.php'; 
?>

<div class="background-codes">
    <span>{}</span>
    <span>==</span>
    <span>>=</span>
    <span>&&</span>
    <span>()</span>
    <span>||</span>
    <span>=></span>
</div>

<!-- Seção de Apresentação Pessoal -->
<section id="home" class="home-section">
    <div class="container">
        <div class="box">
            <img src="assets/img/foto.jpg" alt="Minha Foto" class="profile-image">
            <h1>Matheus Sesso</h1>
            <h2><?php echo __('full_stack_developer'); ?></h2>
            <p><?php echo __('intro_text'); ?></p>

            <button onclick="scrollToPortfolio()" class="btn-port scroll-to-portfolio">
                <?php echo __('portfolio_button'); ?>
            </button>
                
            <div class="skills">
                <span class="badge">PHP</span>
                <span class="badge">Laravel</span>
                <span class="badge">CodeIgniter</span>
                <span class="badge">WordPress</span>
                <span class="badge">Joomla</span>
                <span class="badge">JavaScript</span>
                <span class="badge">React</span>
                <span class="badge">Python</span>
                <span class="badge">API</span>
                <span class="badge">Tailwind</span>
                <span class="badge">Bootstrap</span>
                <span class="badge">HTML</span>
                <span class="badge">CSS</span>
                <span class="badge">Database</span>
                <span class="badge">SQL</span>
                <span class="badge">Docker</span>
                <span class="badge">Linux</span>
                <span class="badge">Bash</span>
                <span class="badge">Git</span>
                <span class="badge">Agile Methods</span>
            </div>

            <div class="social-icons">
                <a href="assets/cv/curriculo.pdf" target="_blank" title="<?php echo __('cv_title'); ?>"><i class="fas fa-file-alt"></i></a>
                <a href="https://api.whatsapp.com/send?phone=5561982891073" target="_blank" title="<?php echo __('whatsapp_title'); ?>"><i class="fab fa-whatsapp"></i></a>
                <a href="mailto:matheus@devmat.com.br" title="<?php echo __('email_title'); ?>"><i class="fas fa-envelope"></i></a>
                <a href="https://www.linkedin.com/in/matheussesso/" target="_blank" title="<?php echo __('linkedin_title'); ?>"><i class="fab fa-linkedin"></i></a>
                <a href="https://github.com/matheussesso" target="_blank" title="<?php echo __('github_title'); ?>"><i class="fab fa-github"></i></a>
                <a href="https://www.youtube.com/@matheussesso_dev" target="_blank" title="<?php echo __('youtube_title'); ?>"><i class="fab fa-youtube"></i></a>
                <a href="https://dev.to/matheussesso" target="_blank" title="<?php echo __('devto_title'); ?>"><i class="fab fa-dev"></i></a>
                <a href="https://medium.com/@matsesso" target="_blank" title="<?php echo __('medium_title'); ?>"><i class="fab fa-medium"></i></a>
                <a href="https://twitter.com/matheussesso" target="_blank" title="<?php echo __('twitter_title'); ?>"><i class="fab fa-twitter"></i></a>
            </div>
        </div>
    </div>
    <div class="scroll-arrow" onclick="scrollToPortfolio()">
        <i class="fas fa-chevron-down"></i>
    </div>
</section>

<!-- Seção de Portfólio -->
<section id="portfolio" class="portfolio-section">
    <div class="container">
        <div class="portfolio-header">
            <div class="header-top">
                <div class="header-title">
                    <h1><?php echo __('my_portfolio'); ?></h1>
                    <p><?php echo __('portfolio_subtitle'); ?></p>
                </div>
                <button onclick="scrollToHome()" class="btn-port scroll-to-home">
                    <i class="fas fa-home"></i> <?php echo __('home_button'); ?>
                </button>
            </div>
            
            <div class="portfolio-filters">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" id="searchProjects" placeholder="<?php echo __('search_projects'); ?>">
                </div>
                <div class="filter-tags" id="techFilters">
                    <!-- Tags serão adicionadas via JavaScript -->
                    <button id="resetFilters" class="btn-reset" style="display: none;">
                        <i class="fas fa-times"></i> <?php echo __('reset_filters'); ?>
                    </button>
                </div>
            </div>
        </div>

        <div class="portfolio-grid">
            <?php foreach($projects as $index => $project): ?>
            <div class="portfolio-card" data-project-id="<?php echo $index; ?>">
                <div class="portfolio-card-image">
                    <img src="<?php echo htmlspecialchars($project['image']); ?>" 
                         alt="<?php echo htmlspecialchars($project['title']); ?>">
                    <div class="portfolio-card-overlay">
                        <button class="btn-details"><?php echo __('view_details'); ?></button>
                    </div>
                </div>
                <div class="portfolio-card-content">
                    <h3><?php echo htmlspecialchars($project['title']); ?></h3>
                    <div class="tech-preview">
                        <?php 
                        $techs = explode(', ', $project['technologies']);
                        $preview_techs = array_slice($techs, 0, 3);
                        foreach($preview_techs as $tech): ?>
                            <span class="tech-tag"><?php echo htmlspecialchars($tech); ?></span>
                        <?php endforeach; ?>
                        <?php if (count($techs) > 3): ?>
                            <span class="tech-tag more">+<?php echo count($techs) - 3; ?></span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Modal para detalhes do projeto -->
<div class="project-modal" id="projectModal">
    <div class="modal-content">
        <button class="modal-close"><i class="fas fa-times"></i></button>
        <div class="modal-body">
            <div class="modal-image">
                <img src="" alt="" id="modalImage">
            </div>
            <div class="modal-info">
                <h2 id="modalTitle"></h2>
                <a href="" target="_blank" id="modalLink" class="website-link">
                    <i class="fas fa-external-link-alt"></i> <span id="modalDomain"></span>
                </a>
                <p id="modalDescription"></p>
                <div class="modal-technologies">
                    <h4><i class="fas fa-tools"></i> <?php echo __('technologies_used'); ?></h4>
                    <div id="modalTechTags" class="tech-tags"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="assets/js/portfolio.js"></script>
<script>
// Inicializar o portfólio quando a página carregar
document.addEventListener('DOMContentLoaded', function() {
    const projects = <?php echo json_encode($projects); ?>;
    initPortfolio(projects);
});
</script>

<?php include __DIR__ . '/includes/footer.php'; ?>
