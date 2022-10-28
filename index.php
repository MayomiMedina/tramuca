<?php 
require_once "controladores/controladorIndex.php";
require_once "controladores/controladorUsuarios.php";
//require_once "controladores/controladorCliente.php"
$index = new controladorUsuarios();
$index -> ctrIndex();

?>
