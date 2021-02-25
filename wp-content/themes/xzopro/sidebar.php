<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Xzopro
 */
?>

<?php if(is_active_sidebar( 'sidebar-1' )) : ?>
<div class="col-lg-4 col-xs-12">
    <div class="verde-boton">
        <div class="btn_presupuestador wpb_column vc_column_container vc_col-sm-12" id="traducciones">
            <div class="vc_column-inner">
                <div class="wpb_wrapper">
                    <div class="wpb_text_column wpb_content_element ">
                        <div class="wpb_wrapper text-center">
                            <h3 class="color-green">Traducción a más de 80 idiomas</h3>
                            <p class="estilo-parrafo-slide"><span  class="color-green"><strong>Obtén un presupuesto online en menos de 6 clics</strong></span></p>
                            <p><span style="color: #ffffff;"><a href="https://vo-traducciones.com/presupuesto/" onclick="_gaq.push(['_trackEvent('Interacciones', 'BotónBlog', 'página-procedencia'))" class="btn_verde" target="_blank" style="color: #ffffff;" > ¿A qué idioma quieres traducir? </a></span></p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<style>

.color-green{
    color: #008000;
}

.estilo-parrafo-slide{
    text-align: center; 
    font-size: 16px;
}

.verde-boton{
	width: 100%;
    padding: 15px;
    display: flex;
    margin: auto;
    margin-top: auto;
    margin-bottom: auto;
    background: #DFF0D8;
    border-radius: 5px;
    box-shadow: 0px 0px 0px !important;
	margin-bottom: 20px;
    border-radius: 0;
    padding-top: 50px;
    padding-bottom: 50px;    margin-top: 30px;
}
</style>
	<aside class="sidebar-widget-area">
		<?php dynamic_sidebar( 'sidebar-1' );?>
	</aside>
</div>
<?php endif; ?>
