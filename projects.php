<?php
// Load data from JSON files
$projects = json_decode(file_get_contents('data/projects.json'), true);

$pageTitle = "All Projects - Portfolio";
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

<!-- Projects Page Header -->
<section class="projects-header">
    <div class="container">
        <h1 class="page-title">All Projects</h1>
        <p class="page-subtitle">Showcasing my data science and analytics work.</p>
    </div>
</section>

<!-- All Projects Section -->
<section id="projects" class="projects projects-page">
    <div class="container">
        <div class="project-filters">
            <button class="filter-btn active" data-filter="all">All</button>
            <button class="filter-btn" data-filter="data_science">Data Science</button>
            <button class="filter-btn" data-filter="data_analytics">Data Analytics</button>
        </div>
        <div class="projects-grid">
            <?php foreach ($projects as $index => $project): ?>
                <div class="project-card" data-category="<?php echo htmlspecialchars($project['category'] ?? 'data_science'); ?>">
                    <?php if (!empty($project['image']) && file_exists($project['image'])): ?>
                        <div class="project-image">
                            <img src="<?php echo htmlspecialchars($project['image']); ?>" alt="<?php echo htmlspecialchars($project['title']); ?>">
                        </div>
                    <?php endif; ?>
                    <div class="project-content">
                        <h3><?php echo htmlspecialchars($project['title']); ?></h3>
                        <p><?php echo nl2br(htmlspecialchars(substr($project['description'], 0, 150))) . (strlen($project['description']) > 150 ? '...' : ''); ?></p>
                        <?php if (!empty($project['technologies'])): ?>
                            <div class="project-tech">
                                <?php 
                                $techs = is_array($project['technologies']) ? $project['technologies'] : explode(',', $project['technologies']);
                                $techCount = 0;
                                foreach ($techs as $tech): 
                                    if ($techCount >= 3) break;
                                    $techCount++;
                                ?>
                                    <span class="tech-tag"><?php echo htmlspecialchars(trim($tech)); ?></span>
                                <?php endforeach; ?>
                                <?php if (count($techs) > 3): ?>
                                    <span class="tech-tag">+<?php echo count($techs) - 3; ?> more</span>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        <a href="project_detail.php?id=<?php echo $index; ?>" class="project-link">View Details <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
