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
            this.setupCatTailTrail(); 
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

    private setupCatTailTrail(): void {
        if ('ontouchstart' in document.documentElement) return;
        
        const tailContainer = document.createElement('div');
        tailContainer.className = 'cat-tail-container';
        document.body.appendChild(tailContainer);
        
        const tailSegmentsCount = 10;
        const tailSegments: HTMLElement[] = [];
        
        for (let i = 0; i < tailSegmentsCount; i++) {
            const segment = document.createElement('div');
            segment.className = 'cat-tail-segment';
            const hue = 25 - (i * 2);
            const lightness = 60 - (i * 2);
            segment.style.backgroundColor = `hsl(${hue}, 80%, ${lightness}%)`;
            segment.style.width = `${Math.max(5, 16 - (i * 1.2))}px`;
            segment.style.height = `${Math.max(5, 16 - (i * 1.2))}px`;
            segment.style.zIndex = `${9995 - i}`;
            segment.style.opacity = `${1 - (i * 0.08)}`;
            
            tailContainer.appendChild(segment);
            tailSegments.push(segment);
        }
        
        const positions: { x: number; y: number }[] = Array(tailSegmentsCount).fill({ x: 0, y: 0 });
        
        document.addEventListener('mousemove', (e) => {
            positions.unshift({ x: e.clientX, y: e.clientY });
            positions.pop();
            
            tailSegments.forEach((segment, index) => {
                const position = positions[Math.min(index, positions.length - 1)];
                
                if (position) {
                    segment.style.transform = `translate(${position.x}px, ${position.y}px)`;
                    
                    const prevPos = positions[Math.min(index + 1, positions.length - 1)] || position;
                    const speed = Math.sqrt(
                        Math.pow(position.x - prevPos.x, 2) + 
                        Math.pow(position.y - prevPos.y, 2)
                    );
                    
                    const wiggle = Math.min(10, speed * 0.2);
                    const angle = Math.sin((Date.now() / 200) + index) * wiggle;
                    
                    segment.style.transform = `translate(${position.x}px, ${position.y}px) rotate(${angle}deg)`;
                }
            });
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
