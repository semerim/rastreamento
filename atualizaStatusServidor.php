<?php 
session_start();

require_once('globais.php');

require_once('conexao.php');
require_once('inc_rastreamento.php');

// ---------- VERIFICA AUTENTICA??O ----------

// verifyLogin (0);


// ---------- REQUESTS ----------

$qs_seq		    			= isset($_REQUEST["seq"]) ? $_REQUEST["seq"] : "";
$qs_status	    			= isset($_REQUEST["status"]) ? $_REQUEST["status"] : "";


// ---------- BLOCO PRINCIPAL ----------

$query = "update servidor set ativo = " . $qs_status . " where seq = " . $qs_seq;
// dumpVar($query);
// echo "rodando 1";
simpleSelectPDO ($query);
// echo "rodando 2";
insertLog ("SERVIDOR", $qs_seq . "^" . $qs_seq, "UPDATE", "");
redirect ("ligaDesligaMonitor.php");

?> 