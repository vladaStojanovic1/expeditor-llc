<section class="m-textImage" id="text-image">
    <div class="_wr">

        <?php if( have_rows('items_repeater') ): ?>
            <?php while( have_rows('items_repeater') ): the_row();
                $about_title = get_sub_field('about_title');
                $about_text_bottom = get_sub_field('about_text_bottom');
                $random_text = get_sub_field('random_text');
                $about_image = get_sub_field('about_image');
                ?>
                <div class="_w m-textImage__item <?php echo $random_text ? 'random-text' : ''; ?>">
                    <div class="_l6">
                        <div>
                            <h2 class="m-textImage__item--title"><?php echo $about_title ?></h2>
                            <?php if( have_rows('about_text_repeater') ): ?>
                                <?php while( have_rows('about_text_repeater') ): the_row();
                                    $about_small_item = get_sub_field('about_small_item');
                                    ?>
                                    <div class="m-textImage__item--flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"><path d="m8.896 12.667 4.708-4.688-.687-.687-4.021 4L7.083 9.5l-.687.688ZM10 17.583q-1.562 0-2.938-.593-1.374-.594-2.416-1.625-1.042-1.032-1.636-2.417-.593-1.386-.593-2.948 0-1.583.593-2.958.594-1.375 1.636-2.417Q5.688 3.583 7.062 3 8.438 2.417 10 2.417q1.583 0 2.958.583 1.375.583 2.417 1.625Q16.417 5.667 17 7.042q.583 1.375.583 2.958 0 1.562-.583 2.938-.583 1.374-1.625 2.416-1.042 1.042-2.417 1.636-1.375.593-2.958.593Zm0-.958q2.771 0 4.698-1.927 1.927-1.927 1.927-4.698 0-2.771-1.927-4.698Q12.771 3.375 10 3.375q-2.771 0-4.698 1.927Q3.375 7.229 3.375 10q0 2.771 1.927 4.698Q7.229 16.625 10 16.625ZM10 10Z"/></svg>
                                        <p class="m-textImage__item--text"><?php echo $about_small_item; ?></p>
                                    </div>
                                <?php endwhile;?>
                            <?php endif;?>

                            <p class="m-textImage__item--bottomTitle"><?php echo $about_text_bottom; ?></p>
                        </div>
                    </div>

                    <div class="_l6 image">
                        <div>
                            <img src="<?php echo $about_image['url']; ?>" alt="<?php echo $about_image['alt'] ?>">
                        </div>
                    </div>
                </div>
            <?php endwhile;?>
        <?php endif;?>

    </div>
</section>