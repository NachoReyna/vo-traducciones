<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Xzopro
 */

?>
<div id="mensaje" class="elemt">
    <div class="container">
        <div class="row text-center d-flex justify-content-center align-items-center">
            <div class="col-md-2"><button type="button" class="btn estilo-boton-aceptar" id="cerrar">Aceptar</button></div>
            <div class="col-md-2"><a type="button" href="/politica-de-cookies/" class="btn estilo-boton-aceptar" id="cerrar">Configurar</a></div>
            <div class="col-md-8"><p id="boton01" class="tamano-parrafos tamano-aviso"></p></div>
        </div>
    </div>
</div>
	</div><!-- #content -->

	<footer id="colophon" class="site-footer">

        <?php if(is_active_sidebar('footer-widget')) :?>
        <div class="footer-top-area">
            <div class="container">
                <div class="row">
                    <?php dynamic_sidebar( "footer-widget" ) ?>
                </div>
            </div>
        </div>
        <?php endif;?>

        <?php
            $footer_bottom_menu = wp_nav_menu(
                array (
                    'echo' => FALSE,
                    'fallback_cb' => '__return_false',
                    'theme_location' => 'footer-bottom-menu',
                )
            );

            if(!empty ( $footer_bottom_menu )){
                $footer_btm_col_class = 'col-lg-6 col-md-12 order-lg-first order-last';
            }else{
                $footer_btm_col_class = 'col-lg-12 text-center';
            }
        ?>


        <div class="footer-bottom-area">
            <div class="container">
                <div class="row">
                    <div class="<?php echo esc_attr($footer_btm_col_class);?>">
                        <div class="site-info">Servicios de Traductor profesionales | Agencia de traducción  | © VO Traducciones

                        </div><!-- .site-info -->
                    </div>

                    <?php if ( ! empty ( $footer_bottom_menu ) ) :?>
                    <div class="col-lg-6 col-md-12">
                        <?php
                        wp_nav_menu( array(
                            'theme_location' => 'footer-bottom-menu',
                            'menu_id'        => 'footer-bottom-menu',
                            'container_class' => 'footer-bottom-menu-container'
                        ) );
                        ?>
                    </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
	</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>

<script>
$(document).ready(function(){
    var textos = 'Este sitio web utiliza Cookies propias y de terceros, para recopilar información '+
    'con la finalidad de mejorar nuestros servicios, para mostrarle publicidad relacionada con sus '+
    'preferencias, así como analizar sus hábitos de navegación. Si continua navegando, supone la '+
    'aceptación de la instalación de las mismas. El usuario tiene la posibilidad de configurar su '+
    'navegador pudiendo, si así lo desea, impedir que sean instaladas en su disco duro, aunque deberá '+
    'tener en cuenta que dicha acción podrá ocasionar dificultades de navegación de la página web.'
    $('#boton01').text(textos); 
      $("#cerrar").click(function(){
        $('.elemt').delay( 800 ).fadeOut( 800 ).hide();
	});
var visto =  jQuery.cookie("avisoCookies");                             
if(visto!=1) {
    jQuery.cookie('avisoCookies', '1', {expires: 7 });
    jQuery('.elemt').show();
    jQuery('.cookies_manifest > a').click(function() {
      jQuery('#cookies').remove();
  });
  }else{
    jQuery('#mensaje').hide();
  }
});
</script>
</body>
</html>
<style>
.textos-botones {
    background-color: #1f6db7 !important;
}
.elemt {
    position: fixed;
    bottom: 0;
    width: 100%;
    background: #000000cc;
    padding: 20px 10px;
    color: #fff;
    z-index:200;
}

.tamano-parrafos{
    font-size:10px;
    line-height:10px;
    margin: 0;
}

.tamano-aviso{
    overflow: auto;
    height: 30px;
}

.estilo-boton-aceptar{
    background-color: #5a8c5a;
    border: solid #5a8c5a;
    border-radius: 0;
    width: 100%;
    height: 40px;
    color: #fff;
}
</style>
<script src="<?php bloginfo('template_url');?>/assets/js/jquery.mask.js"></script>
<script>
$( document ).ready(function() {
    var pathname = window.location.pathname;
    $('#fechaFormularios').attr('value',pathname);
});

$(document).ready(function(){
  $('.date').mask('00/00/0000');
  $('.time').mask('00:00:00');
  $('.date_time').mask('00/00/0000 00:00:00');
  $('.cep').mask('00000-000');
  $('.phone').mask('0000-0000');
  $('.phone_with_ddd').mask('(00) 0000-0000');
  $('.phone_us').mask('(000) 000-0000');
  $('.mixed').mask('AAA 000-S0S');
  $('.cpf').mask('000.000.000-00', {reverse: true});
  $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
  $('.money').mask('000.000.000.000.000,00', {reverse: true});
  $('.money2').mask("#.##0,00", {reverse: true});
  $('.ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
    translation: {
      'Z': {
        pattern: /[0-9]/, optional: true
      }
    }
  });
  $('.ip_address').mask('099.099.099.099');
  $('.percent').mask('##0,00%', {reverse: true});
  $('.clear-if-not-match').mask("00/00/0000", {clearIfNotMatch: true});
  $('.placeholder').mask("00/00/0000", {placeholder: "__/__/____"});
  $('.fallback').mask("00r00r0000", {
      translation: {
        'r': {
          pattern: /[\/]/,
          fallback: '/'
        },
        placeholder: "__/__/____"
      }
    });
  $('.selectonfocus').mask("00/00/0000", {selectOnFocus: true});
});
</script>
<script>
$("#nombre").keyup(function(){              
        var ta      =   $("#nombre");
        letras      =   ta.val().replace(/ /g, "");
        ta.val(letras)
}); 
$("#telefono").keyup(function(){              
        var ta      =   $("#telefono");
        letras      =   ta.val().replace(/ /g, "");
        ta.val(letras)
});
$("#idioma").keyup(function(){              
        var ta      =   $("#idioma");
        letras      =   ta.val().replace(/ /g, "");
        ta.val(letras)
}); 
$("#correo").keyup(function(){              
        var ta      =   $("#correo");
        letras      =   ta.val().replace(/ /g, "");
        ta.val(letras)
}); 



function valideKey(evt){
    
    // code is the decimal ASCII representation of the pressed key.
    var code = (evt.which) ? evt.which : evt.keyCode;
    
    if(code==8) { // backspace.
      return true;
    } else if(code>=48 && code<=57) { // is a number.
      return true;
    } else{ // other keys.
      return false;
    }
}
</script>