<?php

session_start();

require_once('globais.php');

require_once('conexao.php');
require_once('inc_rastreamento.php');

echo buscaStatServidor("", "1", "1", "1", "0");

?>

