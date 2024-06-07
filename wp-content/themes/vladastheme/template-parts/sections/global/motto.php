<?php
$motto_title = get_field('motto_title');
$motto_button = get_field('motto_button');
?>

<section class="m-motto">
    <div class="_wr">
        <div class="_w m-motto__content">
            <div class="_m8 _l9">
                <h1 class="m-motto__content--title m-effect -zoom"><?php echo $motto_title; ?></h1>
            </div>
            <div class="_m4 _l3">

                <a class="m-motto__content--btn" href="tel:<?php echo $motto_button['title'] ?>"><?php echo $motto_button['title'] ?>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-phone  m-effect -trin" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>