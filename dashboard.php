<?php
require_once 'php/auth.php';

// 1. Protect the page - redirect to login if not authenticated
requireLogin();

// 2. Fetch the logged-in user's data from the database
$currentUser = getCurrentUser($pdo);
$firstName = htmlspecialchars($currentUser['first_name']);
$lastName = htmlspecialchars($currentUser['last_name']);
$initial = strtoupper(substr($firstName, 0, 1));

// 3. Placeholder stats (we will make these dynamic later)
$streak = 12;
$weekly_goal_progress = 75;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - StudyVerse AI</title>
    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/layout.css">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>
<body>
    <div class="app-container">
        
        <!-- Sidebar Navigation -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <div class="logo">
                    <div class="logo-icon"><i class="ph-fill ph-brain"></i></div>
                    <span>StudyVerse AI</span>
                </div>
            </div>

           <div class="sidebar-user">
                <!-- Dynamic Avatar Initial -->
                <div class="avatar"><?= $initial ?></div>
                <div class="user-info">
                    <!-- Dynamic Full Name -->
                    <span class="user-name"><?= $firstName . ' ' . $lastName ?></span>
                    <span class="user-plan">Pro Plan Active</span>
                </div>
            </div>

            <nav class="sidebar-nav">
                <div class="nav-section">
                    <span class="nav-label">MAIN MENU</span>
                    <a href="dashboard.php" class="nav-item active"><i class="ph ph-squares-four"></i> Dashboard</a>
                    <a href="notebooks.php" class="nav-item"><i class="ph ph-notebook"></i> Notebooks</a>
                    <a href="notes.php" class="nav-item"><i class="ph ph-chat-teardrop-text"></i> AI Assistant</a>
                    <a href="notes.php" class="nav-item"><i class="ph ph-file-pdf"></i> PDF Reader</a>
                    <a href="flashcards.php" class="nav-item"><i class="ph ph-cards"></i> Flashcards</a>
                    <a href="planner.php" class="nav-item"><i class="ph ph-calendar-check"></i> Study Planner</a>
                </div>

                <div class="nav-section">
                    <span class="nav-label">WORKSPACE</span>
                    <a href="#" class="nav-item"><i class="ph ph-clock-counter-clockwise"></i> Recent</a>
                    <a href="#" class="nav-item"><i class="ph ph-star"></i> Favorites</a>
                    <a href="#" class="nav-item"><i class="ph ph-trash"></i> Trash</a>
                </div>
            </nav>

            <div class="sidebar-footer">
                <a href="settings.php" class="nav-item"><i class="ph ph-gear"></i> Settings</a>
                <a href="login.php" class="nav-item text-danger"><i class="ph ph-sign-out"></i> Logout</a>
            </div>
        </aside>

        <!-- Main Content Area -->
        <main class="main-content">
            <!-- Topbar -->
            <header class="topbar">
                <div class="search-trigger" id="openSearchBtn">
                    <i class="ph ph-magnifying-glass"></i>
                    <span>Search notes, flashcards, or AI history...</span>
                    <kbd>⌘ K</kbd>
                </div>
                <div class="topbar-actions">
                    <button class="icon-btn"><i class="ph ph-bell"></i></button>
                    <div class="avatar" style="width: 32px; height: 32px; font-size: 0.8rem;"><?= $initial ?></div>
                </div>
            </header>

            <!-- Dashboard Content -->
            <div class="content-wrapper">
                <div class="dashboard-header">
                    <h1>Welcome back, <?= $firstName ?></h1>
                    <p class="subtitle">You're on a <?= $streak ?>-day streak—keep the momentum going!</p>
                </div>

                <div class="dashboard-grid">
                    
                    <!-- Progress Card -->
                    <div class="card progress-card col-span-2">
                        <div class="progress-ring-container">
                            <div class="progress-ring" style="--progress: <?php echo $user['weekly_goal_progress']; ?>%;">
                                <div class="progress-inner">
                                    <span class="progress-value"><?php echo $user['weekly_goal_progress']; ?>%</span>
                                    <span class="progress-label">Complete</span>
                                </div>
                            </div>
                        </div>
                        <div class="progress-info">
                            <h3>Weekly Study Goal</h3>
                            <p>You have completed 12.5h of your 16h goal.</p>
                            <div class="stats-row">
                                <div class="stat">
                                    <span class="stat-val">12</span>
                                    <span class="stat-lbl">Streak</span>
                                </div>
                                <div class="stat">
                                    <span class="stat-val">1.2k</span>
                                    <span class="stat-lbl">Words Today</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- AI Insight Card -->
                    <div class="card ai-insight-card">
                        <div class="card-header">
                            <h3><i class="ph-fill ph-sparkle"></i> AI Study Tip</h3>
                        </div>
                        <p class="insight-text">"Hi Alex! I noticed you have an exam coming up in 4 days. Would you like me to generate a 15-minute summary of your Calculus notes?"</p>
                        <button class="btn btn-primary btn-full">Generate Summary</button>
                    </div>

                    <!-- Recent Notebooks -->
                    <div class="card col-span-2">
                        <div class="card-header">
                            <h3>Recent Notebooks</h3>
                            <a href="notebooks.php" class="link-sm">View All ></a>
                        </div>
                        <div class="notebook-list">
                            <div class="notebook-item">
                                <div class="icon-box bg-blue"><i class="ph ph-atom"></i></div>
                                <div class="notebook-details">
                                    <h4>Neurobiology: Synaptic Plasticity</h4>
                                    <p>Edited 2 hours ago</p>
                                </div>
                            </div>
                            <div class="notebook-item">
                                <div class="icon-box bg-green"><i class="ph ph-chart-line-up"></i></div>
                                <div class="notebook-details">
                                    <h4>Macroeconomics - Keynesian Models</h4>
                                    <p>Edited 5 hours ago</p>
                                </div>
                            </div>
                            <div class="notebook-item">
                                <div class="icon-box bg-orange"><i class="ph ph-function"></i></div>
                                <div class="notebook-details">
                                    <h4>Linear Algebra: Vector Spaces</h4>
                                    <p>Edited Yesterday</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Today's Focus -->
                    <div class="card focus-card">
                        <div class="card-header">
                            <h3>Today's Focus</h3>
                            <a href="planner.php" class="link-sm">View Planner</a>
                        </div>
                        <div class="task-list">
                            <label class="task-item">
                                <input type="checkbox" checked>
                                <span class="task-text">Revise Chapter 4: Organic Chem</span>
                            </label>
                            <label class="task-item">
                                <input type="checkbox">
                                <span class="task-text">Finish 50 Flashcards: Spanish Verbs</span>
                            </label>
                            <label class="task-item">
                                <input type="checkbox">
                                <span class="task-text">Submit Essay Draft: Modernism</span>
                            </label>
                        </div>
                    </div>

                </div>
            </div>
        </main>
    </div>

    <!-- Global Search Modal -->
    <div class="modal-overlay" id="searchModalOverlay">
        <div class="search-modal">
            <div class="search-modal-header">
                <i class="ph ph-magnifying-glass"></i>
                <input type="text" id="globalSearchInput" placeholder="Search anything across your workspace..." autocomplete="off">
                <button class="icon-btn" id="closeSearchBtn"><kbd>ESC</kbd></button>
            </div>
            <div class="search-filters">
                <span class="filter-label">FILTER BY</span>
                <button class="filter-btn active">All Results</button>
                <button class="filter-btn"><i class="ph ph-notebook"></i> My Notes</button>
                <button class="filter-btn"><i class="ph ph-chat-teardrop-text"></i> AI History</button>
                <button class="filter-btn"><i class="ph ph-file-pdf"></i> PDF Library</button>
            </div>
            <div class="search-results">
                <div class="result-section">
                    <h4>RECENT SEARCHES</h4>
                    <div class="recent-pills">
                        <span class="pill">Photosynthesis summary</span>
                        <span class="pill">Calculus III practice quiz</span>
                    </div>
                </div>
                <div class="result-section">
                    <h4>SUGGESTED FOR YOU</h4>
                    <a href="#" class="search-result-item">
                        <div class="icon-box bg-blue"><i class="ph ph-notebook"></i></div>
                        <div class="result-details">
                            <h5>Cellular Biology - Mitochondria Deep Dive</h5>
                            <p>Detailed notes on the electron transport chain and ATP synthesis pathways...</p>
                        </div>
                        <span class="result-time">2 HOURS AGO</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/app.js"></script>
</body>
</html>