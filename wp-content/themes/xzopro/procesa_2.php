
<?php
/*
Template Name: page procesa_2
*/   
    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    global $wp;
    global $wpdb;
    global $upload_dir;  
    $date_mysql = date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME']);
    $referer=home_url( $wp->request );
    $referer = empty($referer) ? 'index.php' : $referer;
    $email = $_POST['correo'];  
    $idioma = $_POST['idioma'];
    $telefono = $_POST['telefono'];
    $fecha = $_POST['date'];
    $newClient = $_POST['newClient'];
    $online = $_POST['online'];
    $referer = $_POST['fechaFormularios'];
    $filesize = $_FILES['doc']['size'] / 1024;


    
   if($newClient == 1){
    $newClientNew = 'Si';
   }else{
    $newClientNew = 'No';
   }

   if($online == 1){
    $onlineNew = 'Si';
   }else{
    $onlineNew = 'No';
   }


   

    if(empty($email || $telefono || $fecha )){
        wp_redirect('https://vo-traducciones.com/');
        die();
    }
    

    if(empty($filesize)){
        $email = $_POST['correo'];  
        $idioma = $_POST['idioma'];
        $telefono = $_POST['telefono'];
        $fecha = $_POST['date'];
        $referer = $_POST['fechaFormularios'];

        //Inserta en BD
        $wpdb->insert('traducciones',array( 'mail'=>$email,
                'phone'=> $telefono ,
                'language'=> $idioma ,
                'confidentiality' => null,
                'dateout' => $fecha ,
                'date'=> $date_mysql,
                'ip' => null ,
                'referer' => $referer));
        $id=$wpdb->insert_id;
                
        //Armado de coreo a VO
        $msg =  "<br><strong>Correo:</strong> $email \r\n";
        $msg .= "<br><strong>Teléfono:</strong> $telefono \r\n";
        $msg .= "<br><strong>Referencia:</strong> W$id \r\n";
        $msg .= "<br><strong>Fecha:</strong> W$fecha \r\n";
        $msg .= "<br><strong>Idioma:</strong> $idioma \r\n";
        $msg .= "<br><strong>Descuento nuevo cliente:</strong> $newClientNew \r\n";
        $msg .= "<br><strong>Descuento por solicitud vía web:</strong> $onlineNew \r\n";
        $msg .= "<br><strong>Página:</strong> $referer \r\n";
        $msg .= "<br>---Información del Usuario--- \r\n"; 
        $subject = 'Solicitud de Presupuesto W' . $id . '';
        $headers = "Content-type:text/html;charset=UTF-8" . "\r\n";

        //Validacion de envio de formulario
        if (wp_mail('ignacioreyna56@gmail.com', $subject, $msg, $headers)) {
            $contact = ' Solicitud y archivo(s) enviados correctamente';
        } else {
                $contact = 'No hemos podido mandar su mensaje, por favor, inténtelo de nuevo.';
        }
    //ELSE
    }else{
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

        $wpdb->insert('traducciones',
            array( 'mail'=>$email,
                    'phone'=> $telefono ,
                    'language'=> $idioma ,
                    'confidentiality' => null,
                    'dateout' => $fecha ,
                    'date'=> $date_mysql,
                    'ip' => null ,
                    'referer' => $referer));
        $id=$wpdb->insert_id;
        
        $msg =  "<br><strong>Correo:</strong> $email \r\n";
        $msg .= "<br><strong>Teléfono:</strong> $telefono \r\n";
        $msg .= "<br><strong>Referencia:</strong> W$id \r\n";
        $msg .= "<br><strong>Fecha:</strong> W$fecha \r\n";
        $msg .= "<br><strong>Idioma:</strong> $idioma \r\n";
        $msg .= "<br><strong>Archivo:</strong> $nombreNuevo \r\n";
        $msg .= "<br><strong>Descuento nuevo cliente:</strong> $newClientNew \r\n";
        $msg .= "<br><strong>Descuento por solicitud vía web:</strong> $onlineNew \r\n";
        $msg .= "<br><strong>Archivo:</strong> $nombreNuevo \r\n";
        $msg .= "<br><strong>Página:</strong> $referer \r\n";
        $msg .= "<br>---Información del Usuario--- \r\n"; //Title
        $subject = 'Solicitud de Presupuesto W' . $id . ' con documento';
        $headers = "Content-type:text/html;charset=UTF-8" . "\r\n";

        if (wp_mail('vo@vo-traducciones.com, ricardo.perezdecastro@gmail.com, mark.schuback@gmail.com, ignacioreyna56@gmail.com', $subject, $msg, $headers,$adjtunto)) {
            $contact = ' Solicitud y archivo(s) enviados correctamente';
        } else {
            $contact = 'No hemos podido mandar su mensaje, por favor, inténtelo de nuevo.';
        }
    }
    

    //Correo A
    $msga = '<p>Hola,<br><br>';
    $msga .= "Antes que nada, gracias por tu tiempo. La referencia de tu solicitud es <strong>W$id</strong></p>";
    $msga .= "<p><ul><li><strong>Idioma</strong>: $idioma <br></li>";
    $msga .= '<p><strong>Promoción Exclusiva</strong></p>';
    $msga .= '<p>Asegurarse tener una traducción de calidad es muy sencillo. <strong>Y si además pagas menos, mejor.</strong>.</p>';
    $msga .= '<p>Por eso, si nos encargas el trabajo de traducción de esta solicitud, te ofrecemos un <strong>10% de descuento en tu próxima traducción</strong>. Este descuento no tiene fecha de caducidad.</p>';
    $msga .= '<p>El único requisito es que esta sea <strong>la primera vez que disfrutas de esta promoción</strong>.</p>';
    $msga .= '<p>¿Tienes preguntas? Responde a este email con todas tus dudas, o llámanos al 91 445 44 16.</p>';
    $msga .= '<p>Trabajamos para satisfacer a todos nuestros clientes.</p>';
    $msga .= '<p>Saludos cordiales,<br>';
    $msga .= 'El equipo de  V.O. Traducciones</p>';
    $subjecta = 'Tu solicitud de presupuesto online (y una promoción exclusiva)';
    $headersa = "Content-type:text/html;charset=UTF-8" . "\r\n";
       
    if (wp_mail($email, $subjecta, $msga, $headersa)) {
        $contact = ' Solicitud y archivo(s) enviados correctamente';
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
    $subjectb = "Descuentos, Privacidad, Precio Final: ¿Tienes preguntas sobre éstos u otros temas?";
    $headersb = "Content-type:text/html;charset=UTF-8" . "\r\n";


    if (wp_mail($email, $subjectb, $msgb, $headersb)) {
        $contact = ' Solicitud y archivo(s) enviados correctamente';
    } else {
        $contact = 'No hemos podido mandar su mensaje, por favor, inténtelo de nuevo.';
    }
    ?>
    <script>
    window.location.replace("https://vo-traducciones.com/formulario-gracias/");
    </script>
