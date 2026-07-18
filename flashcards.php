<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Study Session - StudyVerse AI</title>
    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/layout.css">
    <link rel="stylesheet" href="assets/css/pages/flashcards.css">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>
<body>
    <div class="app-container">
        
        <!-- Sidebar Navigation -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <a href="dashboard.php" class="logo">
                    <div class="logo-icon"><i class="ph-fill ph-brain"></i></div>
                    <span>StudyVerse AI</span>
                </a>
            </div>
            
            <nav class="sidebar-nav">
                <div class="nav-section">
                    <span class="nav-label">MAIN MENU</span>
                    <a href="dashboard.php" class="nav-item"><i class="ph ph-squares-four"></i> Dashboard</a>
                    <a href="notebooks.php" class="nav-item"><i class="ph ph-notebook"></i> Notebooks</a>
                    <a href="notes.php" class="nav-item"><i class="ph ph-chat-teardrop-text"></i> AI Assistant</a>
                    <a href="#" class="nav-item"><i class="ph ph-file-pdf"></i> PDF Reader</a>
                    <a href="flashcards.php" class="nav-item active"><i class="ph ph-cards"></i> Flashcards</a>
                    <a href="planner.php" class="nav-item"><i class="ph ph-calendar-check"></i> Study Planner</a>
                </div>
            </nav>
        </aside>

        <!-- Flashcard Study Mode -->
        <main class="study-layout">
            
            <!-- Top Header -->
            <header class="study-header">
                <div class="deck-info">
                    <a href="#" class="back-btn"><i class="ph ph-caret-left"></i></a>
                    <div>
                        <h1>Final Exam Prep: Advanced Sciences</h1>
                        <p class="session-progress">SESSION PROGRESS: 1 OF 30 CARDS</p>
                    </div>
                </div>
                
                <div class="study-actions">
                    <div class="mastery-badge">
                        <i class="ph-fill ph-chart-polar"></i>
                        <span>MASTERY LEVEL</span>
                        <strong>65%</strong>
                    </div>
                    <button class="icon-btn" title="Deck Settings"><i class="ph ph-gear"></i></button>
                    <button class="btn btn-outline btn-sm text-danger">End Session</button>
                </div>
            </header>

            <!-- Main Study Area -->
            <div class="study-canvas">
                
                <!-- Left: Session Stats -->
                <div class="session-stats">
                    <h3>SESSION STATS</h3>
                    <div class="stat-item new">
                        <span class="dot"></span> New Cards <span class="count">12</span>
                    </div>
                    <div class="stat-item learning">
                        <span class="dot"></span> Learning <span class="count">8</span>
                    </div>
                    <div class="stat-item mastered">
                        <span class="dot"></span> Mastered <span class="count">24</span>
                    </div>
                </div>

                <!-- Center: The Flashcard -->
                <div class="flashcard-container">
                    <div class="flashcard" id="activeFlashcard">
                        
                        <!-- Front of Card -->
                        <div class="card-face card-front">
                            <span class="card-hint">Topic: Neurobiology</span>
                            <div class="card-content">
                                <h2>What is the primary inhibitory neurotransmitter in the mammalian central nervous system?</h2>
                            </div>
                            <button class="btn btn-outline show-answer-btn" id="flipBtn">Click to see answer <i class="ph ph-arrow-u-down-right"></i></button>
                        </div>

                        <!-- Back of Card (Answer) -->
                        <div class="card-face card-back">
                            <div class="card-content">
                                <span class="correct-label"><i class="ph-fill ph-check-circle"></i> Correct Answer</span>
                                <h2>GABA (Gamma-Aminobutyric Acid).</h2>
                                <p>It plays the principal role in reducing neuronal excitability throughout the nervous system.</p>
                            </div>
                            
                            <!-- Grading Buttons (Appear when flipped) -->
                            <div class="grading-actions">
                                <button class="grade-btn again">
                                    <span class="shortcut">1</span>
                                    <span class="label">Again</span>
                                    <span class="time">20m</span>
                                </button>
                                <button class="grade-btn hard">
                                    <span class="shortcut">2</span>
                                    <span class="label">Hard</span>
                                    <span class="time">1h</span>
                                </button>
                                <button class="grade-btn good">
                                    <span class="shortcut">3</span>
                                    <span class="label">Good</span>
                                    <span class="time">4d</span>
                                </button>
                                <button class="grade-btn easy">
                                    <span class="shortcut">4</span>
                                    <span class="label">Easy</span>
                                    <span class="time">14d</span>
                                </button>
                            </div>
                        </div>

                    </div>
                    
                    <div class="keyboard-shortcuts">
                        <span><kbd>SPACE</kbd> FLIP CARD</span>
                        <span><kbd>1</kbd>-<kbd>4</kbd> GRADE CARD</span>
                    </div>
                </div>

                <!-- Right: Spacing (Keeps card centered) -->
                <div class="spacer"></div>
            </div>
        </main>
    </div>

    <script src="assets/js/flashcards.js"></script>
</body>
</html>