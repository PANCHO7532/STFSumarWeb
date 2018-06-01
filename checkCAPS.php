<?php
//CAPS check/user check
//P7COMunications LTD S.A - PANCHO7532

//Collecting data
if(!isset($_POST['caps'])) {
	echo "<title>Invalid CAPS data</title><fieldset><legend>Invalid CAPS data</legend><p>Por favor ingresa el CAPS de una forma correcta.</p></fieldset>";
	die;
}
if(!isset($_POST['psw'])) {
	echo "<title>Invalid Password</title><fieldset><legend>Invalid Password</legend><p>Por favor ingresa la contraseña de una forma correcta.</p></fieldset>";
	die;
}

$caps = $_POST['caps'];
$psw = $_POST['psw'];

//SQL
include 'inc/config.parse.php';
if($configinc['usemysqli'] == "active") {
	$uselessvar = "idk";
} elseif($configinc['usemysqli'] == "inactive") {
	//$e = "f";
	$link = mysql_connect($configinc['dbhost'].":".$configinc['dbport'], $configinc['dbuser'], $configinc['dbpass']);
	if(!link) {
		echo "<head><title>ERROR</title><fieldset><legend>MySQL ERROR</legend><p>No se puede conectar a la base de datos! Revisa las configuraciones y si el servidor es accesible e intentelo nuevamente</p></fieldset>";
		die;
	}
	mysql_select_db($configinc['dbname']);
	$consulta = mysql_query("SELECT * from users where userid='".$caps."' and password='".$psw."'");
	if(!$consulta) {
		echo "<head><title>ERROR</title><fieldset><legend>MySQL ERROR</legend><p>El usuario no existe/Consulta invalida</p></fieldset>";
		die;
	}
	$resultadomysql = mysql_fetch_array($consulta);
	if($resultadomysql['userid'] == $caps AND $resultadomysql['password'] == $psw) {
		setcookie("passport", "1", time()+36000);
		header("Location: browser.php");
	} else {
		echo "<head><title>ERROR</title><fieldset><legend>Credentials Error</legend><p>El usuario o contraseña ingresados son incorrectos.</p></fieldset>";
		die;
	} 
} else {
	echo "<head><title>ERROR</title><fieldset><legend>Malformed Configuration File</legend><p>ERROR: El archivo de configuracion 'config.inc.js' contiene errores que el programa no puede procesar correctamente, corrija el archivo o genere uno nuevo ejecutando 'generate.php' en el navegador.</p></fieldset>";
}
?>