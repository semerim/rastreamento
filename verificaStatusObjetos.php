<?php

session_start();

require_once('globais.php');

require_once('conexao.php');
require_once('inc_rastreamento.php');

$arrPacotes = geraArrayPacotes();
// dumpVar($arrPacotes);

foreach ($arrPacotes as $arr1) {
	
	$rastreio = $arr1[1];
	if (strlen($rastreio) === 13) {
		dumpVar($rastreio);
		geraHTMLPacote ($rastreio, "1", "1");
	}
	else
		dumpVar('Link externo - ' . $rastreio);
}
// buscaStatServidor("", "1", "1");

?>

