<?php
/**
 * Header for pages
 * Custom header image functionality
 * @package WordPress
 */

/**
 * @return mixed|string in case there is a image array in field, returns random image from it, otherwise returns random.jpg from images
 *
 */
function randomHeaderImage() {

    $images = array();

    if( have_rows('imgs', 'options') ):
        while( have_rows('imgs', 'options')): the_row();
            $image = get_sub_field('img');

            array_push($images, $image);
        endwhile;
        $random_counter = rand(0, count($images)-1);

    endif;
    if( !empty($images) ) return $images[$random_counter];
    else return get_template_directory_uri() . '/src/images/random.jpg';
}

/**
 * Custom header for home page
 * Change name of images that show up by default if nothing is selected (from random.jpg)
 */
function headerHomePage() {
    $header_image = get_field('h_header_image');
    $header_title = get_field('h_header_title');
 ?>

    <header class="m-headerHome">
        <div class="swiper home-swiper">
            <div class="swiper-wrapper">

                <?php if( have_rows('slider_repeater') ): ?>
                    <?php while( have_rows('slider_repeater') ): the_row();
                        $slide_image = get_sub_field('h_slide_image');
                        $slide_title = get_sub_field('h_slide_title');
                        $slide_text = get_sub_field('h_slide_text');
                        $slide_link = get_sub_field('h_slide_link');
                        ?>
                        <div class="swiper-slide animeslide-slide m-headerHome__slide" style="background-image: url(<?php echo $slide_image; ?>);">
                            <div class="_wr container">
                                <div class="_w">
                                    <div class="_l12">
                                        <h1 data-animate="bottom" class="animeslide-heading m-headerHome__slide--title">
                                            <?php echo $slide_title ?>
                                        </h1>
                                        <div data-animate="bottom" class="animeslide-heading m-headerHome__slide--link">
                                            <a class="a-hover -effectTwo" href=<?php echo $slide_link['url'] ?>><?php echo $slide_link['title'] ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <? endwhile;?>
                <? endif;?>
            </div>
        </div>
    </header>
    <?php
}

/**
 * Custom header for all other pages
 * Change name of images that show up by default if nothing is selected (from random.jpg)
 */
function headerPage() {
    $header_image = get_field('header_image');
    $header_title = get_field('header_title');
    $image = get_ftheme_first([$header_image, get_the_post_thumbnail_url(), randomHeaderImage()]);
    $title = get_ftheme_first([$header_title, get_the_title(), get_the_archive_title()]); ?>

    <section class="section header-section header-overlay" style="background-image: url(<?php echo $image; ?>);">
        <div class="wrapper">
            <div class="header-title">
                <h1 class="title">
                    <?php
                    echo $title; ?>
                </h1>
            </div>
        </div>
    </section>
    <?php
}

function headerCareers() {
    $header_image = get_field('header_image');
    $header_title = get_field('header_title');?>

    <header class="m-headerCareers">
        <div class="swiper animeslide">
            <div class="swiper-wrapper">

                <?php if( have_rows('slide_repeater') ): ?>
                    <?php while( have_rows('slide_repeater') ): the_row();
                        $slide_image = get_sub_field('slide_image');
                        $slide_title = get_sub_field('slide_title');
                        $slide_text = get_sub_field('slide_text');
                        $slide_link = get_sub_field('slide_link');
                        ?>
                        <div class="swiper-slide animeslide-slide m-headerCareers__slide" style="background-image: url(<?php echo $slide_image; ?>);">
                            <div class="_wr container">
                              <div class="_w">
                                  <div class="_l5">
                                      <h2 data-animate="bottom" class="animeslide-heading m-headerCareers__slide--title">
                                          <?php echo $slide_title ?>
                                          <span class="a-line"></span>
                                      </h2>
                                      <p data-animate="bottom" class="animeslide-desc m-headerCareers__slide--text">
                                          <?php echo $slide_text ?>
                                      </p>
                                  </div>
                              </div>
                            </div>
                        </div>
                    <?php endwhile;?>
                <?php endif;?>
            </div>
        </div>
    </header>
    <?php
}

function headerAbout() {
    $about_image = get_field('about_image');
    $about_title = get_field('about_title');
    $about_text = get_field('about_text');
    ?>
    <header class="m-headerAbout" style="background-image: url(<?php echo $about_image; ?>);">
        <div class="_wr m-headerAbout__content">
            <div class="m-headerAbout__content--text overflow-hidden m-effect -dropIn">
                <a href="#text-image">
                    <h1 class="m-effect -zoom"><?php echo $about_title; ?></h1>
                </a>
            </div>
        </div>
    </header>
    <?php
}
