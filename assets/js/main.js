document.addEventListener('DOMContentLoaded', function() {
    const hamburger = document.querySelector('.hamburger');
    const navMenu = document.querySelector('.nav-menu');
    
    if (hamburger) {
        hamburger.addEventListener('click', () => {
            navMenu.classList.toggle('active');
        });
    }
    
    document.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', () => {
            if (navMenu.classList.contains('active')) {
                navMenu.classList.remove('active');
            }
        });
    });
    
    const currentPage = window.location.pathname.split('/').pop();
    const navLinks = document.querySelectorAll('.nav-link');
    
    navLinks.forEach(link => {
        const linkPage = link.getAttribute('href').split('/').pop();
        if (currentPage === linkPage || (currentPage === '' && linkPage === 'index.html')) {
            link.classList.add('active');
        }
    });
    
    const surpriseButton = document.getElementById('myButton');
    const resultDiv = document.getElementById('result');
    
    if (surpriseButton) {
        surpriseButton.addEventListener('click', function() {
            resultDiv.style.opacity = '0';
            
            const reactions = ['😸', '😻', '🙀', '😽', '😹', '😿', '😾', '🐱'];
            
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
});
