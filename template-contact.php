<?php
/**
 * Template Name: Contact Us
 */
get_header();
?>

<div class="page-header bg-light py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="display-4 fw-bold"><?php the_title(); ?></h1>
                <?php while (have_posts()) : the_post(); ?>
                    <?php if (has_excerpt()) : ?>
                        <p class="lead"><?php echo get_the_excerpt(); ?></p>
                    <?php else : ?>
                        <p class="lead">Get in touch with us for all your visa needs</p>
                    <?php endif; ?>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</div>

<section class="section contact-section">
    <div class="container">
        <div class="row g-4 justify-content-center">
            <!-- WhatsApp Card -->
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 text-center contact-card">
                    <div class="card-body p-5">
                        <div class="icon-box mb-4">
                            <i class="bi bi-whatsapp display-1 text-success"></i>
                        </div>
                        <h4 class="mb-3">WhatsApp</h4>
                        <p class="text-muted mb-4">Chat with us instantly for quick responses</p>
                        <?php
                        $whatsapp_number = get_theme_mod('whatsapp_number', '');
                        if ($whatsapp_number) :
                            $whatsapp_msg = get_theme_mod('contact_whatsapp_message', 'Hello! I would like to inquire about your visa services.');
                            $whatsapp_url = 'https://wa.me/' . $whatsapp_number . '?text=' . urlencode($whatsapp_msg);
                        ?>
                            <a href="<?php echo esc_url($whatsapp_url); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-success btn-lg w-100">
                                <i class="bi bi-whatsapp me-2"></i><?php echo esc_html(get_theme_mod('contact_whatsapp_text', 'WhatsApp Us Now!')); ?>
                            </a>
                        <?php else : ?>
                            <p class="text-danger small">Please configure WhatsApp number in Customizer</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Email Card -->
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 text-center contact-card">
                    <div class="card-body p-5">
                        <div class="icon-box mb-4">
                            <i class="bi bi-envelope-fill display-1 text-primary"></i>
                        </div>
                        <h4 class="mb-3">Email</h4>
                        <p class="text-muted mb-4"><?php echo esc_html(get_theme_mod('contact_email_text', 'Send us an email and we\'ll get back to you within 24 hours.')); ?></p>
                        <a href="mailto:<?php echo esc_attr(get_theme_mod('contact_email', 'info@applyvisabali.com')); ?>" class="btn btn-primary btn-lg w-100">
                            <i class="bi bi-envelope-fill me-2"></i>Send Email
                        </a>
                        <p class="mt-3 mb-0 small text-muted"><?php echo esc_html(get_theme_mod('contact_email', 'info@applyvisabali.com')); ?></p>
                    </div>
                </div>
            </div>

            <!-- Business Hours Card -->
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 text-center contact-card">
                    <div class="card-body p-5">
                        <div class="icon-box mb-4">
                            <i class="bi bi-clock-fill display-1 text-warning"></i>
                        </div>
                        <h4 class="mb-3"><?php echo esc_html(get_theme_mod('contact_hours_title', 'Business Hours')); ?></h4>
                        <div class="business-hours text-start">
                            <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
                                <span class="text-muted">Weekdays</span>
                                <span class="fw-bold"><?php echo esc_html(get_theme_mod('contact_hours_weekdays', 'Monday - Friday: 9:00 AM - 6:00 PM')); ?></span>
                            </div>
                            <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
                                <span class="text-muted">Saturday</span>
                                <span class="fw-bold"><?php echo esc_html(get_theme_mod('contact_hours_saturday', 'Saturday: 9:00 AM - 2:00 PM')); ?></span>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span class="text-muted">Sunday</span>
                                <span class="fw-bold"><?php echo esc_html(get_theme_mod('contact_hours_sunday', 'Sunday: Closed')); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Page Content (Optional) -->
        <?php while (have_posts()) : the_post(); ?>
            <?php if (get_the_content()) : ?>
                <div class="row mt-5">
                    <div class="col-lg-10 mx-auto">
                        <div class="content">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endwhile; ?>
    </div>
</section>

<?php get_footer(); ?>
