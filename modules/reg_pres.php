<?php
error_reporting(E_ALL);
include '../inc/config.parse.php';
include '../inc/db_connect.inc.php';
if(isset($_POST['trigger']) AND $_POST['trigger'] == "A1") {
	if($configinc['usemysqli'] == 'active') {
		//Clave de beneficiario (?)
		if($_POST['busqdni'] == '1') {
			$resultadomysql = mysqlireq("SELECT * from BuscarDni where DNI='".$_POST['dnidata']."'");
			if(!$resultadomysql) {
				echo "<fieldset><legend>No existe</legend><p>El beneficiario no existe.</p><p><a href='reg_benf.php'>Registrar nuevo beneficiario</a> o... <a href='reg_pres.php'>Regresar</a></fieldset>";
				die;
			}
			setcookie('clavebeneficiario', $resultadomysql['ClaveBeneficiario'], time()+3600);
			setcookie('ndni', $resultadomysql['DNI'], time()+3600);
			setcookie('tipodn', $resultadomysql['Tipo DNI'], time()+3600);
			setcookie('class', $resultadomysql['Clase DNI'], time()+3600);
			setcookie('apellido', $resultadomysql['Apellido'], time()+3600);
			setcookie('nombre', $resultadomysql['Nombre'], time()+3600);
			setcookie('active', $resultadomysql['Activo'], time()+3600);
			setcookie('fechanac', $resultadomysql['Fecha Nac'], time()+3600);
			setcookie('sexo', $resultadomysql['Sexo'], time()+3600);
			setcookie('embar', $resultadomysql['EmbarazoActual'], time()+3600);
			setcookie('baja', $resultadomysql['MotivoBaja'], time()+3600);
			header("Location: reg_pres.php");
		} elseif($_POST['busqdni'] == '2') {
			$resultadomysql = mysqlireq("SELECT * from BuscarDni where ClaveBeneficiario='".$_POST['dnidata']."'");
			setcookie('clavebeneficiario', $resultadomysql['ClaveBeneficiario'], time()+3600);
			setcookie('ndni', $resultadomysql['DNI'], time()+3600);
			setcookie('tipodn', $resultadomysql['Tipo DNI'], time()+3600);
			setcookie('class', $resultadomysql['Clase DNI'], time()+3600);
			setcookie('apellido', $resultadomysql['Apellido'], time()+3600);
			setcookie('nombre', $resultadomysql['Nombre'], time()+3600);
			setcookie('active', $resultadomysql['Activo'], time()+3600);
			setcookie('fechanac', $resultadomysql['Fecha Nac'], time()+3600);
			setcookie('sexo', $resultadomysql['Sexo'], time()+3600);
			setcookie('embar', $resultadomysql['EmbarazoActual'], time()+3600);
			setcookie('baja', $resultadomysql['MotivoBaja'], time()+3600);
			header("Location: reg_pres.php");
		}
	} elseif($configinc['usemysqli'] == 'inactive') {
		if($_POST['busqdni'] == '1') {
			$resultadomysql = mysqlreq("SELECT * from BuscarDni where DNI='".$_POST['dnidata']."'");
			if(!$resultadomysql) {
				echo "<fieldset><legend>No existe</legend><p>El beneficiario no existe.</p><p><a href='reg_benf.php'>Registrar nuevo beneficiario</a> o... <a href='reg_pres.php'>Regresar</a></fieldset>";
				die;
			}
			setcookie('clavebeneficiario', $resultadomysql['ClaveBeneficiario'], time()+3600);
			setcookie('ndni', $resultadomysql['DNI'], time()+3600);
			setcookie('tipodn', $resultadomysql['Tipo DNI'], time()+3600);
			setcookie('class', $resultadomysql['Clase DNI'], time()+3600);
			setcookie('apellido', $resultadomysql['Apellido'], time()+3600);
			setcookie('nombre', $resultadomysql['Nombre'], time()+3600);
			setcookie('active', $resultadomysql['Activo'], time()+3600);
			setcookie('fechanac', $resultadomysql['Fecha Nac'], time()+3600);
			setcookie('sexo', $resultadomysql['Sexo'], time()+3600);
			setcookie('embar', $resultadomysql['EmbarazoActual'], time()+3600);
			setcookie('baja', $resultadomysql['MotivoBaja'], time()+3600);
			header("Location: reg_pres.php");
		} elseif($_POST['busqdni'] == '2') {
			$resultadomysql = mysqlreq("SELECT * from BuscarDni where ClaveBeneficiario='".$_POST['dnidata']."'");
			setcookie('clavebeneficiario', $resultadomysql['ClaveBeneficiario'], time()+3600);
			setcookie('ndni', $resultadomysql['DNI'], time()+3600);
			setcookie('tipodn', $resultadomysql['Tipo DNI'], time()+3600);
			setcookie('class', $resultadomysql['Clase DNI'], time()+3600);
			setcookie('apellido', $resultadomysql['Apellido'], time()+3600);
			setcookie('nombre', $resultadomysql['Nombre'], time()+3600);
			setcookie('active', $resultadomysql['Activo'], time()+3600);
			setcookie('fechanac', $resultadomysql['Fecha Nac'], time()+3600);
			setcookie('sexo', $resultadomysql['Sexo'], time()+3600);
			setcookie('embar', $resultadomysql['EmbarazoActual'], time()+3600);
			setcookie('baja', $resultadomysql['MotivoBaja'], time()+3600);
			header("Location: reg_pres.php");
		}
	}
}
if(!isset($_COOKIE['passport']) AND $_COOKIE['passport'] != 1) {
	echo "<title>Unauthorized</title><fieldset><legend>Unauthorized</legend><p>Por favor ingresa a tu cuenta de usuario primero: <a href='../index.html'>Log-In</a></p></fieldset>";
	die;
}
?>
<html>
<head>
<title>Registro de prestaciones</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<style>
table, th, td {
    border: 1px solid black;
}
th, td {
    padding: 4px;
}
input.asdd {
	background-color: #ffff99;
	width: 300px;
}

