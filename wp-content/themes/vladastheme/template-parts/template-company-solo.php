<?php
/* Template Name: Company Solo */
get_header();
$application_form = get_field('application_form');
?>

    <div id="content" class="site-content">
        <?php
        include(get_template_directory() . '/inc/_partials/nav.php');
        //        headerHomePage();
        ?>

        <main id="main" class="page-main site-main" role="main">
           <section class="m-appForm">
               <div class="_wr">
                   <div class="_w m-appForm__center">
                       <div class="_l6">
                           <div class="m-appForm__content">
                               <?php echo $application_form; ?>
                           </div>
                       </div>
                   </div>
               </div>
           </section>
        </main>
    </div>


<?php
get_footer();