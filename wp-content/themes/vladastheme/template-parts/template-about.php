<?php
/* Template Name: About */
get_header();
?>
    <div id="content" class="site-content">
        <?php
        include(get_template_directory() . '/inc/_partials/nav.php');
        headerAbout();
        ?>

        <main id="main" class="page-main site-main" role="main">
<!--            --><?php //include (get_template_directory() . '/template-parts/sections/careers/right-partner.php')?>
            <?php include (get_template_directory() . '/template-parts/sections/about/text-image.php')?>
            <?php include (get_template_directory() . '/template-parts/sections/global/brokers.php')?>
        </main>
    </div>

<?php
get_footer();