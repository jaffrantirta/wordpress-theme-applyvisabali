<?php
/**
 * Template Name: Front Page
 */
get_header();
?>

<!-- Hero Carousel -->
<section class="hero-carousel">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
        </div>

        <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active">
                <?php
                $slide1_img = get_theme_mod('hero_slide_1_image');
                if ($slide1_img) : ?>
                    <img src="<?php echo esc_url($slide1_img); ?>" class="d-block w-100" alt="<?php echo esc_attr(get_theme_mod('hero_slide_1_title', 'Welcome to Apply Visa Bali')); ?>">
                <?php else : ?>
                    <div class="carousel-placeholder" style="background: linear-gradient(135deg, #2563eb, #0ea5e9); height: 600px;"></div>
                <?php endif; ?>
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8 text-center">
                                <h1 class="display-3 fw-bold mb-4 animate-fade-in"><?php echo esc_html(get_theme_mod('hero_slide_1_title', 'Welcome to Apply Visa Bali')); ?></h1>
                                <p class="lead mb-4"><?php echo esc_html(get_theme_mod('hero_slide_1_subtitle', 'Your Trusted Partner for Visa Services in Bali')); ?></p>
                                <a href="<?php echo esc_url(get_theme_mod('hero_slide_1_button_link', '#')); ?>" class="btn btn-primary btn-lg">
                                    <?php echo esc_html(get_theme_mod('hero_slide_1_button_text', 'Get Started')); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item">
                <?php
                $slide2_img = get_theme_mod('hero_slide_2_image');
                if ($slide2_img) : ?>
                    <img src="<?php echo esc_url($slide2_img); ?>" class="d-block w-100" alt="<?php echo esc_attr(get_theme_mod('hero_slide_2_title', 'Fast & Reliable Visa Processing')); ?>">
                <?php else : ?>
                    <div class="carousel-placeholder" style="background: linear-gradient(135deg, #0ea5e9, #06b6d4); height: 600px;"></div>
                <?php endif; ?>
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8 text-center">
                                <h1 class="display-3 fw-bold mb-4 animate-fade-in"><?php echo esc_html(get_theme_mod('hero_slide_2_title', 'Fast & Reliable Visa Processing')); ?></h1>
                                <p class="lead mb-4"><?php echo esc_html(get_theme_mod('hero_slide_2_subtitle', 'Professional assistance for all your visa needs')); ?></p>
                                <a href="<?php echo esc_url(get_theme_mod('hero_slide_2_button_link', '#')); ?>" class="btn btn-primary btn-lg">
                                    <?php echo esc_html(get_theme_mod('hero_slide_2_button_text', 'Our Services')); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item">
                <?php
                $slide3_img = get_theme_mod('hero_slide_3_image');
                if ($slide3_img) : ?>
                    <img src="<?php echo esc_url($slide3_img); ?>" class="d-block w-100" alt="<?php echo esc_attr(get_theme_mod('hero_slide_3_title', 'Expert Visa Consultation')); ?>">
                <?php else : ?>
                    <div class="carousel-placeholder" style="background: linear-gradient(135deg, #06b6d4, #14b8a6); height: 600px;"></div>
                <?php endif; ?>
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8 text-center">
                                <h1 class="display-3 fw-bold mb-4 animate-fade-in"><?php echo esc_html(get_theme_mod('hero_slide_3_title', 'Expert Visa Consultation')); ?></h1>
                                <p class="lead mb-4"><?php echo esc_html(get_theme_mod('hero_slide_3_subtitle', 'Get expert guidance for your visa application')); ?></p>
                                <a href="<?php echo esc_url(get_theme_mod('hero_slide_3_button_link', '#')); ?>" class="btn btn-primary btn-lg">
                                    <?php echo esc_html(get_theme_mod('hero_slide_3_button_text', 'Contact Us')); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>

