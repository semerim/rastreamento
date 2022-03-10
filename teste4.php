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

dumpVar($ip);
dumpVar($hostname);
dumpVar($_SERVER['SERVER_ADDR']);
dumpVar($_SERVER['REMOTE_ADDR']);
dumpVar(localIP());

// dumpVar($SERVER_SYSTEMROOT);

$retMail = sendMail ("semerim@yahoo.com.br", "semerim02pg@gmail.com", "Sandro PG2", "Assunto teste", "Corpo Assunto Teste");
dumpVar($retMail);



$client = new SoapClient('http://labteste/matrixnet/wsrvProtocoloMatrix_v3.TASY.svc?wsdl');

$function = 'EnviaLaudo';

$arguments= array(
    'autenticacao' => '',
    'NumeroAtendimento'  => '3109468'
);


$options = array('location' => 'http://labteste/matrixnet/wsrvProtocoloMatrix_v3.TASY.svc');

dumpVar($client);

// $result = $client->__soapCall($function, $arguments, $options);
$result = $client->EnviaLaudo($arguments);

dumpVar($result);


?>