<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Note Editor - StudyVerse AI</title>
    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/layout.css">
    <link rel="stylesheet" href="assets/css/pages/editor.css">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>
<body>
    <div class="app-container">
        
        <!-- Sidebar (Reused) -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <a href="dashboard.php" class="logo">
                    <div class="logo-icon"><i class="ph-fill ph-brain"></i></div>
                    <span>StudyVerse AI</span>
                </a>
            </div>
            <nav class="sidebar-nav">
                <!-- Links hidden for brevity, identical to dashboard -->
                <a href="dashboard.php" class="nav-item"><i class="ph ph-squares-four"></i> Dashboard</a>
                <a href="notebooks.php" class="nav-item active"><i class="ph ph-notebook"></i> Notebooks</a>
            </nav>
        </aside>

        <!-- Editor Split View -->
        <main class="editor-layout">
            
            <!-- Left: Text Editor -->
            <div class="editor-main">
                <div class="editor-topbar">
                    <div class="breadcrumbs">
                        <a href="notebooks.php">Notebooks</a>
                        <i class="ph ph-caret-right"></i>
                        <a href="#">Computer Science</a>
                        <i class="ph ph-caret-right"></i>
                        <span>Neural Networks & Deep Learning</span>
                    </div>
                    <div class="editor-actions">
                        <span class="save-status"><i class="ph ph-cloud-check"></i> Auto-saved at 10:45 AM</span>
                        <button class="btn btn-primary btn-sm"><i class="ph ph-share-network"></i> Share</button>
                    </div>
                </div>

                <div class="editor-canvas">
                    <h1 class="document-title" contenteditable="true">Neural Networks: Backpropagation</h1>
                    <div class="document-meta">
                        <span>Edited 5 minutes ago</span> • <span>1.2k words</span>
                    </div>

                    <div class="rich-text-area" contenteditable="true">
                        <p>Backpropagation is the central mechanism by which neural networks learn. It is the process of calculating the gradient of the loss function with respect to the weights of the network.</p>
                        
                        <h3>The Mathematical Foundation</h3>
                        <p>To understand backpropagation, we must first look at the chain rule from calculus. For a composite function $f(g(x))$, the derivative is:</p>
                        
                        <div class="math-block">
                            $$d/dx[f(g(x))] = f'(g(x)) \cdot g'(x)$$
                        </div>

                        <p>This allows us to propagate the error backwards through each layer.</p>

                        <div class="code-block">
<pre><code>import torch.nn as nn

class SimpleNet(nn.Module):
    def __init__(self):
        super().__init__()
        self.fc = nn.Linear(10, 1)</code></pre>
                        </div>
                    </div>

                    <!-- Floating Formatting Toolbar -->
                    <div class="floating-toolbar">
                        <button><i class="ph ph-text-b"></i></button>
                        <button><i class="ph ph-text-italic"></i></button>
                        <button><i class="ph ph-text-strikethrough"></i></button>
                        <div class="divider-vertical"></div>
                        <button><i class="ph ph-list-bullets"></i></button>
                        <button><i class="ph ph-list-numbers"></i></button>
                        <button><i class="ph ph-check-square"></i></button>
                        <div class="divider-vertical"></div>
                        <button><i class="ph ph-code"></i></button>
                        <button><i class="ph ph-image"></i></button>
                    </div>
                </div>
            </div>

            <!-- Right: AI Intelligence Sidebar -->
            <div class="editor-sidebar">
                <div class="ai-sidebar-header">
                    <h3><i class="ph-fill ph-sparkle"></i> AI INTELLIGENCE</h3>
                    <span class="status-badge">Active</span>
                </div>
                
                <div class="ai-widget">
                    <div class="widget-header">
                        <h4>Instant Summary</h4>
                    </div>
                    <p class="widget-text">This note covers the fundamentals of Backpropagation in multi-layer perceptrons. Key concepts include the chain rule, gradient descent optimization, and loss function minimization.</p>
                    <button class="btn btn-outline btn-sm btn-full">Expand analysis</button>
                </div>

                <div class="ai-widget">
                    <div class="widget-header">
                        <h4>Suggested Tags</h4>
                    </div>
                    <div class="tags-container">
                        <span class="tag">Deep Learning</span>
                        <span class="tag">Python</span>
                        <span class="tag">ML Fundamentals</span>
                        <span class="tag">Calculus</span>
                    </div>
                </div>

                <div class="ai-widget">
                    <div class="widget-header">
                        <h4><i class="ph ph-check-square"></i> Study Checklist</h4>
                    </div>
                    <div class="checklist">
                        <label class="check-item">
                            <input type="checkbox">
                            <span>Derive the gradient for a single neuron</span>
                        </label>
                        <label class="check-item">
                            <input type="checkbox">
                            <span>Implement basic MLP in NumPy</span>
                        </label>
                        <label class="check-item">
                            <input type="checkbox">
                            <span>Compare SGD vs. Adam optimization</span>
                        </label>
                    </div>
                </div>
            </div>

        </main>
    </div>
</body>
</html>