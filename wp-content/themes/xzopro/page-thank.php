<?php
/*
Template Name: tanks page llamadas
*/
//appllamadas-gracias/
get_header();
global $wp;
global $wpdb;
global $upload_dir;
$referer=home_url( $wp->request );
$referer = empty($referer) ? 'index.php' : $referer;
$date_mysql = date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME']);
$ip = $_SERVER['REMOTE_ADDR'];
$upload_dir = wp_upload_dir();
$upload_dir = $upload_dir['baseurl'];
$upload_dir=$upload_dir.'/'.date('Y').'/'.date('m');
$wids= $_GET['id'];


/* Funciona correo presupuestador-step3 */
if(isset($_POST['agilizarPresupuesto'] )){
 
  $newClient = $_POST['newClient'];
  $online = $_POST['online'];
 
   if($newClient == 1){
    $newClientNew = 'SI';
   }else{
    $newClientNew = 'No';
   }

   if($online == 1){
    $onlineNew = 'Si';
   }else{
    $onlineNew = 'No';
   }

    //$msg .= "<br>Teléfono : $phone \r\n";
    $msg .= "<br>---Descuentos:--- \r\n"; //Title
    $msg .= "<br>Nuevo cliente: $newClientNew \r\n";
    $msg .= "<br>Solicito váa web: $onlineNew \r\n";
    $msg .= "<br>---Información del Usuario--- \r\n"; //Title
    //$msg .= "<br>IP : $ip \r\n"; //Sender's IP
    //$msg .= "<br>Página de procedencia : $referer"; //Referrer
   
      $subject = 'Solicitud de Presupuesto W' . $wids;
      $subject = '=?UTF-8?B?' . base64_encode($subject) . '?=';
      $header = "From: V.O. Traducciones <vo@vo-traducciones.com>\r\n";
      $header .= "Reply-To: V.O. Traducciones <vo@vo-traducciones.com>\r\n";
      $header .= "Content-type: text/html; charset=UTF-8\r\n";
      $header .= "Content-Transfer-Encoding: 8bit\r\n";
    if (wp_mail('vo@vo-traducciones.com, ricardo.perezdecastro@gmail.com, mark.schuback@gmail.com, ignacioreyna56@gmail.com', $subject, $msg, $header,$adjtunto)) {
      $contact = ' Solicitud y archivo(s) enviados correctamente';?>
      <script>
      window.location.replace("https://vo-traducciones.com/appllamadas-gracias-descuentos-enviados/");
      </script>
    <?php } else {
      $contact = 'No hemos podido mandar su mensaje, por favor, inténtelo de nuevo.';
    }
  } else {
  $contact = $fileError;
  }
?>
<script src="http://vo-traducciones.com/wp-content/uploads/jquery.js"></script>
<script src="http://vo-traducciones.com/wp-content/uploads/myScript.js"></script>
<script src="http://vo-traducciones.com/wp-content/uploads/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="http://vo-traducciones.com/wp-content/uploads/myStyles.css">
<link rel="stylesheet" type="text/css" href="http://vo-traducciones.com/wp-content/uploads/jquery-ui.css">

<?php $contact = 'Hola'; ?>
<div class="row">
<div class="container">
<section class="estilo-general-cotizados">
  <div class='container' id='alertMessages'>
    <div class='row'>
      <div class='col-md-12 col-sm-12 col-sm-12 no-gutters'>
        <div class='alert alert-warning alert-dismissible fade show text-center ' role='alert'>
        <strong style='font-size:18px;'>Tu solicitud de presupuesto ha sido enviada. ¡Gracias!</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
        </div>
      </div>
    </div>
  </div>

<!-- Modal Traducciones -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header">
    <h3 class="modal-title"  id="exampleModalLabel">Solicitud enviada</h3>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
      <h2 class='nobg'>Tu solicitud ha sido enviada correctamente<br/><b>¡Gracias!</b></h2>
      <p><i class='fa fa-check-circle-o text-success fa-5x'></i></p>
      <p><strong>En breve recibirás el presupuesto final.</strong></p>
      <p><strong><?php echo $contact; ?> </strong></p>
      <p>Te hemos enviado un email con un número de referencia, asegúrate de que no está en SPAM.</p>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary">Save changes</button>
  </div>
