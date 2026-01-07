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
                            <i class="<?php echo esc_attr(get_theme_mod('about_mission_icon', 'bi-bullseye')); ?> display-4 text-primary"></i>
                        </div>
                        <h3 class="mb-3"><?php echo esc_html(get_theme_mod('about_mission_title', 'Our Mission')); ?></h3>
                        <p><?php echo esc_html(get_theme_mod('about_mission_text', 'To provide exceptional visa services that make international travel accessible and stress-free for everyone seeking to visit or stay in Bali and Indonesia.')); ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card h-100">
                    <div class="card-body p-5">
                        <div class="icon-box mb-4">
                            <i class="<?php echo esc_attr(get_theme_mod('about_vision_icon', 'bi-eye')); ?> display-4 text-primary"></i>
                        </div>
                        <h3 class="mb-3"><?php echo esc_html(get_theme_mod('about_vision_title', 'Our Vision')); ?></h3>
                        <p><?php echo esc_html(get_theme_mod('about_vision_text', 'To become the most trusted and reliable visa service provider in Bali, known for our professionalism, efficiency, and customer-centric approach.')); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<?php
// Check if any team members are configured
$has_team_members = false;
for ($i = 1; $i <= 6; $i++) {
    if (get_theme_mod("about_team_member_{$i}_name")) {
        $has_team_members = true;
        break;
    }
}

if ($has_team_members) :
?>
<section class="section team-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-12 text-center">
                <p class="section-subtitle"><?php echo esc_html(get_theme_mod('about_team_section_subtitle', 'Team')); ?></p>
                <h2 class="section-title"><?php echo esc_html(get_theme_mod('about_team_section_title', 'Meet Our Experts')); ?></h2>
            </div>
        </div>
        <div class="row g-4">
            <?php
            for ($i = 1; $i <= 6; $i++) :
                $member_name = get_theme_mod("about_team_member_{$i}_name");
                $member_position = get_theme_mod("about_team_member_{$i}_position");
                $member_image = get_theme_mod("about_team_member_{$i}_image");
                $member_linkedin = get_theme_mod("about_team_member_{$i}_linkedin");
                $member_email = get_theme_mod("about_team_member_{$i}_email");

                if ($member_name) :
            ?>
                <div class="col-lg-4 col-md-6">
                    <div class="card team-card text-center">
                        <div class="card-body p-4">
                            <div class="team-image mb-3">
                                <?php if ($member_image) : ?>
                                    <img src="<?php echo esc_url($member_image); ?>" class="rounded-circle" width="120" height="120" alt="<?php echo esc_attr($member_name); ?>">
                                <?php else : ?>
                                    <div class="rounded-circle bg-light d-inline-flex align-items-center justify-content-center" style="width: 120px; height: 120px;">
                                        <i class="bi bi-person-circle display-3 text-muted"></i>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <h5 class="mb-1"><?php echo esc_html($member_name); ?></h5>
                            <?php if ($member_position) : ?>
                                <p class="text-muted mb-3"><?php echo esc_html($member_position); ?></p>
                            <?php endif; ?>
                            <?php if ($member_linkedin || $member_email) : ?>
                                <div class="social-links">
                                    <?php if ($member_linkedin) : ?>
                                        <a href="<?php echo esc_url($member_linkedin); ?>" target="_blank" rel="noopener noreferrer" class="text-primary me-2" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
                                    <?php endif; ?>
                                    <?php if ($member_email) : ?>
                                        <a href="mailto:<?php echo esc_attr($member_email); ?>" class="text-primary" aria-label="Email"><i class="bi bi-envelope"></i></a>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php
                endif;
            endfor;
            ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?php get_footer(); ?>
