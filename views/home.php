<?php 
include __DIR__ . '/includes/header.php'; 
include __DIR__ . '/../library/projects.php'; 

// Load home section configurations
$homeConfig = include __DIR__ . '/../library/configs.php';
?>

<?php if ($homeConfig['animations']['background_codes']): ?>
<div class="background-codes">
    <?php foreach ($homeConfig['animations']['background_code_elements'] as $code): ?>
        <span><?php echo htmlspecialchars($code); ?></span>
    <?php endforeach; ?>
</div>
<?php endif; ?>

<!-- Personal Introduction Section -->
<section id="home" class="home-section">
    <div class="container">
        <div class="box">
            <img src="<?php echo htmlspecialchars($homeConfig['personal']['profile_image']); ?>" 
                 alt="<?php echo __('profile_image_alt'); ?>" 
                 class="profile-image">
            <h1><?php echo htmlspecialchars($homeConfig['personal']['name']); ?></h1>
            <h2><?php echo __('full_stack_developer'); ?></h2>
            <p><?php echo __('intro_text'); ?></p>

            <?php if ($homeConfig['interface']['show_articles_button']): ?>
            <button onclick="scrollToArticles()" class="btn-port scroll-to-articles me-2">
                <?php echo __('articles_button'); ?>
            </button>
            <?php endif; ?>

            <?php if ($homeConfig['interface']['show_portfolio_button']): ?>
            <button onclick="scrollToPortfolio()" class="btn-port scroll-to-portfolio">
                <?php echo __('portfolio_button'); ?>
            </button>
            <?php endif; ?>
                
            <div class="skills">
                <?php 
                $skills = $homeConfig['skills'];
                
                // Shuffle skills if configured
                if ($homeConfig['interface']['shuffle_skills']) {
                    shuffle($skills);
                }
                
                // Limit the number of skills if configured
                if ($homeConfig['interface']['max_skills_display'] > 0) {
                    $skills = array_slice($skills, 0, $homeConfig['interface']['max_skills_display']);
                }
                
                // Display skills
                foreach ($skills as $skill): ?>
                    <span class="badge"><?php echo htmlspecialchars($skill); ?></span>
                <?php endforeach; ?>
            </div>

            <div class="social-icons">
                <!-- Currículo -->
                <a href="<?php echo htmlspecialchars($homeConfig['personal']['cv_file']); ?>" 
                   target="_blank" 
                   title="<?php echo __('cv_title'); ?>">
                   <i class="fas fa-file-alt"></i>
                </a>

                <!-- WhatsApp -->
                <a href="https://api.whatsapp.com/send?phone=<?php echo htmlspecialchars($homeConfig['personal']['whatsapp_number']); ?>" 
                   target="_blank" 
                   title="<?php echo __('whatsapp_title'); ?>">
                   <i class="fab fa-whatsapp"></i>
                </a>
                
                <!-- Email -->
                <a href="mailto:<?php echo htmlspecialchars($homeConfig['personal']['email']); ?>" 
                   title="<?php echo __('email_title'); ?>">
                   <i class="fas fa-envelope"></i>
                </a>
                
                <!-- Links Sociais Dinâmicos -->
                <?php foreach ($homeConfig['social_links'] as $platform => $config): ?>
                    <?php if ($config['enabled']): ?>
                        <a href="<?php echo htmlspecialchars($config['url']); ?>" 
                           target="_blank" 
                           title="<?php echo __($platform . '_title'); ?>">
                           <i class="fab fa-<?php echo $platform; ?>"></i>
                        </a>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <?php if ($homeConfig['interface']['show_scroll_indicator']): ?>
    <div class="scroll-arrow" onclick="scrollToArticles()">
        <i class="fas fa-chevron-down"></i>
    </div>
    <?php endif; ?>
</section>

