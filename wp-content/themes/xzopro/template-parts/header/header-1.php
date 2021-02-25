<?php
    $header1_top_left_text = xzopro_option('header1_top_left_text');
    $header1_top_icons = xzopro_option('header1_top_icons');
    $fixed_menu = xzopro_option('fixed_menu');
    if($fixed_menu == true ){
        $fixed_menu = 'top-fixed-menu';
    }else{
        $fixed_menu = '';
    }

    $eneble_header_button = xzopro_option('header_button');

    if($eneble_header_button == true ){
        $detect_header_btn = 'menu-btn-on';
    }else{
        $detect_header_btn = 'menu-btn-off';
    }
?>

<?php if(!empty($header1_top_left_text) || !empty($header1_top_icons )) : ?>

<div class="header-top-area xzo-transition">
    <div class="container">
        <div class="row">


            <div class="col-lg-8 col-md-9">

                <?php

                if(!empty($header1_top_left_text)) :
                ?>
                <div class="header-top-left">
                    <ul class="no-list-style">
                        <?php foreach($header1_top_left_text as $header1_top_left_single_text ) :?>
                            <li>
                                <?php if(!empty($header1_top_left_single_text['top1_left_text_url'])) : ?>
                                <a href="<?php echo esc_url($header1_top_left_single_text['top1_left_text_url']);?>" title="<?php echo esc_url($header1_top_left_single_text['top1_left_text_url']);?>">
                                    <?php else: ?>
                                    <span>
                                <?php endif; ?>
                                        <i class="<?php echo esc_attr($header1_top_left_single_text['top1_left_text_icon']);?>"></i>
                                        <?php echo esc_attr($header1_top_left_single_text['top1_left_text']);?>

                                        <?php if(!empty($header1_top_left_single_text['top1_left_text_url'])) : ?>
                                </a>
                                <?php else: ?>
                                </span>
                                <?php endif; ?>
                            </li>
                        <?php endforeach;?>
                    </ul>
                </div>
                <?php endif; ?>
            </div>


            <?php

            if(!empty($header1_top_icons)) :
            ?>
            <div class="col-lg-4 col-md-3">
                <div class="header-top-social">
                    <ul class="no-list-style">
                        <?php foreach($header1_top_icons as $header1_top_icon ) :?>
                            <li>
                                <a href="<?php echo esc_url($header1_top_icon['top1_url']);?>" title=""><i class="<?php echo esc_attr($header1_top_icon['top1_icon']);?>"></i></a>
                            </li>
                        <?php endforeach;?>
                    </ul>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php endif; ?>

