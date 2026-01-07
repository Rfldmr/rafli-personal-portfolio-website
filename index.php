<?php
// Load data from JSON files
$education = json_decode(file_get_contents('data/education.json'), true);
$experience = json_decode(file_get_contents('data/experience.json'), true);
$projects = json_decode(file_get_contents('data/projects.json'), true);

// Calculate stats
$projectsCount = count($projects);
$experienceCount = count($experience);

$pageTitle = "Rafli Damara - Portfolio";
include 'includes/header.php';
?>

<!-- Navigation -->
<nav class="navbar">
    <div class="container">
        <a href="#home" class="logo">Rfldmr. | #WorkWithRafli</a>
        <ul class="nav-menu">
            <li><a href="#home" class="nav-link">Home</a></li>
            <li><a href="#education" class="nav-link">Education</a></li>
            <li><a href="#experience" class="nav-link">Experience</a></li>
            <li><a href="#skills" class="nav-link">Skills</a></li>
            <li><a href="projects.php" class="nav-link">Projects</a></li>
            <li><a href="#contact" class="nav-link">Contact</a></li>
        </ul>
        <div class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section id="home" class="hero">
    <div class="hero-grid"></div>
    <div class="container">
        <div class="hero-content">
            <div class="hero-label">Portfolio</div>
            <h1 class="hero-title"><span id="typing-text"></span><span class="typing-cursor">|</span></h1>
            <h2 class="hero-subtitle">Data Scientist | Data Analyst | AI/ML Engineer</h2>
            <p class="hero-description">Software Engineering student with a strong focus on Data Science, AI/ML, and analytics. I transform raw data into actionable insights through custom web applications and visualizations.</p>
            
            <div class="hero-actions">
                <a href="projects.php" class="hero-btn primary">View Projects</a>
                <a href="#contact" class="hero-btn secondary">Contact Me</a>
            </div>
            
            <div class="hero-divider"></div>
            
            <div class="hero-meta">
                <div class="hero-social">
                    <a href="mailto:workwithdam@gmail.com" target="_blank" title="Email">
                        <i class="fas fa-envelope"></i>
                    </a>
                    <a href="https://linkedin.com/in/raflidamara" target="_blank" title="LinkedIn">
                        <i class="fab fa-linkedin"></i>
                    </a>
                    <a href="https://github.com/Rfldmr" target="_blank" title="GitHub">
                        <i class="fab fa-github"></i>
                    </a>
                </div>
                <div class="hero-stats">
                    <span><?php echo $projectsCount; ?> Projects</span>
                    <span class="separator">•</span>
                    <span>2+ Years Experience</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Education Section -->
<section id="education" class="education">
    <div class="container">
        <h2 class="section-title">Education</h2>
        <div class="timeline">
            <?php foreach ($education as $edu): ?>
                <div class="timeline-item">
                    <div class="timeline-marker"></div>
                    <div class="timeline-content">
                        <?php if (!empty($edu['logo']) && file_exists($edu['logo'])): ?>
                            <div class="timeline-logo">
                                <img src="<?php echo htmlspecialchars($edu['logo']); ?>" alt="<?php echo htmlspecialchars($edu['institution']); ?>">
                            </div>
                        <?php endif; ?>
                        <h3><?php echo htmlspecialchars($edu['degree']); ?></h3>
                        <h4><?php echo htmlspecialchars($edu['institution']); ?></h4>
                        <span class="date"><?php echo htmlspecialchars($edu['year']); ?></span>
                        <p><?php echo htmlspecialchars($edu['description']); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Experience Section -->
<section id="experience" class="experience">
    <div class="container">
        <h2 class="section-title">Experience</h2>
        <div class="timeline">
            <?php foreach ($experience as $exp): ?>
                <div class="timeline-item">
                    <div class="timeline-marker"></div>
                    <div class="timeline-content">
                        <?php if (!empty($exp['logo']) && file_exists($exp['logo'])): ?>
                            <div class="timeline-logo">
                                <img src="<?php echo htmlspecialchars($exp['logo']); ?>" alt="<?php echo htmlspecialchars($exp['company']); ?>">
                            </div>
                        <?php endif; ?>
                        <h3><?php echo htmlspecialchars($exp['position']); ?></h3>
                        <h4><?php echo htmlspecialchars($exp['company']); ?></h4>
                        <span class="date"><?php echo htmlspecialchars($exp['period']); ?></span>
                        <?php if (!empty($exp['description'])): ?>
                            <?php if (is_array($exp['description'])): ?>
                                <ul class="experience-list">
                                    <?php foreach ($exp['description'] as $point): ?>
                                        <li><?php echo htmlspecialchars($point); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php else: ?>
                                <p><?php echo htmlspecialchars($exp['description']); ?></p>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Skills Section -->
