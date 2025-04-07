class UIAnimator {
    private initialized: boolean = false;
    
    constructor() {
        this.init();
    }
    
    private init(): void {
        if (this.initialized) return;
        this.initialized = true;
        
        document.addEventListener('DOMContentLoaded', () => {
            this.setupImageAnimations();
            this.setupCardAnimations();
            this.setupPageTransitions();
        });
    }
    
    private setupImageAnimations(): void {
        const images = document.querySelectorAll('img:not(.hero-img)');
        
        images.forEach(img => {
            img.addEventListener('mouseenter', this.createImageHoverEffect);
            img.addEventListener('mouseleave', this.removeImageHoverEffect);
        });
    }
    
    private createImageHoverEffect(e: Event): void {
        const img = e.currentTarget as HTMLImageElement;
        
        if (!img.style.transition) {
            img.style.transition = 'all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
        }
        
        img.style.transform = 'scale(1.05)';
        img.style.boxShadow = '0 10px 25px rgba(0, 0, 0, 0.3)';
    }
    
    private removeImageHoverEffect(e: Event): void {
        const img = e.currentTarget as HTMLImageElement;
        
        img.style.transform = 'scale(1)';
        img.style.boxShadow = 'none';
    }
    
    private setupCardAnimations(): void {
        const cards = document.querySelectorAll('.card');
        
        cards.forEach((card, index) => {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        setTimeout(() => {
                            card.classList.add('animate-in');
                            observer.unobserve(card);
                        }, index * 100);
                    }
                });
            }, { threshold: 0.2 });
            
            observer.observe(card);
        });
    }
    
    private setupPageTransitions(): void {
        const overlay = document.createElement('div');
        overlay.className = 'page-transition-overlay';
        document.body.appendChild(overlay);
        
        document.querySelectorAll('a').forEach(link => {
            if (link.href.startsWith(window.location.origin) && 
                !link.href.includes('#') && 
                !link.href.startsWith('javascript')) {
                
                link.addEventListener('click', (e) => {
                    const href = link.href;
                    
                    if (href !== window.location.href) {
                        e.preventDefault();
                        overlay.style.transform = 'translateY(0)';
                        
                        setTimeout(() => {
                            window.location.href = href;
                        }, 400);
                    }
                });
            }
        });
        
        window.addEventListener('load', () => {
            document.body.classList.add('page-loaded');
            
            setTimeout(() => {
                overlay.style.transform = 'translateY(-100%)';
            }, 100);
        });
    }
}

new UIAnimator();

if (!('ontouchstart' in document.documentElement)) {
    const cursor = document.createElement('div');
    cursor.className = 'custom-cursor';
    document.body.appendChild(cursor);
    
    const cursorDot = document.createElement('div');
    cursorDot.className = 'cursor-dot';
    document.body.appendChild(cursorDot);
    
    document.addEventListener('mousemove', (e) => {
        cursor.style.transform = `translate(${e.clientX}px, ${e.clientY}px)`;
        
        setTimeout(() => {
            cursorDot.style.transform = `translate(${e.clientX}px, ${e.clientY}px)`;
        }, 50);
    });
    
    const interactiveElements = document.querySelectorAll('a, button, .card, .gallery-item, input, .nav-link');
    
    interactiveElements.forEach(el => {
        el.addEventListener('mouseenter', () => {
            cursor.classList.add('cursor-hover');
            cursorDot.classList.add('dot-hover');
        });
        
        el.addEventListener('mouseleave', () => {
            cursor.classList.remove('cursor-hover');
            cursorDot.classList.remove('dot-hover');
        });
    });
}

export {};
