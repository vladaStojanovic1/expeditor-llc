<?php
/* Template Name: Home */
get_header();
$form = get_field('form');
?>

    <div id="content" class="site-content">
        <?php
        include(get_template_directory() . '/inc/_partials/nav.php');
        headerHomePage();
        ?>

        <main id="main" class="page-main site-main" role="main">
            <?php include (get_template_directory() . '/template-parts//sections/global/motto.php')?>
            <?php include (get_template_directory() . '/template-parts//sections/careers/right-partner.php')?>
            <?php include (get_template_directory() . '/template-parts//sections/global/banner.php')?>
            <?php include (get_template_directory() . '/template-parts//sections/global/counter.php')?>
        </main>
    </div>


<?php
get_footer();