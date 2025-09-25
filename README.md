# 🌐 Portfolio Pessoal - Matheus Sesso

[![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://php.net)
[![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)](https://developer.mozilla.org/en-US/docs/Web/HTML)
[![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)](https://developer.mozilla.org/en-US/docs/Web/CSS)
[![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)](https://developer.mozilla.org/en-US/docs/Web/JavaScript)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white)](https://getbootstrap.com)
[![Open Source](https://img.shields.io/badge/Open%20Source-4CAF50?style=for-the-badge&logo=github&logoColor=white)](https://github.com/matheussesso)

Um portfólio pessoal moderno e responsivo desenvolvido em PHP puro, com sistema completo de múltiplos idiomas, tema escuro/claro e interface elegante.

## 🚀 Demonstração

- **Site Online**: [devmat.com.br](https://devmat.com.br)
- **Idiomas**: Português 🇧🇷 | English 🇺🇸
- **Temas**: Claro ☀️ | Escuro 🌙

## ✨ Características Principais

### 🔧 Tecnologias Utilizadas
- **Backend**: PHP 7.4+ (sem frameworks)
- **Frontend**: HTML5, CSS3, JavaScript ES6+
- **Estilização**: Bootstrap 5.3, CSS Custom Properties
- **Ícones**: Font Awesome 6.0
- **Fontes**: Google Fonts (Ubuntu)
- **Analytics**: Google Analytics 4

### 🌍 Sistema de Múltiplos Idiomas
- **Detecção automática** do idioma do navegador
- **Seletor visual** com bandeiras dos países
- **Persistência** na sessão do usuário
- **URLs amigáveis** com parâmetros de idioma
- **SEO otimizado** com meta tags traduzidas

### 🎨 Interface Moderna
- **Design responsivo** para todos os dispositivos
- **Tema escuro/claro** com alternância suave
- **Animações fluidas** e transições elegantes
- **Tipografia moderna** com Google Fonts
- **Ícones Font Awesome** para melhor UX

### 💼 Portfólio Interativo
- **Grid responsivo** de projetos
- **Modal detalhado** para cada projeto
- **Sistema de filtros** por tecnologia
- **Busca em tempo real** nos projetos
- **Embaralhamento aleatório** dos projetos


## 📁 Estrutura do Projeto

```
devmat/
├── 📁 library/                    # Lógica do sistema
│   ├── language.php              # Sistema de idiomas
│   ├── projects.php              # Dados dos projetos do portfólio
│   └── 📁 languages/             # Arquivos de tradução
│       ├── pt.php                # Português
│       └── en.php                # Inglês
├── 📁 public/                     # Arquivos públicos
│   ├── index.php                 # Roteador principal
│   ├── .htaccess                 # Configurações Apache
│   └── 📁 assets/                # Recursos estáticos
│       ├── 📁 css/
│       │   └── styles.css        # Estilos principais
│       ├── 📁 js/
│       │   ├── theme.js          # Controle de temas
│       │   └── portfolio.js      # Funcionalidades do portfólio
│       ├── 📁 img/               # Imagens
│       │   ├── flags/            # Bandeiras dos países
│       │   └── portfolio/        # Screenshots dos projetos
│       └── 📁 cv/
│           └── curriculo.pdf     # Currículo em PDF
├── 📁 views/                      # Templates PHP
│   ├── home.php                  # Página principal
│   ├── 404.php                   # Página de erro
│   └── 📁 includes/
│       ├── header.php            # Cabeçalho
│       └── footer.php            # Rodapé
└── README.md                     # Este arquivo
```

## 🛠️ Instalação e Configuração

### Pré-requisitos
- **PHP 7.4+** com extensões:
  - `session`
  - `json`
  - `mbstring`
- **Servidor Web** (Apache/Nginx)
- **Mod_rewrite** habilitado (Apache)

### 1. Clone o Repositório
```bash
git clone https://github.com/matheussesso/portfolio.git
cd portfolio
```

### 2. Configure o Servidor Web

#### Apache (.htaccess já incluído)
```apache
# O arquivo .htaccess já está configurado
# Certifique-se de que mod_rewrite está habilitado
```

#### Nginx
```nginx
server {
    listen 80;
    server_name seu-dominio.com;
    root /caminho/para/portfolio/public;
    index index.php;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }
}
```

### 3. Configurações Opcionais

#### Google Analytics
Edite `views/includes/header.php` e substitua o ID:
```php
gtag('config', 'SEU-GA-ID-AQUI');
```

#### Informações Pessoais
Edite os arquivos de tradução em `library/languages/`:
- `pt.php` - Informações em português
- `en.php` - Informações em inglês

## 🎯 Como Usar

### Sistema de Idiomas

#### Adicionando Novas Traduções
1. **Adicione a chave** nos arquivos de idioma:
```php
// library/languages/pt.php
'nova_chave' => 'Texto em português',

// library/languages/en.php
'nova_chave' => 'Text in English',
```

2. **Use no template**:
```php
<?php echo __('nova_chave'); ?>
```

#### Adicionando Novo Idioma
1. **Crie o arquivo** `library/languages/[codigo].php`
2. **Adicione o código** em `Language::$availableLanguages`
3. **Configure a bandeira** em `Language::getLanguageFlag()`
4. **Configure o nome** em `Language::getLanguageName()`

### Adicionando Projetos

Edite `library/projects.php`:
```php
[
    'title' => __('project_nome'),
    'url' => 'https://exemplo.com',
    'domain' => 'exemplo.com',
    'image' => 'assets/img/portfolio/exemplo.png',
    'description' => __('desc_exemplo'),
    'technologies' => 'PHP, JavaScript, CSS'
]
```

### Personalizando o Tema

#### Cores
Edite as variáveis CSS em `public/assets/css/styles.css`:
```css
:root {
    --primary-color: #2563eb;
    --secondary-color: #33a539;
    --text-color: #1f2937;
    /* ... outras variáveis */
}
```

#### Fontes
Altere a fonte no header:
```html
<link href="https://fonts.googleapis.com/css2?family=NovaFonte:wght@400;500;700&display=swap" rel="stylesheet">
```

## 🔧 Funcionalidades Técnicas

### Sistema de Roteamento Simples
- **URLs limpas** sem extensões
- **Roteamento automático** via .htaccess
- **Página 404** personalizada
- **Redirecionamentos** para âncoras

### Sistema de Idiomas
- **Detecção automática** do idioma do navegador
- **Persistência** na sessão PHP
- **URLs com parâmetros** (`?lang=en`)
- **Fallback** para português

### Sistema de Temas
- **Alternância suave** entre claro/escuro
- **Persistência** no localStorage
- **Variáveis CSS** para fácil customização
- **Suporte completo** a todos os componentes

### Portfólio Interativo
- **Filtros dinâmicos** por tecnologia
- **Busca em tempo real** nos projetos
- **Modal responsivo** com detalhes
- **Embaralhamento aleatório** dos projetos

## 📱 Responsividade

O site é totalmente responsivo com breakpoints:
- **Desktop**: > 1200px
- **Tablet**: 768px - 1199px
- **Mobile**: < 768px

### Características Mobile
- **Menu compacto** de idiomas
- **Grid adaptativo** do portfólio
- **Modal otimizado** para touch
- **Navegação por gestos**

## 🎨 Customização

### Cores do Tema
```css
/* Tema Claro */
:root {
    --primary-color: #2563eb;
    --background-color: #f8fafc;
    --text-color: #1f2937;
}

/* Tema Escuro */
body.dark-mode {
    --background-color: #222020;
    --text-color: #f1f5f9;
}
```

### Animações
```css
/* Personalize as transições */
:root {
    --transition-speed: 0.3s;
}

/* Adicione novas animações */
@keyframes novaAnimacao {
    0% { opacity: 0; transform: translateY(20px); }
    100% { opacity: 1; transform: translateY(0); }
}
```

## 📝 Licença

Este projeto está licenciado sob a **MIT License** - veja o arquivo [LICENSE](LICENSE) para detalhes.

## 👨‍💻 Autor

**Matheus Sesso**
- **Website**: [devmat.com.br](https://devmat.com.br)
- **LinkedIn**: [matheussesso](https://linkedin.com/in/matheussesso)
- **GitHub**: [@matheussesso](https://github.com/matheussesso)
- **Email**: matheus@devmat.com.br

---

⭐ **Se este projeto te ajudou, considere dar uma estrela!**