<!-- Articles Section -->
<section id="articles" class="articles-section">
    <div class="container">
        <div class="articles-header">
            <div class="header-top">
                <div class="header-title">
                    <h1><?php echo __('my_articles'); ?></h1>
                    <p><?php echo __('articles_subtitle'); ?></p>
                </div>
                <button onclick="scrollToHome()" class="btn-port scroll-to-home">
                    <i class="fas fa-home"></i> <?php echo __('home_button'); ?>
                </button>
            </div>
        </div>
        
        <div class="articles-container">
            <button class="articles-nav-btn articles-nav-prev" id="articlesPrev">
                <i class="fas fa-chevron-left"></i>
            </button>
            
            <div class="articles-wrapper" id="articlesWrapper">
                <div class="articles-loading" id="articlesLoading">
                    <i class="fas fa-spinner fa-spin"></i>
                    <p><?php echo __('loading_articles'); ?></p>
                </div>
            </div>
            
            <button class="articles-nav-btn articles-nav-next" id="articlesNext">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
        
        <div class="articles-link-wrapper">
            <a href="https://dev.to/matheussesso" target="_blank" class="btn-port btn-view-all mt-3">
                <i class="fab fa-dev"></i> <?php echo __('view_all_articles'); ?>
            </a>
        </div>
    </div>
    <?php if ($homeConfig['interface']['show_scroll_indicator']): ?>
    <div class="scroll-arrow" onclick="scrollToPortfolio()">
        <i class="fas fa-chevron-down"></i>
    </div>
    <?php endif; ?>
</section>

<!-- Portfolio Section -->
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

<!-- Project Details Modal -->
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

<footer>
    <div class="footer-content">
        <p><?php echo __('footer_text'); ?></p>
    </div>
</footer>

<!-- WhatsApp Floating Button -->
<div class="whatsapp-float-btn" id="whatsappFloatBtn" data-tooltip="<?php echo __('whatsapp_tooltip'); ?>">
    <i class="fab fa-whatsapp"></i>
</div>

<!-- WhatsApp Contact Form Modal -->
<div class="whatsapp-modal" id="whatsappModal">
    <div class="whatsapp-modal-content">
        <button class="whatsapp-modal-close" id="whatsappModalClose">
            <i class="fas fa-times"></i>
        </button>
        <div class="whatsapp-modal-header">
            <i class="fab fa-whatsapp"></i>
            <h3><?php echo __('whatsapp_contact_title'); ?></h3>
            <p><?php echo __('whatsapp_contact_subtitle'); ?></p>
        </div>
        <form class="whatsapp-form" id="whatsappForm">
            <div class="form-group">
                <label for="contactName">
                    <i class="fas fa-user"></i> <?php echo __('contact_name'); ?>
                </label>
                <input type="text" id="contactName" name="name" placeholder="<?php echo __('contact_name_placeholder'); ?>" required>
            </div>
            <div class="form-group">
                <label for="contactEmail">
                    <i class="fas fa-envelope"></i> <?php echo __('contact_email'); ?>
                </label>
                <input type="email" id="contactEmail" name="email" placeholder="<?php echo __('contact_email_placeholder'); ?>" required>
            </div>
            <div class="form-group">
                <label for="contactMessage">
                    <i class="fas fa-comment-alt"></i> <?php echo __('contact_message'); ?>
                </label>
                <textarea id="contactMessage" name="message" rows="4" placeholder="<?php echo __('contact_message_placeholder'); ?>" required></textarea>
            </div>
            <button type="submit" class="whatsapp-submit-btn">
                <i class="fab fa-whatsapp"></i> <?php echo __('send_whatsapp'); ?>
            </button>
        </form>
    </div>
</div>

<script src="assets/js/articles.js"></script>
<script src="assets/js/portfolio.js"></script>
<script src="assets/js/whatsapp.js"></script>
<script>
// Initialize portfolio when the page loads
document.addEventListener('DOMContentLoaded', function() {
    const projects = <?php echo json_encode($projects); ?>;
    initPortfolio(projects);
});
</script>

<?php include __DIR__ . '/includes/footer.php'; ?>

