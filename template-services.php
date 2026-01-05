<?php
/**
 * Template Name: Our Services
 */
get_header();
?>

<div class="page-header bg-light py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="display-4 fw-bold"><?php the_title(); ?></h1>
                <p class="lead">Comprehensive visa solutions tailored to your needs</p>
            </div>
        </div>
    </div>
</div>

<section class="section services-section">
    <div class="container">
        <!-- Category Filter -->
        <div class="row mb-5">
            <div class="col-lg-12">
                <div class="category-filter text-center">
                    <div class="btn-group flex-wrap" role="group">
                        <a href="<?php echo get_permalink(); ?>" class="btn btn-outline-primary <?php echo !isset($_GET['service-category']) ? 'active' : ''; ?>">All Services</a>
                        <?php
                        $service_categories = get_categories(array(
                            'taxonomy' => 'category',
                            'hide_empty' => true,
                            'include' => array(get_cat_ID('services')),
                        ));

                        // Get subcategories of services
                        $services_cat_id = get_cat_ID('services');
                        $subcategories = get_categories(array(
                            'taxonomy' => 'category',
                            'child_of' => $services_cat_id,
                            'hide_empty' => true,
                        ));

                        // If no subcategories, show all categories except services parent
                        $display_categories = !empty($subcategories) ? $subcategories : get_categories(array(
                            'taxonomy' => 'category',
                            'hide_empty' => true,
                        ));

                        foreach ($display_categories as $category) :
                            if ($category->slug == 'services') continue;
                            $active_class = (isset($_GET['service-category']) && $_GET['service-category'] == $category->slug) ? 'active' : '';
                        ?>
                            <a href="<?php echo add_query_arg('service-category', $category->slug, get_permalink()); ?>" class="btn btn-outline-primary <?php echo $active_class; ?>">
                                <?php echo esc_html($category->name); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Services Grid -->
        <div class="row g-4">
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 12,
                'paged' => $paged,
                'category_name' => 'services',
            );

            // Filter by service category if set
            if (isset($_GET['service-category']) && !empty($_GET['service-category'])) {
                $args['category_name'] = sanitize_text_field($_GET['service-category']);
            }

            $services_query = new WP_Query($args);

            if ($services_query->have_posts()) :
                while ($services_query->have_posts()) : $services_query->the_post();
                    $categories = get_the_category();
                    $category_names = array();
                    foreach ($categories as $cat) {
                        if ($cat->slug != 'services') {
                            $category_names[] = $cat->name;
                        }
                    }
            ?>
                <div class="col-lg-4 col-md-6">
                    <div class="card service-card h-100">
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>">
                                <img src="<?php the_post_thumbnail_url('service-thumb'); ?>" class="card-img-top" alt="<?php the_title_attribute(); ?>">
                            </a>
                        <?php else : ?>
                            <div class="card-img-top bg-gradient-primary d-flex align-items-center justify-content-center" style="height: 250px;">
                                <i class="bi bi-briefcase display-1 text-white"></i>
                            </div>
                        <?php endif; ?>
                        <div class="card-body">
                            <?php if (!empty($category_names)) : ?>
                                <div class="mb-2">
                                    <span class="badge bg-primary"><?php echo esc_html($category_names[0]); ?></span>
                                </div>
                            <?php endif; ?>
                            <h5 class="card-title">
                                <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark">
                                    <?php the_title(); ?>
                                </a>
                            </h5>
                            <p class="card-text"><?php echo wp_trim_words(get_the_excerpt(), 18); ?></p>
                            <a href="<?php the_permalink(); ?>" class="btn btn-outline-primary">
                                Learn More <i class="bi bi-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php
                endwhile;
            ?>
            </div>

            <!-- Pagination -->
            <div class="row mt-5">
                <div class="col-12">
                    <nav aria-label="Services pagination">
                        <?php
                        $total_pages = $services_query->max_num_pages;
                        if ($total_pages > 1) {
                            $current_page = max(1, get_query_var('paged'));
                            echo '<ul class="pagination justify-content-center">';
                            echo paginate_links(array(
                                'base' => get_pagenum_link(1) . '%_%',
                                'format' => 'page/%#%',
                                'current' => $current_page,
                                'total' => $total_pages,
                                'prev_text' => '<i class="bi bi-chevron-left"></i>',
                                'next_text' => '<i class="bi bi-chevron-right"></i>',
                                'type' => 'list',
                            ));
                            echo '</ul>';
                        }
                        ?>
                    </nav>
                </div>
            </div>

            <?php
            else :
            ?>
            <div class="row">
                <div class="col-12 text-center py-5">
                    <i class="bi bi-briefcase display-1 text-muted mb-3"></i>
                    <h3>No Services Found</h3>
                    <p class="text-muted">Please add posts under the "Services" category to display them here.</p>
                </div>
            </div>
            <?php
            endif;
            wp_reset_postdata();
            ?>
    </div>
</section>

<!-- CTA Section -->
<section class="section cta-section bg-primary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 text-center text-lg-start mb-4 mb-lg-0">
                <h2 class="mb-3">Need Help with Your Visa Application?</h2>
                <p class="lead mb-0">Our expert team is here to assist you with all your visa needs. Contact us today!</p>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                <a href="<?php echo get_permalink(get_page_by_path('contact-us')); ?>" class="btn btn-light btn-lg">
                    Contact Us Now
                </a>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
