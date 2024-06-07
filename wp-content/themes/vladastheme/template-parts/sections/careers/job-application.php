<?php
$left_job_title = get_field('left_job_title');
$left_job_image = get_field('left_job_image');
$left_job_link = get_field('left_job_link');
$right_job_title = get_field('right_job_title');
$right_job_image = get_field('right_job_image');
$right_job_link = get_field('right_job_link');
$right_job_bottom_title = get_field('right_job_bottom_title');
?>
<section class="m-jobApp">
    <div class="_wr">
        <h2 class="m-jobApp__title">We are hiring: Would you like to join our team? </h2>

        <div class="_w">
            <div class="_l6">
                <div class="m-jobApp__item">
                    <h3><?php echo $left_job_title ?></h3>
                    <span class="a-line"></span>
                    <?php if( have_rows('left_job_info_items') ): ?>
                        <?php while( have_rows('left_job_info_items') ): the_row();
                            $left_job_info = get_sub_field('left_job_info');
                            ?>
                            <div class="m-jobApp__item--textIcon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"><path d="m8.896 12.667 4.708-4.688-.687-.687-4.021 4L7.083 9.5l-.687.688ZM10 17.583q-1.562 0-2.938-.593-1.374-.594-2.416-1.625-1.042-1.032-1.636-2.417-.593-1.386-.593-2.948 0-1.583.593-2.958.594-1.375 1.636-2.417Q5.688 3.583 7.062 3 8.438 2.417 10 2.417q1.583 0 2.958.583 1.375.583 2.417 1.625Q16.417 5.667 17 7.042q.583 1.375.583 2.958 0 1.562-.583 2.938-.583 1.374-1.625 2.416-1.042 1.042-2.417 1.636-1.375.593-2.958.593Zm0-.958q2.771 0 4.698-1.927 1.927-1.927 1.927-4.698 0-2.771-1.927-4.698Q12.771 3.375 10 3.375q-2.771 0-4.698 1.927Q3.375 7.229 3.375 10q0 2.771 1.927 4.698Q7.229 16.625 10 16.625ZM10 10Z"/></svg>
                                <p><?php echo $left_job_info ?></p>
                            </div>
                        <?php endwhile;?>
                    <?php endif;?>
                    <a class="m-jobApp__item--apply a-hover -effectOne" href=<?php echo $left_job_link['url'] ?>><?php echo $left_job_link['title'] ?></a>
                </div>
            </div>

            <div class="_l6">
                <div class="m-jobApp__item -right">
                    <h3><?php echo $right_job_title ?></h3>
                    <span class="a-line"></span>
                    <?php if( have_rows('right_job_info_items') ): ?>
                        <?php while( have_rows('right_job_info_items') ): the_row();
                            $right_job_info = get_sub_field('right_job_info');
                            ?>
                            <div class="m-jobApp__item--textIcon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"><path d="m8.896 12.667 4.708-4.688-.687-.687-4.021 4L7.083 9.5l-.687.688ZM10 17.583q-1.562 0-2.938-.593-1.374-.594-2.416-1.625-1.042-1.032-1.636-2.417-.593-1.386-.593-2.948 0-1.583.593-2.958.594-1.375 1.636-2.417Q5.688 3.583 7.062 3 8.438 2.417 10 2.417q1.583 0 2.958.583 1.375.583 2.417 1.625Q16.417 5.667 17 7.042q.583 1.375.583 2.958 0 1.562-.583 2.938-.583 1.374-1.625 2.416-1.042 1.042-2.417 1.636-1.375.593-2.958.593Zm0-.958q2.771 0 4.698-1.927 1.927-1.927 1.927-4.698 0-2.771-1.927-4.698Q12.771 3.375 10 3.375q-2.771 0-4.698 1.927Q3.375 7.229 3.375 10q0 2.771 1.927 4.698Q7.229 16.625 10 16.625ZM10 10Z"/></svg>
                                <p><?php echo $right_job_info ?></p>
                            </div>
                        <?php endwhile;?>
                    <?php endif;?>

                    <p class="m-jobApp__item--bottomTitle"><?php echo $right_job_bottom_title; ?></p>
                </div>
            </div>
        </div>
    </div>
</section>