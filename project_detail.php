<?php
// Load projects data from JSON
$projects = json_decode(file_get_contents('data/projects.json'), true);

// Get project index from URL parameter
$projectIndex = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Check if project exists
if (!isset($projects[$projectIndex])) {
    header('Location: index.php#projects');
    exit;
}

$project = $projects[$projectIndex];
$pageTitle = $project['title'] . " - Portfolio";
include 'includes/header.php';
?>

<!-- Navigation -->
<nav class="navbar">
    <div class="container">
        <a href="index.php#home" class="logo">Rfldmr. | #WorkWithRafli</a>
        <ul class="nav-menu">
            <li><a href="index.php#home" class="nav-link">Home</a></li>
            <li><a href="index.php#education" class="nav-link">Education</a></li>
            <li><a href="index.php#experience" class="nav-link">Experience</a></li>
            <li><a href="projects.php" class="nav-link">Projects</a></li>
            <li><a href="index.php#contact" class="nav-link">Contact</a></li>
        </ul>
        <div class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</nav>

<!-- Project Detail Section -->
<section class="project-detail">
    <div class="container">
        <div class="back-link">
            <a href="index.php#projects"><i class="fas fa-arrow-left"></i> Back to Projects</a>
        </div>
        
        <div class="project-detail-content">
            <div class="project-detail-info">
                <h1 class="project-detail-title"><?php echo htmlspecialchars($project['title']); ?></h1>
                
                <?php if (!empty($project['category'])): ?>
                    <div class="project-category-badge">
                        <span class="category-badge"><?php echo ucwords(str_replace('_', ' ', htmlspecialchars($project['category']))); ?></span>
                    </div>
                <?php endif; ?>
                
                <div class="project-detail-meta">
                    <?php if (!empty($project['completion_date'])): ?>
                        <div class="meta-item">
                            <i class="fas fa-calendar-check"></i>
                            <span><strong>Completed:</strong> <?php echo date('F Y', strtotime($project['completion_date'])); ?></span>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (!empty($project['accuracy']) && $project['accuracy'] !== 'N/A'): ?>
                        <div class="meta-item">
                            <i class="fas fa-chart-line"></i>
                            <span><strong>Accuracy:</strong> <?php echo htmlspecialchars($project['accuracy']); ?></span>
                        </div>
                    <?php endif; ?>
                </div>
                
                <div class="project-detail-description">
                    <h2>Project Overview</h2>
                    <p><?php echo nl2br(htmlspecialchars($project['description'])); ?></p>
                </div>
                
                <?php if (!empty($project['preview_images']) && is_array($project['preview_images'])): ?>
                    <div class="project-preview-section">
                        <h3><i class="fas fa-images"></i> Project Preview</h3>
                        <div class="preview-slider">
                            <div class="preview-slides">
                                <?php foreach ($project['preview_images'] as $index => $preview): ?>
                                    <div class="preview-slide <?php echo $index === 0 ? 'active' : ''; ?>">
                                        <img src="<?php echo htmlspecialchars($preview); ?>" alt="Preview <?php echo $index + 1; ?>">
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <?php if (count($project['preview_images']) > 1): ?>
                                <button class="preview-btn prev-btn" onclick="changeSlide(-1)">
                                    <i class="fas fa-chevron-left"></i>
                                </button>
                                <button class="preview-btn next-btn" onclick="changeSlide(1)">
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                                <div class="preview-dots">
                                    <?php foreach ($project['preview_images'] as $index => $preview): ?>
                                        <span class="preview-dot <?php echo $index === 0 ? 'active' : ''; ?>" onclick="currentSlide(<?php echo $index; ?>)"></span>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
                
                <?php if (!empty($project['technologies'])): ?>
                    <div class="project-detail-tech">
                        <h3>Technologies Used</h3>
                        <div class="tech-tags">
                            <?php 
                            $techs = is_array($project['technologies']) ? $project['technologies'] : explode(',', $project['technologies']);
                            foreach ($techs as $tech): 
                            ?>
                                <span class="tech-tag"><?php echo htmlspecialchars(trim($tech)); ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
                
                <?php if (!empty($project['dataset_details'])): ?>
                    <div class="project-detail-results">
                        <h3><i class="fas fa-database"></i> Dataset Details</h3>
                        <div class="dataset-details">
                            <?php if (!empty($project['dataset_details']['creator'])): ?>
                                <div class="dataset-item">
                                    <strong>Dataset Name:</strong>
                                    <span><?php echo htmlspecialchars($project['dataset_details']['creator']); ?></span>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($project['dataset_details']['source'])): ?>
                                <div class="dataset-item">
                                    <strong>Source:</strong>
                                    <span><?php echo htmlspecialchars($project['dataset_details']['source']); ?></span>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($project['dataset_details']['year'])): ?>
                                <div class="dataset-item">
                                    <strong>Year:</strong>
                                    <span><?php echo htmlspecialchars($project['dataset_details']['year']); ?></span>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($project['dataset_details']['size'])): ?>
                                <div class="dataset-item">
                                    <strong>Data Size:</strong>
                                    <span><?php echo htmlspecialchars($project['dataset_details']['size']); ?></span>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($project['dataset_details']['dataset_link'])): ?>
                                <div class="dataset-item">
                                    <strong>Dataset Link:</strong>
                                    <span>
                                        <a href="<?php echo htmlspecialchars($project['dataset_details']['dataset_link']); ?>" 
                                           class="dataset-link" 
                                           target="_blank" 
                                           rel="noopener noreferrer">
                                            <i class="fas fa-external-link-alt"></i>
                                            <?php 
                                            echo !empty($project['dataset_details']['dataset_link_text']) 
                                                ? htmlspecialchars($project['dataset_details']['dataset_link_text'])
                                                : 'View Dataset';
                                            ?>
                                        </a>
                                    </span>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
                
                <div class="project-actions">
                    <?php if (!empty($project['github_url'])): ?>
                        <a href="<?php echo htmlspecialchars($project['github_url']); ?>" class="btn btn-primary" target="_blank">
                            <i class="fab fa-github"></i> View on GitHub
                        </a>
                    <?php endif; ?>
                    
                    <?php if (!empty($project['demo_url'])): ?>
                        <a href="<?php echo htmlspecialchars($project['demo_url']); ?>" class="btn btn-secondary" target="_blank">
                            <i class="fas fa-external-link-alt"></i> Live Demo
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
// Preview Slider JavaScript
let currentSlideIndex = 0;

