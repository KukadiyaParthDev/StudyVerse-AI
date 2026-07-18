<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Study Planner - StudyVerse AI</title>
    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/layout.css">
    <link rel="stylesheet" href="assets/css/pages/planner.css">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>
<body>
    <div class="app-container">
        
        <!-- Sidebar Navigation (Reused) -->
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
                    <a href="flashcards.php" class="nav-item"><i class="ph ph-cards"></i> Flashcards</a>
                    <a href="planner.php" class="nav-item active"><i class="ph ph-calendar-check"></i> Study Planner</a>
                </div>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Topbar (Reused) -->
            <header class="topbar">
                <div class="search-trigger" id="openSearchBtn">
                    <i class="ph ph-magnifying-glass"></i>
                    <span>Search notes, flashcards, or AI history...</span>
                    <kbd>⌘ K</kbd>
                </div>
                <div class="topbar-actions">
                    <button class="icon-btn"><i class="ph ph-bell"></i></button>
                    <div class="avatar" style="width: 32px; height: 32px; font-size: 0.8rem;">A</div>
                </div>
            </header>

            <div class="content-wrapper">
                
                <div class="planner-header">
                    <div>
                        <h1>Academic Planner</h1>
                        <p class="subtitle">Manage your schedule, track deadlines, and stay ahead of exams.</p>
                    </div>
                </div>

                <!-- Critical Deadlines & Stats -->
                <div class="stats-overview">
                    <div class="stat-card focus-score">
                        <h3>FOCUS SCORE</h3>
                        <span class="score-value">92%</span>
                    </div>
                    <div class="stat-card tasks-done">
                        <h3>TASKS DONE</h3>
                        <span class="score-value">14/18</span>
                    </div>
                    
                    <!-- Deadlines Row -->
                    <div class="deadlines-container">
                        <h3>UP NEXT</h3>
                        <div class="deadline-items">
                            <div class="deadline-item">
                                <div class="deadline-time danger">3d <small>REMAINS</small></div>
                                <div class="deadline-details">
                                    <span class="subject">PHYSICS 402</span>
                                    <span class="title">Quantum Physics Finals</span>
                                </div>
                            </div>
                            <div class="deadline-item">
                                <div class="deadline-time warning">12d <small>REMAINS</small></div>
                                <div class="deadline-details">
                                    <span class="subject">ENGLISH LIT</span>
                                    <span class="title">Creative Thesis Draft</span>
                                </div>
                            </div>
                            <div class="deadline-item">
                                <div class="deadline-time danger">3d <small>REMAINS</small></div>
                                <div class="deadline-details">
                                    <span class="subject">MATHEMATICS</span>
                                    <span class="title">Linear Algebra Quiz</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Planner Grid -->
                <div class="planner-grid">
                    
                    <!-- Left Column: Calendar -->
                    <div class="calendar-section card">
                        <div class="calendar-header">
                            <h2>Schedule View</h2>
                            <div class="calendar-controls">
                                <button class="icon-btn"><i class="ph ph-caret-left"></i></button>
                                <span class="current-month">November 2024</span>
                                <button class="icon-btn"><i class="ph ph-caret-right"></i></button>
                                <button class="btn btn-outline btn-sm">Today</button>
                            </div>
                        </div>

                        <div class="calendar-grid-view">
                            <div class="weekday">MON</div>
                            <div class="weekday">TUE</div>
                            <div class="weekday">WED</div>
                            <div class="weekday">THU</div>
                            <div class="weekday">FRI</div>
                            <div class="weekday">SAT</div>
                            <div class="weekday">SUN</div>

                            <!-- Sample Calendar Days (Row 1) -->
                            <div class="day prev-month">28</div>
                            <div class="day prev-month">29</div>
                            <div class="day prev-month">30</div>
                            <div class="day prev-month">31</div>
                            <div class="day">1</div>
                            <div class="day">2</div>
                            <div class="day">3</div>

                            <!-- Sample Calendar Days (Row 2) -->
                            <div class="day">4</div>
                            <div class="day">5</div>
                            <div class="day">6</div>
                            <div class="day">
                                7
                                <div class="event-tag bg-blue">Physics Lab</div>
                            </div>
                            <div class="day">
                                8
                                <div class="event-tag bg-green">Chem Quiz</div>
                            </div>
                            <div class="day">9</div>
                            <div class="day">10</div>

                            <!-- Sample Calendar Days (Row 3) -->
                            <div class="day">11</div>
                            <div class="day today">12</div>
                            <div class="day">13</div>
                            <div class="day">14</div>
                            <div class="day">15</div>
                            <div class="day">16</div>
                            <div class="day">17</div>
                            
                            <!-- Sample Calendar Days (Row 4) -->
                            <div class="day">18</div>
                            <div class="day">19</div>
                            <div class="day">20</div>
                            <div class="day">21</div>
                            <div class="day">22</div>
                            <div class="day">23</div>
                            <div class="day">24</div>
                        </div>
                    </div>

                    <!-- Right Column: Sidebar Actions -->
                    <div class="planner-sidebar">
                        
                        <!-- Today's Tasks -->
                        <div class="card tasks-card">
                            <div class="card-header border-bottom">
                                <h3>Today's Tasks</h3>
                                <div class="task-filters">
                                    <button class="filter-btn active">All</button>
                                    <button class="filter-btn">Pending</button>
                                    <button class="filter-btn">Done</button>
                                </div>
                            </div>
                            <div class="task-list-detailed">
                                
                                <div class="detailed-task">
                                    <input type="checkbox">
                                    <div class="task-info">
                                        <span class="task-subject">BIOLOGY <span class="priority high">high</span></span>
                                        <span class="task-name">Review Chapter 4 Summary</span>
                                        <span class="task-time">09:30 AM</span>
                                    </div>
                                </div>

                                <div class="detailed-task">
                                    <input type="checkbox" checked>
                                    <div class="task-info">
                                        <span class="task-subject">CHEMISTRY <span class="priority medium">medium</span></span>
                                        <span class="task-name">Submit Lab Observations</span>
                                        <span class="task-time">11:00 AM</span>
                                    </div>
                                </div>

                                <div class="detailed-task">
                                    <input type="checkbox">
                                    <div class="task-info">
                                        <span class="task-subject">MATH <span class="priority high">high</span></span>
                                        <span class="task-name">Practice Quiz - Unit 2</span>
                                        <span class="task-time">02:00 PM</span>
                                    </div>
                                </div>
                                
                            </div>
                            <button class="btn btn-outline btn-full mt-1"><i class="ph ph-plus"></i> Add Event</button>
                        </div>

                        <!-- AI Study Tip -->
                        <div class="card ai-tip-card">
                            <div class="card-header">
                                <h3><i class="ph-fill ph-sparkle"></i> AI Study Tip</h3>
                            </div>
                            <p>Based on your recent quiz performance, focusing on Calculus Integration for 45 minutes today would be most effective.</p>
                            <button class="btn btn-primary btn-full mt-1">Set Focus Timer</button>
                        </div>

                    </div>
                </div>

            </div>
        </main>
    </div>
</body>
</html>