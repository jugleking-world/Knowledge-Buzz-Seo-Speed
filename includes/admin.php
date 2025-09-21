<?php
add_action('admin_menu', function() {
    add_menu_page(
        'Knowledge Buzz SEO & Speed',
        'KB SEO+Speed',
        'manage_options',
        'kb-seo-speed',
        'kb_seo_speed_settings_page',
        'dashicons-performance',
        80
    );
});

function kb_seo_speed_settings_page() {
    ?>
    <div class="wrap">
        <h1>Knowledge Buzz SEO & Speed Settings</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('kb_seo_speed_options_group');
            do_settings_sections('kb-seo-speed');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

add_action('admin_init', function() {
    register_setting('kb_seo_speed_options_group', 'kb_seo_speed_defaults', [
        'default' => [
            'enable_meta' => 1,
            'enable_sitemap' => 1,
            'enable_lazy_load' => 1,
            'enable_minify' => 1
        ]
    ]);
});

add_action('admin_enqueue_scripts', function() {
    wp_enqueue_style('kb-admin-css', plugin_dir_url(__FILE__) . '../assets/css/admin.css');
    wp_enqueue_script('kb-admin-js', plugin_dir_url(__FILE__) . '../assets/js/admin.js', ['jquery'], false, true);
});
