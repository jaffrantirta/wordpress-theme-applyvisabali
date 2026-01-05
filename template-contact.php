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
                <p class="lead">Get in touch with us for all your visa needs</p>
            </div>
        </div>
    </div>
</div>

<section class="section contact-section">
    <div class="container">
        <div class="row g-5">
            <!-- Contact Form -->
            <div class="col-lg-7">
                <div class="contact-form-wrapper">
                    <h3 class="mb-4">Send us a Message</h3>
                    <?php while (have_posts()) : the_post(); ?>
                        <?php the_content(); ?>
                    <?php endwhile; ?>

                    <!-- Default Contact Form (if no content) -->
                    <form class="contact-form" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                        <input type="hidden" name="action" value="contact_form_submit">
                        <?php wp_nonce_field('contact_form_submit', 'contact_form_nonce'); ?>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="form-label">Full Name *</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" class="form-label">Email Address *</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control" id="phone" name="phone">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="subject" class="form-label">Subject *</label>
                                    <input type="text" class="form-control" id="subject" name="subject" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="message" class="form-label">Message *</label>
                                    <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-lg">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="col-lg-5">
                <div class="contact-info-wrapper">
                    <h3 class="mb-4">Contact Information</h3>

                    <div class="contact-info-item mb-4">
                        <div class="icon-box mb-3">
                            <i class="bi bi-geo-alt-fill text-primary display-6"></i>
                        </div>
                        <h5>Our Location</h5>
                        <p class="text-muted">Jl. Raya Seminyak No. 123<br>Seminyak, Bali 80361<br>Indonesia</p>
                    </div>

                    <div class="contact-info-item mb-4">
                        <div class="icon-box mb-3">
                            <i class="bi bi-telephone-fill text-primary display-6"></i>
                        </div>
                        <h5>Phone Number</h5>
                        <p class="text-muted">
                            <a href="tel:+6281234567890">+62 812 3456 7890</a><br>
                            <a href="tel:+6281234567891">+62 812 3456 7891</a>
                        </p>
                    </div>

                    <div class="contact-info-item mb-4">
                        <div class="icon-box mb-3">
                            <i class="bi bi-envelope-fill text-primary display-6"></i>
                        </div>
                        <h5>Email Address</h5>
                        <p class="text-muted">
                            <a href="mailto:info@applyvisabali.com">info@applyvisabali.com</a><br>
                            <a href="mailto:support@applyvisabali.com">support@applyvisabali.com</a>
                        </p>
                    </div>

                    <div class="contact-info-item mb-4">
                        <div class="icon-box mb-3">
                            <i class="bi bi-clock-fill text-primary display-6"></i>
                        </div>
                        <h5>Business Hours</h5>
                        <p class="text-muted">
                            Monday - Friday: 9:00 AM - 6:00 PM<br>
                            Saturday: 9:00 AM - 2:00 PM<br>
                            Sunday: Closed
                        </p>
                    </div>

                    <!-- Social Media -->
                    <div class="social-links mt-4">
                        <h5 class="mb-3">Follow Us</h5>
                        <a href="#" class="btn btn-outline-primary me-2 mb-2"><i class="bi bi-facebook me-2"></i>Facebook</a>
                        <a href="#" class="btn btn-outline-primary me-2 mb-2"><i class="bi bi-instagram me-2"></i>Instagram</a>
                        <a href="#" class="btn btn-outline-primary me-2 mb-2"><i class="bi bi-twitter me-2"></i>Twitter</a>
                        <a href="#" class="btn btn-outline-primary mb-2"><i class="bi bi-linkedin me-2"></i>LinkedIn</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="map-section">
    <div class="container-fluid p-0">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3944.2087839397876!2d115.15986931478256!3d-8.685551893767974!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd2409b0e5e80db%3A0xe27334e8ccb9b80!2sSeminyak%2C%20Kuta%2C%20Badung%20Regency%2C%20Bali!5e0!3m2!1sen!2sid!4v1234567890123!5m2!1sen!2sid"
            width="100%"
            height="400"
            style="border:0;"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>
</section>

<?php get_footer(); ?>
