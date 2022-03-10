<?php 
header('Content-Type: text/html; charset=ISO-8859-1',true); 

session_start();

require_once('globais.php');
require_once('conexao.php');
require_once('inc_rastreamento.php');

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/1999/REC-html401-19991224/loose.dtd">
<html><head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<meta http-Equiv="Cache-Control" Content="no-cache">
<meta http-Equiv="Pragma" Content="no-cache">
<meta http-Equiv="Expires" Content="0">

<style>
a.botaoRastreio {
   font-family: tahoma, verdana, arial, sans-serif;
   font-size: 8pt;
   font-weight: bold;
   padding: 1px;
   background-color: <?php echo RASTREIO_CORBOTAO ?>;
   color: #666666;
   text-decoration: none;
   cursor: pointer; /* hand-shaped cursor */
   cursor: hand; /* for IE 5.x */
   border-radius: 6px;
   margin: 2px 2px;
}
a.botaoRastreio:link,
a.botaoRastreio:visited {
   border-top: 1px solid #cccccc;
   border-bottom: 2px solid #666666;
   border-left: 1px solid #cccccc;
   border-right: 2px solid #666666;
}
a.botaoRastreio:hover {
   border-top: 2px solid #666666;
   border-bottom: 1px solid #cccccc;
   border-left: 2px solid #666666;
   border-right: 1px solid #cccccc;
}
</style>

<title>Rastreamento</title>

<?php

echo "<script>\n";
echo geraArrayPacotesJS();
echo "var globalURLCorreios = '" . HOMEDIR . "rastreio.php?cod_rastreio=';\n";
echo "</SCRIPT>\n";

?>

<script src="rastreamento_js.php"></script>

</head>
<body onload="carregaTodos();">
<div id="refresh" name="refresh" style="font-size: 12px; font-family: arial,helvetica,serif; font-weight: bold; position: absolute; left: 1080px; top: 0px; height: 15px; width: 90px; background-color: <?php echo RASTREIO_CORCABEC ?>; z-index: 100;"><a class="botaoRastreio" href="javascript:refresh()">&nbsp;&#x27f3;&nbsp;&nbsp;Todos</a>&nbsp;<a class="botaoRastreio" href="javascript:location.reload(true)">&nbsp;&#x21bb;&nbsp;</a></div><div id="timer" name="timer" style="font-size: 12px; font-family: arial,helvetica,serif; font-weight: bold; position: absolute; left: 1175px; top: 0px; height: 15px; width: 90px; background-color: lightgreen; z-index: 101;">Refresh: ...</div>
<div id="tudo"><div id="div0" name="div0" style="position: absolute; left: 0px; top: 0px; height: 45px; width: 100%; background-color: <?php echo RASTREIO_CORCABEC ?>; z-index: 2;">
</div>
</body></html>