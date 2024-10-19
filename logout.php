<?php
// Para iniciar la sesion
session_start();

//Destruir sesion
session_destroy();

//redirecciona a login
header('Location: login.php');
exit();
?>
