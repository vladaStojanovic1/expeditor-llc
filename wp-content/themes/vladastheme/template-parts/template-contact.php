<?php
/* Template Name: Contact */
get_header();
?>
    <div id="content" class="site-content">
        <?php
        include(get_template_directory() . '/inc/_partials/nav.php');?>

        <main id="main" class="page-main site-main" role="main">
            <div class="_wr">
                <?php include (get_template_directory() . '/template-parts//sections/contact/contact-section.php')?>
                <?php include (get_template_directory() . '/template-parts/sections/global/brokers.php')?>
            </div>
        </main>
    </div>


<?php
get_footer();