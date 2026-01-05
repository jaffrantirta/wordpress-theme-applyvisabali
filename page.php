<?php
/**
 * The template for displaying all pages
 */
get_header();
?>

<div class="page-header bg-light py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="display-4 fw-bold"><?php the_title(); ?></h1>
            </div>
        </div>
    </div>
</div>

<section class="section page-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <?php while (have_posts()) : the_post(); ?>
                    <div class="content">
                        <?php the_content(); ?>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
