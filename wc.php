<?php

/**
 * The template for displaying woocommerce
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package thrive-theme
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header class="wc-custom-header">
        <div class="wc-cusotm-logo">
            <?php
            if (!has_custom_logo()) { ?>

                <?php if (is_front_page() && is_home()) : ?>

                    <h1 class="eventplus-logo"><a rel="home" href="<?php echo esc_url(home_url('/')); ?>" itemprop="url"><?php bloginfo('name'); ?></a></h1>

                <?php else : ?>

                    <a class="navbar-brand" rel="home" href="<?php echo esc_url(home_url('/')); ?>" itemprop="url"><?php bloginfo('name'); ?></a>

                <?php endif; ?>

            <?php
            } else {
                the_custom_logo();
            }
            ?>
        </div>
        <div class="wc-custom-nav">
            <?php


            wp_nav_menu(
                array(
                    'theme_location' => 'theme-menu',
                    'menu_id'        => 'primary-menu',
                    'container' => 'div',
                    'menu_class' => 'nav justify-content-end eventplus-main-nav-ul navbar-default',
                    'container_class' => 'navbar-collapse no-border',
                    'container_id' => 'bs-example-navbar-collapse-1',
                    'depth' => 3

                )
            );

            ?>
        </div>
    </header>
    <!-- Header Start -->
    <?php $header_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail'); ?>

    <header id="wc-banner-header" class="wc-banner-header bg-img-10" style="background-image: url('<?php echo esc_url($header_image[0]); ?>');">
        <div class="page-title mt-80">
            <?php if (is_single()) : ?>
                <?php the_title('<h2 class="entry-title text-bold text-uppercase">', '</h2>'); ?>

            <?php else : ?>

                <?php the_archive_title('<h2 class="page-title">', '</h2>'); ?>
            <?php endif; ?>
            <div class="page-breadcrum">
                <?php
                if (function_exists('get_hansel_and_gretel_breadcrumbs')) :
                    echo get_hansel_and_gretel_breadcrumbs();
                endif;
                ?>
            </div> <!-- page-breadcrum -->
        </div> <!-- page-title -->
    </header> <!-- Header End -->


    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <?php
            woocommerce_content();
            ?>
        </main><!-- .site-main -->
    </div><!-- .content-area -->

    <?php wp_footer(); ?>

    <footer class="wc-custom-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="wc-footer-single">
                        <div class="wc-footer-title">
                            <img src="" alt="">
                        </div>
                        <div class="about-company">
                            We are the most disruptive online education provider for the global anti-financial crime
                            community — Fighting financial crime with online education!
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="wc-footer-single">
                                <h4 class="wc-footer-title">Pages</h4>
                                <ul>
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#">About</a></li>
                                    <li><a href="#">Blog</a></li>
                                    <li><a href="#">Resource</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="wc-footer-single">
                                <h4 class="wc-footer-title">Legal</h4>
                                <ul>
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="#">Terms and conditions</a></li>
                                    <li><a href="#">FAQ</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="wc-footer-single">
                                <h4 class="wc-footer-title">Get in touch</h4>
                                <ul>
                                    <li><a href="mailto:hello@financialcrimeacademy.org">hello@financialcrimeacademy.org</a>
                                    </li>
                                </ul>
                                <ul class="social">
                                    <li><a href="#">Facebook</a></li>
                                    <li><a href="#">Youtube</a></li>
                                    <li><a href="#">Linked in</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <form action="#" method="POST">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="single-newsletter">
                            <h4>Stay in the loop</h4>
                            <p>Subscribe for special offers and news</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="single-newsletter">
                            <input class="tcb-plain-text" type="email" data-field="email" data-required="1" data-validation="email" name="email" placeholder="Type your email here.." data-placeholder="Type your email here.." style="border: none;">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="single-newsletter">
                            <div class="tcb-flex-col" data-css="tve-u-17eaf9a2067" style="">
                                <div class="tcb-col" style="" data-css="tve-u-17eb9e1ff8d">
                                    <div class="thrv_wrapper tve-form-button tcb-local-vars-root tve-color-set" data-tcb_hover_state_parent="" data-button-style="btn-tpl-58334" style="" data-button-size-d="s">
                                        <div class="thrive-colors-palette-config" style="display: none !important">
                                        </div> <a href="#" class="tcb-button-link tve-form-button-submit tcb-plain-text" style="">
                                            <span class="tcb-button-texts" style=""><span class="tcb-button-text thrv-inline-text" style="" data-css="tve-u-17eaf9ec2ff">Subscribe</span></span> </a> <input type="submit" style="display: none !important;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-lg-12">
                    <div class="wc-copyright-footer">
                        <p>©COPYRIGHT FINANCIAL CRIME ACADEMY LTD. - 2022</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>



    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"></script>
    <script>
        const wcCustomLogo = document.querySelector(".wc-cusotm-logo a");

        const makeWcLogo = document.createElement("img");
        makeWcLogo.src = "https://staging.financialcrimeacademy.org/wp-content/uploads/2022/01/FCA20Color.png";
        makeWcLogo.style.maxHeight = "200px";
        wcCustomLogo.appendChild(makeWcLogo);
        wcCustomLogo.firstChild.remove();
    </script>
</body>

</html>