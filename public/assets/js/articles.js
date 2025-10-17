/**
 * DEV.to Articles Integration
 * Fetches and displays articles from DEV.to API
 */

// Configuration
const DEVTO_USERNAME = 'matheussesso';
const DEVTO_API_URL = `https://dev.to/api/articles?username=${DEVTO_USERNAME}&per_page=10`;

// Translations
const translations = {
    pt: {
        readArticle: 'Ler Artigo',
        reactions: 'reações',
        comments: 'comentários',
        noArticles: 'Nenhum artigo encontrado',
        error: 'Erro ao carregar artigos'
    },
    en: {
        readArticle: 'Read Article',
        reactions: 'reactions',
        comments: 'comments',
        noArticles: 'No articles found',
        error: 'Error loading articles'
    }
};

// Get current language
function getCurrentLanguage() {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get('lang') || 'pt';
}

// Format date
function formatDate(dateString) {
    const options = { year: 'numeric', month: 'short', day: 'numeric' };
    const lang = getCurrentLanguage();
    const locale = lang === 'pt' ? 'pt-BR' : 'en-US';
    return new Date(dateString).toLocaleDateString(locale, options);
}

// Create article card
function createArticleCard(article) {
    const lang = getCurrentLanguage();
    const t = translations[lang];
    
    const card = document.createElement('div');
    card.className = 'article-card';
    card.onclick = () => window.open(article.url, '_blank');
    
    // Get cover image or use placeholder
    const coverImage = article.cover_image || article.social_image || 'https://via.placeholder.com/400x200/2563eb/ffffff?text=DEV.to';
    
    // Create tags HTML (limit to 3)
    const tagsHTML = article.tag_list
        .slice(0, 3)
        .map(tag => `<span class="article-tag">#${tag}</span>`)
        .join('');
    
    card.innerHTML = `
        <div class="article-card-image">
            <img src="${coverImage}" alt="${article.title}" loading="lazy">
        </div>
        <div class="article-card-content">
            <h3 class="article-card-title">${article.title}</h3>
            ${tagsHTML ? `<div class="article-card-tags">${tagsHTML}</div>` : ''}
            <p class="article-card-description">${article.description || ''}</p>
            <div class="article-card-meta">
                <div class="article-card-stats">
                    <span>
                        <i class="fas fa-heart"></i>
                        ${article.public_reactions_count} ${t.reactions}
                    </span>
                    <span>
                        <i class="fas fa-comment"></i>
                        ${article.comments_count} ${t.comments}
                    </span>
                </div>
                <div class="article-card-date">
                    ${formatDate(article.published_at)}
                </div>
            </div>
        </div>
    `;
    
    return card;
}

// Show error message
function showError() {
    const lang = getCurrentLanguage();
    const t = translations[lang];
    const wrapper = document.getElementById('articlesWrapper');
    
    wrapper.innerHTML = `
        <div class="no-articles">
            <i class="fas fa-exclamation-triangle"></i>
            <p>${t.error}</p>
        </div>
    `;
}

// Show no articles message
function showNoArticles() {
    const lang = getCurrentLanguage();
    const t = translations[lang];
    const wrapper = document.getElementById('articlesWrapper');
    
    wrapper.innerHTML = `
        <div class="no-articles">
            <i class="fas fa-inbox"></i>
            <p>${t.noArticles}</p>
        </div>
    `;
}

// Fetch articles from DEV.to
async function fetchArticles() {
    try {
        const response = await fetch(DEVTO_API_URL);
        
        if (!response.ok) {
            throw new Error('Failed to fetch articles');
        }
        
        const articles = await response.json();
        return articles;
    } catch (error) {
        console.error('Error fetching DEV.to articles:', error);
        return null;
    }
}

// Display articles
function displayArticles(articles) {
    const wrapper = document.getElementById('articlesWrapper');
    
    // Clear loading
    wrapper.innerHTML = '';
    
    if (!articles || articles.length === 0) {
        showNoArticles();
        return;
    }
    
    // Add articles to wrapper
    articles.forEach(article => {
        const card = createArticleCard(article);
        wrapper.appendChild(card);
    });
    
    // Initialize navigation
    initializeNavigation();
}

// Initialize navigation buttons
function initializeNavigation() {
    const wrapper = document.getElementById('articlesWrapper');
    const prevBtn = document.getElementById('articlesPrev');
    const nextBtn = document.getElementById('articlesNext');
    
    if (!wrapper || !prevBtn || !nextBtn) return;
    
    // Get card width dynamically
    function getCardWidth() {
        const firstCard = wrapper.querySelector('.article-card');
        if (!firstCard) return 370; // fallback
        
        const cardStyle = window.getComputedStyle(firstCard);
        const cardWidth = firstCard.offsetWidth;
        const gap = parseInt(window.getComputedStyle(wrapper).gap) || 20;
        
        return cardWidth + gap;
    }
    
    // Update button states
    function updateButtons() {
        const scrollLeft = wrapper.scrollLeft;
        const maxScroll = wrapper.scrollWidth - wrapper.clientWidth;
        
        prevBtn.disabled = scrollLeft <= 5; // 5px threshold
        nextBtn.disabled = scrollLeft >= maxScroll - 5; // 5px threshold
    }
    
    // Scroll by one card width
    function scrollByCard(direction) {
        const cardWidth = getCardWidth();
        const scrollAmount = direction === 'next' ? cardWidth : -cardWidth;
        
        wrapper.scrollBy({
            left: scrollAmount,
            behavior: 'smooth'
        });
    }
    
    // Event listeners
    prevBtn.addEventListener('click', () => scrollByCard('prev'));
    nextBtn.addEventListener('click', () => scrollByCard('next'));
    wrapper.addEventListener('scroll', updateButtons);
    
    // Initial state
    updateButtons();
    
    // Update on window resize
    let resizeTimer;
    window.addEventListener('resize', () => {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(() => {
            updateButtons();
        }, 250);
    });
}

// Initialize articles section
async function initializeArticles() {
    const articles = await fetchArticles();
    
    if (articles === null) {
        showError();
        return;
    }
    
    displayArticles(articles);
}

// Initialize when DOM is loaded
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initializeArticles);
} else {
    initializeArticles();
}

// Expose for language change
window.reloadArticles = initializeArticles;

