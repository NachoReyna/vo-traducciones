<?php
/*
Template Name: tanks page general
*/

get_header();?>

<div class="row">
    <div class="container">
      <div class="container" id="alertMessages">
             
        <section class="estilo-general-cotizados">
           <div class="row">
                <div class="col-md-12 col-sm-12 col-sm-12 no-gutters mt-3">
                  <div class="alert alert-warning alert-dismissible fade show text-center " role="alert">
                  <strong style="font-size:18px;">Tu solicitud de presupuesto ha sido enviada. ¡Gracias!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                  </div>
                </div>
              </div>
            </div>
          <section class="presupuestador-step1 mb-5 mt-5">
            <div class="stepper-content">
              <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 no-gutters">
                  <div class="home_1">
                    <div class="col-md-12 home_2">
                        <h3 class="text-center home_3">¿Quieres un descuento en tu presupuesto final? </h3>
                    </div>
                    <div class="col-md-12 m-3">
                      <div class='col-md-12 text-center p-2'>
                        <!--p><i class='fa fa-check-circle-o text-success fa-4x'></i></p-->
                        <p><strong>Incluye en tu solicitud estos 2 descuentos para aplicarlos en tu presupuesto</strong></p>
                        <div class="col-md-12 col-12 text-center">
                              <div class="form-check">
                                <span class="presulario">
                                  <h5 style="color: #17a2b8!important;"><strong class="disscount">*Incluir descuentos en el presupuesto.</strong></h5>
                                </span>
                              </div>
                              <div class="form-check">
                                <p><input class="form-check-input" type="checkbox" name="newClient" id="newClient" value="1" checked="">
                                <label class="form-check-label" for="newClient">-5% si eres cliente nuevo.</label></p>
                              </div>
                              <div class="form-check">
                                <p><input class="form-check-input" type="checkbox" name="online" id="online" value="1" checked="">
                                <label class="form-check-label" for="online">-5% por solicitar vía web.</label></p>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6 text-center" style="font-size: 13px;"> 
                                        <a name="agilizarPresupuesto" class="textos-botones td-btn button-type-fill vc_custom_1578019454908" id="agilizarPresupuesto" style="font-size: 18px;width: 400px;color:#fff;background-color: #ce1a1a !important;" href="/">No Gracias </a>
                                    </div> 
                                    <div class="col-md-6 text-center" style="font-size: 13px;">
                                        <button name="agilizarPresupuesto" class="textos-botones td-btn button-type-fill vc_custom_1578019454908" id="agilizarPresupuesto" type="submit" style="font-size: 18px;    width: 400px;">Enviar Descuentos</button>
                                    </div> 
                              </div> 
                            </div> 
                        </div>
                      </div>
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
<?php get_footer(); ?>
