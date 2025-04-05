document.addEventListener('DOMContentLoaded', function() {
    const dropdowns: NodeListOf<HTMLElement> = document.querySelectorAll('.dropdown-trigger');
    
    dropdowns.forEach(dropdown => {
        dropdown.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const content = this.nextElementSibling as HTMLElement;
            if (!content) return;
            
            document.querySelectorAll('.dropdown-content').forEach(item => {
                if (item !== content && item.classList.contains('show')) {
                    item.classList.remove('show');
                }
            });
            
            content.classList.toggle('show');
        });
    });
    
    window.addEventListener('click', function() {
        document.querySelectorAll('.dropdown-content').forEach(dropdown => {
            if (dropdown.classList.contains('show')) {
                dropdown.classList.remove('show');
            }
        });
    });
});
