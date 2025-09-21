<?php
add_action('wp_head', function() {
    $options = get_option('kb_seo_speed_defaults', []);

    if (!empty($options['enable_meta']) && is_singular()) {
        global $post;
        $title = get_post_meta($post->ID, '_kb_seo_title', true) ?: get_the_title();
        $desc = get_post_meta($post->ID, '_kb_seo_desc', true) ?: substr(strip_tags($post->post_content), 0, 160);

        echo "<title>" . esc_html($title) . "</title>\n";
        echo "<meta name='description' content='" . esc_attr($desc) . "' />\n";
        echo "<meta property='og:title' content='" . esc_attr($title) . "' />\n";
        echo "<meta property='og:description' content='" . esc_attr($desc) . "' />\n";
        echo "<meta name='twitter:title' content='" . esc_attr($title) . "' />\n";
        echo "<meta name='twitter:description' content='" . esc_attr($desc) . "' />\n";
    }
});

add_action('init', function() {
    if ($_SERVER['REQUEST_URI'] === '/sitemap.xml') {
        header('Content-Type: application/xml; charset=utf-8');
        $posts = get_posts(['numberposts' => -1, 'post_type' => 'post']);
        echo '<?xml version="1.0" encoding="UTF-8"?>';
        echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        foreach ($posts as $post) {
            echo '<url>';
            echo '<loc>' . get_permalink($post) . '</loc>';
            echo '<lastmod>' . get_the_modified_time('c', $post) . '</lastmod>';
            echo '</url>';
        }
        echo '</urlset>';
        exit;
    }
});
