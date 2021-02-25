<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Xzopro
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php
        $enable_preloader = xzopro_option('enable_preloader');
        if(is_page() && get_post_meta($post->ID, 'header_meta', true)) {
            $header_meta = get_post_meta($post->ID, 'header_meta', true);
        } else {
            $header_meta = array();
        }


        $default_header_style = xzopro_option('header_style');

        if(array_key_exists('page_header', $header_meta) && $header_meta['page_header'] != 'default') {
            $header_style = $header_meta['page_header'];
        } elseif(!empty($default_header_style)) {
            $header_style = xzopro_option('header_style');
        }else{
            $header_style = '1';
        }

        wp_head();
    ?>
<script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
            ga('create', 'UA-20351850-1', 'vo-traducciones.com');
            ga('require', 'displayfeatures');
            ga('send', 'pageview');
        </script>
        <!-- Hotjar Tracking Code for http://www.vo-traducciones.com -->
        <script>
            (function(h,o,t,j,a,r){
                h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
                h._hjSettings={hjid:704710,hjsv:6};
                a=o.getElementsByTagName('head')[0];
                r=o.createElement('script');r.async=1;
                r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
                a.appendChild(r);
            })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
        </script>
<!-- Start of Async Drift Code -->
<script>
"use strict";
!function() {
  var t = window.driftt = window.drift = window.driftt || [];
  if (!t.init) {
    if (t.invoked) return void (window.console && console.error && console.error("Drift snippet included twice."));
    t.invoked = !0, t.methods = [ "identify", "config", "track", "reset", "debug", "show", "ping", "page", "hide", "off", "on" ], 
    t.factory = function(e) {
      return function() {
        var n = Array.prototype.slice.call(arguments);
        return n.unshift(e), t.push(n), t;
      };
    }, t.methods.forEach(function(e) {
      t[e] = t.factory(e);
    }), t.load = function(t) {
      var e = 3e5, n = Math.ceil(new Date() / e) * e, o = document.createElement("script");
      o.type = "text/javascript", o.async = !0, o.crossorigin = "anonymous", o.src = "https://js.driftt.com/include/" + n + "/" + t + ".js";
      var i = document.getElementsByTagName("script")[0];
      i.parentNode.insertBefore(o, i);
    };
  }
}();
drift.SNIPPET_VERSION = '0.3.1';
drift.load('52kga8fe5vgi');
</script>
<!-- End of Async Drift Code -->
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NDL4QLC');</script>
<!-- End Google Tag Manager -->
</head>

<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NDL4QLC"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div id="page" class="site active-header-<?php echo esc_attr($header_style); ?>">
    <?php if($enable_preloader == true) : ?>
    <!-- Preeloader -->
    <div id="loader-wrapper">
        <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
    <?php endif;?>

	<header class="site-header header-style-<?php echo esc_attr($header_style); ?>">
        <?php get_template_part( 'template-parts/header/header', ''.esc_attr($header_style).'' );?>
	</header><!-- #masthead -->
	<div id="content" class="site-content">
<!-- Button trigger modal -->
<!--button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">
  Launch demo modal
</button-->

<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      
  </div>
  <div class="modal-content">
       <form action="https://vo-traducciones.com/wp-content/themes/xzopro/procesa-app-llamadas.php" method="get" enctype="multipart/form-data">
            <div class="home_1">
                <div class="col-md-12 home_2 text-center">
                    <h4 class="text-center home_3">¿Hablamos por teléfono?</h4>
                    <p style="color: #fff;">La llamada es gratis y, sobre todo, muy ágil</p>
                </div>
                <div class="col-md-12">
                    <div class="container">
                        <div class="form-group row d-flex justify-content-center">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-md-12 text-center">
                                    <input type="text" name="nombre" id="nombre" placeholder="Nombre*">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-md-12 text-center">
                                    <input type="text" name="telefono" id="telefono" placeholder="Teléfono*">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-md-12 text-center" style="font-size: 13px;">
                                        <button name="agilizarPresupuesto" class="textos-botones td-btn button-type-fill" id=''  type="submit">Te Llamamos Ahora</button>
                                    </div> 
                                </div> 
                            </div> 
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-md-12 text-center" style="font-size: 13px;">
                                        <div class='col-md-12 container'>
                                        <div class="form-check form-check-inline">
                                        <input type="checkbox" class="form-check-input" name="legal" id="legal" value="" checked="checked" required>
                                        <label class="form-check-label" for="legal">   <a href="lopd.php" target="_blank" class="orange" title="Protegemos tus datos (aviso legal)"><span class='tinyFont'>Protegemos tus datos (aviso legal)</span></a>
                                        </label>
                                        </div>
                                        </div>
                                    </div> 
                                </div> 
                            </div> 
                            <div style="overflow: scroll;height: 50px;padding: 10px;">
                                <a href="https://vo-traducciones.com/politica-de-privacidad/"><img src="https://vo-traducciones.com/wp-content/uploads/2020/07/rgdp.png"></a> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </form>
  </div>
</div>

