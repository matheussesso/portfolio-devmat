/**
 * Navigation functions for smooth scrolling between sections
 */

/**
 * Smoothly scrolls to the portfolio section and updates URL hash
 */
function scrollToPortfolio() {
    document.getElementById('portfolio').scrollIntoView({
        behavior: 'smooth'
    });
    window.location.hash = 'portfolio';
}

/**
 * Smoothly scrolls back to the home section
 */
function scrollToHome() {
    document.getElementById('home').scrollIntoView({
        behavior: 'smooth'
    });
}

/**
 * Initialize the portfolio functionality
 * @param {Array} projects - Array of project objects containing project information
 */
function initPortfolio(projects) {
    const modal = document.getElementById('projectModal');
    const searchInput = document.getElementById('searchProjects');
    const techFilters = document.getElementById('techFilters');
    const portfolioGrid = document.querySelector('.portfolio-grid');
    const resetButton = document.getElementById('resetFilters');
    
    // Collect all unique technologies
    const allTechnologies = new Set();
    projects.forEach(project => {
        project.technologies.split(', ').forEach(tech => {
            allTechnologies.add(tech.trim());
        });
    });

    // Create filter tags
    const activeFilters = new Set();
    allTechnologies.forEach(tech => {
        const filterTag = document.createElement('button');
        filterTag.className = 'filter-tag';
        filterTag.textContent = tech;
        filterTag.addEventListener('click', () => {
            filterTag.classList.toggle('active');
            if (activeFilters.has(tech)) {
                activeFilters.delete(tech);
            } else {
                activeFilters.add(tech);
            }
            filterProjects();
            toggleResetButton();
        });
        techFilters.appendChild(filterTag);
    });

    /**
     * Render projects in the portfolio grid
     * @param {Array} projectsToRender - Array of projects to be displayed
     */
    function renderProjects(projectsToRender) {
        portfolioGrid.innerHTML = '';
        projectsToRender.forEach((project, index) => {
            const techs = project.technologies.split(', ');
            const card = document.createElement('div');
            card.className = 'portfolio-card';
            card.dataset.projectId = index;
            
            // Create a truncated version of the description
            const shortDescription = project.description.length > 120 ? 
                project.description.substring(0, 120) + '...' : 
                project.description;

            card.innerHTML = `
                <div class="portfolio-card-image">
                    <img src="${project.image}" alt="${project.title}">
                    <div class="portfolio-card-overlay">
                        <span class="view-details">Clique para ver detalhes</span>
                    </div>
                </div>
                <div class="portfolio-card-content">
                    <h3>${project.title}</h3>
                    <p class="card-description">${shortDescription}</p>
                    <div class="tech-preview">
                        ${techs.slice(0, 3).map(tech => 
                            `<span class="tech-tag">${tech}</span>`
                        ).join('')}
                        ${techs.length > 3 ? 
                            `<span class="tech-tag more">+${techs.length - 3}</span>` : 
                            ''}
                    </div>
                </div>
            `;
            
            // Add click event on card
            card.addEventListener('click', () => {
                openModal(index);
            });
            
            portfolioGrid.appendChild(card);
        });
    }

    /**
     * Filter projects based on search term and active technology filters
     */
    function filterProjects() {
        const searchTerm = searchInput.value.toLowerCase();
        const filteredProjects = projects.filter(project => {
            const matchesSearch = project.title.toLowerCase().includes(searchTerm) ||
                                project.description.toLowerCase().includes(searchTerm) ||
                                project.technologies.toLowerCase().includes(searchTerm);
            
            if (activeFilters.size === 0) return matchesSearch;
            
            const projectTechs = new Set(project.technologies.split(', ').map(t => t.trim()));
            const matchesFilters = Array.from(activeFilters).every(filter => 
                projectTechs.has(filter)
            );
            
            return matchesSearch && matchesFilters;
        });
        
        renderProjects(filteredProjects);
        
        // Display message if no results found
        if (filteredProjects.length === 0) {
            const noResults = document.createElement('div');
            noResults.className = 'no-results';
            noResults.innerHTML = `
                <i class="fas fa-search"></i>
                <p>Nenhum projeto encontrado</p>
            `;
            portfolioGrid.appendChild(noResults);
        }
    }

    /**
     * Toggle visibility of reset button based on active filters
     */
    function toggleResetButton() {
        const hasActiveFilters = activeFilters.size > 0 || searchInput.value.trim() !== '';
        resetButton.style.display = hasActiveFilters ? 'block' : 'none';
    }

    /**
     * Reset all filters and search input to their initial state
     */
    function resetAllFilters() {
        // Clear search input
        searchInput.value = '';
        
        // Remove all active filters
        activeFilters.clear();
        
        // Remove active class from all filter tags
        const filterTags = document.querySelectorAll('.filter-tag');
        filterTags.forEach(tag => tag.classList.remove('active'));
        
        // Hide reset button
        resetButton.style.display = 'none';
        
        // Render all projects
        renderProjects(projects);
    }

    // Search input event listeners
    searchInput.addEventListener('input', () => {
        filterProjects();
        toggleResetButton();
    });

    // Reset button event listener
    resetButton.addEventListener('click', resetAllFilters);

    /**
     * Open modal with project details
     * @param {number} projectId - Index of the project to display
     */
    function openModal(projectId) {
        const project = projects[projectId];
        const modalImage = document.getElementById('modalImage');
        
        modalImage.src = project.image;
        modalImage.alt = project.title;
        document.getElementById('modalTitle').textContent = project.title;
        document.getElementById('modalDomain').textContent = project.domain;
        document.getElementById('modalLink').href = project.url;
        document.getElementById('modalDescription').innerHTML = project.description;
        
        const techTags = document.getElementById('modalTechTags');
        techTags.innerHTML = '';
        project.technologies.split(', ').forEach(tech => {
            const tag = document.createElement('span');
            tag.className = 'tech-tag';
            tag.textContent = tech;
            techTags.appendChild(tag);
        });
        
        modal.classList.add('show');
        document.body.style.overflow = 'hidden';
        
        // Add click event to modal image to open full image modal
        modalImage.addEventListener('click', () => {
            openImageModal(project.image, project.title);
        });
        
        // Add cursor pointer style to indicate image is clickable
        modalImage.style.cursor = 'pointer';
    }
    
    /**
     * Close the project details modal
     */
    function closeModal() {
        modal.classList.remove('show');
        document.body.style.overflow = '';
    }
    
    /**
     * Open full image modal
     * @param {string} imageSrc - Source of the image to display
     * @param {string} imageAlt - Alt text for the image
     */
    function openImageModal(imageSrc, imageAlt) {
        // Create image modal if it doesn't exist
        let imageModal = document.getElementById('imageModal');
        if (!imageModal) {
            imageModal = document.createElement('div');
            imageModal.id = 'imageModal';
            imageModal.className = 'image-modal';
            imageModal.innerHTML = `
                <div class="image-modal-content">
                    <button class="image-modal-close">
                        <i class="fas fa-times"></i>
                    </button>
                    <img src="" alt="" class="full-image">
                    <div class="image-modal-title"></div>
                </div>
            `;
            document.body.appendChild(imageModal);
            
            // Add event listeners for image modal
            imageModal.addEventListener('click', (e) => {
                if (e.target === imageModal) closeImageModal();
            });
            
            document.querySelector('.image-modal-close').addEventListener('click', closeImageModal);
            
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && imageModal.classList.contains('show')) {
                    closeImageModal();
                }
            });
        }
        
        // Set image and title
        const fullImage = imageModal.querySelector('.full-image');
        const imageTitle = imageModal.querySelector('.image-modal-title');
        
        fullImage.src = imageSrc;
        fullImage.alt = imageAlt;
        imageTitle.textContent = imageAlt;
        
        // Show modal
        imageModal.classList.add('show');
        document.body.style.overflow = 'hidden';
    }
    
    /**
     * Close the full image modal
     */
    function closeImageModal() {
        const imageModal = document.getElementById('imageModal');
        if (imageModal) {
            imageModal.classList.remove('show');
            document.body.style.overflow = '';
        }
    }
    
    // Modal event listeners
    document.querySelector('.modal-close').addEventListener('click', closeModal);
    modal.addEventListener('click', (e) => {
        if (e.target === modal) closeModal();
    });
    
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') closeModal();
    });

    // Initial render of all projects
    renderProjects(projects);
}
