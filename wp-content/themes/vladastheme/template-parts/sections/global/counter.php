<?php
$counter_title = get_field('counter_title');
$counter_button = get_field('counter_button');
$counter_text = get_field('counter_text');
$first_icon = get_field('first_icon');
$first_counter_number = get_field('first_counter_number');
$first_text = get_field('first_text');
$second_icon = get_field('second_icon');
$second_counter_number = get_field('second_counter_number');
$second_text = get_field('second_text');
$third_icon = get_field('third_icon');
$third_counter_number = get_field('third_counter_number');
$third_text = get_field('third_text');
?>
<section class="m-counter">
    <div class="_wr">
<!--        <div class="counters">-->
<!--        </div>-->

        <div class="_w">
            <div class="_l12">
               <div class="m-counter__top">
                   <h2 class="m-counter__title"><?php echo $counter_title; ?></h2>
<!--                   <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"><path d="m12 .587 3.668 7.568L24 9.306l-6.064 5.828 1.48 8.279L12 19.446l-7.417 3.967 1.481-8.279L0 9.306l8.332-1.151z"/></svg>-->
                   <span class="a-line"></span>
                   <p class="m-counter__text"><?php echo $counter_text; ?></p>
                   <a class="m-counter__button a-hover -effectTwo" href="<?php echo $counter_button['url']; ?>"><?php echo $counter_button['title']; ?></a>
               </div>
            </div>
        </div>

        <div class="_w">
            <div class="_m4">
                <div class="m-counter__item">
                    <h1 class="counterOne"><?php echo $first_counter_number; ?> <span>M</span></h1>
                    <p><?php echo $first_text; ?></p>
                </div>
            </div>
            <div class="_m4">
                <div class="m-counter__item">
                    <h1 class="counterOne"><?php echo $second_counter_number; ?> <span>M</span></h1>
                    <p><?php echo $second_text; ?></p>
                </div>
            </div>
            <div class="_m4">
                <div class="m-counter__item">
                    <h1 class="counterOne"><?php echo $third_counter_number; ?> <span>M</span></h1>
                    <p><?php echo $third_text; ?></p>
                </div>
            </div>
        </div>
    </div>
</section>