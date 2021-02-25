<?php


require('config.php');

echo $_GET['name'];
$nombre = $_GET['name'];
$mensaje = $_GET['mensaje'];

$consultas = mysqli_query($connection,"INSERT INTO `ciw_mensajes_mx` (`id`, `nombre`, `mensaje`) VALUES (NULL, '$nombre', '$mensaje');");

$filas = mysqli_num_rows($consultas);

$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'mypage.php';
header("Location: http://$host$uri");
?>


    
