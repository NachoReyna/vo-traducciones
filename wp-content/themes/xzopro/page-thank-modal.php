<?php
/*
Template Name: tanks page modals
*/
get_header();?>
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


      <section class="presupuestador-step1">
        <div class="stepper-content">
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 no-gutters">
              <div class="home_1">
                <div class="col-md-12 home_2">
                  <h3 class="text-center home_3">¿Quiéres un descuento en tu presupuesto final? </h3>
                </div>
                <div class='col-md-12 text-center presulario'>
                <h2 class='nobg'>¡Gracias por ayudarnos a ir más rápido!</h2>
                <p><i class='fa fa-check-circle-o text-success fa-4x'></i></p>
                <p><strong> En breve recibirás el presupuesto final. Te hemos enviado un email con un número de referencia,<br> asegúrate de que no está en SPAM.</strong></p>
                <p>Gracias por confiar en V.O. Traducciones, te responderemos a la mayor brevedad posible.<br>Te hemos enviado un email con un número de referencia, asegúrate de que no está en SPAM.</p>
              
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