<div class="header-bottom-area">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-lg-3 col-md-3">
                <div class="site-branding">
                    <?php
                        if(has_custom_logo()){
                            the_custom_logo();
                        }else{
                            $header_1_logo = xzopro_option('header_1_logo');
                            if(!empty($header_1_logo)){
                                $header_1_logo_array = wp_get_attachment_image_src($header_1_logo, 'full');?>
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                        <img src="<?php echo esc_url($header_1_logo_array[0]); ?>" alt="<?php esc_attr(bloginfo( 'name' )); ?>">
                                    </a>
                                
                            <?php }else{ ?>
                                 <h1 class="site-title xzo-transition"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                            <?php }
                        }
                    ?>
                </div>
            </div>
            <div class="offset-md-3 col-md-6 col-sm-12 text-center">
				<div class="row">
					<div class="col-md-1 col-sm-6 text-center">
						<i class="fa fa-phone fa-3x color-iconos" aria-hidden="true"></i>
					</div>
					<div class="col-sm-6 col-md-5 text-center">
                        <a data-toggle="modal" data-target="#exampleModal" class="relas">
						<p class="m-0">914 454 416</p>
                        <p class="m-0">Te llamamos</p></a>
					</div>
				
					<div class="col-sm-6 col-md-6 text-center ocultar">
                        <a href="/presupuesto" target="_blank" class="relas btn btn-primary" style="background-color:#4471b5; color:#fff;border-color: #4471b5;" title="Presupuestador Online">
						Presupuestador Online
						</a>
					</div>
                </div>
            </div>


            <?php
            $header1_top_right_text = xzopro_option('header1_top_right_text');
            if(!empty($header1_top_right_text)) :
            ?>
            <div class="col-lg-9 col-md-9">

                <div class="header-right-info no-list-style">
                    <ul>
                        <?php foreach($header1_top_right_text as $header1_top_right_single_text ) :?>
                        <li>
                            <i class="<?php echo esc_attr($header1_top_right_single_text['top1_right_text_icon']);?>"></i>
                            <span class="info-first"><?php echo esc_html($header1_top_right_single_text['top1_right_bold_text']);?></span>
                            <span class="info-second"><?php echo esc_html($header1_top_right_single_text['top1_right_small_text']);?></span>
                        </li>
                        <?php endforeach;?>
                    </ul>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="header-1-main-menu-area <?php echo esc_attr($detect_header_btn)?>">
    <div class="main-menu-area <?php echo esc_attr($fixed_menu)?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 text-right">
                    <nav id="site-navigation" class="tamanio_header_texto main-navigation navigation no-list-style xzo-transition">
                        <?php
                        wp_nav_menu( array(
                            'theme_location' => 'main-menu',
                            'menu_id'        => 'primary-menu',
                        ) );
                        ?>
                    </nav><!-- #site-navigation -->
                </div>
                <div class="col-lg-3 menu-right-area">
                    <div id="mobile-menu-wrap"></div>

                    <?php
                        $enable_header_search = xzopro_option('enable_header_search');
                    ?>
                    <?php if($enable_header_search == true) : ?>
                    <div class="search-trigger">
                        <div class="trigger-container">
                            <i class="flaticon-xzopro-loupe"></i>
                        </div>
                    </div>
                    <?php endif;?>
                    <!-- Top Button -->
                    <?php
                        
                        if($eneble_header_button == true){
                            get_template_part( 'template-parts/header/header', 'button' );
                        }
                    ?>
                </div>
            </div>
        </div>

        <div class="header-search-form">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="header-form-wrapper">
                            <?php get_search_form(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content bordes">
      
      <div class="modal-body">
      <?php //echo do_shortcode( '[contact-form-7 id="4346" title="Formulario de contacto 1"]' ); ?>
    <div class="home_1">
    <div class="col-md-12 home_2 text-center">
        <h4 class="text-center home_3">¿Hablamos por teléfono?</h4>
        <p style="color: #fff;">La llamada es gratis y, sobre todo, muy ágil</p>
    </div>
    <div class="col-md-12">
        <div class="container">
        <form action="https://vo-traducciones.com/procesa-appllamadas-modal/" method="get" enctype="multipart/form-data">

            <div class="form-group row d-flex justify-content-center" style="padding-bottom: 13px;">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="col-md-12 text-center">
                        <input type="text" name="nombre" id="nombre" placeholder="Nombre*" autocomplete="off" required>
                        </div>
                    </div>
                </div>
               
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="col-md-12 text-center">
                            <input type="text" name="telefono" id="telefono" placeholder="Teléfono*" autocomplete="off" required onkeypress="return valideKey(event);">
                        </div>
                    </div>
                </div>
 
                

                <div class="col-md-12">
                    <div class="form-group">
                        <div class="col-md-12 text-center" style="font-size: 13px;">
                            <button name="agilizarPresupuesto" class="textos-botones td-btn button-type-fill vc_custom_1578019454908" style="margin:0 !important;" id='agilizarPresupuesto'  type="submit">Te llamamos ahora</button>
                        </div> 
                    </div> 
                </div> 
                <div class="col-md-12 text-center">
                          <div class='col-md-12 container'>
                            <div class="form-check form-check-inline">
                              <input type="checkbox" class="form-check-input" name="legal" id="legal" value="" onclick="tch(this, 'submit2')" checked="checked" required>
                              <label class="form-check-label" for="legal">   <a href="lopd.php" target="_blank" class="orange" title="Protegemos tus datos (aviso legal)"><span class='tinyFont'>He leído y acepto todas las condiciones
</span></a>
                              </label>
                            </div>
                          </div>
                        </div>
                <div style="overflow: scroll;height: 50px;padding: 10px;">
                    <a href="https://vo-traducciones.com/politica-de-privacidad/"><img src="https://vo-traducciones.com/wp-content/uploads/2020/07/rgdp.png"></a> 
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
       
      </div>
      
    </div>
  </div>
</div>
<style>

@media (max-width: 450px){
.ocultar{
  display:none;
	}
}

.color-iconos{
  color: #1e6cb6}
.relas:hover{
cursor: pointer;
}
.main-menu-area > a{
    font-size: 15px !important;
}
.bordes{
background-color: #fff0 !important;
border:0 !important;
}
</style>
