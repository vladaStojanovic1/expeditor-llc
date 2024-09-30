<?php
$site_logo = get_field('site_logo', 'option');
?>

<nav class="m-nav">
    <div class="_wr">
        <div class="m-nav__content">
            <div class="m-nav__content--logo">
                <a href="/">
                    <img src="<?php echo $site_logo; ?>" alt="Expeditor LLC Logo - Reliable Freight Forwarding Solutions in Las Vegas">
                </a>
            </div>

            <div class="m-nav__links">
                <?php echo wp_nav_menu(); ?>
            </div>

            <div class="m-nav__hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>

    </div>
</nav>