</div>
</div>
</div>
<!-- Modal final traducciones -->
<section class="presupuestador-step1">
<div class="stepper-content">
<div class="row">
  <div class="col-sm-12 col-md-12 col-lg-12 no-gutters">
    <div class="home_1">
      <div class="col-md-12 home_2">
        <h3 class="text-center home_3">¿Quieres un descuento en tu presupuesto final?</h3>
      </div>
      <?php echo $_POST['agilizarPresupuesto']; ?>
      <div class="col-md-12">
        <?php if(!isset($_POST['agilizarPresupuesto'])) :?>
        <div class='col-md-12 text-center'>
          <!--p><i class='fa fa-hourglass-half text-success fa-4x'></i></p-->
          <h4>Incluye en tu solicitud estos 2 descuentos para aplicarlos en tu presupuesto</h4>
          <form action="#datos-enviados" method="post" enctype="multipart/form-data">
            <fieldset>
              <div class='col-md-12 col-12 text-center'>
                <div class="form-check">
                  <!--span class='presulario'>
                    <h5><strong class="disscount">* Aplicar Descuentos</strong></h5>
                  </span-->
                </div>
                <div class="form-check">
                  <p><input class="form-check-input" type="checkbox" name="newClient" id="newClient" value="1">
                  <label class="form-check-label" for="newClient"> - 5% si eres cliente nuevo</label></p>
                </div>
                <div class="form-check">
                  <p><input class="form-check-input" type="checkbox" name="online" id="online" value="1">
                  <label class="form-check-label" for="online"> - 5% por solicitar vía web</label></p>
                </div>
                <div class="">
                  <p><strong>Ayúdanos a entregarte tu presupuesto final lo antes posible</strong></p>
                  <span>Adjunta el o los archivos que quieres traducir para agilizar la entrega del presupuesto final.</span>
                </div>
              </div>
              <div class='form-group'>
                <div class="col-md-12">
                  <label for=""><h3 class="text-info">Selecciona tu archivo</h3></label>
                </div>
                <!--div class='col-md-12'>
                  <input type="file" name="doc" id="doc" /><input type="hidden" name="email" value="<?php echo $email; ?>">
                  <input type="text" required name="wids" id="wids" hidden value="<?php echo $wid; ?>">
                </div>
                <div class='col-md-12'>
                  <small>* Si tienes más de un documento, comprímelo en ZIP.</small>
                </div-->
              </div>
              <!--input type="hidden" name="date" value="<?php echo $dateout; ?>">
              <input type="hidden" name="id" value="<?php echo $id; ?>">
              <input type="hidden" name="email" value="<?php echo $email; ?>">
              <input type="hidden" name="phone" value="<?php echo $phone; ?>"-->
              <!--div class='row text-left'>
                <div class='col-md-12 text-center'>
                  <small>Te hemos enviado un email con un número de referencia, <br>asegúrate de que no está en SPAM.</small>
                </div>
                <div class='col-md-12 text-center'>
                  <small>* Tamaño máximo: 15Mb. Para archivos mayores: <a href='mailto:vo@vo-traducciones.com?subject=V.O. Traducciones: W<?php if(isset($id)){echo $id;}?>' title="vo@vo-traducciones.com"> vo@vo-traducciones.com</a></small>
                </div>
              </div-->
              <div class='row justify-content-center' id="agilizarActions">
                <div class='col-md-4 send'>
                  <a href="/" id="noGracias" class="noSend btn btn-danger" title="no gracias">No Gracias</a>
                </div>
                <div class='col-md-4 send'>
                  <button name="agilizarPresupuesto" class="" id='agilizarPresupuesto' method="post"  type="submit">Enviar Descuentos</button>
                </div>
              </div>
            </fieldset>
          </form>
        </div>
      <?php endif; ?>
      <?php if($uploadedFile && !isset($fileError)) : ?>
      <div class='col-md-12 text-center presulario'>
      <h2 class='nobg'>¡Gracias por ayudarnos a ir más rápido!</h2>
      <p><i class='fa fa-check-circle-o text-success fa-4x'></i></p>
      <!--p><strong><?php echo $contact; ?> </strong></p-->
      <p><strong> En breve recibirás el presupuesto final. Te hemos enviado un email con un número de referencia,<br> asegúrate de que no está en SPAM.</strong></p>
      <p>Gracias por confiar en V.O. Traducciones, te responderemos a la mayor brevedad posible.<br>Te hemos enviado un email con un número de referencia, asegúrate de que no está en SPAM.</p>
      </div>
      <?php endif; ?>
      </div>
    </div>
  </div>
</div>
</div>
</section>
</div>
</section>
</div>
</div>
<style media="screen">
.estilo-general-cotizados{
padding-top: 50px;
font-family: "Poppins", sans-serif !important;
}
.home_1 {
border-radius: 5px !important;
box-shadow: 0px 1px 5px 0px !important;
background: #f5f5f5 !important;
}
.home_2{
padding: 10px;
background: #0A6CB6;
border-radius: 5px 5px 0px 0px;
margin-bottom: 1rem;
}
.no-gutters{
padding: 0;
margin: 0;
}
.texto-forms{
font-size: 12px;
text-align: center;
}
.xzopro-vc-disable {
padding: 50px 0 !important;
}
.labels-formulario{
font-size: 18px !important;
}
.textos-prod-descrip {
height: 45px;
overflow-y: scroll;
font-size:12px;
}
.color-boton-igualar{
background-color:  #0A6CB6 !important;
border: #0A6CB6 1px solid !important;
}
.totalsd{
font-size: 20px;
color: #4e526f !important;
}
.totalcd{
font-size: 23px;
color: #65b733 !important;
}
button{
text-transform: none !important;
}
</style>
<?php
get_footer();
?>
