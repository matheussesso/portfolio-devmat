/**
 * WhatsApp Contact Form
 * Handles the floating WhatsApp button and contact form modal
 */

document.addEventListener('DOMContentLoaded', function() {
    // Get elements
    const floatBtn = document.getElementById('whatsappFloatBtn');
    const modal = document.getElementById('whatsappModal');
    const modalClose = document.getElementById('whatsappModalClose');
    const form = document.getElementById('whatsappForm');

    // WhatsApp configuration - get from PHP config
    const whatsappNumber = document.querySelector('[href*="api.whatsapp.com"]')
        ?.getAttribute('href')
        ?.match(/phone=(\d+)/)?.[1] || '5561982891073';

    // Open modal when clicking the float button
    if (floatBtn) {
        floatBtn.addEventListener('click', function() {
            modal.classList.add('show');
            document.body.style.overflow = 'hidden';
        });
    }

    // Close modal when clicking the close button
    if (modalClose) {
        modalClose.addEventListener('click', closeModal);
    }

    // Close modal when clicking outside
    if (modal) {
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                closeModal();
            }
        });
    }

    // Handle form submission
    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();

            // Get form values
            const name = document.getElementById('contactName').value.trim();
            const email = document.getElementById('contactEmail').value.trim();
            const message = document.getElementById('contactMessage').value.trim();

            // Validate form
            if (!name || !email || !message) {
                alert('Por favor, preencha todos os campos!');
                return;
            }

            // Build WhatsApp message
            const whatsappMessage = `*Olá! Tenho interesse em entrar em contato*\n\n` +
                `*Nome:* ${name}\n` +
                `*E-mail:* ${email}\n` +
                `*Mensagem:*\n${message}`;

            // Encode message for URL
            const encodedMessage = encodeURIComponent(whatsappMessage);

            // Create WhatsApp URL
            const whatsappUrl = `https://api.whatsapp.com/send?phone=${whatsappNumber}&text=${encodedMessage}`;

            // Open WhatsApp in new tab
            window.open(whatsappUrl, '_blank');

            // Reset form and close modal
            form.reset();
            closeModal();
        });
    }

    // Function to close modal
    function closeModal() {
        modal.classList.remove('show');
        document.body.style.overflow = '';
    }

    // Close modal on ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && modal.classList.contains('show')) {
            closeModal();
        }
    });

    // Add floating button animation on scroll
    let lastScrollTop = 0;
    window.addEventListener('scroll', function() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        
        if (scrollTop > 200) {
            floatBtn.style.opacity = '1';
            floatBtn.style.visibility = 'visible';
        } else {
            floatBtn.style.opacity = '0';
            floatBtn.style.visibility = 'hidden';
        }
        
        lastScrollTop = scrollTop;
    }, false);

    // Initial state - hide button at top
    if (window.pageYOffset < 200) {
        floatBtn.style.opacity = '0';
        floatBtn.style.visibility = 'hidden';
    }
});
