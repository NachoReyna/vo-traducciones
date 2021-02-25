<div class="top-btn">
    <?php
    $header_btn_txt = xzopro_option('header_btn_txt');
    if(!empty($header_btn_txt)){
        $header_btn_txt = xzopro_option('header_btn_txt');
    }else{
        $header_btn_txt = __('Get a Quote', 'xzopro');
    }

    $header_btn_link = xzopro_option('header_btn_link');
    ?>

    <a href="<?php echo esc_url($header_btn_link) ?>" class="xzopro-btn fill-btn"><?php echo esc_html($header_btn_txt); ?></a>
</div>