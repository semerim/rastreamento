<?php

// echo phpversion();
// echo phpinfo();

ini_set("display_errors", 1);

error_reporting(E_ALL|E_STRICT);


session_start();

require_once('globais.php');

require_once('conexao.php');
require_once('inc_rastreamento.php');
// require_once('funcoesJS.php');
// require_once('calendar.php');


$ip = getClientIPAddress();
$hostname = getClientHostname();

echo "IP: " . $ip . '<br>';
echo "Hostname: " . $hostname . '<br>';
echo "LocalIP: " . localIP() . '<br>';


?>