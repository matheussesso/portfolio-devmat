    <!-- Bootstrap JS e Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

    <!-- Custom JS -->
    <script src="assets/js/theme.js"></script>
    
    <!-- Language Selector JS -->
    <script>
        function toggleLanguageMenu() {
            const menu = document.getElementById('languageMenu');
            const toggle = document.querySelector('.language-toggle');
            
            menu.classList.toggle('show');
            toggle.classList.toggle('active');
        }

        // Fechar menu ao clicar fora
        document.addEventListener('click', function(event) {
            const selector = document.querySelector('.language-selector');
            const menu = document.getElementById('languageMenu');
            const toggle = document.querySelector('.language-toggle');
            
            if (!selector.contains(event.target)) {
                menu.classList.remove('show');
                toggle.classList.remove('active');
            }
        });
    </script>
</body>
</html>
