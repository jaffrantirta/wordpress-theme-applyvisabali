<!-- Footer -->
<footer class="footer bg-dark text-light pt-5 pb-3">
    <div class="container">
        <div class="row">
            <!-- Footer Widget 1 -->
            <div class="col-lg-4 col-md-6 mb-4">
                <?php if (is_active_sidebar('footer-1')) : ?>
                    <?php dynamic_sidebar('footer-1'); ?>
                <?php else : ?>
                    <h5 class="mb-3"><?php bloginfo('name'); ?></h5>
                    <p><?php bloginfo('description'); ?></p>
                <?php endif; ?>
            </div>

            <!-- Footer Widget 2 -->
            <div class="col-lg-4 col-md-6 mb-4">
                <?php if (is_active_sidebar('footer-2')) : ?>
                    <?php dynamic_sidebar('footer-2'); ?>
                <?php else : ?>
                    <h5 class="mb-3">Quick Links</h5>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'container' => false,
                        'menu_class' => 'list-unstyled',
                        'fallback_cb' => '__return_false',
                    ));
                    ?>
                <?php endif; ?>
            </div>

            <!-- Footer Widget 3 -->
            <div class="col-lg-4 col-md-6 mb-4">
                <?php if (is_active_sidebar('footer-3')) : ?>
                    <?php dynamic_sidebar('footer-3'); ?>
                <?php else : ?>
                    <h5 class="mb-3">Contact Info</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="bi bi-geo-alt-fill me-2"></i> Bali, Indonesia</li>
                        <li class="mb-2"><i class="bi bi-envelope-fill me-2"></i> info@applyvisabali.com</li>
                        <li class="mb-2"><i class="bi bi-phone-fill me-2"></i> +62 xxx xxxx xxxx</li>
                    </ul>
                <?php endif; ?>
            </div>
        </div>

        <hr class="my-4 bg-light">

        <div class="row">
            <div class="col-md-6 text-center text-md-start">
                <p class="mb-0">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <div class="social-links">
                    <a href="#" class="text-light me-3"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="text-light me-3"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="text-light me-3"><i class="bi bi-twitter"></i></a>
                    <a href="#" class="text-light"><i class="bi bi-linkedin"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- WhatsApp Floating Button -->
<?php
$whatsapp_number = get_theme_mod('whatsapp_number', '');
$whatsapp_message = get_theme_mod('whatsapp_message', 'Hello! I need information about visa services.');
if ($whatsapp_number) :
    $whatsapp_url = 'https://wa.me/' . $whatsapp_number . '?text=' . urlencode($whatsapp_message);
?>
<div class="whatsapp-float">
    <a href="<?php echo esc_url($whatsapp_url); ?>" target="_blank" rel="noopener noreferrer" aria-label="Chat on WhatsApp">
        <i class="bi bi-whatsapp"></i>
    </a>
</div>
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>
