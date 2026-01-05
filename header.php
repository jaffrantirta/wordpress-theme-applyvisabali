<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
    <div class="container">
        <?php if (has_custom_logo()) : ?>
            <div class="navbar-brand">
                <?php the_custom_logo(); ?>
            </div>
        <?php else : ?>
            <a class="navbar-brand fw-bold text-primary" href="<?php echo esc_url(home_url('/')); ?>">
                <?php bloginfo('name'); ?>
            </a>
        <?php endif; ?>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container' => false,
                'menu_class' => 'navbar-nav ms-auto',
                'fallback_cb' => '__return_false',
                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'depth' => 2,
                'walker' => new class extends Walker_Nav_Menu {
                    function start_lvl(&$output, $depth = 0, $args = null) {
                        $output .= '<ul class="dropdown-menu">';
                    }
                    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
                        $classes = empty($item->classes) ? array() : (array) $item->classes;
                        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));

                        if (in_array('menu-item-has-children', $classes)) {
                            $class_names .= ' nav-item dropdown';
                            $output .= '<li class="' . esc_attr($class_names) . '">';
                            $output .= '<a class="nav-link dropdown-toggle" href="' . esc_url($item->url) . '" id="navbarDropdown' . $item->ID . '" role="button" data-bs-toggle="dropdown" aria-expanded="false">';
                            $output .= esc_html($item->title);
                            $output .= '</a>';
                        } else {
                            $class_names .= ' nav-item';
                            $output .= '<li class="' . esc_attr($class_names) . '">';
                            if ($depth > 0) {
                                $output .= '<a class="dropdown-item" href="' . esc_url($item->url) . '">';
                            } else {
                                $output .= '<a class="nav-link" href="' . esc_url($item->url) . '">';
                            }
                            $output .= esc_html($item->title);
                            $output .= '</a>';
                        }
                    }
                },
            ));
            ?>
        </div>
    </div>
</nav>
