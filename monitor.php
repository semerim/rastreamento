<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<link href="css_geral.php" rel='stylesheet' type='text/css'>

<script>
function autoRefresh(interval) {
	setInterval("location.reload(true);",interval*1000);
}
</script>

<title>..:.. Monitor ..:..</title>

</head>

<body onload="JavaScript:autoRefresh(10);">

<?php

session_start();

require_once('globais.php');

require_once(RAIZ_INC . 'conexao.php');
require_once(RAIZ_INC . 'inc_rastreamento.php');

// require_once('Net/SSH2.php');

$class_header_top = " class='sel_header_top' ";
$class_header = " class='sel_header' ";

$sql = "SELECT * FROM servidor WHERE ativo = 1";
$objData1 = $_objDB->execQuery(DB_ALIAS, $sql);
$objData2 = $_objDB->execQuery(DB_ALIAS, $sql);	

$arrNum = $objData1->getData(DBData::ARRAY_NUM);
$arrAssoc = $objData2->getData(DBData::ARRAY_ASSOC);

// dumpVar($arrAssoc);

$nroRegistros = count($arrNum);
// $nroRegistros = $objData1->getNRows();

if ($nroRegistros > 0) {
	echo msgBanner ("M O N I T O R", $class_header_top, "center", "300");
	foreach ($arrAssoc as $arrRet) {
		$seq = $arrRet["seq"];
		$nome_servidor = $arrRet["nome_servidor"];
		$host = $arrRet["host"];
		$ip = $arrRet["ip"];
		$username = $arrRet["username"];
		$password = $arrRet["password"];
		$temperatura = $arrRet["temperatura"];
		$temperatura_script = $arrRet["temperatura_script"];
		$espaco_disco = $arrRet["espaco_disco"];
		$espaco_disco_script = $arrRet["espaco_disco_script"];
		$memoria = $arrRet["memoria"];
		$memoria_script = $arrRet["memoria_script"];
		$cpu = $arrRet["cpu"];
		$cpu_script = $arrRet["cpu_script"];
		
		echo "<BR>";
		echo msgBanner ("SERVIDOR: $nome_servidor ($ip)", $class_header_top, "center", "300");
		$retServidor = "";
		
		if ($temperatura == "1") {
			$comando = 'sshpass -p "' . $password . '" ssh -o StrictHostKeyChecking=no ' . $username . '@' . $ip . ' ' . $temperatura_script;
			// dumpVar($comando);
			$ret = shell_exec($comando);
			// dumpVar($ret);
			$temp_atual = trim(pedaco (pedaco ($ret, "=", 2), "'", 1));
			// $temp_atual = rand(40,80);
			$retServidor .= msgBanner ("Temperatura: " . $temp_atual . "°C", $class_header, "center", "300");
			
			$arrY[] = (int)$temp_atual;
			$arrX[] = $nome_servidor;
		}

		if ($cpu == "1") {
			$comando = 'sshpass -p "' . $password . '" ssh -o StrictHostKeyChecking=no ' . $username . '@' . $ip . ' ' . $cpu_script;
			// dumpVar($comando);
			$ret = shell_exec($comando);
			// dumpVar($ret);
			$cpu_atual = trim(pedaco (pedaco ($ret, "=", 2), "'", 1));
			$retServidor .= msgBanner ("CPU: " . $cpu_atual . " ", $class_header, "center", "300");
		}
		
		echo $retServidor;
		
	}
	
	if (count($arrX) > 0) {
		$strX = implode($arrX, "^");
		$strY = implode($arrY, "^");
		$img_src = "<img src='grafico_barras.php?titulo=Monitoramento&legenda=Temperaturas&Y=$strY&X=$strX'>";
		echo "<BR>";
		echo $img_src;

	}
}


// echo msgBanner ("ARQUIVO JAVASCRIPT GERADO", $class_header_top);

// vcgencmd measure_temp



?>


</body>
</html>