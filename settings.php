<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings - StudyVerse AI</title>
    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/layout.css">
    <link rel="stylesheet" href="assets/css/pages/settings.css">
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
                    <a href="flashcards.php" class="nav-item"><i class="ph ph-cards"></i> Flashcards</a>
                    <a href="planner.php" class="nav-item"><i class="ph ph-calendar-check"></i> Study Planner</a>
                </div>
            </nav>

            <div class="sidebar-footer">
                <a href="settings.php" class="nav-item active"><i class="ph ph-gear"></i> Settings</a>
                <a href="login.php" class="nav-item text-danger"><i class="ph ph-sign-out"></i> Logout</a>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Topbar -->
            <header class="topbar">
                <div class="search-trigger" id="openSearchBtn">
                    <i class="ph ph-magnifying-glass"></i>
                    <span>Search settings...</span>
                    <kbd>⌘ K</kbd>
                </div>
                <div class="topbar-actions">
                    <button class="icon-btn"><i class="ph ph-bell"></i></button>
                    <div class="avatar" style="width: 32px; height: 32px; font-size: 0.8rem;">A</div>
                </div>
            </header>

            <div class="content-wrapper">
                <div class="settings-header">
                    <h1>Settings</h1>
                    <p class="subtitle">Manage your account settings and preferences.</p>
                </div>

                <div class="settings-layout">
                    
                    <!-- Left: Navigation Tabs -->
                    <div class="settings-nav">
                        <button class="settings-tab active"><i class="ph ph-user"></i> Profile</button>
                        <button class="settings-tab"><i class="ph ph-palette"></i> Appearance</button>
                        <button class="settings-tab"><i class="ph ph-bell-ringing"></i> Notifications</button>
                        <button class="settings-tab"><i class="ph ph-credit-card"></i> Billing & Plan</button>
                    </div>

                    <!-- Right: Settings Panels -->
                    <div class="settings-panels">
                        
                        <!-- Profile Panel -->
                        <div class="card settings-card">
                            <div class="card-header border-bottom">
                                <h3>Public Profile</h3>
                                <p class="help-text">This information will be displayed on your shared notebooks.</p>
                            </div>
                            
                            <div class="card-body">
                                <div class="avatar-upload">
                                    <div class="avatar-preview">A</div>
                                    <div class="avatar-actions">
                                        <button class="btn btn-outline btn-sm">Change avatar</button>
                                        <button class="btn btn-outline btn-sm text-danger" style="border: none;">Remove</button>
                                    </div>
                                </div>

                                <form class="settings-form">
                                    <div class="form-row">
                                        <div class="input-group">
                                            <label>First Name</label>
                                            <input type="text" value="Alex" class="form-control">
                                        </div>
                                        <div class="input-group">
                                            <label>Last Name</label>
                                            <input type="text" value="Rivera" class="form-control">
                                        </div>
                                    </div>
                                    
                                    <div class="input-group">
                                        <label>Email Address</label>
                                        <input type="email" value="alex@university.edu" class="form-control">
                                    </div>

                                    <div class="input-group">
                                        <label>University / Institution</label>
                                        <input type="text" placeholder="e.g. Stanford University" class="form-control">
                                    </div>
                                    
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Appearance Panel (Dark Mode) -->
                        <div class="card settings-card">
                            <div class="card-header border-bottom">
                                <h3>Appearance</h3>
                                <p class="help-text">Customize how StudyVerse looks on your device.</p>
                            </div>
                            
                            <div class="card-body">
                                <div class="setting-row">
                                    <div class="setting-info">
                                        <h4>Dark Mode</h4>
                                        <p>Switch to a darker theme for late-night study sessions.</p>
                                    </div>
                                    <label class="toggle-switch">
                                        <input type="checkbox" id="darkModeToggle">
                                        <span class="slider"></span>
                                    </label>
                                </div>

                                <div class="setting-row">
                                    <div class="setting-info">
                                        <h4>Compact UI</h4>
                                        <p>Reduce padding and spacing to fit more information on screen.</p>
                                    </div>
                                    <label class="toggle-switch">
                                        <input type="checkbox">
                                        <span class="slider"></span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Danger Zone -->
                        <div class="card settings-card border-danger">
                            <div class="card-header border-bottom">
                                <h3 class="text-danger">Danger Zone</h3>
                            </div>
                            <div class="card-body">
                                <div class="setting-row">
                                    <div class="setting-info">
                                        <h4>Delete Account</h4>
                                        <p>Permanently delete your account, notes, and all AI history. This action cannot be undone.</p>
                                    </div>
                                    <button class="btn btn-outline text-danger" style="border-color: var(--danger);">Delete Account</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Simple Dark Mode Script -->
    <script>
        document.getElementById('darkModeToggle').addEventListener('change', function() {
            if (this.checked) {
                document.body.classList.add('dark-theme');
                // You would normally save this to local storage or DB via AJAX
            } else {
                document.body.classList.remove('dark-theme');
            }
        });
    </script>
</body>
</html>