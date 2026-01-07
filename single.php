<?php
/**
 * Single Post Template
 */
get_header();
?>

<div class="single-post-wrapper">
    <?php while (have_posts()) : the_post(); ?>

        <!-- Post Header -->
        <div class="post-header bg-light py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 mx-auto">
                        <div class="post-meta mb-3">
                            <?php
                            $categories = get_the_category();
                            if (!empty($categories)) :
                                foreach ($categories as $category) :
                            ?>
                                <span class="badge bg-primary me-2"><?php echo esc_html($category->name); ?></span>
                            <?php
                                endforeach;
                            endif;
                            ?>
                            <span class="text-muted">
                                <i class="bi bi-calendar me-1"></i><?php echo get_the_date(); ?>
                            </span>
                        </div>
                        <h1 class="display-5 fw-bold mb-4"><?php the_title(); ?></h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Featured Image -->
        <?php if (has_post_thumbnail()) : ?>
        <div class="post-featured-image">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 mx-auto">
                        <img src="<?php the_post_thumbnail_url('large'); ?>" class="img-fluid rounded-custom my-4" alt="<?php the_title_attribute(); ?>">
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <!-- Post Content -->
        <div class="post-content section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="content">
                            <?php the_content(); ?>
                        </div>

                        <!-- Tags -->
                        <?php if (has_tag()) : ?>
                        <div class="post-tags mt-5">
                            <h5 class="mb-3">Tags:</h5>
                            <?php
                            $tags = get_the_tags();
                            foreach ($tags as $tag) :
                            ?>
                                <a href="<?php echo get_tag_link($tag->term_id); ?>" class="badge bg-secondary me-2 mb-2 text-decoration-none">
                                    #<?php echo esc_html($tag->name); ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>

                        <!-- Share Buttons -->
                        <div class="post-share mt-5 pt-4 border-top">
                            <h5 class="mb-3">Share this post:</h5>
                            <div class="share-buttons d-flex flex-wrap gap-2">
                                <?php
                                $post_url = urlencode(get_permalink());
                                $post_title = urlencode(get_the_title());
                                $share_text = $post_title . ' - ' . get_permalink();
                                ?>

                                <!-- Facebook -->
                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $post_url; ?>" target="_blank" rel="noopener noreferrer" class="btn btn-outline-primary btn-sm">
                                    <i class="bi bi-facebook me-1"></i> Facebook
                                </a>

                                <!-- WhatsApp -->
                                <a href="https://wa.me/?text=<?php echo urlencode($share_text); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-outline-primary btn-sm">
                                    <i class="bi bi-whatsapp me-1"></i> WhatsApp
                                </a>

                                <!-- X (Twitter) -->
                                <a href="https://twitter.com/intent/tweet?url=<?php echo $post_url; ?>&text=<?php echo $post_title; ?>" target="_blank" rel="noopener noreferrer" class="btn btn-outline-primary btn-sm">
                                    <i class="bi bi-twitter-x me-1"></i> X
                                </a>

                                <!-- Threads -->
                                <a href="https://threads.net/intent/post?text=<?php echo urlencode($share_text); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-outline-primary btn-sm">
                                    <i class="bi bi-threads me-1"></i> Threads
                                </a>

                                <!-- Instagram Stories (mobile only) -->
                                <a href="instagram-stories://share?backgroundImage=<?php echo urlencode(get_the_post_thumbnail_url()); ?>&stickerImage=<?php echo urlencode(get_the_post_thumbnail_url()); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-outline-primary btn-sm d-md-none">
                                    <i class="bi bi-instagram me-1"></i> Stories
                                </a>

                                <!-- Copy Link -->
                                <button type="button" class="btn btn-outline-secondary btn-sm" onclick="copyPostLink()" title="Copy link">
                                    <i class="bi bi-link-45deg me-1"></i> Copy Link
                                </button>
                            </div>
                        </div>

                        <script>
                        function copyPostLink() {
                            const url = '<?php echo get_permalink(); ?>';
                            navigator.clipboard.writeText(url).then(function() {
                                // Change button text temporarily
                                const btn = event.target.closest('button');
                                const originalHTML = btn.innerHTML;
                                btn.innerHTML = '<i class="bi bi-check-lg me-1"></i> Copied!';
                                btn.classList.remove('btn-outline-secondary');
                                btn.classList.add('btn-success');

                                setTimeout(function() {
                                    btn.innerHTML = originalHTML;
                                    btn.classList.remove('btn-success');
                                    btn.classList.add('btn-outline-secondary');
                                }, 2000);
                            }, function(err) {
                                console.error('Could not copy text: ', err);
                            });
                        }
                        </script>

                        <!-- Navigation -->
                        <div class="post-navigation mt-5 pt-4 border-top">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <?php
                                    $prev_post = get_previous_post();
                                    if ($prev_post) :
                                    ?>
                                        <a href="<?php echo get_permalink($prev_post); ?>" class="btn btn-outline-primary w-100 text-start">
                                            <i class="bi bi-arrow-left me-2"></i>Previous Post<br>
                                            <small><?php echo get_the_title($prev_post); ?></small>
                                        </a>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-6">
                                    <?php
                                    $next_post = get_next_post();
                                    if ($next_post) :
                                    ?>
                                        <a href="<?php echo get_permalink($next_post); ?>" class="btn btn-outline-primary w-100 text-end">
                                            Next Post<i class="bi bi-arrow-right ms-2"></i><br>
                                            <small><?php echo get_the_title($next_post); ?></small>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <!-- Comments -->
                        <?php if (comments_open() || get_comments_number()) : ?>
                        <div class="post-comments mt-5">
                            <?php comments_template(); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

    <?php endwhile; ?>
</div>

<!-- Related Posts -->
<section class="section related-posts bg-light">
    <div class="container">
        <div class="row mb-4">
            <div class="col-lg-12 text-center">
                <h2 class="section-title">Related Posts</h2>
            </div>
        </div>
        <div class="row g-4">
            <?php
            $related_query = new WP_Query(array(
                'post_type' => 'post',
                'posts_per_page' => 3,
                'post__not_in' => array(get_the_ID()),
                'category__in' => wp_get_post_categories(get_the_ID()),
            ));

            if ($related_query->have_posts()) :
                while ($related_query->have_posts()) : $related_query->the_post();
            ?>
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100">
                        <?php if (has_post_thumbnail()) : ?>
                            <img src="<?php the_post_thumbnail_url('blog-thumb'); ?>" class="card-img-top" alt="<?php the_title_attribute(); ?>">
                        <?php endif; ?>
                        <div class="card-body">
                            <div class="article-meta mb-3">
                                <div class="mb-2">
                                    <span class="badge bg-primary"><?php echo get_the_date(); ?></span>
                                </div>
                                <div class="article-categories">
                                    <?php
                                    $post_categories = get_the_category();
                                    if (!empty($post_categories)) :
                                        $display_cats = array_slice($post_categories, 0, 2);
                                        $remaining = count($post_categories) - 2;

                                        foreach ($display_cats as $cat) :
                                            echo '<span class="badge bg-secondary badge-sm me-1 mb-1">' . esc_html($cat->name) . '</span>';
                                        endforeach;

                                        if ($remaining > 0) :
                                            echo '<span class="badge bg-secondary badge-sm mb-1">+' . $remaining . '</span>';
                                        endif;
                                    endif;
                                    ?>
                                </div>
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
            endif;
            ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
