document.addEventListener('DOMContentLoaded', () => {
    const flashcard = document.getElementById('activeFlashcard');
    const flipBtn = document.getElementById('flipBtn');
    
    // Check if elements exist before attaching listeners
    if(!flashcard || !flipBtn) return;

    // Toggle Flip state
    function flipCard() {
        flashcard.classList.add('flipped');
    }

    // Flip on button click
    flipBtn.addEventListener('click', flipCard);

    // Keyboard controls
    document.addEventListener('keydown', (e) => {
        // Spacebar to flip (if not already flipped)
        if (e.code === 'Space') {
            e.preventDefault();
            if (!flashcard.classList.contains('flipped')) {
                flipCard();
            }
        }

        // Keys 1-4 to grade (only if flipped)
        if (flashcard.classList.contains('flipped')) {
            const validKeys = ['Digit1', 'Digit2', 'Digit3', 'Digit4'];
            if (validKeys.includes(e.code)) {
                // Here you would trigger the Ajax request to update the DB
                // For UI purposes, we'll just flip it back to simulate moving to the next card
                flashcard.classList.remove('flipped');
            }
        }
    });

    // Handle grade button clicks
    const gradeButtons = document.querySelectorAll('.grade-btn');
    gradeButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            // Flip back to simulate next card
            flashcard.classList.remove('flipped');
        });
    });
});