<?php

session_start();

require_once('globais.php');

require_once('conexao.php');
require_once('inc_rastreamento.php');

echo execComando('0', '/home/pi/scripts/pi2-limpa.sh');


?>

