<?php
$brokers_title = get_field('brokers_title');

?>
<section class="m-brokers">
    <h2 class="m-brokers__title"><?php echo $brokers_title; ?></h2>

    <div class="_wr">
        <div class="swiper swiper-brokers">
            <div class="swiper-wrapper">

                <?php if( have_rows('brokers_repeater') ): ?>
                    <?php while( have_rows('brokers_repeater') ): the_row();
                        $broker_image = get_sub_field('broker_image');
                        $broker_url = get_sub_field('broker_url');
                        ?>
                        <a target="_blank" class="swiper-slide" href="<?php echo $broker_url?>">
                            <img src="<?php echo $broker_image?>" alt="">
                        </a>
                    <?php endwhile;?>
                <?php endif;?>
            </div>
        </div>
    </div>
</section>