<?php

session_start();
require_once('globais.php');
require_once('inc_rastreamento.php');

echo remainingLoginTime();
// var_dump($_SESSION);
// timeout em minutos - calcular em segundos
/*
$inactive = LOGIN_TIMEOUT * 60;

if (isset($_SESSION['logado_em']) ) {
	if ($_SESSION['logado_em'] == "") {
		echo "0";
		exit;
	}
	$remaining_life = $inactive - (time() - $_SESSION['logado_em']);
	if ($remaining_life < 0)
		echo "0";
	else
		echo $remaining_life;
}
else
	echo "0";

// $_SESSION['timeout'] = time();
*/
?>