<?php
/**
 *  Mobile Header Source
 *  @package Creote
**/
function creote_mobile_menu(){ ?>
<div class="crt_mobile_menu">
    <div class="menu-backdrop"></div>
        <nav class="menu-box">
            <div class="close-btn"><i class="icon-close"></i></div>
        <?php creote_simple_search(); ?>
            <div class="menu-outer">

            <div class="navigation_menu">
                     <?php wp_nav_menu(array(
                        'theme_location' => 'primary',
                            'container' => false,
                            'menu_class' => 'navbar_nav',
                             'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
                            'walker' => new WP_Bootstrap_Navwalker()
                        ));?>
                  </div>

            </div>
        </nav>
    </div>
<?php }