<?php
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
  global $wpdb;
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

  $msg = '<p>Hola,<br><br>';
  $msg .= "Antes que nada, gracias por tu tiempo. La referencia de tu solicitud es <strong>W$id</strong></p>";
  $msg .= "<p><ul><li><strong>Idioma</strong>: $fromLanguage a $toLanguage<br></li>";
  $msg .= "<li><strong>Palabras</strong>: $numwords<br></li>";
  $msg .= "<li><strong>€'s</strong>:$total<br></li>";
  $msg .= "<li><strong>Traducción</strong>: $type</p></li>";
  $msg .= '<p><strong>Promoción Exclusiva</strong></p>';
  $msg .= '<p>Asegurarse tener una traduccion de calidad es muy sencillo. <strong>Y si ademas pagas menos, mejor</strong>.</p>';
  $msg .= '<p>Por eso, si nos encargas el trabajo de traduccion de esta solicitud, te ofrecemos un <strong>10% de descuento en tu proxima traducción</strong>. Este descuento no tiene fecha de caducidad.</p>';
  $msg .= '<p>El unico requisito es que esta sea <strong>la primera vez que disfrutas de esta promocion</strong>.</p>';
  $msg .= '<p>¿Tienes preguntas? Responde a este email con todas tus dudas, o llámanos al 91 445 44 16.</p>';
  $msg .= '<p>Trabajamos para satisfacer a todos nuestros clientes.</p>';
  $msg .= '<p>Saludos cordiales,<br>';
  $msg .= 'El equipo de  V.O. Traducciones</p>';
  $subject = 'Tu solicitud de presupuesto online (y una promocion exclusiva)';

  $header = "From: V.O. Traducciones <vo@vo-traducciones.com>\r\n";
  $header .= "Reply-To: V.O. Traducciones <vo@vo-traducciones.com>\r\n";
  $header .= "Content-type: text/html; charset=UTF-8\r\n";
 
  if (!wp_mail($email, $subject, $msg, $header)) {
  $correoNotSentUserPresu = 'No hemos podido enviar tu mensaje, inténtalo de nuevo más tarde.<br>';
  }

  $msg = '<p>Hola de nuevo,<br><br>';
  $msg.= 'Estas son las preguntas mas frecuentes de quienes nos solicitan un presupuesto de traduccion. <strong> Esperamos te sean utiles</strong>.</p>';
  $msg.= '<p><strong>¿Tenéis flexibilidad para ajustar el coste a mis necesidades particulares?</strong><br>';
  $msg.= 'Si tienes un presupuesto ajustado o el <a href="http://www.vo-traducciones.com/presupuesto" target="_blank" title="Presupuesto que has generado online"> presupuesto que has generado online </a>  no se ha <strong> adecuado a tus necesidades </strong>  no dudes en hacérnolos saber: llama al 91 445 44 16 o preferiblemente, envíanos el documento a traducir a <a href="mailto:vo@vo-traducciones.com" target="_blank">vo@vo-traducciones.com</a></p>';
  $msg.= '<p><strong>¿Tengo descuentos por volumen de trabajo o por alguna otra razón? </strong><br>';
  $msg.= 'Tenemos diferentes tipos de descuentos.Responde a este <a href= "http://www.vo-traducciones.com/traduccion-profesional-descuentos.php" title="Correo">correo</a> y dinos el número aproximado de palabras a traducir por mes.</p>
  <p><strong>¿Cómo protegéis la privacidad de mi documentación? </strong> <br>
  Tenemos acuerdos de confidencialidad con nuestros traductores. Además, contamos con tencología de encriptación para el intercambio de información vía emails.</p>
  <p><strong> ¿Cuál es el cargo mínimo por trabajo de traducción? </strong><br>
  Independiemente el número de palabras, se cobrará un mínimo de: <br>
  <ul><li> €40 por traducción No Jurada</li><br>
  <li> €50 por traducción Jurada </li> </ul> </p>
  <p><strong> Mi traducción es urgente ¿Cómo caluláis el precio? </strong><br>
  Una traducción urgente es en general la que se tiene que entregar el mismo día que se solicita o que tiene un volumen de traducción de más de 2,500 palabras/día laborable. Para estos encargos aplicamos un <strong> recargo aproximado de 25% </strong> sobre la tarifa estandar.</p>
  <p> Si tienes otras preguntas no dudes en contactarnos en el Tlf: 91 445 4416 (o responde a este correo). </p>
  <p> Saludos cordiales,<br>
  El equipo de V.O. Traducciones</p>';

  $subject = "Descuentos, Privacidad, Precio Final: ¿Tienes preguntas sobre éstos u otros temas?";
  $header = "From: V.O. Traducciones <vo@vo-traducciones.com>\r\n";
  $header .= "Reply-To: V.O. Traducciones <vo@vo-traducciones.com>\r\n";
  $header = "Content-type: text/html; charset=UTF-8\r\n";

  if(!wp_mail($email, $subject, $msg, $header))
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

  if (wp_mail('vo@vo-traducciones.com, ricardo.perezdecastro@gmail.com, mark.schuback@gmail.com, ignacioreyna56@gmail.com', $subject, $msg, $header)) {
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
        if (wp_mail('vo@vo-traducciones.com, ricardo.perezdecastro@gmail.com, mark.schuback@gmail.com, ignacioreyna56@gmail.com', $subject, $msg, $header)) {
            $contact = 'Solicitud y archivo(s) enviados correctamente';
        } else {
            $contact = 'No hemos podido mandar su mensaje, por favor, inténtelo de nuevo.';
        }
            
        $msg = '<p>Hola,<br><br>';
        $msg .= "Antes que nada, gracias por tu tiempo. La referencia de tu solicitud es <strong>W$id</strong></p>";
        $msg .= "<p><ul><li><strong>Idioma</strong>: $language<br></li>";
        $msg .= '<p><strong>Promoción Exclusiva</strong></p>';
        $msg .= '<p>Asegurarse tener una traduccion de calidad es muy sencillo. <strong>Y si ademas pagas menos, mejor</strong>.</p>';
        $msg .= '<p>Por eso, si nos encargas el trabajo de traduccion de esta solicitud, te ofrecemos un <strong>10% de descuento en tu proxima traducción</strong>. Este descuento no tiene fecha de caducidad.</p>';
        $msg .= '<p>El unico requisito es que esta sea <strong>la primera vez que disfrutas de esta promocion</strong>.</p>';
        $msg .= '<p>¿Tienes preguntas? Responde a este email con todas tus dudas, o llámanos al 91 445 44 16.</p>';
        $msg .= '<p>Trabajamos para satisfacer a todos nuestros clientes.</p>';
        $msg .= '<p>Saludos cordiales,<br>';
        $msg .= 'El equipo de  V.O. Traducciones</p>';
        $subject = 'Tu solicitud de presupuesto online (y una promocion exclusiva)';
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
              if (wp_mail('vo@vo-traducciones.com, ricardo.perezdecastro@gmail.com, mark.schuback@gmail.com, ignacioreyna56@gmail.com', $subject, $msg, $header)) {
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
        if (wp_mail(' ignacioreyna56@gmail.com', $subject, $msg, $header)) {
            $contact = 'Solicitud y archivo(s) enviados correctamente';
        } else {
            $contact = 'No hemos podido mandar su mensaje, por favor, inténtelo de nuevo.';
        }
            
        $msg = '<p>Hola,<br><br>';
        $msg .= "Antes que nada, gracias por tu tiempo. La referencia de tu solicitud es <strong>W$id</strong></p>";
        $msg .= "<p><ul><li><strong>Idioma</strong>: $language<br></li>";
        $msg .= '<p><strong>Promoción Exclusiva</strong></p>';
        $msg .= '<p>Asegurarse tener una traduccion de calidad es muy sencillo. <strong>Y si ademas pagas menos, mejor</strong>.</p>';
        $msg .= '<p>Por eso, si nos encargas el trabajo de traduccion de esta solicitud, te ofrecemos un <strong>10% de descuento en tu proxima traducción</strong>. Este descuento no tiene fecha de caducidad.</p>';
        $msg .= '<p>El unico requisito es que esta sea <strong>la primera vez que disfrutas de esta promocion</strong>.</p>';
        $msg .= '<p>¿Tienes preguntas? Responde a este email con todas tus dudas, o llámanos al 91 445 44 16.</p>';
        $msg .= '<p>Trabajamos para satisfacer a todos nuestros clientes.</p>';
        $msg .= '<p>Saludos cordiales,<br>';
        $msg .= 'El equipo de  V.O. Traducciones</p>';
        $subject = 'Tu solicitud de presupuesto online (y una promocion exclusiva)';
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
    }




          ?>