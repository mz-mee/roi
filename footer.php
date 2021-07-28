<?php
if ( et_theme_builder_overrides_layout( ET_THEME_BUILDER_HEADER_LAYOUT_POST_TYPE ) || et_theme_builder_overrides_layout( ET_THEME_BUILDER_FOOTER_LAYOUT_POST_TYPE ) ) {
    // Skip rendering anything as this partial is being buffered anyway.
    // In addition, avoids get_sidebar() issues since that uses
    // locate_template() with require_once.
    return;
}

/**
 * Fires after the main content, before the footer is output.
 *
 * @since 3.10
 */
do_action( 'et_after_main_content' );

if ( 'on' === et_get_option( 'divi_back_to_top', 'false' ) ) : ?>

    <span class="et_pb_scroll_top et-pb-icon"></span>

<?php endif;

if ( ! is_page_template( 'page-template-blank.php' ) ) : ?>
<?php /*
    <footer id="main-footer">
        <?php get_sidebar( 'footer' ); ?>


        <?php
        if ( has_nav_menu( 'footer-menu' ) ) : ?>

            <div id="et-footer-nav">
                <div class="container">
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'footer-menu',
                        'depth'          => '1',
                        'menu_class'     => 'bottom-nav',
                        'container'      => '',
                        'fallback_cb'    => '',
                    ) );
                    ?>
                </div>
            </div> <!-- #et-footer-nav -->

        <?php endif; ?>

        <div id="footer-bottom">
            <div class="container clearfix">
                <?php
                if ( false !== et_get_option( 'show_footer_social_icons', true ) ) {
                    get_template_part( 'includes/social_icons', 'footer' );
                }

                // phpcs:disable WordPress.Security.EscapeOutput.OutputNotEscaped
                echo et_core_fix_unclosed_html_tags( et_core_esc_previously( et_get_footer_credits() ) );
                // phpcs:enable
                ?>
            </div>	<!-- .container -->
        </div>
    </footer> <!-- #main-footer -->
    </div> <!-- #et-main-area -->
*/ ?>
<?php endif; // ! is_page_template( 'page-template-blank.php' ) ?>

</div> <!-- #page-container -->

<?php

$homepage_id = 12409;
$logo = get_field('logo', $homepage_id);
$description = get_field('popis', $homepage_id);
$socials_desktop = get_field('socials_desktop', $homepage_id);
$socials_mobile = get_field('socials_mobile', $homepage_id);
$badges = get_field('badges', $homepage_id);
?>
<div class="footer">
    <div class="container">
        <div class="footer__row">
            <div class="footer__col">
                <div>
                    <?php if($logo): ?>
                        <a href="<?php bloginfo('url'); ?>" class="footer__logo">
                            <img src="<?= $logo; ?>">
                        </a>
                    <?php endif; ?>
                    <?php if($description): ?>
                        <div class="footer__desc">
                            <?= $description; ?>
                        </div>
                    <?php endif; ?>
                    <?php if($socials_desktop): ?>
                        <div class="footer__socials footer__socials--desktop">
                            <?php foreach($socials_desktop as $social): ?>
                                <a target="_blank" href="<?= $social['social']['url']; ?>">
                                    <img src="<?= $social['social']['ikona']; ?>">
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    <?php if($socials_mobile): ?>
                        <div class="footer__socials footer__socials--mobile">
                            <?php foreach($socials_mobile as $social): ?>
                                <a target="_blank" href="<?= $social['social']['url']; ?>">
                                    <img src="<?= $social['social']['ikona']; ?>">
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="footer__col">
                <?php if($badges): ?>
                    <div class="footer__badges">
                        <?php $c=0; foreach($badges as $badge): $c++; ?>
                            <img <?php if($badge['badge']['max_width']): ?>style="max-width: <?= $badge['badge']['max_width']; ?>px;"<?php endif; ?> src="<?= $badge['badge']['logo']; ?>"><?php if($c != count($badges)): ?><br><?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="footer__col">
                <div class="footer__menu">
                    <div class="footer__title">Products</div>
                    <?=
                        wp_nav_menu([
                            'theme_location' => 'footer_menu1',
                            'container' => false,
                        ]);
                    ?>
                </div>
                <div class="footer__menu">
                    <div class="footer__title">Resources</div>
                    <?=
                    wp_nav_menu([
                        'theme_location' => 'footer_menu2',
                        'container' => false,
                    ]);
                    ?>
                </div>
                <div class="footer__menu">
                    <div class="footer__title">Company</div>
                    <?=
                    wp_nav_menu([
                        'theme_location' => 'footer_menu0',
                        'container' => false,
                    ]);
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>


<?php wp_footer(); ?>
</body>
</html>
