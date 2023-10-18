<?php

function posts_setup()
{
    load_theme_textdomain('allposts');
    add_theme_support('title-tag');

    add_theme_support('post-thumbnails');
    //set_post_thumbnails_size(400,350);
}
add_action('after_setup_theme', 'posts_setup');


function allposts_scripts()
{
    wp_enqueue_style('style-css', get_stylesheet_uri());
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css');

    wp_enqueue_script('jquery');
    wp_enqueue_script('script', get_template_directory_uri() . '/js/script.js');
}
add_action('wp_enqueue_scripts', 'allposts_scripts');
add_action('wp_ajax_load_posts_by_category', 'load_posts_by_category');
add_action('wp_ajax_nopriv_load_posts_by_category', 'load_posts_by_category');


function load_posts_by_category()
{
    $category = $_POST['category'];

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 6,
    );


    if ($category !== 'all') {
        $args['category_name'] = $category;
    }

    $query = new WP_Query($args);
    $post_count = 0;

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            if ($post_count % 3 === 0) {

                echo '<div class="post-row">';
            }
?>
            <a href="<?php the_permalink(); ?>" class="post">
                <?php if (has_post_thumbnail()) { ?>
                    <div class="post-thumbnail">
                        <?php the_post_thumbnail(); ?>
                    </div>
                <?php } ?>
                <h2><?php the_title(); ?></h2>
                <div><?php the_content(); ?></div>
            </a>
<?php
            if ($post_count % 3 === 2) {
                echo '</div>';
            }
            $post_count++;
        }
    }


    if ($post_count % 3 !== 0) {
        echo '</div>';
    }
    wp_reset_postdata();
    wp_die();
}


wp_enqueue_script('script', get_template_directory_uri() . '/js/script.js', array('jquery'), null, true);
wp_localize_script('script', 'ajax_object', array('ajaxurl' => admin_url('admin-ajax.php')));
