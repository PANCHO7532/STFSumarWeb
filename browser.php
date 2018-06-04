<?php
if(!isset($_COOKIE['passport']) AND $_COOKIE['passport'] != 1) {
	echo "<title>Unauthorized</title><fieldset><legend>Unauthorized</legend><p>Por favor ingresa a tu cuenta de usuario primero: <a href='index.html'>Log-In</a></p></fieldset>";
	die;
}
?>
<html>
<head>
<title>Menu Principal</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
<fieldset>
<legend>STFSumar Web / <?php echo $_COOKIE['userinfo1']; ?> - <a href="logout.php">Change CAPS/Logout</a></legend>
<ul> ===Menu principal===
<li><a href="modules/reg_pres.php">Registrar prestaciones</a></li>
</ul>
</fieldset>
</body>
</html>