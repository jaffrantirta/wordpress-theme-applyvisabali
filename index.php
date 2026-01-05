<?php
/**
 * The main template file
 */
get_header();
?>

<div class="page-header bg-light py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="display-4 fw-bold">Blog</h1>
                <p class="lead">Latest news and updates</p>
            </div>
        </div>
    </div>
</div>

<section class="section blog-archive">
    <div class="container">
        <div class="row g-4">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <div class="col-lg-4 col-md-6">
                        <article class="card h-100">
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>">
                                    <img src="<?php the_post_thumbnail_url('blog-thumb'); ?>" class="card-img-top" alt="<?php the_title_attribute(); ?>">
                                </a>
                            <?php endif; ?>
                            <div class="card-body">
                                <div class="mb-2">
                                    <span class="badge bg-primary"><?php echo get_the_date(); ?></span>
                                </div>
                                <h5 class="card-title">
                                    <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark">
                                        <?php the_title(); ?>
                                    </a>
                                </h5>
                                <p class="card-text"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                                <a href="<?php the_permalink(); ?>" class="btn btn-outline-primary">Read More</a>
                            </div>
                        </article>
                    </div>
                <?php endwhile; ?>
            <?php else : ?>
                <div class="col-12 text-center py-5">
                    <h3>No posts found</h3>
                    <p>Please check back later for updates.</p>
                </div>
            <?php endif; ?>
        </div>

        <!-- Pagination -->
        <?php if (have_posts()) : ?>
            <div class="row mt-5">
                <div class="col-12">
                    <nav aria-label="Blog pagination">
                        <?php
                        the_posts_pagination(array(
                            'prev_text' => '<i class="bi bi-chevron-left"></i>',
                            'next_text' => '<i class="bi bi-chevron-right"></i>',
                        ));
                        ?>
                    </nav>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>
