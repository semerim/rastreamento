<?php

// echo phpversion();
// echo phpinfo();

session_start();

require_once('globais.php');

require_once(RAIZ_INC . 'conexao.php');
require_once(RAIZ_INC . 'inc_rastreamento.php');
require_once(RAIZ_INC . 'funcoesJS.php');
require_once(RAIZ_INC . 'calendar.php');


$ip = getClientIPAddress();
$hostname = getClientHostname();

dumpVar($ip);
dumpVar($hostname);

// dumpVar($SERVER_SYSTEMROOT);

$retMail = sendMail ("semerim@yahoo.com.br", "semerim02pg@gmail.com", "Sandro PG2", "Assunto teste", "Corpo Assunto Teste");
dumpVar($retMail);

?>