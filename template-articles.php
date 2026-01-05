<?php
/**
 * Template Name: Articles
 */
get_header();
?>

<div class="page-header bg-light py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="display-4 fw-bold"><?php the_title(); ?></h1>
                <p class="lead">Stay updated with the latest news and information about visa services</p>
            </div>
        </div>
    </div>
</div>

<section class="section articles-section">
    <div class="container">
        <div class="row mb-4">
            <div class="col-lg-12">
                <!-- Category Filter -->
                <div class="category-filter mb-4">
                    <div class="btn-group flex-wrap" role="group">
                        <a href="<?php echo get_permalink(); ?>" class="btn btn-outline-primary <?php echo !isset($_GET['category']) ? 'active' : ''; ?>">All Articles</a>
                        <?php
                        $categories = get_categories(array(
                            'exclude' => array(get_cat_ID('services')),
                            'hide_empty' => true,
                        ));
                        foreach ($categories as $category) :
                            $active_class = (isset($_GET['category']) && $_GET['category'] == $category->slug) ? 'active' : '';
                        ?>
                            <a href="<?php echo add_query_arg('category', $category->slug, get_permalink()); ?>" class="btn btn-outline-primary <?php echo $active_class; ?>">
                                <?php echo esc_html($category->name); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 9,
                'paged' => $paged,
                'category__not_in' => array(get_cat_ID('services')),
            );

            // Filter by category if set
            if (isset($_GET['category']) && !empty($_GET['category'])) {
                $args['category_name'] = sanitize_text_field($_GET['category']);
            }

            $articles_query = new WP_Query($args);

            if ($articles_query->have_posts()) :
                while ($articles_query->have_posts()) : $articles_query->the_post();
            ?>
                <div class="col-lg-4 col-md-6">
                    <article class="card h-100 article-card">
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>">
                                <img src="<?php the_post_thumbnail_url('blog-thumb'); ?>" class="card-img-top" alt="<?php the_title_attribute(); ?>">
                            </a>
                        <?php endif; ?>
                        <div class="card-body">
                            <div class="article-meta mb-3">
                                <span class="badge bg-primary me-2"><?php echo get_the_date(); ?></span>
                                <?php
                                $categories = get_the_category();
                                if (!empty($categories)) :
                                    echo '<span class="badge bg-secondary">' . esc_html($categories[0]->name) . '</span>';
                                endif;
                                ?>
                            </div>
                            <h5 class="card-title">
                                <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark">
                                    <?php the_title(); ?>
                                </a>
                            </h5>
                            <p class="card-text"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                            <div class="article-footer d-flex justify-content-between align-items-center">
                                <a href="<?php the_permalink(); ?>" class="btn btn-outline-primary btn-sm">Read More</a>
                                <div class="author-info text-muted small">
                                    <i class="bi bi-person me-1"></i><?php the_author(); ?>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            <?php
                endwhile;
            ?>
            </div>

            <!-- Pagination -->
            <div class="row mt-5">
                <div class="col-12">
                    <nav aria-label="Articles pagination">
                        <?php
                        $total_pages = $articles_query->max_num_pages;
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
                    <i class="bi bi-file-earmark-text display-1 text-muted mb-3"></i>
                    <h3>No Articles Found</h3>
                    <p class="text-muted">Please check back later for updates.</p>
                </div>
            </div>
            <?php
            endif;
            wp_reset_postdata();
            ?>
    </div>
</section>

<?php get_footer(); ?>
