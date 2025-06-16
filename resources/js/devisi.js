document.addEventListener('DOMContentLoaded', function() {
    const cards = document.querySelectorAll('.card');
    
    function checkScroll() {
        cards.forEach(card => {
            const cardTop = card.getBoundingClientRect().top;
            const triggerBottom = window.innerHeight * 0.8;
            
            if (cardTop < triggerBottom) {
                card.style.opacity = '1';
                card.style.transform = 'translateY(0) scale(1)';
            }
        });
    }
    
    // Initial setup
    cards.forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px) scale(0.95)';
        card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
    });
    
    // Check on scroll
    window.addEventListener('scroll', checkScroll);
    
    // Initial check
    checkScroll();
});