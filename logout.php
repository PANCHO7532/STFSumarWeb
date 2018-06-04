<?php
setcookie('passport', '0', time()-90000000);
setcookie('userinfo1', '0', time()-9000000);
if(isset($_COOKIE['clavebeneficiario'])) {
    setcookie('clavebeneficiario', '1', time()+3600);
	setcookie('ndni', '1', time()-36000000);
	setcookie('tipodn', '1', time()-36000000);
	setcookie('class', '1', time()-36000000);
	setcookie('apellido', '1', time()-36000000);
	setcookie('nombre', '1', time()-36000000);
	setcookie('active', '1', time()-36000000);
	setcookie('fechanac', '1', time()-36000000);
	setcookie('sexo','1', time()-36000000);
	setcookie('embar', '1', time()-36000000);
	setcookie('baja', '1', time()-36000000);
}
header("Location: index.html");
?>