document.addEventListener('DOMContentLoaded', () => {
    
    // --- Global Search Modal Logic ---
    const searchTrigger = document.getElementById('openSearchBtn');
    const searchModalOverlay = document.getElementById('searchModalOverlay');
    const closeSearchBtn = document.getElementById('closeSearchBtn');
    const searchInput = document.getElementById('globalSearchInput');

    function openSearch() {
        searchModalOverlay.classList.add('active');
        setTimeout(() => searchInput.focus(), 100);
    }

    function closeSearch() {
        searchModalOverlay.classList.remove('active');
        searchInput.blur();
    }

    // Open on Topbar click
    if(searchTrigger) {
        searchTrigger.addEventListener('click', openSearch);
    }

    // Close on Escape or X button
    if(closeSearchBtn) {
        closeSearchBtn.addEventListener('click', closeSearch);
    }

    // Close when clicking outside the modal content
    if(searchModalOverlay) {
        searchModalOverlay.addEventListener('click', (e) => {
            if (e.target === searchModalOverlay) {
                closeSearch();
            }
        });
    }

    // Open via Keyboard Shortcut (Cmd+K or Ctrl+K)
    document.addEventListener('keydown', (e) => {
        if ((e.metaKey || e.ctrlKey) && e.key === 'k') {
            e.preventDefault();
            openSearch();
        }
        if (e.key === 'Escape' && searchModalOverlay.classList.contains('active')) {
            closeSearch();
        }
    });

});