function changeSlide(direction) {
    const slides = document.querySelectorAll('.preview-slide');
    const dots = document.querySelectorAll('.preview-dot');
    
    if (slides.length === 0) return;
    
    // Remove active class from current slide and dot
    slides[currentSlideIndex].classList.remove('active');
    if (dots[currentSlideIndex]) {
        dots[currentSlideIndex].classList.remove('active');
    }
    
    // Calculate new index
    currentSlideIndex += direction;
    
    // Wrap around
    if (currentSlideIndex >= slides.length) {
        currentSlideIndex = 0;
    } else if (currentSlideIndex < 0) {
        currentSlideIndex = slides.length - 1;
    }
    
    // Add active class to new slide and dot
    slides[currentSlideIndex].classList.add('active');
    if (dots[currentSlideIndex]) {
        dots[currentSlideIndex].classList.add('active');
    }
}

function currentSlide(index) {
    const slides = document.querySelectorAll('.preview-slide');
    const dots = document.querySelectorAll('.preview-dot');
    
    if (slides.length === 0) return;
    
    // Remove active class from current
    slides[currentSlideIndex].classList.remove('active');
    if (dots[currentSlideIndex]) {
        dots[currentSlideIndex].classList.remove('active');
    }
    
    // Set new index
    currentSlideIndex = index;
    
    // Add active class to new
    slides[currentSlideIndex].classList.add('active');
    if (dots[currentSlideIndex]) {
        dots[currentSlideIndex].classList.add('active');
    }
}
</script>

<?php include 'includes/footer.php'; ?>
