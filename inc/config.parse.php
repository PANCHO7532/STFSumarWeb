<?php
error_reporting(0);
//$stage1 = file_get_contents("../inc/config.inc.js");
if(!file_get_contents("../inc/config.inc.js")) {
	$stage1 = file_get_contents("./inc/config.inc.js");
} else  {
	$stage1 = file_get_contents("../inc/config.inc.js");
}
$configinc = json_decode($stage1, true);
?>