<section id="skills" class="skills">
    <div class="container">
        <h2 class="section-title">My Skills</h2>
        <p class="section-description">Technologies and tools I work with</p>
        <div class="skills-grid">
            <div class="skill-item">
                <div class="skill-icon">
                    <i class="fab fa-html5"></i>
                </div>
                <span class="skill-name">HTML</span>
            </div>
            <div class="skill-item">
                <div class="skill-icon">
                    <i class="fab fa-css3-alt"></i>
                </div>
                <span class="skill-name">CSS</span>
            </div>
            <div class="skill-item">
                <div class="skill-icon">
                    <i class="fab fa-js-square"></i>
                </div>
                <span class="skill-name">JavaScript</span>
            </div>
            <div class="skill-item">
                <div class="skill-icon">
                    <svg viewBox="0 0 24 24" fill="currentColor" width="48" height="48">
                        <path d="M12 0L1 6v12l11 6 11-6V6L12 0zm0 2.2L20.5 7 12 11.8 3.5 7 12 2.2zM3 9.2l8 4.6v9l-8-4.6v-9zm10 13.6v-9l8-4.6v9l-8 4.6z"/>
                    </svg>
                </div>
                <span class="skill-name">C#</span>
            </div>
            <div class="skill-item">
                <div class="skill-icon">
                    <svg viewBox="0 0 24 24" fill="currentColor" width="48" height="48">
                        <path d="M12.001 4.8c-3.2 0-5.2 1.6-6 4.8 1.2-1.6 2.6-2.2 4.2-1.8.913.228 1.565.89 2.288 1.624C13.666 10.618 15.027 12 18.001 12c3.2 0 5.2-1.6 6-4.8-1.2 1.6-2.6 2.2-4.2 1.8-.913-.228-1.565-.89-2.288-1.624C16.337 6.182 14.976 4.8 12.001 4.8zm-6 7.2c-3.2 0-5.2 1.6-6 4.8 1.2-1.6 2.6-2.2 4.2-1.8.913.228 1.565.89 2.288 1.624 1.177 1.194 2.538 2.576 5.512 2.576 3.2 0 5.2-1.6 6-4.8-1.2 1.6-2.6 2.2-4.2 1.8-.913-.228-1.565-.89-2.288-1.624C10.337 13.382 8.976 12 6.001 12z"/>
                    </svg>
                </div>
                <span class="skill-name">Tailwind CSS</span>
            </div>
            <div class="skill-item">
                <div class="skill-icon">
                    <i class="fab fa-python"></i>
                </div>
                <span class="skill-name">Python</span>
            </div>
            <div class="skill-item">
                <div class="skill-icon">
                    <i class="fab fa-r-project"></i>
                </div>
                <span class="skill-name">R</span>
            </div>
            <div class="skill-item">
                <div class="skill-icon">
                    <i class="fas fa-database"></i>
                </div>
                <span class="skill-name">SQL</span>
            </div>
            <div class="skill-item">
                <div class="skill-icon">
                    <svg viewBox="0 0 24 24" fill="currentColor" width="48" height="48">
                        <path d="M1.292 5.856L11.54 0v24l-4.095-2.378V7.603l-6.168 3.564.015-5.31zm21.43 5.311l-.014-5.31L12.46 0v24l4.095-2.378V14.87l3.092 1.788-.018-4.618-3.074-1.756V7.603z"/>
                    </svg>
                </div>
                <span class="skill-name">TensorFlow</span>
            </div>
            <div class="skill-item">
                <div class="skill-icon">
                    <i class="fas fa-fire"></i>
                </div>
                <span class="skill-name">PyTorch</span>
            </div>
            <div class="skill-item">
                <div class="skill-icon">
                    <svg viewBox="0 0 24 24" fill="currentColor" width="48" height="48">
                        <path d="M12.21 12.414c-.58-.58-.58-1.52 0-2.1l5.59-5.59c.58-.58 1.52-.58 2.1 0 .58.58.58 1.52 0 2.1l-5.59 5.59c-.58.58-1.52.58-2.1 0zm-2.5 2.5c-.58-.58-.58-1.52 0-2.1l5.59-5.59c.58-.58 1.52-.58 2.1 0 .58.58.58 1.52 0 2.1l-5.59 5.59c-.58.58-1.52.58-2.1 0zM7.21 17.414c-.58-.58-.58-1.52 0-2.1l5.59-5.59c.58-.58 1.52-.58 2.1 0 .58.58.58 1.52 0 2.1l-5.59 5.59c-.58.58-1.52.58-2.1 0z"/>
                    </svg>
                </div>
                <span class="skill-name">Scikit-learn</span>
            </div>
            <div class="skill-item">
                <div class="skill-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128 128" fill="currentColor">
                        <path d="M27.3 77.3L64 97.5l36.7-20.2V37.1L64 16.9 27.3 37.1z" opacity="0.7"/>
                        <path d="M64 16.9v80.6l36.7-20.2V37.1z" opacity="0.9"/>
                        <path d="M27.3 37.1L64 57.3l36.7-20.2L64 16.9z"/>
                    </svg>
                </div>
                <span class="skill-name">NumPy</span>
            </div>
            <div class="skill-item">
                <div class="skill-icon">
                    <i class="fas fa-chart-bar"></i>
                </div>
                <span class="skill-name">Power BI</span>
            </div>
            <div class="skill-item">
                <div class="skill-icon">
                    <i class="fas fa-chart-pie"></i>
                </div>
                <span class="skill-name">Looker Studio</span>
            </div>
            <div class="skill-item">
                <div class="skill-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <span class="skill-name">Tableau</span>
            </div>
        </div>
    </div>