td.a01 {
	background-color: blue;
	color: white;
	padding: 5px;
}

input.widthdni {
	width: 350px;
}

input.widthactive {
	width: 50px;
}

td.widthactive {
	width: 50px;
}
</style>
</head>
<body>
<fieldset>
<legend>STFSumar Web / <?php echo $_COOKIE['userinfo1']; ?> - <a href="../logout.php">Change CAPS/Logout</a></legend>
<form method="POST" action="">
<input type="hidden" name="trigger" value="A1"/>
<table>
<tr>
<th><input type="radio" name="busqdni" value="1" checked="true">Busqueda por Documento</input></th>
<th><input type="radio" name="busqdni" value="2">Busqueda por Clave de beneficiario</input></th>
<th><input type="radio" name="busqdni" value="3" disabled="true">Busqueda por Apellido (no soportada aun)</th>
</tr>
<tr><td colspan="3">Datos a buscar: <input type="text" name="dnidata" class="asdd"/></td></tr>
</table>
<br></br>
<table>
<tr><td class = "a01">Clave de Beneficiario: </td><td colspan="4"><input class="widthdni" type="text" disabled="true" value="<?php if(isset($_COOKIE['clavebeneficiario'])) { echo $_COOKIE['clavebeneficiario']; } else { echo ' '; } ?>"/>
</td></tr>
<tr><td class = "a01">Nº de DNI: </td><td><input type="text" disabled="true" value="<?php if(isset($_COOKIE['ndni'])) { echo $_COOKIE['ndni']; } else { echo ' '; } ?>"/></td><!--<td> - </td>-->
<td class="a01">Tipo: </td><td><input type="text" disabled="true" value="<?php if(isset($_COOKIE['tipodn'])) { echo $_COOKIE['tipodn']; } else { echo ' '; } ?>"/></td><!--<td> -</td>-->
<td class="a01">Clase: </td><td><input type="text" disabled="true" value="<?php if(isset($_COOKIE['class'])) { echo $_COOKIE['class']; } else { echo ' '; } ?>"/></td>
<tr><td class = "a01">Apellido: </td><td colspan="4"><input class="widthdni" type="text" disabled="true" value="<?php if(isset($_COOKIE['apellido'])) { echo $_COOKIE['apellido']; } else { echo ' '; } ?>"/></td></tr>
<tr><td class = "a01">Nombre: </td><td colspan="4"><input class="widthdni" type="text" disabled="true" value="<?php if(isset($_COOKIE['nombre'])) { echo $_COOKIE['nombre']; } else { echo ' '; } ?>"/><td class = "a01">Activo: </td><td><input style="<?php if(isset($_COOKIE['active']) AND $_COOKIE['active'] == 'S') { echo 'background-color: #00ff00;'; } elseif(isset($_COOKIE['active']) AND $_COOKIE['active'] == 'N') { echo "background-color: red;"; } else { echo "background-color: yellow;"; } ?>" class="widthactive" type="text" disabled="true" value="<?php if(isset($_COOKIE['active'])) { echo $_COOKIE['active']; } else { echo '?'; } ?>"/></td></tr>
<tr><td class="a01">Fecha de Nacimiento: </td>
<td><input type="date" disabled="true" value="<?php if(isset($_COOKIE['fechanac'])) { echo $_COOKIE['fechanac']; } else { echo '2000-01-01'; } ?>"/></td>
<td class="a01">Sexo: </td><td><input class="widthactive" type="text" disabled="true" value="<?php if(isset($_COOKIE['sexo'])) { echo $_COOKIE['sexo']; } else { echo ' '; } ?>"/></td>
<td class="a01">Embar: </td><td><input class="widthactive" type="text" disabled="true" value="<?php if(isset($_COOKIE['embar'])) { echo $_COOKIE['embar']; } else { echo ' ';} ?>"/></td>
</tr>
<tr><td class="a01">Motivo de Baja: </td><td><input class="widthdni" type="text" disabled="true" value="<?php if(isset($_COOKIE['baja'])) { echo $_COOKIE['baja']; } else { echo ' '; } ?>"/></td>
</tr>
</table>
<br><input type="submit" value="Buscar Beneficiario"/></br>
</form>
<a href="reg_pres2.php">Continuar =></a>
<p>Esta pagina utiliza cookies para su funcionamiento, por favor habilitelas si las tiene desactivadas.</p>
</fieldset>
</body>
</html>