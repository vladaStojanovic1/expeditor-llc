<?php
$banner_image = get_field('banner_image');
$banner_left_text = get_field('banner_left_text');
$banner_right_text = get_field('banner_right_text');

?>
<section class="m-banner" style="background-image: url(<?php echo $banner_image;?>)">
    <div class="_wr m-banner__content">
        <div class="_w m-banner__content--center">
            <div class="_l12 m-banner__content--left">
                <h1 class="m-banner__content--text"><?php echo $banner_left_text;?></h1>
            </div>

<!--            <div class="_l6">-->
<!--                <h1 class="m-banner__content--text">--><?php //echo $banner_right_text;?><!--</h1>-->
<!--            </div>-->
        </div>
    </div>
</section>

