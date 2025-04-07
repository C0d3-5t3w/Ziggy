document.addEventListener('DOMContentLoaded', function() {
    const hamburger = document.querySelector('.hamburger') as HTMLElement;
    const navMenu = document.querySelector('.nav-menu') as HTMLElement;
    
    if (hamburger && navMenu) {
        hamburger.addEventListener('click', () => {
            navMenu.classList.toggle('active');
        });
    }
    
    document.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', () => {
            const menu = document.querySelector('.nav-menu');
            if (menu && menu.classList.contains('active')) {
                menu.classList.remove('active');
            }
        });
    });
    
    const currentPage = window.location.pathname.split('/').pop() || '';
    const navLinks = document.querySelectorAll('.nav-link');
    
    navLinks.forEach(link => {
        const linkPage = (link.getAttribute('href') || '').split('/').pop() || '';
        if (currentPage === linkPage || (currentPage === '' && linkPage === 'index.html')) {
            link.classList.add('active');
        }
    });
    
    const surpriseButton = document.getElementById('myButton');
    const resultDiv = document.getElementById('result');
    
    if (surpriseButton && resultDiv) {
        surpriseButton.addEventListener('click', function() {
            resultDiv.style.opacity = '0';
            resultDiv.style.transform = 'scale(0.8)';
            
            const reactions: string[] = ['😸', '😻', '🙀', '😽', '😹', '😿', '😾', '🐱'];
            const randomReaction = reactions[Math.floor(Math.random() * reactions.length)];
            
            setTimeout(() => {
                resultDiv.innerText = randomReaction;
                resultDiv.style.opacity = '1';
                resultDiv.style.transform = 'scale(1.2)';
                
                setTimeout(() => {
                    resultDiv.style.transform = 'scale(1)';
                }, 300);
            }, 300);
        });
    }
    
    const sections = document.querySelectorAll('.section, .hero');
    sections.forEach(section => {
        const bgCircles = document.createElement('div');
        bgCircles.className = 'bg-circles';
        
        for (let i = 0; i < 3; i++) {
            const circle = document.createElement('div');
            circle.className = 'bg-circle';
            circle.style.animationDelay = `${i * 0.7}s`;
            bgCircles.appendChild(circle);
        }
        
        section.appendChild(bgCircles);
    });
    
    const animateOnScroll = () => {
        const elements = document.querySelectorAll('.card, .gallery-item');
        
        elements.forEach((element) => {
            const elementTop = element.getBoundingClientRect().top;
            const elementVisible = 150;
            
            if (elementTop < window.innerHeight - elementVisible) {
                element.classList.add('animate');
            }
        });
    };
    
    window.addEventListener('scroll', animateOnScroll);
    
    animateOnScroll();
    
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            
            const href = this.getAttribute('href');
            if (href) {
                const target = document.querySelector(href);
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            }
        });
    });
    
    const header = document.querySelector('header');
    let lastScrollTop = 0;
    
    window.addEventListener('scroll', () => {
        if (!header) return;
        
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        
        if (scrollTop > lastScrollTop && scrollTop > 100) {
            header.style.transform = 'translateY(-100%)';
        } else {
            header.style.transform = 'translateY(0)';
        }
        
        if (scrollTop > 20) {
            header.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.4)';
        } else {
            header.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.2)';
        }
        
        lastScrollTop = scrollTop;
    });
});
