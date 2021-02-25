<?php
/*
Template Name: page presupuestador
*/
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
          function post($key = null, $filter = FILTER_SANITIZE_STRING)
          {
            if (!$key) {
              return $filter ? filter_input_array(INPUT_POST, $filter) : $_POST;
            }
            if (isset($_POST[$key])) {
              return $filter ? filter_input(INPUT_POST, $key, $filter) : $_POST[$key];
            }
          }
          function get($key = null, $filter = FILTER_SANITIZE_STRING)
          {
            if (!$key) {
              return $filter ? filter_input_array(INPUT_GET, $filter) : $_GET;
            }
            if (isset($_GET[$key])) {
              return $filter ? filter_input(INPUT_GET, $key, $filter) : $_GET[$key];
            }
          }


          function reemplazo($url = null)
          {
            $table = [
              'Á' => 'A',
              'Ç' => 'c',
              'É' => 'e',
              'Í' => 'i',
              'Ñ' => 'n',
              'Ó' => 'o',
              'Ú' => 'u',
              'á' => 'a',
              'ç' => 'c',
              'é' => 'e',
              'í' => 'i',
              'ñ' => 'n',
              'ó' => 'o',
              'ú' => 'u',
            ];
            $url = strtr($url, $table);
            //Añadimos los guiones
            $url = strtolower(trim($url));
            $url = preg_replace('/[^a-z0-9-.]/', '-', $url);
            $url = preg_replace('/-+/', '-', $url);
            return $url;
            unset($url, $table);
          }

          function language($lang)
          {
            if ($lang == 'es') {
              $lang = 'Español';
            } elseif ($lang == 'en') {
              $lang = 'Inglés';
            } elseif ($lang == 'ca') {
              $lang = 'Catalán';
            } elseif ($lang == 'ga') {
              $lang = 'Gallego';
            } elseif ($lang == 'fr') {
              $lang = 'Francés';
            } elseif ($lang == 'eu') {
              $lang = 'Euskera';
            } elseif ($lang == 'al') {
              $lang = 'Alemán';
            } elseif ($lang == 'ar') {
              $lang = 'Árabe';
            } elseif ($lang == 'bu') {
              $lang = 'Búlgaro';
            } elseif ($lang == 'ce') {
              $lang = 'Checo';
            } elseif ($lang == 'ch') {
              $lang = 'Chino';
            } elseif ($lang == 'da') {
              $lang = 'Danés';
            } elseif ($lang == 'fi') {
              $lang = 'Finés';
            } elseif ($lang == 'gr') {
              $lang = 'Griego';
            } elseif ($lang == 'ho') {
              $lang = 'Holandés';
            } elseif ($lang == 'it') {
              $lang = 'Italiano';
            } elseif ($lang == 'ja') {
              $lang = 'Japonés';
            } elseif ($lang == 'ma') {
              $lang = 'Mallorquín';
            } elseif ($lang == 'po') {
              $lang = 'Polaco';
            } elseif ($lang == 'pg') {
              $lang = 'Portugés';
            } elseif ($lang == 'rm') {
              $lang = 'Rumano';
            } elseif ($lang == 'ru') {
              $lang = 'Ruso';
            } elseif ($lang == 'su') {
              $lang = 'Sueco';
            } elseif ($lang == 'va') {
              $lang = 'Valenciano';
            }
            return $lang;
          }

          function ppp($languageA, $languageB, $type){
              $price = NULL;
              if($languageA=='es' || $languageB=='es') {
                  $language = $languageA . $languageB;
                  if($type == 'tech') {
                      $min = 40;
                      if($language=='esar' || $language=='esru' || $language=='daes' || $language=='fies' || $language=='hoes' || $language=='poes') {
                          $price = 0.168;
                      } elseif($language=='esda' || $language=='esfi' || $language=='esho' || $language=='essu' || $language=='esbu' || $language=='esce' || $language=='esrm' || $language=='esgr' || $language=='espo') {
                          $price = 0.17;
                          $min = 65;
                      } elseif($language=='ares' || $language=='bues' || $language=='sues' || $language=='cees' || $language=='gres' || $language=='rmes' || $language=='rues') {
                          $price = 0.178;
                      } elseif($language=='ales' || $language=='ites' || $language=='pges' || $language=='esal' || $language=='esit' || $language=='espg' || $language=='caes' || $language=='eues' || $language=='vaes' || $language=='gaes' || $language=='maes') {
                          $price = 0.115;
                      } elseif($language=='esca' || $language=='eseu' || $language=='esga'  || $language=='esva'  || $language=='esma') {
                          $price = 0.11;
                      } elseif($language=='esch' || $language=='esja' || $language=='ches' || $language=='jaes') {
                          $price = 0.2;
                      } elseif($language=='esfr' || $language=='esen' || $language=='fres' || $language=='enes') {
                          $price = 0.099;
                      }
                  } elseif($type == 'jur') {
                      $min = 50;
                      if($language=='esda' || $language=='esfi' || $language=='esho' || $language=='espo' || $language=='essu' || $language=='esar' || $language=='esbu' || $language=='esce' || $language=='esgr' || $language=='esrm' || $language=='esru') {
                          $price = 0.178;
                      } elseif($language=='daes' || $language=='fies' || $language=='hoes' || $language=='sues' || $language=='poes' || $language=='ares' || $language=='bues' || $language=='cees' || $language=='gres' || $language=='rmes' || $language=='rues') {
                          $price = 0.189;
                      } elseif($language=='caes' || $language=='eues' || $language=='vaes' || $language=='gaes' || $language=='maes') {
                          $price = 0.13;
                      } elseif($language=='ites' || $language=='pges') {
                          $price = 0.15;
                      } elseif($language=='esch' || $language=='esja' || $language=='ches' || $language=='jaes') {
                          $price = 0.3;
                      } elseif($language=='esfr' || $language=='esen') {
                          $price = 0.115;
                      } elseif($language=='fres' || $language=='ales' || $language=='enes' || $language=='esca' || $language=='eseu' || $language=='esga' || $language=='esva'  || $language=='esma' || $language=='esal' || $language=='esit' || $language=='espg') {
                          $price = 0.126;
                      }
                  }
              }
              return array($price,$min);
          }
          function pppc($languageA, $languageB, $type){
            $direct = ppp($languageA, 'es', $type);
            $min=$direct[1];
            $direct = $direct[0];
            $inverse = ppp('es', $languageB, $type);
            $inverse = $inverse[0];
            $price = $direct + $inverse - ((($direct + $inverse)*25)/100);
              return array($price,$min);
          }


            if(isset($_POST['presupuestar'])){
                $type=$_POST['trad'];
                $presupuestoType=$type == 'tech' ? 'Normal' : 'Jurada';

                
            if(isset($_POST['language'],$_POST['language2'] ) ){
                $fromLanguage=language($_POST['language']);
                $toLanguage= language($_POST['language2']);
            }
              $errors="";
              $contact="";
              if (!empty($_POST['text'])) {
                $text = post('text');
                $numwords = str_word_count($text, 0);
              }
              if (!empty($_POST['number']) && $_POST['number'] != 'ej, 856, 1000, 1235') {
                if (!filter_var(post('number', FILTER_SANITIZE_NUMBER_INT), FILTER_VALIDATE_INT)) {
                  $errors .= 'El número de palabras, debe ser un número entero.<br>';
                } else {
                  $numwords = post('number', FILTER_SANITIZE_NUMBER_INT);
                }
              }


              if($numwords){
                $fn = 'analytics.txt';
                if (file_exists($fn)) {
                    $counter = file_get_contents($fn, true);
                    $counter = $counter + 1;
                    $fp = fopen($fn, 'w');
                    fputs($fp, $counter);
                    fclose($fp);
                }

              }
              else{
                $errors .= 'Por favor, introduce el texto a traducir o el número de palabras, ';
              }

              $languageA=$_POST['language'];
              $languageB=$_POST['language2'];

              if ($languageA== 'es' || $languageB == 'es') {
                  $priceArray = ppp($languageA, $languageB, $type);

                  $price = $priceArray[0];
                  $min = $priceArray[1];
              } else {
                  $priceArray = pppc($languageA, $languageB, $type);

                  $price = $priceArray[0];
                  $min = $priceArray[1];
              }

              if (!$errors && isset($numwords, $price, $min)) {
                  $total = round($price * $numwords, 2);
                  $total = ($total < $min) ? $min : $total;
                  $total = str_replace('.', ',', $total);
                  if ($total) {
                      //calculating discouts
                      $total5 = number_format($total - (($total * 5) / 100), 2, ',', '');
                      $total10 = number_format($total - (($total * 10) / 100), 2, ',', '');
                  }
               $step2=true;
              } else {
                  $contact = $errors;
              }

                /*$lang=$fromLanguage. ' a '.$toLanguage;
                $newdb = new wpdb('votraduc_admin', '}L@3Yyc2^[i%', 'votraduc_traducciones', 'localhost');
                echo ($newdb->postmeta);
                $sql = " INSERT INTO `traducciones` (`id`, `mail`, `phone`, `language`, `confidentiality`, `dateout`, `date`, `ip`, `referer`) 
                VALUES (NULL, '$email', '77667788', '$lang', 'null', '', '', '$ip', '$referer');";
                $result = $newdb->get_var($sql);
                $id=$wpdb->insert_id;*/

          //Inserta en Traducciones un registro de los datos primer paso
          $lang=$fromLanguage. ' a '.$toLanguage;
          $wpdb->insert('traducciones',array('mail'=>$email,
                                             'language'=> $lang ,
                                             'confidentiality' => null,
                                             'dateout' => $dateout ,
                                             'date'=> $date_mysql,
                                             'ip' => $ip ,
                                             'referer' => $referer));
          $id=$wpdb->insert_id;
            }

  /*Formulario funcion presupuestador-step3*/
  if(isset($_POST['presupuestoFinal'] ) ){
  $total = $_POST['t'];
  $total5 = $_POST['t5'];
  $total10 = $_POST['t10'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $numwords = $_POST['number'];
  $type = $_POST['type'];
  $dateout = $_POST['date'];
  $trad = $_POST['trad'];
  $type=$_POST['trad'];
  
  /*Descuento nuevo cliente*/
  $newClient=$_POST['newClient'];
  $fromLanguage=$_POST['languageA'];
  $toLanguage=$_POST['languageB'];


  //ID del ultimo registro que se hizo en base de datos
  $id=$_POST['id'];
  $idraducciones=$_POST['id'];

  
  $send = isset($_POST['send']) && $_POST['send'] == 1 ? 1 : 0;
 
  $sendText = isset($_POST['send']) && $_POST['send'] == 1 ? 'Incluir' : 'No incluir';
  if(isset($newClient) && $newClient == 1){
  $newClient=10;
  }else{
  $newClient=5;
  }
  if($newClient==10){
  $total=$total10;
  }else{
  $total=$total5;
  }

  $filesize = ($_FILES['doc']['size'] / 1024);
  if (empty($filesize)) {
  $fileError = "Tu solicitud ha sido enviada correctamente* ¡Gracias!";
  } elseif ($filesize > 16000) {
  $fileError = 'Lamentamos comunicarte que tu archivo pesa más de 15Mb (' . $filesize . 'Mb), por favor, envíanoslo mediante otro método. Pero no te preocupes, la solicitud le ha llegado perfectamente a nuestro equipo.';
  } else {
  if ( ! function_exists( 'wp_handle_upload' ) ) {
  require_once( ABSPATH . 'wp-admin/includes/file.php');
  }

  $moveFile=wp_handle_upload($_FILES['doc'], array('test_form' => FALSE));
  if ($moveFile  && !isset( $moveFile['error'] )){
  $download = $upload_dir.'/'.$_FILES['doc']['name'];
    } else {
    $fileError = 'No hemos podido enviar tu documento, pero la solicitud está entregada, nos encargaremos de pedirte los datos necesarios.';
    echo $fileError.'<br>';
    echo $moveFile['error'];
    }
  }
  //Correo A
  $msg = '<p>Hola,<br><br>';
  $msg .= "Antes que nada, gracias por tu tiempo. La referencia de tu solicitud es <strong>W$id</strong></p>";
  $msg .= "<p><ul><li><strong>Idioma</strong>: $fromLanguage a $toLanguage<br></li>";
  $msg .= "<li><strong>Palabras</strong>: $numwords<br></li>";
  $msg .= "<li><strong>€'s</strong>:$total<br></li>";
  $msg .= "<li><strong>Traducción</strong>: $type</p></li>";
  $msg .= '<p><strong>Promoción Exclusiva</strong></p>';
  $msg .= '<p>Asegurarse tener una traducción de calidad es muy sencillo. <strong>Y si además pagas menos, mejor</strong>.</p>';
  $msg .= '<p>Por eso, si nos encargas el trabajo de traducción de esta solicitud, te ofrecemos un <strong>10% de descuento en tu próxima traducción</strong>. Este descuento no tiene fecha de caducidad.</p>';
  $msg .= '<p>El único requisito es que esta sea <strong>la primera vez que disfrutas de esta promoción</strong>.</p>';
  $msg .= '<p>¿Tienes preguntas? Responde a este email con todas tus dudas, o llámanos al 91 445 44 16.</p>';
  $msg .= '<p>Trabajamos para satisfacer a todos nuestros clientes.</p>';
  $msg .= '<p>Saludos cordiales,<br>';
  $msg .= 'El equipo de  V.O. Traducciones</p>';
  $subject = 'Tu solicitud de presupuesto online (y una promoción exclusiva)';
  $header = "From: V.O. Traducciones <vo@vo-traducciones.com>\r\n";
  $header .= "Reply-To: V.O. Traducciones <vo@vo-traducciones.com>\r\n";
  $header .= "Content-type: text/html; charset=UTF-8\r\n";
 
  if (!wp_mail($email, $subject, $msg, $header)) {
  $correoNotSentUserPresu = 'No hemos podido enviar tu mensaje, inténtalo de nuevo más tarde.<br>';
  }

  //Correo B
  $msgb = '<p>Hola de nuevo,<br><br>';
  $msgb.= 'Estas son las preguntas más frecuentes de quienes nos solicitan un presupuesto de traducción. <strong> Esperamos te sean útiles</strong>.</p>';
  $msgb.= '<p><strong>¿Tenéis flexibilidad para ajustar el coste a mis necesidades particulares?</strong><br>';
  $msgb.= 'Si tienes un presupuesto ajustado o el <a href="http://www.vo-traducciones.com/presupuesto" target="_blank" title="Presupuesto que has generado online"> presupuesto que has generado online </a> no se ha <strong> adecuado a tus necesidades </strong> no dudes en hacérnoslo saber: llama al 91 445 44 16 o preferiblemente, envíanos el documento a traducir a <a href="mailto:vo@vo-traducciones.com" target="_blank">vo@vo-traducciones.com</a></p>';
  $msgb.= '<p><strong>¿Tengo descuentos por volumen de trabajo o por alguna otra razón?</strong><br>';
  $msgb.= 'Tenemos diferentes tipos de descuentos. Responde a este <a href= "http://www.vo-traducciones.com/traduccion-profesional-descuentos.php" title="Correo">correo</a> y dinos el número aproximado de palabras a traducir por mes.</p>
  <p><strong>¿Cómo protegéis la privacidad de mi documentación?</strong><br>
  Tenemos acuerdos de confidencialidad con nuestros traductores. Además, contamos con tecnología de encriptación para el intercambio de información vía emails.</p>
  <p><strong>¿Cuál es el cargo mínimo por trabajo de traducción?</strong><br>
  Independiente del número de palabras, se cobrará un mínimo de: <br>
  <ul>
  <li> €40 por traducción No Jurada</li><br>
  <li> €50 por traducción Jurada </li> 
  </ul></p>
  <p><strong> Mi traducción es urgente ¿Cómo calculáis el precio?</strong><br>
  Una traducción urgente es en general la que se tiene que entregar el mismo día que se solicita o que tiene un volumen de traducción de más de 2,500 palabras/día laborable. Para estos encargos aplicamos un <strong> recargo aproximado de 25% </strong> sobre la tarifa estándar.</p>
  <p> Si tienes otras preguntas no dudes en contactarnos en el Tlf: 91 445 4416 (o responde a este correo).</p>
  <p> Saludos cordiales,<br>
  El equipo de V.O. Traducciones</p>';
  $subject = "Descuentos, Privacidad, Precio Final: ¿Tienes preguntas sobre éstos u otros temas?";
  $header = "From: V.O. Traducciones <vo@vo-traducciones.com>\r\n";
  $header .= "Reply-To: V.O. Traducciones <vo@vo-traducciones.com>\r\n";
  $header = "Content-type: text/html; charset=UTF-8\r\n";

  if(!wp_mail($email, $subject, $msgb, $header))
  $correoNotSentUserPromo .= '<br> No hemos podido enviar tu mensaje, inténtalo de nuevo más tarde.';
  $date = date('d-m-Y H:i:s', $_SERVER['REQUEST_TIME']);
  $msg = "<br><strong>Email:</strong> $email \r\n";//add sender's email to the message

  if (!empty($_FILES['doc']['size'])) {
    //Cambio nombre
     //Cambio de nombre WP
    $search  = array('(', ')');
    $nombreLimpieza = str_replace(" ", "-",$download);
    $nombreNuevo = str_replace($search, "",$nombreLimpieza);
    $msg .= "<br><strong>Archivo:</strong> $nombreNuevo \r\n";
  }

  $msg .= "<br><strong>Teléfono:</strong> $phone \r\n";
  $msg .= "<br><strong>Referencia:</strong> W$id \r\n";
  $msg .= "<br><strong>Total presupuestado:</strong> $total \r\n";
  $msg .= "<br><strong>Descuento:</strong> $newClient% \r\n";
  $msg .= "<br><strong>Idioma:</strong> de $fromLanguage a $toLanguage \r\n";
  $msg .= "<br><strong>Tipo de Traducción:</strong> $type \r\n";
  $msg .= "<br><strong>Fecha de entrada:</strong> $date \r\n";
  $msg .= "<br><strong>Fecha de salida:</strong> $dateout \r\n\n";
  $msg .= "<br><strong>Enviar publicado:</strong> $sendText\r\n\n";
  //Display user information such as Ip address and browsers information...
  $msg .= "<br>---Información del Usuario--- \r\n";//Title
  $msg .= "<br>Pagina de procedencia : $referer";//Referrer
  if (!empty($_FILES['doc']['size'])) {
  $subject = 'Solicitud de Presupuesto W' . $id . ' con Documento';
  } else {
  $subject = 'Solicitud de Presupuesto W' . $id;
  }
  $subject = '=?UTF-8?B?' . base64_encode($subject) . '?=';

  // Aditional Headers
  $fifth = '-f' . 'vo@vo-traducciones.com';
  $header = "From: V.O. Traducciones <vo@vo-traducciones.com>\r\n";
  $header .= "Reply-To: V.O. Traducciones <vo@vo-traducciones.com>\r\n";
  $header .= "Content-type: text/html; charset=UTF-8\r\n";

  if (wp_mail('vo@vo-traducciones.com, c.vega@vo-traducciones.com, m.pita@vo-traducciones.com, ricardo.perezdecastro@gmail.com, mark.schuback@gmail.com, ignacioreyna56@gmail.com', $subject, $msg, $header)) {
  $correoSent = 'ok';
  }else{
  $correoNotSent='Error correo para Administrador no entregado';
  }


  $contact='';
  $contact=$correoNotSent;
  if($correoNotSentUserPresu)
  $contact.=$contact.'<br>'.$correoNotSentUserPresu;
  if($correoNotSentUserPromo)
  $contact.=$contact.'<br>'.$correoNotSentUserPromo;
  if($fileError)
  $contact.=$contact.'<br>'.$fileError;

  //Extrae el id del correo que si esta en la base de datos
  $sql = "SELECT id FROM contacts WHERE mail='$email' ";
  $results = $wpdb->get_results($sql);

 
  $number=$wpdb->num_rows;
  
  //Si existe el correo actualiza el campo send en caso de que ya se alla enviado el correo
  if($number!=0){
  foreach( $results as $result ) {
  $id= $result->id;
  }

  $emails = "SELECT mail FROM contacts WHERE id='$id'";
  $emailsSelect = $wpdb->get_results($emails);
  foreach( $emailsSelect as $emailsSelects ) {
  $extractMail= $emailsSelects->mail;
  }

  //Actualiza el mail en traducciones del registro existente
  $sqlMailUp = "UPDATE `traducciones` SET `mail` = '$extractMail' WHERE id = $idraducciones";
  $wpdb->get_results($sqlMailUp);

  //Actualiza el telefono en traducciones del registro existente
  $phones = "UPDATE `traducciones` SET `phone` = '$phone' WHERE id = $idraducciones";
  $wpdb->get_results($phones);

  //Actualiza el Id del contacto en traducciones del registro existente
  $idContacts = "UPDATE `traducciones` SET `idContacs` = '$id' WHERE id = $idraducciones";
  $wpdb->get_results($idContacts);


  }
  else{
  //No existe lo inserta en contactos pero
  $wpdb->insert('contacts',array('mail'=>$email, 'date'=> $date_mysql, 'ip' => $ip, 'send' => $send , 'referer'=> $referer));
  $ids= $wpdb->insert_id;

  $sqls = "SELECT id FROM contacts WHERE mail='$email' ";
  $wpdb->get_results($sql);
  
  $sqlse = "UPDATE `traducciones` SET `mail` = '$email' WHERE id = $id";
  $wpdb->get_results($sqlse);

  $phones = "UPDATE `traducciones` SET `phone` = '$phone' WHERE id = $id";
  $wpdb->get_results($phones);

  $idContacts = "UPDATE `traducciones` SET `idContacs` = '$ids' WHERE id = $idraducciones";
  $wpdb->get_results($idContacts);

  }
}

/* Funciona correo presupuestador solo documento */
    if(isset($_POST['formularioArchivo'] )){
        $language=$_POST['language'];
        $email=   filter_var($_POST['correoelectronico'],FILTER_SANITIZE_EMAIL);

        $wpdb->insert('traducciones',array('mail'=>$email,
                                             'language'=> $language ,
                                             'confidentiality' => null,
                                             'dateout' => null ,
                                             'date'=> $date_mysql,
                                             'ip' => 0 ,
                                             'referer' => $referer));
        $id=$wpdb->insert_id;
        $filesize = $_FILES['doc']['size'] / 1024;
                  
    if ($filesize > 16000){
              $fileError = 'Lamentamos comunicarte que tu archivo pesa más de 15Mb (' . $filesize . 'Mb), por favor, envíanoslo mediante otro método. Pero no te preocupes, la solicitud le ha llegado perfectamente a nuestro equipo.';
            }else{
                
            if ( ! function_exists( 'wp_handle_upload' ) ) {
              require_once( ABSPATH . 'wp-admin/includes/file.php');
            }
        $moveFile=wp_handle_upload($_FILES['doc'], array('test_form' => FALSE));
               
              if ($moveFile  && !isset( $moveFile['error'] )){
                 
                $uploadedFile="File Uploaded!";
                $download = $upload_dir.'/'.$_FILES['doc']['name'];
                
              } else {
                   
                $fileError = 'No hemos podido enviar tu documento, pero la solicitud está entregada, nos encargaremos de pedirte los datos necesarios.';
              }
            }
    //Adjuntar archivo
    $adjtunto = $moveFile['file'];
    //Cambio de nombre WP
    $search  = array('(', ')');
    $nombreLimpieza = str_replace(" ", "-",$download);
    $nombreNuevo = str_replace($search, "",$nombreLimpieza);

        $msg .= "<br><strong>Archivo:</strong> $nombreNuevo1 \r\n";
        $msg = "<strong>Email:</strong> $email \r\n";
        $msg .= "<br><strong>Archivo:</strong> $nombreNuevo \r\n";
        $msg .= "<br><strong>Referencia:</strong> W$id \r\n";
        $msg .= "<br><strong>Idioma:</strong> $language \r\n";
        $msg .= "<br>---Información del Usuario--- \r\n"; //Title
        $subject = 'Solicitud de Presupuesto W' . $id . ' con Documento';
        $subject = '=?UTF-8?B?' . base64_encode($subject) . '?=';
        $header = "From: V.O. Traducciones <vo@vo-traducciones.com>\r\n";
        $header .= "Reply-To: V.O. Traducciones <vo@vo-traducciones.com>\r\n";
        $header .= "Content-type: text/html; charset=UTF-8\r\n";
        $header .= "Content-Transfer-Encoding: 8bit\r\n";
        if (wp_mail('vo@vo-traducciones.com, c.vega@vo-traducciones.com, m.pita@vo-traducciones.com, ricardo.perezdecastro@gmail.com, mark.schuback@gmail.com, ignacioreyna56@gmail.com', $subject, $msg, $header,$adjtunto)) {
            $contact = 'Solicitud y archivo(s) enviados correctamente';
        } else {
            $contact = 'No hemos podido mandar su mensaje, por favor, inténtelo de nuevo.';
        }
        
        //Correo A
        $msga = '<p>Hola,<br><br>';
        $msga .= "Antes que nada, gracias por tu tiempo. La referencia de tu solicitud es <strong>W$id</strong></p>";
        $msga .= "<p><ul><li><strong>Idioma</strong>: $language<br></li>";
        $msga .= '<p><strong>Promoción Exclusiva</strong></p>';
        $msga .= '<p>Asegurarse tener una traducción de calidad es muy sencillo. <strong>Y si además pagas menos, mejor</strong>.</p>';
        $msga .= '<p>Por eso, si nos encargas el trabajo de traducción de esta solicitud, te ofrecemos un <strong>10% de descuento en tu próxima traducción</strong>. Este descuento no tiene fecha de caducidad.</p>';
        $msga .= '<p>El único requisito es que esta sea <strong>la primera vez que disfrutas de esta promoción</strong>.</p>';
        $msga .= '<p>¿Tienes preguntas? Responde a este email con todas tus dudas, o llámanos al 91 445 44 16.</p>';
        $msga .= '<p>Trabajamos para satisfacer a todos nuestros clientes.</p>';
        $msga .= '<p>Saludos cordiales,<br>';
        $msga .= 'El equipo de  V.O. Traducciones</p>';
        $subject = 'Tu solicitud de presupuesto online (y una promoción exclusiva)';
        $header = "From: V.O. Traducciones <vo@vo-traducciones.com>\r\n";
        $header .= "Reply-To: V.O. Traducciones <vo@vo-traducciones.com>\r\n";
        $header .= "Content-type: text/html; charset=UTF-8\r\n";
        if (wp_mail($email, $subject, $msga, $header)) {
            $contact = 'Solicitud y archivo(s) enviados correctamente';
           
        } else {
            $contact = 'No hemos podido mandar su mensaje, por favor, inténtelo de nuevo.';
        }

        //Correo B
        $msgb = '<p>Hola de nuevo,<br><br>';
        $msgb.= 'Estas son las preguntas más frecuentes de quienes nos solicitan un presupuesto de traducción. <strong> Esperamos te sean útiles</strong>.</p>';
        $msgb.= '<p><strong>¿Tenéis flexibilidad para ajustar el coste a mis necesidades particulares?</strong><br>';
        $msgb.= 'Si tienes un presupuesto ajustado o el <a href="http://www.vo-traducciones.com/presupuesto" target="_blank" title="Presupuesto que has generado online"> presupuesto que has generado online </a> no se ha <strong> adecuado a tus necesidades </strong> no dudes en hacérnoslo saber: llama al 91 445 44 16 o preferiblemente, envíanos el documento a traducir a <a href="mailto:vo@vo-traducciones.com" target="_blank">vo@vo-traducciones.com</a></p>';
        $msgb.= '<p><strong>¿Tengo descuentos por volumen de trabajo o por alguna otra razón?</strong><br>';
        $msgb.= 'Tenemos diferentes tipos de descuentos. Responde a este <a href= "http://www.vo-traducciones.com/traduccion-profesional-descuentos.php" title="Correo">correo</a> y dinos el número aproximado de palabras a traducir por mes.</p>
        <p><strong>¿Cómo protegéis la privacidad de mi documentación?</strong><br>
        Tenemos acuerdos de confidencialidad con nuestros traductores. Además, contamos con tecnología de encriptación para el intercambio de información vía emails.</p>
        <p><strong>¿Cuál es el cargo mínimo por trabajo de traducción?</strong><br>
        Independiente del número de palabras, se cobrará un mínimo de: <br>
        <ul>
        <li> €40 por traducción No Jurada</li><br>
        <li> €50 por traducción Jurada </li> 
        </ul></p>
        <p><strong> Mi traducción es urgente ¿Cómo calculáis el precio?</strong><br>
        Una traducción urgente es en general la que se tiene que entregar el mismo día que se solicita o que tiene un volumen de traducción de más de 2,500 palabras/día laborable. Para estos encargos aplicamos un <strong> recargo aproximado de 25% </strong> sobre la tarifa estándar.</p>
        <p> Si tienes otras preguntas no dudes en contactarnos en el Tlf: 91 445 4416 (o responde a este correo).</p>
        <p> Saludos cordiales,<br>
        El equipo de V.O. Traducciones</p>';
        $subject = "Descuentos, Privacidad, Precio Final: ¿Tienes preguntas sobre éstos u otros temas?";
        $header = "From: V.O. Traducciones <vo@vo-traducciones.com>\r\n";
        $header .= "Reply-To: V.O. Traducciones <vo@vo-traducciones.com>\r\n";
        $header = "Content-type: text/html; charset=UTF-8\r\n";

        if(!wp_mail($email, $subject, $msgb, $header))
        $correoNotSentUserPromo .= '<br> No hemos podido enviar tu mensaje, inténtalo de nuevo más tarde.';

         wp_redirect('https://vo-traducciones.com/gracias/');
            
        //if (!wp_mail($email, $subject, $msg, $header)) {
        //      $correoNotSentUserPresu = 'No hemos podido enviar tu mensaje, inténtalo de nuevo más tarde.<br>';
        //}
    }


          /* Funciona correo presupuestador-step3 */
          if(isset($_POST['agilizarPresupuesto'] )){
            $email=   filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
            $id=$_POST['id'];
            $email=$_POST['email'];
            $phone=$_POST['phone'];
            $dateout=$_POST['date'];
            $type=$_POST['trad'];
            $fromLanguage=$_POST['language'];
            $toLanguage=$_POST['language2'];
            $newClient=$_POST['newClient'];
            $fromLanguage=$_POST['languageA'];
            $toLanguage=$_POST['languageB'];
         
            $filesize = $_FILES['doc']['size'] / 1024;


  
            if ($filesize > 16000){
              $fileError = 'Lamentamos comunicarte que tu archivo pesa más de 15Mb (' . $filesize . 'Mb), por favor, envíanoslo mediante otro método. Pero no te preocupes, la solicitud le ha llegado perfectamente a nuestro equipo.';
            }else{
            if ( ! function_exists( 'wp_handle_upload' ) ) {
              require_once( ABSPATH . 'wp-admin/includes/file.php');
            }
                $moveFile=wp_handle_upload($_FILES['doc'], array('test_form' => FALSE));
              if ($moveFile  && !isset( $moveFile['error'] )){
                $uploadedFile="File Uploaded!";
                $download = $upload_dir.'/'.$_FILES['doc']['name'];
              } else {
                $fileError = 'No hemos podido enviar tu documento, pero la solicitud está entregada, nos encargaremos de pedirte los datos necesarios.';
              }
            }
            //Adjuntar archivo
            $adjtunto = $moveFile['file'];
 
            if (!$fileError) {
              $msg = "<strong>Email:</strong> $email \r\n";
            if (!empty($_FILES['doc']['size'])) {
             //Cambio de nombre WP
    $search  = array('(', ')');
    $nombreLimpieza = str_replace(" ", "-",$download);
    $nombreNuevo = str_replace($search, "",$nombreLimpieza);
    
            $msg .= "<br><strong>Archivo:</strong> $nombreNuevo \r\n";
            }
              $msg .= "<br><strong>Teléfono:</strong> $phone \r\n";
              $msg .= "<br><strong>Referencia:</strong> W$id \r\n";
              $msg .= "<br><strong>Total presupuestado:</strong> $total \r\n";
              $msg .= "<br><strong>Descuento:</strong> $newClient% \r\n";
              $msg .= "<br><strong>Idioma:</strong> de $fromLanguage a $toLanguage \r\n";
              $msg .= "<br><strong>Tipo de Traducción:</strong> $type \r\n";
              $msg .= "<br><strong>Fecha de entrada:</strong> $date_mysql \r\n";
              $msg .= "<br><strong>Fecha de salida:</strong> $dateout \r\n\n";
              $msg .= "<br>---Información del Usuario--- \r\n"; //Title
              $msg .= "<br>Pagina de procedencia : $referer"; //Referrer
              if (!empty($_FILES['doc']['size'])) {
                $subject = 'Solicitud de Presupuesto W' . $id . ' con Documento';
              } else {
                $subject = 'Solicitud de Presupuesto W' . $id;
              }
                $subject = '=?UTF-8?B?' . base64_encode($subject) . '?=';
                $header = "From: V.O. Traducciones <vo@vo-traducciones.com>\r\n";
                $header .= "Reply-To: V.O. Traducciones <vo@vo-traducciones.com>\r\n";
                $header .= "Content-type: text/html; charset=UTF-8\r\n";
                $header .= "Content-Transfer-Encoding: 8bit\r\n";
              if (wp_mail('vo@vo-traducciones.com, c.vega@vo-traducciones.com, m.pita@vo-traducciones.com, ricardo.perezdecastro@gmail.com, mark.schuback@gmail.com, ignacioreyna56@gmail.com', $subject, $msg, $header,$adjtunto)) {
                $contact = ' Solicitud y archivo(s) enviados correctamente';
              } else {
                $contact = 'No hemos podido mandar su mensaje, por favor, inténtelo de nuevo.';
              }
            } else {
            $contact = $fileError;
            }
          }

          /* Funciona correo presupuestador-step1 */
          if (isset($_POST['submitPrecio'])) {
              $typep = post('trad');
              $languageAp = post('language');
              $languageBp = post('language2');
            if ($languageAp == 'es' || $languageBp == 'es') {
              $fn = 'analytics.txt';
            if (file_exists($fn)) {
              $counter = file_get_contents($fn, true);
              $counter = $counter + 1;
              $fp = fopen($fn, 'w');
              fputs($fp, $counter);
              fclose($fp);
            }
              $priceArray = ppp($languageAp, $languageBp, $typep);
              $pricep = round($priceArray[0], 3);
            }else{
              $priceArray=pppc($languageAp, $languageBp, $typep);
              $pricep = round($priceArray[0], 3);
            }
          }


/* Funciona correo presupuestador solo documento */
    if(isset($_POST['formularioHeader'] )){

        $name = $_POST['nombre'];
        $telefono = $_POST['tel'];
        $email = filter_var($_POST['correoelectronico'],FILTER_SANITIZE_EMAIL);

        $wpdb->insert('traducciones',array( 'mail'=> $email,
                                            'phone'=> $telefono, 
                                            'confidentiality' => null,
                                            'dateout' => null ,
                                            'date'=> $date_mysql,
                                            'ip' => 0 ,
                                            'referer' => $referer));
        $id=$wpdb->insert_id;

        $filesize = $_FILES['doc']['size'] / 1024;
                  
        if ($filesize > 16000){
          $fileError = 'Lamentamos comunicarte que tu archivo pesa más de 15Mb (' . $filesize . 'Mb), por favor, envíanoslo mediante otro método. Pero no te preocupes, la solicitud le ha llegado perfectamente a nuestro equipo.';
        }else{        
          if ( ! function_exists( 'wp_handle_upload' ) ) {
            require_once( ABSPATH . 'wp-admin/includes/file.php');
          }
        $moveFile=wp_handle_upload($_FILES['doc'], array('test_form' => FALSE));      
              if ($moveFile  && !isset( $moveFile['error'] )){
                $uploadedFile="File Uploaded!";
                $download = $upload_dir.'/'.$_FILES['doc']['name'];
              }else {
                $fileError = 'No hemos podido enviar tu documento, pero la solicitud está entregada, nos encargaremos de pedirte los datos necesarios.';
              }
            }


    //Cambio de nombre WP
    $search  = array('(', ')');
    $nombreLimpieza = str_replace(" ", "-",$download);
    $nombreNuevo = str_replace($search, "",$nombreLimpieza);

        //$msg .= "<br><strong>Archivo:</strong> $nombreNuevo1 \r\n";
        $msg  = "<strong>Nombre:</strong> $name \r\n";
        $msg .= "<br><strong>Referencia:</strong> W$id \r\n";
        $msg .= "<strong>Email:</strong> $email \r\n";
        $msg .= "<br><strong>Teléfono:</strong> $telefono \r\n";
        $msg .= "<br><strong>Archivo:</strong> $nombreNuevo \r\n";
        $msg .= "<br>---Información del Usuario--- \r\n"; //Title
        $subject = 'Solicitud de Presupuesto W' . $id . ' con Documento';
        $subject = '=?UTF-8?B?' . base64_encode($subject) . '?=';
        $header = "From: V.O. Traducciones <vo@vo-traducciones.com>\r\n";
        $header .= "Reply-To: V.O. Traducciones <vo@vo-traducciones.com>\r\n";
        $header .= "Content-type: text/html; charset=UTF-8\r\n";
        $header .= "Content-Transfer-Encoding: 8bit\r\n";
       
        if (wp_mail($email, $subject, $msg, $header,)) {
            $contact = 'Solicitud y archivo(s) enviados correctamente';
        } else {
            $contact = 'No hemos podido mandar su mensaje, por favor, inténtelo de nuevo.';
        }
            
        //Correo A
        $msg = '<p>Hola,<br><br>';
        $msg .= "Antes que nada, gracias por tu tiempo. La referencia de tu solicitud es <strong>W$id</strong></p>";
        $msg .= "<p><ul><li><strong>Idioma</strong>: $language<br></li>";
        $msg .= '<p><strong>Promoción Exclusiva</strong></p>';
        $msg .= '<p>Asegurarse tener una traducción de calidad es muy sencillo. <strong>Y si además pagas menos, mejor</strong>.</p>';
        $msg .= '<p>Por eso, si nos encargas el trabajo de traducción de esta solicitud, te ofrecemos un <strong>10% de descuento en tu próxima traducción</strong>. Este descuento no tiene fecha de caducidad.</p>';
        $msg .= '<p>El unico requisito es que esta sea <strong>la primera vez que disfrutas de esta promoción</strong>.</p>';
        $msg .= '<p>¿Tienes preguntas? Responde a este email con todas tus dudas, o llámanos al 91 445 44 16.</p>';
        $msg .= '<p>Trabajamos para satisfacer a todos nuestros clientes.</p>';
        $msg .= '<p>Saludos cordiales,<br>';
        $msg .= 'El equipo de  V.O. Traducciones</p>';
        $subject = 'Tu solicitud de presupuesto online (y una promoción exclusiva)';
        $header = "From: V.O. Traducciones <vo@vo-traducciones.com>\r\n";
        $header .= "Reply-To: V.O. Traducciones <vo@vo-traducciones.com>\r\n";
        $header .= "Content-type: text/html; charset=UTF-8\r\n";
        if (wp_mail($email, $subject, $msg, $header)) {
            $contact = 'Solicitud y archivo(s) enviados correctamente';
           
        } else {
            $contact = 'No hemos podido mandar su mensaje, por favor, inténtelo de nuevo.';
        }
         wp_redirect('https://vo-traducciones.com/gracias/');
            
        //if (!wp_mail($email, $subject, $msg, $header)) {
        //      $correoNotSentUserPresu = 'No hemos podido enviar tu mensaje, inténtalo de nuevo más tarde.<br>';
        //}
    } ?>
<script src="http://www.vo-traducciones.com/wp-content/uploads/jquery.js"></script>
<script src="http://www.vo-traducciones.com/wp-content/uploads/myScript.js"></script>
<script src="http://www.vo-traducciones.com/wp-content/uploads/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="http://www.vo-traducciones.com/wp-content/uploads/myStyles.css">
<link rel="stylesheet" type="text/css" href="http://www.vo-traducciones.com/wp-content/uploads/jquery-ui.css">
<section class="estilo-general-cotizados">
<div class="row">
  <div class="container">
    <div class='container' id='alertMessages'>
      <div class='row'>
        <div class='col-md-12 col-sm-12 col-sm-12 no-gutters'>
          <?php if(!empty($contact)) echo "<div class='alert alert-warning alert-dismissible fade show text-center ' role='alert'>
          <strong style='font-size:18px;'>".$contact."</strong><button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
          </div>";?>
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
    <div class="row">
      <div class="container text-center">
        <h3 class="titulo-step-1-presylario">Obtén el presupuesto inicial (y final) de tu traducción con rapidez.</h3>
        <h5 class="text-muted subtitulo-step-1-presylario">(Sin tener que mirar tablas con precios e idiomas, ni rellenar formularios interminables).</h5>
      </div>
    </div>
    <!-- Modal final traducciones -->
    <?php if (isset($_POST['presupuestoFinal'])  || isset($_POST['agilizarPresupuesto']))   : ?>
      <section class="presupuestador-step3">
        <div class="stepper-steps">
          <div class="stepper-step stepper-step-isValid">
            <div class="stepper-stepContent">
              <span class="stepper-stepMarker">1</span><span class='labelStep'>Tu traducción</span>
            </div>
          </div>
          <div class="stepper-step stepper-step-isActive">
            <div class="stepper-stepContent">
              <span class="stepper-stepMarker">2</span><span class='labelStep'>Precio traducción + Descuentos</span>
            </div>
          </div>
          <div class="stepper-step">
            <div class="stepper-stepContent">
              <span class="stepper-stepMarker">3</span><span class='labelStep'>Solicitud enviada</span>
            </div>
          </div>
        </div>
        <div class="stepper-content">
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 no-gutters">
              <div class="home_1">
                <div class="col-md-12 home_2">
                  <h3 class="text-center home_3"> <?php echo ($uploadedFile && !isset($fileError)) ? " Solicitud y archivo(s) enviados correctamente" : "¿Quiéres recibir tu presupuesto final lo antes posible?";?></h3>
                </div>
                <?php if(isset($_POST['presupuestoFinal'])) :?>
                <div class="col-md-12">
                  <?php if($correoSent  && !isset($fileError) )  : ?>
                  <div class="col-md-12 text-center">
                    <p><i class='fa fa-check-circle-o text-success fa-4x'></i></p>
                    <h4>Adjunta el o los archivos que quieres traducir para agilizar la entrega <br>del presupuesto final. </h4>
                  </div>
                  <?php endif; ?>
                  <?php if($correoSent && isset($fileError)) : ?>
                  <div class='col-md-12 text-center'>
                    <p><i class='fa fa-hourglass-half text-success fa-4x'></i></p>
                    <h4>Adjunta el o los archivos que quieres traducir para agilizar la entrega <br>del presupuesto final. </h4>
                    <form action="#datos-enviados" method="post" enctype="multipart/form-data">
                      <fieldset>
                        <div class='form-group'>
                          <div class="col-md-12">
                            <label for=""><h3 class="text-info text-center">Selecciona tu archivo</h3></label>
                          </div>
                          <div class='col-md-12'>
                            <input type="file" name="doc" id="doc" class="estilo-files" />
                            <input type="hidden" name="email" value="<?php echo $email; ?>">
                          </div>
                          <div class='col-md-12'>
                            <small>* Si tienes más de un documento, comprímelo en ZIP.</small>
                          </div>
                        </div>
                        <input type="hidden" name="date" value="<?php echo $dateout; ?>">
                        <input type="hidden" name="id" value="<?php echo $idraducciones; ?>">
                        <input type="hidden" name="email" value="<?php echo $email; ?>">
                        <input type="hidden" name="phone" value="<?php echo $phone; ?>">
                        <input type="hidden" name="languageA" value="<?php echo $fromLanguage; ?>">
                        <input type="hidden" name="languageB" value="<?php echo $toLanguage; ?>">
                        <div class='row text-left'>
                          <div class='col-md-12 text-center'>
                            <small>Te hemos enviado un email con un número de referencia, <br>asegúrate de que no está en SPAM.</small>
                          </div>
                          <div class='col-md-12'>
                            <small>* Tamaño máximo: 15Mb. Para archivos mayores: <a href='mailto:vo@vo-traducciones.com?subject=V.O. Traducciones: W<?php if(isset($id)){echo $id;}?>' title="vo@vo-traducciones.com"> vo@vo-traducciones.com</a> </small>
                          </div>
                        </div>
                        <div class='row justify-content-center' id="agilizarActions">
                          <div class='col-md-4 send'>
                            <a href="/" id="noGracias" class="noSend btn btn-danger" title="No Gracias">¡No Gracias!</a>
                          </div>
                          <div class='col-md-4 send'>
                            <button name="agilizarPresupuesto" class="" id='agilizarPresupuesto'  type="submit">Agilizar Presupuesto</button>
                          </div>
                        </div>
                      </fieldset>
                    </form>
                  </div>
                <?php endif; ?>
                <?php endif; ?>
                <?php if($uploadedFile && !isset($fileError)) : ?>
                <div class='col-md-12 text-center presulario'>
                <h2 class='nobg'>¡Gracias por ayudarnos a ir más rápido!</h2>
                <p><i class='fa fa-check-circle-o text-success fa-4x'></i></p>
                <!--p><strong><?php echo $contact; ?> </strong></p-->
                <p><strong> En breve recibirás el presupuesto final. Te hemos enviado un email con un número de referencia,<br> asegúrate de que no está en SPAM.</strong></p>
                <p class="pb-3">Gracias por confiar en V.O. Traducciones, te responderemos a la mayor brevedad posible.</p>
                </div>
                <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    <?php elseif (isset($_POST['presupuestar'])): ?>
    <script>
      $(document).ready(function(){
        $(".header-1-main-menu-area").hover(function(){
          $('#exampleModalTotal').modal('show');
          }, function(){

          });
      });
    </script>
    <section class="presupuestador-step2">
      <div class="stepper-steps">
        <div class="stepper-step stepper-step-isValid">
          <div class="stepper-stepContent">
            <span class="stepper-stepMarker">1</span><span class='labelStep'>Tu traducción</span>
          </div>
        </div>
        <div class="stepper-step stepper-step-isActive">
          <div class="stepper-stepContent">
            <span class="stepper-stepMarker">2</span><span class='labelStep'>Precio traducción + Descuentos</span>
          </div>
        </div>
        <div class="stepper-step">
          <div class="stepper-stepContent">
            <span class="stepper-stepMarker">3</span><span class='labelStep'>Solicitud enviada</span>
          </div>
        </div>
      </div>
      <div class="stepper-content">
        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12 no-gutters">
            <div class="home_1">
              <div class="col-md-12 home_2">
                <h3 class="text-center home_3">Presupuesto Online</h3>
              </div>

<!-- Modal -->
<div class="modal fade" id="exampleModalTotal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="max-width: 550px !important;">
    <div class="modal-content">
     
      <div class="">
       
            <div class="home_1">
                <div class="col-md-12 home_2 text-center" style="padding: 10px !important;">
                    <h3 class="text-center home_3">¿Se salen los <?php if(isset($total)) echo $total; ?>€ de tu presupuesto?</h3>
                    <p style="color: #fff;margin:0px !important;">Podemos ajustar el precio.</p>
                    <p style="color: #fff;margin:0px !important;">Agrega tus datos y te llamamos.</p>
                </div>  
                  <form action="https://vo-traducciones.com/procesa-pop-presulario" method="get" enctype="multipart/form-data">

            <div class="form-group row d-flex justify-content-center" style="padding-bottom: 13px;margin: 0;">
            <div class="container">


            
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="col-md-12 text-center my-3">
                        <input type="text" name="nombre" id="nombre" style="margin:0px !important" placeholder="Nombre*" autocomplete="off" required>
                        </div>
                    </div>
                </div>
               
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="col-md-12 text-center  my-3">
                            <input type="text" name="telefono" id="telefono" style="margin:0px !important"  placeholder="Teléfono*" autocomplete="off" required onkeypress="return valideKey(event);">
                        </div>
                    </div>
                </div>
 
                

                <div class="col-md-12">
                    <div class="form-group">
                        <div class="col-md-12 text-center" style="font-size: 13px;">
                            <button name="agilizarPresupuesto" class="textos-botones td-btn button-type-fill vc_custom_1578019454908" style="margin:0 !important;font-size:18px;" id='agilizarPresupuesto'  type="submit">Te llamamos ahora</button>
                        </div> 
                    </div> 
                </div> 
                <div class="col-md-12 text-center">
                          <div class='col-md-12'>
                            <div class="form-check form-check-inline">
                              <input type="checkbox" class="form-check-input" name="legal" id="legal" value="" onclick="tch(this, 'submit2')" checked="checked" required>
                              <label class="form-check-label" for="legal">   <a href="lopd.php" target="_blank" class="orange" title="Protegemos tus datos (aviso legal)"><span class='tinyFont'>He leído y acepto todas las condiciones
</span></a>
                              </label>
                            </div>
                          </div>
                        </div>
                <div style="overflow: scroll;height: 50px;padding: 10px;width: 500px !important;">
                    <a href="https://vo-traducciones.com/politica-de-privacidad/"><img src="https://vo-traducciones.com/wp-content/uploads/2020/07/rgdp.png"></a> 
                </div>
                </div>
            </div>
            </form>
            </div>
         
      </div>
    </div>
  </div>
</div>
              <form action="#step3" method="post" name="theForm2" id="theForm2" enctype="multipart/form-data">
                <fieldset>


                <div class="container">
                  <div class="row">
                    <div class='col-md-6 col-sm-12 border-right mb-2'>
                          <input type="hidden" name="number" value="<?php if ($numwords) {echo $numwords;}?>"/>
                          <div class='row'>
                            <div class="col-md-12 col-12 Traduccion">
                              <h5 class='text-center'>
                                <p><strong>Traducción:</strong><mark><?php if(isset($presupuestoType)) echo $presupuestoType;?></mark></p>
                                <p><strong>de</strong> <mark><?php if(isset($languageA)) echo language($languageA); ?></mark></p>
                                <p><strong>a</strong>  <mark><?php if(isset($languageB)) echo language($languageB); ?></mark></p>
                              </h5>
                            </div>
                            <div class="col-md-12 col-12 suma text-center">
                              <p><strong class="totalsd">Total sin descuento: <?php if(isset($total)) echo $total; ?>€</strong>
                            </div>
                            <div class='col-md-12 col-12 text-center'>
                              <div class="form-check">
                                <span class='presulario'>
                                  <h5><strong class="disscount">* Aplicar Descuentos</strong></h5>
                                </span>
                              </div>
                              <div class="form-check">
                                <p><input class="form-check-input" type="checkbox" name="newClient" id="newClient" value="1">
                                <label class="form-check-label" for="newClient">-5% si eres cliente nuevo.</label></p>
                              </div>
                              <div class="form-check">
                                <p><input class="form-check-input" type="checkbox" name="online" id="online" value="1" checked>
                                <label class="form-check-label" for="online">-5% por solicitar vía web.</label></p>
                              </div>
                            </div>
                            <div class="col-md-12 col-12 suma text-center totalcd">
                              <p><strong class="total totalcd" id="total">Total con descuento: <?php if(isset($total)) echo $total; ?>€</strong></p>
                              <p><strong class="total totalcd" id="total5">Total con descuento: <?php if(isset($total5)) echo $total5; ?>€</strong></p>
                              <p><strong class="total totalcd" id="total10">Total con descuento: <?php if(isset($total10)) echo $total10; ?>€</strong></p>
                            </div>
                            <div class="col-md-12">
                              <input type="hidden" name="languageA" value="<?php if(isset($languageA)) echo language($languageA); ?>" />
                              <input type="hidden" name="languageB" value="<?php if(isset($languageB)) echo language($languageB); ?>" />
                              <input type="hidden" name="id" value="<?php echo isset($id) ? $id : null ?>" />
                              <input type="hidden" name="trad" value="<?php echo isset($_POST['trad']) ? $_POST['trad'] : null; ?>" />
                              <input type="hidden" name="number" value="<?php echo isset($_POST['number']) ? $_POST['number'] : null; ?>" />
                              <input type="hidden" name="a" value="
                              <?php
                              if(isset($languageA)){echo language($languageA);}else{echo "";}?>" >
                              <input type="hidden" name="b" value="<?php if(isset($languageB)){echo language($languageB);}else{ echo "";}?>" >
                              <input type="hidden" name="t" value="<?php if(isset($total)){echo $total;}else{echo "";}?>" >
                              <input type="hidden" name="t5" value="<?php if(isset($total5)){echo $total5;}else{echo "";}?>" >
                              <input type="hidden" name="t10" value="<?php if(isset($total10)){echo $total10;}else{echo "";}?>" >
                              <input type="hidden" name="type" value="<?php if(isset($presupuestoType)){echo $presupuestoType;}else{echo "";}?>" >
                              <input type="hidden" name="id" value="<?php if(isset($id)){echo $id;}else{echo "";}?>" >
                            </div>
                            <div class="col-md-12 d-xs-none text-center pt-3">
                                <img src="http://vo-traducciones.com/wp-content/uploads/2019/12/flecha.png" alt="" class="img-fluid" width="200">
                            </div>
                          </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                      <div class="row">
                        <div class='col-md-12'>
                          <div class='form-group'>
                            <div class='col-md-12'>
                              <p class="text-center presulario" >Envía este presupuesto ahora y en menos de una hora tendrás un presupuesto final.</p>
                            </div>
                          </div>
                        </div>
                        <div class='col-md-12'>
                          <div class='form-group'>
                            <div class='col-md-12'>
                              <div class='inputContainer'>
                                <input type="text" name="date" id="date_input" class="date-form form-control" value="<?php if ($dateout) {echo $dateout;} ?>" placeholder="¿Para cuándo? *" required>
                                <i class="fa fa-calendar" aria-hidden="true" id='calendar'></i>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class='col-md-12'>
                          <div class='form-group'>
                            <div class='col-md-12'>
                              <div class='inputContainer'><input type="text" name="email" id='email_input' class="mail-form form-control"  value="<?php if ($email) {echo $email;} ?>" placeholder="Facilítanos tu email *" required>
                                <i class="fa fa-envelope-o" aria-hidden="true" id='email'></i>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class='col-md-12'>
                          <div class='form-group'>
                            <div class='col-md-12'>
                              <div class='inputContainer'>
                                <input type="text" name="phone" id='phone_input' class="phone-form form-control"  value="<?php if ($phone) {echo $phone;
                                } ?>" placeholder="Número de teléfono" />
                                <i class="fa fa-phone" aria-hidden="true" id='phone'></i>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12 text-center">
                          <button name="presupuestoFinal" id="presupuestoFinal" class="" onClick="_gaq.push(['_trackEvent', 'Conversiones', 'Presulario', 'SolicitudEnviada']);" id="submit2" type="submit"  <?php if (empty($_POST)) { echo disabled; } ?>>Enviar Solicitud de Presupuesto </button>
                          <p><small>Es sin compromiso. Y obtienes siempre respuesta.</small></p>
                        </div>
                        <div class="col-md-12">
                          <div class='col-md-12 container'>
                            <div class="form-check form-check-inline">
                              <input type="checkbox" class="form-check-input" name="legal" id="legal" value="" onclick="tch(this, 'submit2')" checked="checked" required>
                              <label class="form-check-label" for="legal">   <a href="lopd.php" target="_blank" class="orange" title="Protegemos tus datos (aviso legal)"><span class='tinyFont'>Protegemos tus datos (aviso legal)</span></a>
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <div class='col-md-12'>
                              <div class="form-control textos-prod-descrip" id="exampleFormControlTextarea2">                             
                                <p><a href="/politica-de-privacidad/" tarjet="_blank"><img src="https://vo-traducciones.com/wp-content/uploads/2020/02/Captura-de-pantalla-2020-02-28-a-las-23.39.07.png"></a></p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </fieldset>
              </form>
              <div class="modal fade bd-example-modal-lg" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="col-md-12 home_2">
                      <h3 class="text-center home_3">Presupuesto Online</h3>
                    </div>
                    <form action="#step3" method="post" name="theForm2" id="theForm2" enctype="multipart/form-data">
                <fieldset>
                <div class="container">
                  <div class="row">
                    <div class='col-md-6 col-sm-12 border-right mb-2'>
                          <input type="hidden" name="number" value="<?php if ($numwords) {echo $numwords;}?>"/>
                          <div class='row'>
                            <div class="col-md-12 col-12 Traduccion">
                              <h5 class='text-center'>
                                <p><strong>Traducción:</strong><mark><?php if(isset($presupuestoType)) echo $presupuestoType;?></mark></p>
                                <p><strong>de</strong> <mark><?php if(isset($languageA)) echo language($languageA); ?></mark></p>
                                <p><strong>a</strong>  <mark><?php if(isset($languageB)) echo language($languageB); ?></mark></p>
                              </h5>
                            </div>
                            <div class="col-md-12 col-12 suma text-center">
                              <p><strong class="totalsd">Total sin descuento: <?php if(isset($total)) echo $total; ?>€</strong>
                            </div>
                            <div class='col-md-12 col-12 text-center'>
                              <div class="form-check">
                                <span class='presulario'>
                                  <h5><strong class="disscount">* Aplicar Descuentos</strong></h5>
                                </span>
                              </div>
                              <div class="form-check">
                                <p><input class="form-check-input" type="checkbox" name="newClient" id="newClient" value="1">
                                <label class="form-check-label" for="newClient">-5% si eres cliente nuevo.</label></p>
                              </div>
                              <div class="form-check">
                                <p><input class="form-check-input" type="checkbox" name="online" id="online" value="1" checked>
                                <label class="form-check-label" for="online">-5% por solicitar vía web.</label></p>
                              </div>
                            </div>
                            <div class="col-md-12 col-12 suma text-center totalcd">
                               <p><strong class="total totalcd" id="total10">Total con descuento: <?php if(isset($total10)) echo $total10; ?>€</strong></p>
                            </div>
                            <div class="col-md-12">
                              <input type="hidden" name="languageA" value="<?php if(isset($languageA)) echo language($languageA); ?>" />
                              <input type="hidden" name="languageB" value="<?php if(isset($languageB)) echo language($languageB); ?>" />
                              <input type="hidden" name="id" value="<?php echo isset($id) ? $id : null ?>" />
                              <input type="hidden" name="trad" value="<?php echo isset($_POST['trad']) ? $_POST['trad'] : null; ?>" />
                              <input type="hidden" name="number" value="<?php echo isset($_POST['number']) ? $_POST['number'] : null; ?>" />
                              <input type="hidden" name="a" value="
                              <?php
                              if(isset($languageA)){echo language($languageA);}else{echo "";}?>" >
                              <input type="hidden" name="b" value="<?php if(isset($languageB)){echo language($languageB);}else{ echo "";}?>" >
                              <input type="hidden" name="t" value="<?php if(isset($total)){echo $total;}else{echo "";}?>" >
                              <input type="hidden" name="t5" value="<?php if(isset($total5)){echo $total5;}else{echo "";}?>" >
                              <input type="hidden" name="t10" value="<?php if(isset($total10)){echo $total10;}else{echo "";}?>" >
                              <input type="hidden" name="type" value="<?php if(isset($presupuestoType)){echo $presupuestoType;}else{echo "";}?>" >
                              <input type="hidden" name="id" value="<?php if(isset($id)){echo $id;}else{echo "";}?>" >
                            </div>
                            <div class="col-md-12 d-xs-none text-center pt-3">
                                <img src="http://vo-traducciones.com/wp-content/uploads/2019/12/flecha.png" alt="" class="img-fluid" width="200">
                            </div>
                          </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                      <div class="row">
                        <div class='col-md-12'>
                          <div class='form-group'>
                            <div class='col-md-12'>
                              <p class="text-center presulario" >Envía este presupuesto ahora y en menos de una hora tendrás un presupuesto final.</p>
                            </div>
                          </div>
                        </div>
                        <div class='col-md-12'>
                          <div class='form-group'>
                            <div class='col-md-12'>
                              <div class='inputContainer'>
                                <input type="text" name="date" id="date_input" class="date-form form-control" value="<?php if ($dateout) {echo $dateout;} ?>" placeholder="¿Para cuándo? *" required>
                                <i class="fa fa-calendar" aria-hidden="true" id='calendar'></i>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class='col-md-12'>
                          <div class='form-group'>
                            <div class='col-md-12'>
                              <div class='inputContainer'><input type="text" name="email" id='email_input' class="mail-form form-control"  value="<?php if ($email) {echo $email;} ?>" placeholder="Facilítanos tu email *" required>
                                <i class="fa fa-envelope-o" aria-hidden="true" id='email'></i>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class='col-md-12'>
                          <div class='form-group'>
                            <div class='col-md-12'>
                              <div class='inputContainer'>
                                <input type="text" name="phone" id='phone_input' class="phone-form form-control"  value="<?php if ($phone) {echo $phone;
                                } ?>" placeholder="Número de teléfono" />
                                <i class="fa fa-phone" aria-hidden="true" id='phone'></i>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12 text-center">
                          <button name="presupuestoFinal" id="presupuestoFinal" class="" onClick="_gaq.push(['_trackEvent', 'Conversiones', 'Presulario', 'SolicitudEnviada']);" id="submit2" type="submit"  <?php if (empty($_POST)) { echo disabled; } ?>>Enviar Solicitud de Presupuesto </button>
                          <p><small>Es sin compromiso. Y obtienes siempre respuesta.</small></p>
                        </div>
                        <div class="col-md-12">
                          <div class='col-md-12 container'>
                            <div class="form-check form-check-inline">
                              <input type="checkbox" class="form-check-input" name="legal" id="legal" value="" onclick="tch(this, 'submit2')" checked="checked" required>
                              <label class="form-check-label" for="legal">   <a href="lopd.php" target="_blank" class="orange" title="Protegemos tus datos (aviso legal)"><span class='tinyFont'>Protegemos tus datos (aviso legal)</span></a>
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <div class='col-md-12'>
                              <div class="form-control textos-prod-descrip" id="exampleFormControlTextarea2">                             
                                <p><a href="/politica-de-privacidad/" tarjet="_blank"><img src="https://vo-traducciones.com/wp-content/uploads/2020/02/Captura-de-pantalla-2020-02-28-a-las-23.39.07.png"></a></p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </fieldset>
              </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php else: ?>
    <section class="presupuestador-step1">
      <div class="stepper-steps">
        <div class="stepper-step stepper-step-isActive">
          <div class="stepper-stepContent">
            <span class="stepper-stepMarker">1</span><span class='labelStep'>Tu traducción</span>
          </div>
        </div>
        <div class="stepper-step">
          <div class="stepper-stepContent">
            <span class="stepper-stepMarker">2</span><span class='labelStep'>Precio traducción + Descuentos</span>
          </div>
        </div>
        <div class="stepper-step">
          <div class="stepper-stepContent">
            <span class="stepper-stepMarker">3</span><span class='labelStep'>Solicitud enviada</span>
          </div>
        </div>
      </div>
      <div class="stepper-content">
        <div class="row" id="presupuesto">
          <div class="col-12 col-md-12 col-lg-12 no-gutters">
            <div class="home_1">
              <div class="col-md-12 home_2">
                <h4 class="text-center home_3">Selecciona tu tipo de traducción, el idioma y número de palabras...</h4>
              </div>
              <div class="col-md-12">
                <?php echo $errors ? '<p class="error">' . $errors . '</p>' : '' ?>
                <form action="#step2" method="post" name="theForm" id="theForm">
                <fieldset>
                  <div class="container">
                    <div class="form-group row d-flex justify-content-center">
                      <label for="inputPassword" class="col-md-2 col-sm-12 col-form-label text-center">Traducción</label>
                      <div class="col-md-2 col-sm-12">
                        <select class="form-control" id="trad" name="trad">
                          <option value="tech"<?php echo $type == 'tech' || $type == '' ? ' selected="selected"' : '' ?>>Normal</option>
                          <option value="jur"<?php echo $type == 'jur' ? ' selected="selected"' : '' ?>>Jurada</option>
                        </select>
                      </div>
                      <label for="inputPassword" class="col-md-1 col-sm-12 col-form-label text-center">de</label>
                      <div class="col-md-2 col-sm-12">
                        <select class="form-control" id="language" name="language">
                          <option value="al"<?php echo $languageA == 'al' ? ' selected="selected"' : '' ?>>Alemán</option>
                          <option value="ar"<?php echo $languageA == 'ar' ? ' selected="selected"' : '' ?>>Árabe</option>
                          <option value="bu"<?php echo $languageA == 'bu' ? ' selected="selected"' : '' ?>>Búlgaro</option>
                          <option value="ca"<?php echo $languageA == 'ca' ? ' selected="selected"' : '' ?>>Catalán</option>
                          <option value="ce"<?php echo $languageA == 'ce' ? ' selected="selected"' : '' ?>>Checo</option>
                          <option value="ch"<?php echo $languageA == 'ch' ? ' selected="selected"' : '' ?>>Chino</option>
                          <option value="da"<?php echo $languageA == 'da' ? ' selected="selected"' : '' ?>>Danés</option>
                          <option value="es"<?php echo $languageA == 'es' || !$languageA ? ' selected="selected"' : '' ?>>Español</option>
                          <option value="eu"<?php echo $languageA == 'eu' ? ' selected="selected"' : '' ?>>Euskera</option>
                          <option value="fi"<?php echo $languageA == 'fi' ? ' selected="selected"' : '' ?>>Finés</option>
                          <option value="fr"<?php echo $languageA == 'fr' ? ' selected="selected"' : '' ?>>Francés</option>
                          <option value="ga"<?php echo $languageA == 'ga' ? ' selected="selected"' : '' ?>>Gallego</option>
                          <option value="gr"<?php echo $languageA == 'gr' ? ' selected="selected"' : '' ?>>Griego</option>
                          <option value="ho"<?php echo $languageA == 'ho' ? ' selected="selected"' : '' ?>>Holandés</option>
                          <option value="en"<?php echo $languageA == 'en' ? ' selected="selected"' : '' ?>>Inglés</option>
                          <option value="it"<?php echo $languageA == 'it' ? ' selected="selected"' : '' ?>>Italiano</option>
                          <option value="ja"<?php echo $languageA == 'ja' ? ' selected="selected"' : '' ?>>Japonés</option>
                          <option value="ma"<?php echo $languageA == 'ma' ? ' selected="selected"' : '' ?>>Mallorquín</option>
                          <option value="po"<?php echo $languageA == 'po' ? ' selected="selected"' : '' ?>>Polaco</option>
                          <option value="pg"<?php echo $languageA == 'pg' ? ' selected="selected"' : '' ?>>Portugés</option>
                          <option value="rm"<?php echo $languageA == 'rm' ? ' selected="selected"' : '' ?>>Rumano</option>
                          <option value="ru"<?php echo $languageA == 'ru' ? ' selected="selected"' : '' ?>>Ruso</option>
                          <option value="su"<?php echo $languageA == 'su' ? ' selected="selected"' : '' ?>>Sueco</option>
                          <option value="va"<?php echo $languageA == 'va' ? ' selected="selected"' : '' ?>>Valenciano</option>
                        </select>
                      </div>
                      <label for="inputPassword" class="col-md-1 col-sm-12 col-form-label text-center">a</label>
                      <div class="col-md-2 col-sm-12">
                        <select class="form-control" id="language2" name="language2">
                          <option value="al"<?php echo $languageB == 'al' ? ' selected="selected"' : '' ?>>Alemán</option>
                          <option value="ar"<?php echo $languageB == 'ar' ? ' selected="selected"' : '' ?>>Árabe</option>
                          <option value="bu"<?php echo $languageB == 'bu' ? ' selected="selected"' : '' ?>>Búlgaro</option>
                          <option value="ca"<?php echo $languageB == 'ca' ? ' selected="selected"' : '' ?>>Catalán</option>
                          <option value="ce"<?php echo $languageB == 'ce' ? ' selected="selected"' : '' ?>>Checo</option>
                          <option value="ch"<?php echo $languageB == 'ch' ? ' selected="selected"' : '' ?>>Chino</option>
                          <option value="da"<?php echo $languageB == 'da' ? ' selected="selected"' : '' ?>>Danés</option>
                          <option value="es"<?php echo $languageB == 'es' ? ' selected="selected"' : '' ?>>Español</option>
                          <option value="eu"<?php echo $languageB == 'eu' ? ' selected="selected"' : '' ?>>Euskera</option>
                          <option value="fi"<?php echo $languageB == 'fi' ? ' selected="selected"' : '' ?>>Finés</option>
                          <option value="fr"<?php echo $languageB == 'fr' ? ' selected="selected"' : '' ?>>Francés</option>
                          <option value="ga"<?php echo $languageB == 'ga' ? ' selected="selected"' : '' ?>>Gallego</option>
                          <option value="gr"<?php echo $languageB == 'gr' ? ' selected="selected"' : '' ?>>Griego</option>
                          <option value="ho"<?php echo $languageB == 'ho' ? ' selected="selected"' : '' ?>>Holandés</option>
                          <option value="en"<?php echo $languageB == 'en' || !$languageB ? ' selected="selected"' : '' ?>>Inglés</option>
                          <option value="it"<?php echo $languageB == 'it' ? ' selected="selected"' : '' ?>>Italiano</option>
                          <option value="ja"<?php echo $languageB == 'ja' ? ' selected="selected"' : '' ?>>Japonés</option>
                          <option value="ma"<?php echo $languageB == 'ma' ? ' selected="selected"' : '' ?>>Mallorquín</option>
                          <option value="po"<?php echo $languageB == 'po' ? ' selected="selected"' : '' ?>>Polaco</option>
                          <option value="pg"<?php echo $languageB == 'pg' ? ' selected="selected"' : '' ?>>Portugés</option>
                          <option value="rm"<?php echo $languageB == 'rm' ? ' selected="selected"' : '' ?>>Rumano</option>
                          <option value="ru"<?php echo $languageB == 'ru' ? ' selected="selected"' : '' ?>>Ruso</option>
                          <option value="su"<?php echo $languageB == 'su' ? ' selected="selected"' : '' ?>>Sueco</option>
                          <option value="va"<?php echo $languageB == 'va' ? ' selected="selected"' : '' ?>>Valenciano</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class='row d-flex justify-content-center'>
                    <div class='col-md-6'>
                      <div class="form-group">
                        <div class="col-md-12 text-center">
                          <label for="number" class="text-center">Introduce el <strong>número</strong> de <strong>palabras</strong> de tu(s) documento(s).</label>
                          <input type="text" class="form-control" name="number" value="<?php echo $numwords ? $numwords : '' ?>" placeholder="ej, 856, 1000, 1235" class="w80">
                        </div>
                      </div>
                    </div>
                    <div class='col-md-10'>
                      <div class="form-group">
                        <div class="col-md-12 text-center">
                          <label for="text" class="text-center">O si lo prefieres, pega el <strong>texto</strong> y lo contamos por ti.</label>
                          <textarea name="text" id="text" class="form-control" placeholder="Contador de palabras" rows="5"><?php echo $text ? $text : '' ?></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12 text-center">
                      <button name="presupuestar" id="presupuestar" class=""  type="submit"  onmousedown="ga('send', 'event', 'Interacciones', 'Presupuesto');">Presupuestar</button>
                    </div>
                    <br>
                    <br>
                  </div>
                </fieldset>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!--Presulario-->
        <!--Presupuestador con documento-->
        <div class="container mt-5">
            <div class="text-center">
              <h4>¿No puedes contar las palabras de tu documento?</h4>
            </div>
            <div class="text-center">
              <img src="https://vo-traducciones.com/wp-content/uploads/2020/07/fecha-down.png" alt="" class="img-fluid" style="width:100%; max-width:150px;" >
            </div>
        </div>
        <section class="presupuestador-palabra">
          <h3 style="text-align:center" class="pt-2 pb-4"></h3>
          <div class="stepper-content">
            <div class="row d-flex justify-content-center">
              <div class="col-12 col-md-12 col-lg-12 no-gutters">
                <div class="home_1">
                  <div class="col-md-12 home_2">
                    <h4 class="text-center home_3">Envíanos tu documento para agilizar tu presupuesto.</h4>
                  </div>
                  <div class="col-md-12">
                    <form method="post" enctype="multipart/form-data">
                    <fieldset>
                      <div class="container">
                        <div class="form-group row d-flex justify-content-center">
                           <div class="col-md-6">
                              <div class="form-group">
                                <div class="col-md-12 text-center">
                                  <label for="number" class="text-center">Correo Electrónico</label>
                                    <input type="text" class="form-control" name="correoelectronico" id="mail" value="" placeholder="Correo" required>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <div class="col-md-12 text-center">
                                  <label for="number" class="text-center">Idiomas</label>
                                  <input type="text" class="form-control" name="language" id="language" value="" placeholder="Por ejemplo: Español - Chino" required>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-6">
                                <div class='form-group'>
                          <div class="col-md-12">
                            <label for=""><h3 class="text-info text-center">Selecciona tu archivo</h3></label>
                          </div>
                          <div class='col-md-12'>
                            <input type="file" name="doc" id="doc" class="estilo-files"  required/>
                            <input type="hidden" name="email" value="<?php echo $email; ?>">
                          </div>
                          <div class='col-md-12'>
                            <small>* Si tienes más de un documento, comprímelo en ZIP.</small>
                          </div>
                        </div>
                                
                            </div>
                            
                          </div>
                          
                        </div>
                      </div>
                      <div class='row d-flex justify-content-center'>
                        <div class="col-md-12 text-center pt-3 pb-3">
                            <button name="formularioArchivo" id='formularioArchivo' class="color-boton-igualar btn btn-primary btn-lg"  type="submit">Agilizar Presupuesto</button>
                        </div>
                    </fieldset>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!--Presupuestador con documento-->
        <!--Precio por palabra-->
        <section class="presupuestador-palabra">
          <h3 style="text-align:center" class="pt-5 pb-4">También puedes calcular el € por palabra de tu traducción.</h3>
          <div class="stepper-content mt-4">
            <div class="row d-flex justify-content-center">
              <div class="col-12 col-md-12 col-lg-12 no-gutters">
                <div class="home_1">
                  <div class="col-md-12 home_2">
                    <h4 class="text-center home_3">Selecciona tu tipo de traducció y el idioma...</h4>
                  </div>
                  <div class='col-md-12'>
                    <h5 class="text-left text-muted">Precio por Palabra</h5>
                    <?php echo isset($pricep) ? '<p class="total">Total: <strong>' . $pricep . '€</strong></p>' : '' ?>
                  </div>
                  <div class="col-md-12">
                    <form action="#tradPalabra" method="post">
                    <fieldset>
                      <div class="container">
                        <div class="form-group row d-flex justify-content-center">
                          <label for="inputPassword" class="col-md-2 col-sm-12 col-form-label text-center">Traducción</label>
                          <div class="col-md-2 col-sm-12">
                            <select id="trad" class='form-control' name="trad">
                              <option value="tech"<?php if (isset($typep) && $typep == 'tech') {
                              ?> selected="selected"<?php
                              } ?>>Normal
                              </option>
                              <option value="jur"<?php if (isset($typep) && $typep == 'jur') {
                              ?> selected="selected"<?php
                              } ?>>Jurada
                              </option>
                            </select>
                          </div>
                          <label for="inputPassword" class="col-md-2 col-sm-12 col-form-label text-center">de</label>
                          <div class="col-md-2 col-sm-12">
                            <select class='form-control' id="language" name="language">
                              <option value="al"<?php echo $languageA == 'al' ? ' selected="selected"' : '' ?>>Alemán</option>
                              <option value="ar"<?php echo $languageA == 'ar' ? ' selected="selected"' : '' ?>>Árabe</option>
                              <option value="bu"<?php echo $languageA == 'bu' ? ' selected="selected"' : '' ?>>Búlgaro</option>
                              <option value="ca"<?php echo $languageA == 'ca' ? ' selected="selected"' : '' ?>>Catalán</option>
                              <option value="ce"<?php echo $languageA == 'ce' ? ' selected="selected"' : '' ?>>Checo</option>
                              <option value="ch"<?php echo $languageA == 'ch' ? ' selected="selected"' : '' ?>>Chino</option>
                              <option value="da"<?php echo $languageA == 'da' ? ' selected="selected"' : '' ?>>Danés</option>
                              <option value="es"<?php echo $languageA == 'es' || !$languageA ? ' selected="selected"' : '' ?>>Español</option>
                              <option value="eu"<?php echo $languageA == 'eu' ? ' selected="selected"' : '' ?>>Euskera</option>
                              <option value="fi"<?php echo $languageA == 'fi' ? ' selected="selected"' : '' ?>>Finés</option>
                              <option value="fr"<?php echo $languageA == 'fr' ? ' selected="selected"' : '' ?>>Francés</option>
                              <option value="ga"<?php echo $languageA == 'ga' ? ' selected="selected"' : '' ?>>Gallego</option>
                              <option value="gr"<?php echo $languageA == 'gr' ? ' selected="selected"' : '' ?>>Griego</option>
                              <option value="ho"<?php echo $languageA == 'ho' ? ' selected="selected"' : '' ?>>Holandés</option>
                              <option value="en"<?php echo $languageA == 'en' ? ' selected="selected"' : '' ?>>Inglés</option>
                              <option value="it"<?php echo $languageA == 'it' ? ' selected="selected"' : '' ?>>Italiano</option>
                              <option value="ja"<?php echo $languageA == 'ja' ? ' selected="selected"' : '' ?>>Japonés</option>
                              <option value="ma"<?php echo $languageA == 'ma' ? ' selected="selected"' : '' ?>>Mallorquín</option>
                              <option value="po"<?php echo $languageA == 'po' ? ' selected="selected"' : '' ?>>Polaco</option>
                              <option value="pg"<?php echo $languageA == 'pg' ? ' selected="selected"' : '' ?>>Portugés</option>
                              <option value="rm"<?php echo $languageA == 'rm' ? ' selected="selected"' : '' ?>>Rumano</option>
                              <option value="ru"<?php echo $languageA == 'ru' ? ' selected="selected"' : '' ?>>Ruso</option>
                              <option value="su"<?php echo $languageA == 'su' ? ' selected="selected"' : '' ?>>Sueco</option>
                              <option value="va"<?php echo $languageA == 'va' ? ' selected="selected"' : '' ?>>Valenciano</option>
                            </select>
                          </div>
                          <label for="inputPassword" class="col-md-2 col-sm-12 col-form-label text-center">a</label>
                          <div class="col-md-2 col-sm-12">
                            <select class='form-control' id="language2" name="language2">
                              <option value="al"<?php echo $languageB == 'al' ? ' selected="selected"' : '' ?>>Alemán</option>
                              <option value="ar"<?php echo $languageB == 'ar' ? ' selected="selected"' : '' ?>>Árabe</option>
                              <option value="bu"<?php echo $languageB == 'bu' ? ' selected="selected"' : '' ?>>Búlgaro</option>
                              <option value="ca"<?php echo $languageB == 'ca' ? ' selected="selected"' : '' ?>>Catalán</option>
                              <option value="ce"<?php echo $languageB == 'ce' ? ' selected="selected"' : '' ?>>Checo</option>
                              <option value="ch"<?php echo $languageB == 'ch' ? ' selected="selected"' : '' ?>>Chino</option>
                              <option value="da"<?php echo $languageB == 'da' ? ' selected="selected"' : '' ?>>Danés</option>
                              <option value="es"<?php echo $languageB == 'es' ? ' selected="selected"' : '' ?>>Español</option>
                              <option value="eu"<?php echo $languageB == 'eu' ? ' selected="selected"' : '' ?>>Euskera</option>
                              <option value="fi"<?php echo $languageB == 'fi' ? ' selected="selected"' : '' ?>>Finés</option>
                              <option value="fr"<?php echo $languageB == 'fr' ? ' selected="selected"' : '' ?>>Francés</option>
                              <option value="ga"<?php echo $languageB == 'ga' ? ' selected="selected"' : '' ?>>Gallego</option>
                              <option value="gr"<?php echo $languageB == 'gr' ? ' selected="selected"' : '' ?>>Griego</option>
                              <option value="ho"<?php echo $languageB == 'ho' ? ' selected="selected"' : '' ?>>Holandés</option>
                              <option value="en"<?php echo $languageB == 'en' || !$languageB ? ' selected="selected"' : '' ?>>Inglés</option>
                              <option value="it"<?php echo $languageB == 'it' ? ' selected="selected"' : '' ?>>Italiano</option>
                              <option value="ja"<?php echo $languageB == 'ja' ? ' selected="selected"' : '' ?>>Japonés</option>
                              <option value="ma"<?php echo $languageB == 'ma' ? ' selected="selected"' : '' ?>>Mallorquín</option>
                              <option value="po"<?php echo $languageB == 'po' ? ' selected="selected"' : '' ?>>Polaco</option>
                              <option value="pg"<?php echo $languageB == 'pg' ? ' selected="selected"' : '' ?>>Portugés</option>
                              <option value="rm"<?php echo $languageB == 'rm' ? ' selected="selected"' : '' ?>>Rumano</option>
                              <option value="ru"<?php echo $languageB == 'ru' ? ' selected="selected"' : '' ?>>Ruso</option>
                              <option value="su"<?php echo $languageB == 'su' ? ' selected="selected"' : '' ?>>Sueco</option>
                              <option value="va"<?php echo $languageB == 'va' ? ' selected="selected"' : '' ?>>Valenciano</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class='row d-flex justify-content-center'>
                        <div class="col-md-12 text-center pt-3 pb-3">
                          <button name="submitPrecio" class="color-boton-igualar btn btn-primary btn-lg" onClick="_gaq.push(['_trackEvent', 'Interacciones', 'PrecioPalabra']);" type="submit">Calcular precio por palabra</button>
                        </div>
                    </fieldset>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!--Precio por palabra-->
        <!--Texto final instrucciones-->
        <div class="stepper-content mt-4">
          <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-12 col-lg-12 no-gutters">
              <div class="home_1">               
                <div class="col-md-12 text-center  pt-4 pb-4">
                  <h2>¿Cómo se calcula el precio de una traducción?</h2>
                  <p>Con nuestra herramienta online te daremos un presupuesto de traducción 
                  entre cualquier idioma de origen al que necesites. Indicando si se trata 
                  de una traducción normal o jurada, o de si la necesitas con urgencia, te 
                  podremos orientar del precio que supone.</p>
                  <h2>Qué tipo de traducción buscas?</h2>
                  <p>Somos profesionales en traducir textos específicos en cada área:Traducción Contable Y Fiscal, 
                  Traducciones Farmacéuticas, Científicas o Médicas, de patentes, páginas web, de cualquier idioma, 
                  o servicios de subtitulación, Transcripción, Interpretación Consecutiva o Simultánea. Nuestro equipo 
                  lo componen traductores nativos con años de experiencia en traducir documentos importantes en cada 
                  campo profesional.</p>
                  <h2>Pídenos presupuesto</h2>
                  <p>Qué idioma necesitar traducir: Inglés, Francés, alemán, italiano, chino.... Solo tienes que escribirnos.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--Texto final instrucciones-->
      </div>
    </section>
    <?php endif; ?>
  </div>
  </div>
</div>
</section>
<style media="screen">
@media screen and (max-width: 440px){
  .estilo-files{
    font-size: 12px !important;
  }
  .titulo-step-1-presylario{
    font-size: 1.5rem;
  }
  .subtitulo-step-1-presylario{
    font-size: 1.2rem;
  }
}

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
    <?php get_footer(); ?>
    