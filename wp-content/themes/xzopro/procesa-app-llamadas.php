
<?php
/*
Template Name: page procesa appllamadas
*/
    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    global $wp;
    global $wpdb;
    global $upload_dir;
    $date_mysql = date('Y-m-d H:i:s', $_SERVER['REQUEST_TIME']);
    $referer=home_url( $wp->request );
    $referer = empty($referer) ? 'index.php' : $referer;
    $nombre = $_GET['nombre'];  
    $telefono = $_GET['telefono'];

    if(empty($nombre || $telefono)){
        wp_redirect('https://vo-traducciones.com/');
        die();
    }
    $wpdb->insert('traducciones',array( 'mail'=> null,
                                        'phone'=> $telefono ,
                                        'language'=> null ,
                                        'confidentiality' => null,
                                        'dateout' => null ,
                                        'date'=> $date_mysql,
                                        'ip' => null ,
                                        'referer' => null));
    $id=$wpdb->insert_id;
            
    $msg =  "<br><strong>Nombre:</strong> $nombre \r\n";
    $msg .= "<br><strong>Teléfono:</strong> $telefono \r\n";
    $msg .= "<br><strong>Referencia:</strong> W$id \r\n";
    $msg .= "<br><strong>Página:</strong> $referer \r\n";

    
    $msg .= "<br>---Información del Usuario--- \r\n"; //Title
    $subject = 'Solicitud de Presupuesto AppLlamadas W' . $id . '';
    $headers = "Content-type:text/html;charset=UTF-8" . "\r\n";

    
    if (wp_mail('vo@vo-traducciones.com, ricardo.perezdecastro@gmail.com, mark.schuback@gmail.com, ignacioreyna56@gmail.com', $subject, $msg, $headers,$adjtunto)) {
        $contact = ' Solicitud y archivo(s) enviados correctamente';
    } else {
        $contact = 'No hemos podido mandar su mensaje, por favor, inténtelo de nuevo.';
    }
    ?>
    <script>
    window.location.replace("https://vo-traducciones.com/appllamadas-gracias/?id=<?php echo $id; ?>");
    </script>
