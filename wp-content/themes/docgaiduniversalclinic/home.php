<?php

remove_action('genesis_loop', 'genesis_do_loop');
add_action('genesis_after_loop', 'wpb_change_home_loop');

function wpb_change_home_loop()
{
    if (is_home() && !is_front_page()) {
        $posts_page_id = get_option('page_for_posts');
        $post = get_post($posts_page_id);
        setup_postdata($post);

        $title = get_field('title', $posts_page_id);
        $description = get_field('description', $posts_page_id);
        $news = get_field('news', $posts_page_id);

        wp_reset_postdata();
    } else {
        $title = get_field('title');
        $description = get_field('description');
        $news = get_field('news');
    }

    $per_page = 10;
    $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'order' => 'DESC',
        'posts_per_page' => $per_page,
        'paged' => $paged,
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) :
?>
        <div class="news">
            <div class="row">
                <h2 class="title"><?= esc_html($title) ?></h2>
                <p class="description"><?= esc_html($description) ?></p>
                <?php while ($query->have_posts()) : $query->the_post();
                    $thumbnail = get_the_post_thumbnail(get_the_ID(), 'full') ? get_the_post_thumbnail(get_the_ID(), 'full') : CHILD_URL . '/assets/app/img/default-thumb.webp';
                ?>
                    <div class="col-12">
                        <div class="news-card">
                            <img src="<?= esc_url($thumbnail) ?>" alt="<?= esc_attr(get_the_title()) ?>">
                            <h3><a href="<?= esc_url(get_the_permalink()) ?>"><?= esc_html(get_the_title()) ?></a></h3>
                            <p><?= esc_html(get_the_excerpt()) ?></p>
                            <a href="<?= esc_url(get_the_permalink()) ?>" class="btn-global">Read More</a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            <div class="pagination">
                <?php genesis_posts_nav(); ?>
            </div>
        </div>
        <div class="news">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <?php if (!empty($news)) : ?>
                            <?php foreach ($news as $post) : ?>
                                <div class="news-card">
                                    <img src="<?= esc_url($post['image']['url']) ?>" alt="<?= esc_attr($post['title']) ?>">
                                    <?php if ($post['title']) : ?>
                                        <h3><?= esc_html($post['title']) ?></h3>
                                    <?php endif; ?>
                                    <?php if ($post['description']) : ?>
                                        <p><?= esc_html($post['description']) ?></p>
                                    <?php endif; ?>
                                    <?php if ($post['link']) : ?>
                                        <a href="<?= esc_url($post['link']) ?>" target="_blank" class="btn-global">Read More</a>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
<?php endif;
    wp_reset_postdata();
}

genesis();
?>