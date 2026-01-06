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
                    <?php
                    // Check if any custom quick links are set
                    $has_custom_links = false;
                    for ($i = 1; $i <= 8; $i++) {
                        if (get_theme_mod("footer_quick_link_{$i}_title") && get_theme_mod("footer_quick_link_{$i}_url")) {
                            $has_custom_links = true;
                            break;
                        }
                    }

                    if ($has_custom_links) :
                    ?>
                        <h5 class="mb-3"><?php echo esc_html(get_theme_mod('footer_quick_links_title', 'Quick Links')); ?></h5>
                        <ul class="list-unstyled">
                            <?php for ($i = 1; $i <= 8; $i++) :
                                $link_title = get_theme_mod("footer_quick_link_{$i}_title");
                                $link_url = get_theme_mod("footer_quick_link_{$i}_url");
                                if ($link_title && $link_url) :
                            ?>
                                <li class="mb-2">
                                    <a href="<?php echo esc_url($link_url); ?>" class="text-light text-decoration-none">
                                        <i class="bi bi-chevron-right me-1"></i><?php echo esc_html($link_title); ?>
                                    </a>
                                </li>
                            <?php
                                endif;
                            endfor;
                            ?>
                        </ul>
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
                <?php endif; ?>
            </div>

            <!-- Footer Widget 3 -->
            <div class="col-lg-4 col-md-6 mb-4">
                <?php if (is_active_sidebar('footer-3')) : ?>
                    <?php dynamic_sidebar('footer-3'); ?>
                <?php else : ?>
                    <h5 class="mb-3">Contact Info</h5>
                    <ul class="list-unstyled">
                        <?php if (get_theme_mod('footer_address', 'Bali, Indonesia')) : ?>
                            <li class="mb-2"><i class="bi bi-geo-alt-fill me-2"></i> <?php echo esc_html(get_theme_mod('footer_address', 'Bali, Indonesia')); ?></li>
                        <?php endif; ?>
                        <?php if (get_theme_mod('footer_email', 'info@applyvisabali.com')) : ?>
                            <li class="mb-2"><i class="bi bi-envelope-fill me-2"></i> <a href="mailto:<?php echo esc_attr(get_theme_mod('footer_email', 'info@applyvisabali.com')); ?>" class="text-light"><?php echo esc_html(get_theme_mod('footer_email', 'info@applyvisabali.com')); ?></a></li>
                        <?php endif; ?>
                        <?php if (get_theme_mod('footer_phone', '+62 xxx xxxx xxxx')) : ?>
                            <li class="mb-2"><i class="bi bi-phone-fill me-2"></i> <a href="tel:<?php echo esc_attr(str_replace(' ', '', get_theme_mod('footer_phone', '+62 xxx xxxx xxxx'))); ?>" class="text-light"><?php echo esc_html(get_theme_mod('footer_phone', '+62 xxx xxxx xxxx')); ?></a></li>
                        <?php endif; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>

        <hr class="my-4 bg-light">

        <div class="row">
            <div class="col-md-6 text-center text-md-start">
                <p class="mb-0">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php echo esc_html(get_theme_mod('footer_copyright_text', 'All rights reserved.')); ?></p>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <div class="social-links">
                    <?php if (get_theme_mod('footer_facebook_url')) : ?>
                        <a href="<?php echo esc_url(get_theme_mod('footer_facebook_url')); ?>" target="_blank" rel="noopener noreferrer" class="text-light me-3" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                    <?php endif; ?>
                    <?php if (get_theme_mod('footer_instagram_url')) : ?>
                        <a href="<?php echo esc_url(get_theme_mod('footer_instagram_url')); ?>" target="_blank" rel="noopener noreferrer" class="text-light me-3" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                    <?php endif; ?>
                    <?php if (get_theme_mod('footer_twitter_url')) : ?>
                        <a href="<?php echo esc_url(get_theme_mod('footer_twitter_url')); ?>" target="_blank" rel="noopener noreferrer" class="text-light me-3" aria-label="Twitter"><i class="bi bi-twitter"></i></a>
                    <?php endif; ?>
                    <?php if (get_theme_mod('footer_linkedin_url')) : ?>
                        <a href="<?php echo esc_url(get_theme_mod('footer_linkedin_url')); ?>" target="_blank" rel="noopener noreferrer" class="text-light me-3" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
                    <?php endif; ?>
                    <?php if (get_theme_mod('footer_youtube_url')) : ?>
                        <a href="<?php echo esc_url(get_theme_mod('footer_youtube_url')); ?>" target="_blank" rel="noopener noreferrer" class="text-light me-3" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
                    <?php endif; ?>
                    <?php if (get_theme_mod('footer_tiktok_url')) : ?>
                        <a href="<?php echo esc_url(get_theme_mod('footer_tiktok_url')); ?>" target="_blank" rel="noopener noreferrer" class="text-light" aria-label="TikTok"><i class="bi bi-tiktok"></i></a>
                    <?php endif; ?>
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
