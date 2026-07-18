<?php 
require_once 'php/auth.php';
requireLogin();

$user_id = $_SESSION['user_id'];
$currentUser = getCurrentUser($pdo);
$initial = strtoupper(substr($currentUser['first_name'], 0, 1));

// Handle New Notebook Creation
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'create_notebook') {
    $name = trim($_POST['notebook_name']);
    $color = $_POST['notebook_color'] ?? '#4F46E5';
    
    if (!empty($name)) {
        $stmt = $pdo->prepare("INSERT INTO subjects (user_id, name, color_code) VALUES (?, ?, ?)");
        $stmt->execute([$user_id, $name, $color]);
        header("Location: notebooks.php");
        exit;
    }
}

// Fetch all notebooks for this user
$stmt = $pdo->prepare("SELECT * FROM subjects WHERE user_id = ? ORDER BY created_at DESC");
$stmt->execute([$user_id]);
$notebooks = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notebooks - StudyVerse AI</title>
    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/layout.css">
    <link rel="stylesheet" href="assets/css/pages/notebooks.css">
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
                    <a href="notebooks.php" class="nav-item active"><i class="ph ph-notebook"></i> Notebooks</a>
                    <a href="notes.php" class="nav-item"><i class="ph ph-chat-teardrop-text"></i> AI Assistant</a>
                    <a href="#" class="nav-item"><i class="ph ph-file-pdf"></i> PDF Reader</a>
                    <a href="flashcards.php" class="nav-item"><i class="ph ph-cards"></i> Flashcards</a>
                    <a href="planner.php" class="nav-item"><i class="ph ph-calendar-check"></i> Study Planner</a>
                </div>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Topbar -->
            <header class="topbar">
                <div class="search-trigger" id="openSearchBtn">
                    <i class="ph ph-magnifying-glass"></i>
                    <span>Search notes, flashcards...</span>
                    <kbd>⌘ K</kbd>
                </div>
                <div class="topbar-actions">
                    <button class="icon-btn"><i class="ph ph-bell"></i></button>
                    <div class="avatar" style="width: 32px; height: 32px; font-size: 0.8rem;"><?= $initial ?></div>
                </div>
            </header>

            <div class="content-wrapper">
                
                <div class="notebooks-header-top">
                    <div>
                        <h1>Notebooks</h1>
                        <p class="subtitle">Manage and organize your study materials</p>
                    </div>
                    <div class="header-actions">
                        <button class="btn btn-outline btn-sm"><i class="ph ph-share-network"></i> Share Library</button>
                        <button class="btn btn-primary btn-sm" onclick="openCreateModal()"><i class="ph ph-folder-plus"></i> New Collection</button>
                    </div>
                </div>

                <div class="notebooks-tabs">
                    <button class="tab-btn active">All Notebooks <span class="badge"><?= count($notebooks) ?></span></button>
                </div>

                <!-- Notebooks Grid -->
                <div class="notebooks-grid">
                    
                    <!-- Dynamic Notebook Loop -->
                    <?php foreach($notebooks as $nb): ?>
                        <div class="notebook-card">
                            <div class="card-cover" style="background: <?= htmlspecialchars($nb['color_code']) ?>; opacity: 0.8;">
                                <button class="menu-dots"><i class="ph ph-dots-three-vertical"></i></button>
                            </div>
                            <div class="card-body">
                                <h3><i class="ph ph-book-open"></i> <?= htmlspecialchars($nb['name']) ?></h3>
                                <span class="note-count">0 notes</span> <!-- To be made dynamic later -->
                            </div>
                            <div class="card-footer">
                                <span class="time"><i class="ph ph-clock"></i> <?= date('M j, Y', strtotime($nb['created_at'])) ?></span>
                                <a href="notes.php?subject_id=<?= $nb['id'] ?>" class="open-link">Open</a>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <!-- Create New Card -->
                    <div class="notebook-card create-card" onclick="openCreateModal()">
                        <div class="create-content">
                            <div class="create-icon"><i class="ph ph-plus"></i></div>
                            <h4>Create Notebook</h4>
                            <p>Start a new study set</p>
                        </div>
                    </div>

                </div>
            </div>
        </main>
    </div>

    <!-- Create Notebook Modal -->
    <div class="modal-overlay" id="createNotebookModal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Create New Notebook</h2>
                <button class="icon-btn" onclick="closeCreateModal()"><i class="ph ph-x"></i></button>
            </div>
            <form method="POST" action="notebooks.php">
                <input type="hidden" name="action" value="create_notebook">
                
                <div class="modal-body">
                    <div class="input-group" style="margin-bottom: 1.5rem;">
                        <label>Notebook Name</label>
                        <input type="text" name="notebook_name" required placeholder="e.g. Advanced Biology" class="form-control">
                    </div>
                    
                    <div class="input-group">
                        <label>Cover Color</label>
                        <div style="display: flex; gap: 1rem; margin-top: 0.5rem;">
                            <label style="cursor: pointer;"><input type="radio" name="notebook_color" value="#4F46E5" checked> <span style="display:inline-block; width:24px; height:24px; background:#4F46E5; border-radius:50%;"></span></label>
                            <label style="cursor: pointer;"><input type="radio" name="notebook_color" value="#10B981"> <span style="display:inline-block; width:24px; height:24px; background:#10B981; border-radius:50%;"></span></label>
                            <label style="cursor: pointer;"><input type="radio" name="notebook_color" value="#F59E0B"> <span style="display:inline-block; width:24px; height:24px; background:#F59E0B; border-radius:50%;"></span></label>
                            <label style="cursor: pointer;"><input type="radio" name="notebook_color" value="#EC4899"> <span style="display:inline-block; width:24px; height:24px; background:#EC4899; border-radius:50%;"></span></label>
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline" onclick="closeCreateModal()">Cancel</button>
                    <button type="submit" class="btn btn-primary">Create Notebook</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openCreateModal() {
            document.getElementById('createNotebookModal').classList.add('active');
        }
        function closeCreateModal() {
            document.getElementById('createNotebookModal').classList.remove('active');
        }
    </script>
</body>
</html>