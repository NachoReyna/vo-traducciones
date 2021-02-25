<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}


// Class started
class XzoproVCExtendAddonClass {

    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'XzoproIntegrateWithVC' ) );
    }

    public function XzoproIntegrateWithVC() {
        // Checks if Visual composer is not installed
        if ( ! defined( 'WPB_VC_VERSION' ) ) {
            add_action('admin_notices', array( $this, 'XzoproShowVcVersionNotice' ));
            return;
        }


        // visual composer addons.
        require_once (XZOPRO_ACC_PATH . 'inc/custom-addons/about-box-addon.php');
        require_once (XZOPRO_ACC_PATH . 'inc/custom-addons/brand-slider-addon.php');
        require_once (XZOPRO_ACC_PATH . 'inc/custom-addons/button-addon.php');
        require_once (XZOPRO_ACC_PATH . 'inc/custom-addons/choose-us-addon.php');
        require_once (XZOPRO_ACC_PATH . 'inc/custom-addons/counter-box-addon.php');
        require_once (XZOPRO_ACC_PATH . 'inc/custom-addons/cta-addon.php');
        require_once (XZOPRO_ACC_PATH . 'inc/custom-addons/contact-info-addon.php');
        require_once (XZOPRO_ACC_PATH . 'inc/custom-addons/google-map-addon.php');
        require_once (XZOPRO_ACC_PATH . 'inc/custom-addons/video-popup-addon.php');
        require_once (XZOPRO_ACC_PATH . 'inc/custom-addons/progressbar-addon.php');
        require_once (XZOPRO_ACC_PATH . 'inc/custom-addons/project-addon.php');
        require_once (XZOPRO_ACC_PATH . 'inc/custom-addons/project-gallery-and-details-addon.php');
        require_once (XZOPRO_ACC_PATH . 'inc/custom-addons/pricing-addon.php');
        require_once (XZOPRO_ACC_PATH . 'inc/custom-addons/recent-post-addon.php');
        require_once (XZOPRO_ACC_PATH . 'inc/custom-addons/service-box-addon.php');
        require_once (XZOPRO_ACC_PATH . 'inc/custom-addons/section-title-addon.php');
        require_once (XZOPRO_ACC_PATH . 'inc/custom-addons/slider-addon.php');
        require_once (XZOPRO_ACC_PATH . 'inc/custom-addons/testimonial-addon.php');
        require_once (XZOPRO_ACC_PATH . 'inc/custom-addons/team-member-addon.php');
        require_once (XZOPRO_ACC_PATH . 'inc/custom-addons/text-with-button-addon.php');
        require_once (XZOPRO_ACC_PATH . 'inc/custom-addons/text-with-border-image-addon.php');
        require_once (XZOPRO_ACC_PATH . 'inc/custom-addons/text-with-title-addon.php');
        require_once (XZOPRO_ACC_PATH . 'inc/custom-addons/text-with-image-and-list-addon.php');
        require_once (XZOPRO_ACC_PATH . 'inc/custom-addons/text-with-background-color-addon.php');
        require_once (XZOPRO_ACC_PATH . 'inc/custom-addons/unordered-list-addon.php');
        require_once (XZOPRO_ACC_PATH . 'inc/custom-addons/vc-templates.php');

    }

    public function XzoproShowVcVersionNotice() {
        $theme_data = wp_get_theme();
        echo '
        <div class="notice notice-warning">
          <p>'.sprintf(__('<strong>%s</strong> recommends <strong><a href="'.esc_url(site_url()).'/wp-admin/themes.php?page=tgmpa-install-plugins" target="_blank">Visual Composer</a></strong> plugin to be installed and activated on your site.', 'xzopro-toolkit'), $theme_data->get('Name')).'</p>
        </div>';
    }
}
// Finally initialize code
new XzoproVCExtendAddonClass();