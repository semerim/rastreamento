<?php 
session_start();

require_once('globais.php');

require_once('conexao.php');
require_once('inc_rastreamento.php');

// ---------- VERIFICA AUTENTICAÇÃO ----------

// verifyLogin (0);


// ---------- REQUESTS ----------

$qs_cod_rastreio = isset($_REQUEST["cod_rastreio"]) ? $_REQUEST["cod_rastreio"] : "";
$qs_seq			 = isset($_REQUEST["seq"]) ? $_REQUEST["seq"] : "";


// ---------- BLOCO PRINCIPAL ----------

$query = "update objeto set status = 2 where seq = " . $qs_seq;
// dumpVar($query);
// echo "rodando 1";
simpleSelectPDO ($query);
// echo "rodando 2";
insertLog ("OBJETO", $qs_seq . "^" . $qs_seq, "UPDATE", "");
redirect ("rastreamentodb.php");

?> 