</section>

<!-- Projects Section -->
<section id="projects" class="projects">
    <div class="container">
        <h2 class="section-title">Featured Projects</h2>
        <div class="projects-grid">
            <?php 
            $featuredProjects = array_slice($projects, 0, 3); // Only show first 3 projects
            foreach ($featuredProjects as $index => $project): 
            ?>
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
        
        <div class="view-all-projects">
            <a href="projects.php" class="btn-view-all">
                View All Projects <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="contact">
    <div class="container">
        <h2 class="section-title">Contact Me</h2>
        <div class="contact-container">
            <!-- Left Side: Contact Info -->
            <div class="contact-info-wrapper">
                <h3 class="contact-subtitle">Get In Touch</h3>
                <p class="contact-description">Feel free to reach out for collaborations, projects, or just a friendly chat!</p>
                
                <div class="contact-info">
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <h4>Email</h4>
                            <a href="mailto:workwithdam@gmail.com">workwithdam@gmail.com</a>
                        </div>
                    </div>
                    <div class="contact-item">
                        <i class="fab fa-whatsapp"></i>
                        <div>
                            <h4>WhatsApp</h4>
                            <a href="https://wa.me/6285921573577" target="_blank">+62 859-2157-3577</a>
                        </div>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <div>
                            <h4>Location</h4>
                            <p>Bogor, Indonesia</p>
                        </div>
                    </div>
                </div>
                
                <div class="social-links">
                    <a href="https://www.linkedin.com/in/raflidamara/" target="_blank"><i class="fab fa-linkedin"></i></a>
                    <a href="https://github.com/Rfldmr" target="_blank"><i class="fab fa-github"></i></a>
                    <a href="https://instagram.com/raflidmr" target="_blank"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            
            <!-- Right Side: Why Work With Me -->
            <div class="value-wrapper">
                <div class="value-header">
                    <div class="value-icon">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <div class="value-title">
                        <h3>Why Work With Me?</h3>
                        <span class="value-subtitle">What Makes Me Different</span>
                    </div>
                </div>
                
                <div class="value-container">
                    <div class="value-card">
                        <div class="value-card-icon">
                            <i class="fas fa-brain"></i>
                        </div>
                        <div class="value-card-content">
                            <h4>Data-Driven Solutions</h4>
                            <p>Transform complex data into actionable insights using advanced analytics and ML models</p>
                        </div>
                    </div>
                    
                    <div class="value-card">
                        <div class="value-card-icon">
                            <i class="fas fa-code"></i>
                        </div>
                        <div class="value-card-content">
                            <h4>Full-Stack Capability</h4>
                            <p>End-to-end development from data pipeline to interactive web applications</p>
                        </div>
                    </div>
                    
                    <div class="value-card">
                        <div class="value-card-icon">
                            <i class="fas fa-seedling"></i>
                        </div>
                        <div class="value-card-content">
                            <h4>Continuous Learner</h4>
                            <p>Always eager to learn new technologies and skills to stay ahead in the field</p>
                        </div>
                    </div>
                    
                    <div class="value-card">
                        <div class="value-card-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="value-card-content">
                            <h4>Collaborative Approach</h4>
                            <p>Strong communication skills and ability to work effectively in team environments</p>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
