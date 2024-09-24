
<!DOCTYPE html>
    <html>
    <body <?php body_class(); ?>>

    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width">
        <link rel="profile" href="http://gmpg.org/xfn/11">


        <?php if(has_site_icon()): ?>
            <link rel="icon" href="<?php echo get_site_icon_url(); ?>" type="image/x-icon" />
        <?php else: ?>
            <link rel="icon" href="<?php echo get_template_directory_uri() . '/src/images/favicon.ico'; ?>" type="image/x-icon" />
        <?php endif; ?>

        <title><?php wp_title('', true, 'right'); ?></title>

        <?php wp_head(); ?>
    </head>