<!-- What We Offer Section -->
<section class="section what-we-offer bg-light">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-12 text-center">
                <p class="section-subtitle"><?php echo esc_html(get_theme_mod('offer_section_subtitle', 'Our Services')); ?></p>
                <h2 class="section-title"><?php echo esc_html(get_theme_mod('offer_section_title', 'What We Offer')); ?></h2>
            </div>
        </div>

        <div class="row g-4">
            <?php for ($i = 1; $i <= 6; $i++) :
                $item_image = get_theme_mod("offer_item_{$i}_image");
                $item_icon = get_theme_mod("offer_item_{$i}_icon", 'bi-briefcase');
                $item_title = get_theme_mod("offer_item_{$i}_title", "Service {$i}");
                $item_description = get_theme_mod("offer_item_{$i}_description", 'Service description here');
                $item_link = get_theme_mod("offer_item_{$i}_link", '#');
            ?>
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100">
                        <?php if ($item_image) : ?>
                            <img src="<?php echo esc_url($item_image); ?>" class="card-img-top" alt="<?php echo esc_attr($item_title); ?>">
                        <?php else : ?>
                            <div class="card-img-top bg-gradient-primary d-flex align-items-center justify-content-center" style="height: 250px;">
                                <i class="bi <?php echo esc_attr($item_icon); ?> display-1 text-white"></i>
                            </div>
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo esc_html($item_title); ?></h5>
                            <p class="card-text"><?php echo esc_html($item_description); ?></p>
                            <a href="<?php echo esc_url($item_link); ?>" class="btn btn-outline-primary">Learn More</a>
                        </div>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</section>

<!-- Why Us Section -->
<section class="section why-us">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-12 text-center">
                <p class="section-subtitle"><?php echo esc_html(get_theme_mod('why_us_section_subtitle', 'Our Advantages')); ?></p>
                <h2 class="section-title"><?php echo esc_html(get_theme_mod('why_us_section_title', 'Why Choose Us')); ?></h2>
            </div>
        </div>

        <div class="row g-4">
            <?php for ($i = 1; $i <= 4; $i++) : ?>
            <div class="col-lg-3 col-md-6">
                <div class="why-us-item text-center">
                    <div class="icon-box mb-3">
                        <i class="bi <?php echo esc_attr(get_theme_mod("why_us_item_{$i}_icon", 'bi-check-circle')); ?>"></i>
                    </div>
                    <h5><?php echo esc_html(get_theme_mod("why_us_item_{$i}_title", "Advantage {$i}")); ?></h5>
                    <p><?php echo esc_html(get_theme_mod("why_us_item_{$i}_description", 'Description here')); ?></p>
                </div>
            </div>
            <?php endfor; ?>
        </div>
    </div>
</section>

<!-- Latest Updates (Blog) Section -->
<section class="section latest-updates bg-light">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-12 text-center">
                <p class="section-subtitle">Blog</p>
                <h2 class="section-title">Latest Updates</h2>
            </div>
        </div>

        <div class="row g-4">
            <?php
            $blog_query = new WP_Query(array(
                'post_type' => 'post',
                'posts_per_page' => 3,
                'category__not_in' => array(get_cat_ID('services')),
            ));

            if ($blog_query->have_posts()) :
                while ($blog_query->have_posts()) : $blog_query->the_post();
            ?>
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100">
                        <?php if (has_post_thumbnail()) : ?>
                            <img src="<?php the_post_thumbnail_url('blog-thumb'); ?>" class="card-img-top" alt="<?php the_title_attribute(); ?>">
                        <?php endif; ?>
                        <div class="card-body">
                            <div class="mb-2">
                                <span class="badge bg-primary"><?php echo get_the_date(); ?></span>
                            </div>
                            <h5 class="card-title"><?php the_title(); ?></h5>
                            <p class="card-text"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                            <a href="<?php the_permalink(); ?>" class="btn btn-outline-primary">Read More</a>
                        </div>
                    </div>
                </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
            ?>
                <div class="col-12 text-center">
                    <p>No blog posts found. Please add some posts.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="section testimonials">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-12 text-center">
                <p class="section-subtitle"><?php echo esc_html(get_theme_mod('testimonials_section_subtitle', 'Testimonials')); ?></p>
                <h2 class="section-title"><?php echo esc_html(get_theme_mod('testimonials_section_title', 'What Our Clients Say')); ?></h2>
            </div>
        </div>

        <div class="row g-4">
            <?php
            $testimonials_query = new WP_Query(array(
                'post_type' => 'testimonial',
                'posts_per_page' => 3,
            ));

            if ($testimonials_query->have_posts()) :
                while ($testimonials_query->have_posts()) : $testimonials_query->the_post();
            ?>
                <div class="col-lg-4 col-md-6">
                    <div class="card testimonial-card h-100">
                        <div class="card-body">
                            <div class="stars mb-3">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                            </div>
                            <p class="card-text"><?php the_content(); ?></p>
                            <div class="testimonial-author mt-3">
                                <?php if (has_post_thumbnail()) : ?>
                                    <img src="<?php the_post_thumbnail_url('thumbnail'); ?>" class="rounded-circle me-2" width="50" height="50" alt="<?php the_title_attribute(); ?>">
                                <?php endif; ?>
                                <strong><?php the_title(); ?></strong>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
            ?>
                <div class="col-12 text-center">
                    <p>No testimonials found. Please add testimonials in the admin panel.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
