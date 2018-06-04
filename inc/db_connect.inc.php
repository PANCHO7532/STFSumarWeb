<?php
include 'config.parse.php';
function mysqlreq($consulta) {
    include 'config.parse.php';
    $link = mysql_connect($configinc['dbhost'].":".$configinc['dbport'], $configinc['dbuser'], $configinc['dbpass']);
	if(!$link) {
		echo "<head><title>ERROR</title><fieldset><legend>MySQL ERROR</legend><p>No se puede conectar a la base de datos! Revisa las configuraciones y si el servidor es accesible e intentelo nuevamente</p></fieldset>";
		die;
	}
	mysql_select_db($configinc['dbname']);
	$consulta1 = mysql_query($consulta);
	if(!$consulta1) {
		echo "<head><title>ERROR</title><fieldset><legend>MySQL ERROR</legend><p>El usuario no existe/Consulta invalida</p></fieldset>";
		die;
	}
	return mysql_fetch_array($consulta);
}
//if mysqli is enabled...
    function mysqlireq($consulta){
        include 'config.parse.php';
    $link = mysqli_connect($configinc['dbhost'].":".$configinc['dbport'], $configinc['dbuser'], $configinc['dbpass']);
	if(!$link) {
		echo "<head><title>ERROR</title><fieldset><legend>MySQL ERROR</legend><p>No se puede conectar a la base de datos! Revisa las configuraciones y si el servidor es accesible e intentelo nuevamente</p></fieldset>";
		die;
	}
	mysqli_select_db($link, $configinc['dbname']);
	$consulta2 = mysqli_query($link, $consulta);
	if(!$consulta2) {
		echo "<head><title>ERROR</title><fieldset><legend>MySQL ERROR</legend><p>El usuario no existe/Consulta invalida</p></fieldset>";
		die;
	}
	return mysqli_fetch_array($consulta2);
}
?>