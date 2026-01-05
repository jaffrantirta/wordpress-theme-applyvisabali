<?php
/**
 * Template Name: About Us
 */
get_header();
?>

<div class="page-header bg-light py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="display-4 fw-bold"><?php the_title(); ?></h1>
                <?php if (has_excerpt()) : ?>
                    <p class="lead"><?php echo get_the_excerpt(); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<section class="section about-content">
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
            <div class="row align-items-center mb-5">
                <?php if (has_post_thumbnail()) : ?>
                    <div class="col-lg-6 mb-4 mb-lg-0">
                        <img src="<?php the_post_thumbnail_url('large'); ?>" class="img-fluid rounded-custom" alt="<?php the_title_attribute(); ?>">
                    </div>
                <?php endif; ?>
                <div class="col-lg-<?php echo has_post_thumbnail() ? '6' : '12'; ?>">
                    <div class="content">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</section>

<!-- Mission & Vision Section -->
<section class="section mission-vision bg-light">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="card h-100">
                    <div class="card-body p-5">
                        <div class="icon-box mb-4">
                            <i class="bi bi-bullseye display-4 text-primary"></i>
                        </div>
                        <h3 class="mb-3">Our Mission</h3>
                        <p>To provide exceptional visa services that make international travel accessible and stress-free for everyone seeking to visit or stay in Bali and Indonesia.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card h-100">
                    <div class="card-body p-5">
                        <div class="icon-box mb-4">
                            <i class="bi bi-eye display-4 text-primary"></i>
                        </div>
                        <h3 class="mb-3">Our Vision</h3>
                        <p>To become the most trusted and reliable visa service provider in Bali, known for our professionalism, efficiency, and customer-centric approach.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Team Section (Optional) -->
<section class="section team-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-12 text-center">
                <p class="section-subtitle">Team</p>
                <h2 class="section-title">Meet Our Experts</h2>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="card team-card text-center">
                    <div class="card-body p-4">
                        <div class="team-image mb-3">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/team-placeholder.jpg" class="rounded-circle" width="120" height="120" alt="Team Member">
                        </div>
                        <h5 class="mb-1">John Doe</h5>
                        <p class="text-muted mb-3">Visa Consultant</p>
                        <div class="social-links">
                            <a href="#" class="text-primary me-2"><i class="bi bi-linkedin"></i></a>
                            <a href="#" class="text-primary"><i class="bi bi-envelope"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card team-card text-center">
                    <div class="card-body p-4">
                        <div class="team-image mb-3">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/team-placeholder.jpg" class="rounded-circle" width="120" height="120" alt="Team Member">
                        </div>
                        <h5 class="mb-1">Jane Smith</h5>
                        <p class="text-muted mb-3">Immigration Specialist</p>
                        <div class="social-links">
                            <a href="#" class="text-primary me-2"><i class="bi bi-linkedin"></i></a>
                            <a href="#" class="text-primary"><i class="bi bi-envelope"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card team-card text-center">
                    <div class="card-body p-4">
                        <div class="team-image mb-3">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/team-placeholder.jpg" class="rounded-circle" width="120" height="120" alt="Team Member">
                        </div>
                        <h5 class="mb-1">Michael Brown</h5>
                        <p class="text-muted mb-3">Customer Service Manager</p>
                        <div class="social-links">
                            <a href="#" class="text-primary me-2"><i class="bi bi-linkedin"></i></a>
                            <a href="#" class="text-primary"><i class="bi bi-envelope"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
