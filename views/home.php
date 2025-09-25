<?php 
include __DIR__ . '/includes/header.php'; 
include __DIR__ . '/../library/projects.php'; 
?>

<button id="theme-toggle" aria-label="Alternar Tema"><i class="fas fa-moon"></i></button>

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
            <h2>Desenvolvedor Web Full Stack</h2>
            <p>Sou desenvolvedor web full stack com mais de 10 anos de experiência. Já trabalhei para órgãos públicos e grandes empresas, desenvolvendo e mantendo aplicações web robustas e eficientes dos mais variados propósitos.</p>

            <button onclick="scrollToPortfolio()" class="btn-port scroll-to-portfolio">
                Confira meu Portfólio
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
                <span class="badge">Banco de Dados</span>
                <span class="badge">SQL</span>
                <span class="badge">Docker</span>
                <span class="badge">Linux</span>
                <span class="badge">Bash</span>
                <span class="badge">Git</span>
                <span class="badge">Métodos Ágeis</span>
            </div>

            <div class="social-icons">
                <a href="assets/cv/curriculo.pdf" target="_blank" title="Veja meu Curriculum"><i class="fas fa-file-alt"></i></a>
                <a href="https://api.whatsapp.com/send?phone=5561982891073" target="_blank" title="Entre em contato por WhatsApp"><i class="fab fa-whatsapp"></i></a>
                <a href="mailto:matheus@devmat.com.br" title="Entre em contato por E-mail"><i class="fas fa-envelope"></i></a>
                <a href="https://www.linkedin.com/in/matheussesso/" target="_blank" title="Conheça meu LinkedIn"><i class="fab fa-linkedin"></i></a>
                <a href="https://github.com/matheussesso" target="_blank" title="Confira meu GitHub"><i class="fab fa-github"></i></a>
                <a href="https://www.youtube.com/@matheussesso_dev" target="_blank" title="Confira meu YouTube"><i class="fab fa-youtube"></i></a>
                <a href="https://dev.to/matheussesso" target="_blank" title="Leia meus artigos no DEV.to "><i class="fab fa-dev"></i></a>
                <a href="https://medium.com/@matsesso" target="_blank" title="Leia meus artigos no Medium"><i class="fab fa-medium"></i></a>
                <a href="https://twitter.com/matheussesso" target="_blank" title="Visite meu Twitter"><i class="fab fa-twitter"></i></a>
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
                    <h1>Meu Portfólio</h1>
                    <p>Uma seleção dos meus melhores trabalhos em desenvolvimento web</p>
                </div>
                <button onclick="scrollToHome()" class="btn-port scroll-to-home">
                    <i class="fas fa-home"></i> Início
                </button>
            </div>
            
            <div class="portfolio-filters">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" id="searchProjects" placeholder="Buscar projetos...">
                </div>
                <div class="filter-tags" id="techFilters">
                    <!-- Tags serão adicionadas via JavaScript -->
                    <button id="resetFilters" class="btn-reset" style="display: none;">
                        <i class="fas fa-times"></i> Resetar Filtros
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
                        <button class="btn-details">Ver Detalhes</button>
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
                    <h4><i class="fas fa-tools"></i> Tecnologias Utilizadas</h4>
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
