// Funções gerais do CineTime

// Função para mostrar/ocultar senha
function togglePassword(inputId) {
    const input = document.getElementById(inputId);
    const icon = input.nextElementSibling;
    
    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        input.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
}

// Função para animação suave ao carregar a página
document.addEventListener('DOMContentLoaded', function() {
    // Adicionar classe de animação aos cards de filme
    const movieCards = document.querySelectorAll('.movie-card');
    movieCards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        
        setTimeout(() => {
            card.style.transition = 'all 0.5s ease';
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        }, index * 100);
    });
    
    //header do catálogo
    const catalogHeader = document.querySelector('.catalog-header');
    if (catalogHeader) {
        catalogHeader.style.opacity = '0';
        catalogHeader.style.transform = 'translateY(-20px)';
        
        setTimeout(() => {
            catalogHeader.style.transition = 'all 0.8s ease';
            catalogHeader.style.opacity = '1';
            catalogHeader.style.transform = 'translateY(0)';
        }, 200);
    }
});

//busca em tempo real (opcional)
function setupLiveSearch() {
    const searchInput = document.querySelector('input[name="search"]');
    if (searchInput) {
        let searchTimeout;
        
        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            
            searchTimeout = setTimeout(() => {
                // Aqui poderia implementar busca AJAX em tempo real
                // Por enquanto, mantemos o comportamento padrão do formulário
            }, 500);
        });
    }
}

//loading de imagens
function setupLazyLoading() {
    const images = document.querySelectorAll('img[data-src]');
    
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src;
                img.classList.remove('lazy');
                imageObserver.unobserve(img);
            }
        });
    });
    
    images.forEach(img => imageObserver.observe(img));
}

// Função para melhorar a experiência de hover nos cards
function enhanceMovieCards() {
    const movieCards = document.querySelectorAll('.movie-card');
    
    movieCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            // Adicionar efeito de brilho sutil
            this.style.boxShadow = '0 20px 40px rgba(229, 9, 20, 0.2)';
        });
        
        card.addEventListener('mouseleave', function() {
            // Remover efeito de brilho
            this.style.boxShadow = '';
        });
    });
}

// Função para smooth scroll
function smoothScroll(target) {
    document.querySelector(target).scrollIntoView({
        behavior: 'smooth'
    });
}

// Função para mostrar notificações toast (opcional)
function showToast(message, type = 'info') {
    const toast = document.createElement('div');
    toast.className = `toast toast-${type}`;
    toast.textContent = message;
    
    // Estilos inline para o toast
    toast.style.cssText = `
        position: fixed;
        top: 100px;
        right: 20px;
        background: ${type === 'error' ? '#dc3545' : type === 'success' ? '#28a745' : '#17a2b8'};
        color: white;
        padding: 1rem 1.5rem;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.3);
        z-index: 9999;
        opacity: 0;
        transform: translateX(100%);
        transition: all 0.3s ease;
    `;
    
    document.body.appendChild(toast);
    
    // Mostrar toast
    setTimeout(() => {
        toast.style.opacity = '1';
        toast.style.transform = 'translateX(0)';
    }, 100);
    
    // Remover toast após 3 segundos
    setTimeout(() => {
        toast.style.opacity = '0';
        toast.style.transform = 'translateX(100%)';
        
        setTimeout(() => {
            document.body.removeChild(toast);
        }, 300);
    }, 3000);
}

// Inicializar funcionalidades quando a página carregar
document.addEventListener('DOMContentLoaded', function() {
    setupLiveSearch();
    setupLazyLoading();
    enhanceMovieCards();
});

// Função para validação de formulários
function validateForm(formId) {
    const form = document.getElementById(formId);
    if (!form) return true;
    
    const inputs = form.querySelectorAll('input[required]');
    let isValid = true;
    
    inputs.forEach(input => {
        if (!input.value.trim()) {
            input.style.borderColor = '#dc3545';
            isValid = false;
        } else {
            input.style.borderColor = '';
        }
    });
    
    return isValid;
}

// Função para formatação de dados
function formatDate(dateString) {
    const date = new Date(dateString);
    return date.toLocaleDateString('pt-BR');
}

// Função para truncar texto
function truncateText(text, maxLength) {
    if (text.length <= maxLength) return text;
    return text.substr(0, maxLength) + '...';
}

