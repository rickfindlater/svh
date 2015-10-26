<?php
/**
 * Template part for top bar menu
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0
 */

?>
<div class="top-bar-container show-for-medium-up">
    <nav class="top-bar" data-topbar role="navigation">
        <ul class="title-area">
            <li class="name show-for-sr">
                <h1><?php bloginfo( 'name' ); ?></h1>
            </li>
            <li class="top-bar-logo">
                <a href="<?php echo home_url(); ?>">
                    <img src="<?php bloginfo('template_directory');?>/assets/img/svh_main_logo02092015.png" alt="SVH Logo">
                </a>
            </li>
        </ul>
        <section class="top-bar-section right">
            <?php foundationpress_top_bar_l(); ?>
            <?php foundationpress_top_bar_r(); ?>
        </section>
    </nav>
</div>