// Funções para navegação suave entre seções
function scrollToPortfolio() {
    document.getElementById('portfolio').scrollIntoView({
        behavior: 'smooth'
    });
    window.location.hash = 'portfolio';
}

function scrollToHome() {
    document.getElementById('home').scrollIntoView({
        behavior: 'smooth'
    });
}

// Inicialização do portfólio
function initPortfolio(projects) {
    const modal = document.getElementById('projectModal');
    const searchInput = document.getElementById('searchProjects');
    const techFilters = document.getElementById('techFilters');
    const portfolioGrid = document.querySelector('.portfolio-grid');
    const resetButton = document.getElementById('resetFilters');
    
    // Coletar todas as tecnologias únicas
    const allTechnologies = new Set();
    projects.forEach(project => {
        project.technologies.split(', ').forEach(tech => {
            allTechnologies.add(tech.trim());
        });
    });

    // Criar tags de filtro
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

    // Função para renderizar os projetos
    function renderProjects(projectsToRender) {
        portfolioGrid.innerHTML = '';
        projectsToRender.forEach((project, index) => {
            const techs = project.technologies.split(', ');
            const card = document.createElement('div');
            card.className = 'portfolio-card';
            card.dataset.projectId = index;
            
            // Criar uma versão resumida da descrição
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
            
            // Adicionar o evento de clique ao card inteiro
            card.addEventListener('click', () => {
                openModal(index);
            });
            
            portfolioGrid.appendChild(card);
        });
    }

    // Função para filtrar projetos
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
        
        // Mostrar mensagem se não houver resultados
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

    // Função para mostrar/ocultar botão de reset
    function toggleResetButton() {
        const hasActiveFilters = activeFilters.size > 0 || searchInput.value.trim() !== '';
        resetButton.style.display = hasActiveFilters ? 'block' : 'none';
    }

    // Função para resetar todos os filtros
    function resetAllFilters() {
        // Limpar campo de busca
        searchInput.value = '';
        
        // Remover todos os filtros ativos
        activeFilters.clear();
        
        // Remover classe active de todas as tags
        const filterTags = document.querySelectorAll('.filter-tag');
        filterTags.forEach(tag => tag.classList.remove('active'));
        
        // Ocultar botão de reset
        resetButton.style.display = 'none';
        
        // Renderizar todos os projetos
        renderProjects(projects);
    }

    // Event listeners para busca
    searchInput.addEventListener('input', () => {
        filterProjects();
        toggleResetButton();
    });

    // Event listener para botão de reset
    resetButton.addEventListener('click', resetAllFilters);

    // Função para abrir modal
    function openModal(projectId) {
        const project = projects[projectId];
        document.getElementById('modalImage').src = project.image;
        document.getElementById('modalImage').alt = project.title;
        document.getElementById('modalTitle').textContent = project.title;
        document.getElementById('modalDomain').textContent = project.domain;
        document.getElementById('modalLink').href = project.url;
        document.getElementById('modalDescription').textContent = project.description;
        
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
    }
    
    function closeModal() {
        modal.classList.remove('show');
        document.body.style.overflow = '';
    }
    
    // Event listeners para modal
    document.querySelector('.modal-close').addEventListener('click', closeModal);
    modal.addEventListener('click', (e) => {
        if (e.target === modal) closeModal();
    });
    
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') closeModal();
    });

    // Renderizar projetos inicialmente
    renderProjects(projects);
}
