<?php header('Content-Type: text/html; charset=ISO-8859-1',true); ?>

<?php

   session_start();

   require_once('globais.php');

   require_once('conexao.php');
   require_once('inc_rastreamento.php');

// ---------- VERIFICA AUTENTICAÇÃO ----------

	verifyLogin (0);
	$conexao = getConexao();

?>


<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="css_geral.php" rel='stylesheet' type='text/css'>
<?php require_once (RAIZ_INC . 'funcoesJS.php'); ?>
<?php require_once (RAIZ_INC . 'funcoesJS_validation.php'); ?>
<?php require_once (RAIZ_INC . 'calendar.php'); ?>

<script>
document.dhtmlEditors_home='dhtmleditor/';
</script>
<SCRIPT src='dhtmleditor/js/lib.js'></SCRIPT>

<?php

   $campo_chave = $_REQUEST["campoChave"];
   $valor_chave = isset ($_REQUEST["valorChave"]) ? $_REQUEST["valorChave"] : "";
   $cod_rastreamento = isset ($_REQUEST["chavePrincipal"]) ? $_REQUEST["chavePrincipal"] : "";

   if ($valor_chave == "")
      $novo = "1";
   else
      $novo = isset($_REQUEST["novo"]) ? $_REQUEST["novo"] : "";

   if ($novo == "1")
      $edicao = "1";
   else
      $edicao = isset($_REQUEST["edicao"]) ? $_REQUEST["edicao"] : "";

   $sequence = "seq_servidor";
   $tabela = "SERVIDOR";

   if ($novo == "1")
   	$operacao = "INSERT";
   else
   	$operacao = "UPDATE";

   $qs_redirect = "visao_fs.php?consulta=servidoresPorNome";

// carrega os campos do registro
   $campos[0][0] = "SEQ";
   $campos[0][1] = "seq";

   $campos[1][0] = "NOME_SERVIDOR";
   $campos[1][1] = "nome_servidor";

   $campos[2][0] = "ATIVO";
   $campos[2][1] = "ativo";
   
   $campos[3][0] = "HOST";
   $campos[3][1] = "host";

   $campos[4][0] = "IP";
   $campos[4][1] = "ip";
   
   $campos[5][0] = "USERNAME";
   $campos[5][1] = "username";

   $campos[6][0] = "PASSWORD";
   $campos[6][1] = "password";

   $campos[7][0] = "TEMPERATURA";
   $campos[7][1] = "temperatura";

   $campos[8][0] = "TEMPERATURA_SCRIPT";
   $campos[8][1] = "temperatura_script";

   $campos[9][0] = "ESPACO_DISCO";
   $campos[9][1] = "espaco_disco";
   
   $campos[10][0] = "MEMORIA";
   $campos[10][1] = "memoria";

   $campos[11][0] = "MEMORIA_SCRIPT";
   $campos[11][1] = "memoria_script";
   
   $campos[12][0] = "CPU";
   $campos[12][1] = "cpu";

   $campos[13][0] = "CPU_SCRIPT";
   $campos[13][1] = "cpu_script";
   
   $campos[14][0] = "DATA_INCLUSAO";
   $campos[14][1] = "dt_inclusao";

   $campos[15][0] = "ESPACO_DISCO_SCRIPT";
   $campos[15][1] = "espaco_disco_script";
   
   $campos[16][0] = "LOG";
   $campos[16][1] = "log";
   
   $campos[17][0] = "TEMPERATURA_NOTIFICAR";
   $campos[17][1] = "temperatura_notificar";
   
   $campos[18][0] = "TEMPERATURA_LIMITE";
   $campos[18][1] = "temperatura_limite";
   
   $campos[19][0] = "CPU_NOTIFICAR";
   $campos[19][1] = "cpu_notificar";
   
   $campos[20][0] = "CPU_LIMITE";
   $campos[20][1] = "cpu_limite";

   $campos[21][0] = "MEMORIA_NOTIFICAR";
   $campos[21][1] = "memoria_notificar";
   
   $campos[22][0] = "MEMORIA_LIMITE";
   $campos[22][1] = "memoria_limite";
   
   $campos[23][0] = "ESPACO_DISCO_NOTIFICAR";
   $campos[23][1] = "espaco_disco_notificar";
   
   $campos[24][0] = "ESPACO_DISCO_LIMITE";
   $campos[24][1] = "espaco_disco_limite";

   $campos[25][0] = "DOWN_NOTIFICAR";
   $campos[25][1] = "down_notificar";

   $campos[26][0] = "TEMPERATURA_URL";
   $campos[26][1] = "temperatura_url";
   
   $campos[27][0] = "ORDEM";
   $campos[27][1] = "ordem";

   $campos[28][0] = "TEMPERATURA_LEITURA_TIMEOUT";
   $campos[28][1] = "temperatura_leitura_timeout";
   
   $campos[29][0] = "IP_EXTERNO";
   $campos[29][1] = "ip_externo";
   
   $campos[30][0] = "COD_LOCALIDADE";
   $campos[30][1] = "cod_localidade";

   $campos[31][0] = "IP_LOCAL_SCRIPT";
   $campos[31][1] = "ip_local_script";

   $campos[32][0] = "NRO_VEZES_DOWN";
   $campos[32][1] = "nro_vezes_down";
   
   $campos[33][0] = "NRO_VEZES_DOWN_AVISO";
   $campos[33][1] = "nro_vezes_down_aviso";

   $tabelas = "SERVIDOR";

   $filtro = $campo_chave . " = " . $valor_chave;

   carregaCampos ($campos, $tabelas, $filtro, "", $novo);

				
   //------------------------------------------------------------------------------
   // monta campos tipo EDIT e MOSTRA
   // define ("EDIT_COD_RASTREAMENTO", montaEdit ("mostra_NRO_DOC_COMERCIAL", $nro_doc_comercial, 10, "text", "0", $novo, $nro_doc_comercial));
	define ("MOSTRA_SEQ", montaEdit ("grava_SEQ", SEQ, 45, "", "0", $novo, ""));
	define ("EDIT_NOME_SERVIDOR", montaEdit ("grava_NOME_SERVIDOR", NOME_SERVIDOR, 45, "", $edicao, $novo, ""));
	define ("EDIT_HOST", montaEdit ("grava_HOST", HOST, 20, "", $edicao, $novo, ""));
	define ("EDIT_IP", montaEdit ("grava_IP", IP, 10, "", $edicao, $novo, ""));
	define ("EDIT_IP_EXTERNO", montaEdit ("grava_IP_EXTERNO", IP_EXTERNO, 40, "", $edicao, $novo, ""));
	define ("EDIT_NRO_VEZES_DOWN_AVISO", montaEdit ("grava_NRO_VEZES_DOWN_AVISO", NRO_VEZES_DOWN_AVISO, 5, "", $edicao, $novo, ""));
	define ("EDIT_ORDEM", montaEdit ("grava_ORDEM", ORDEM, 10, "", $edicao, $novo, ""));
	define ("EDIT_USERNAME", montaEdit ("grava_USERNAME", USERNAME, 10, "", $edicao, $novo, ""));
	define ("EDIT_PASSWORD", montaEdit ("grava_PASSWORD", PASSWORD, 10, "password", $edicao, $novo, ""));
	define ("EDIT_TEMPERATURA_SCRIPT", montaEdit ("grava_TEMPERATURA_SCRIPT", TEMPERATURA_SCRIPT, 100, "", $edicao, $novo, ""));
	define ("EDIT_TEMPERATURA_URL", montaEdit ("grava_TEMPERATURA_URL", TEMPERATURA_URL, 100, "", $edicao, $novo, ""));
	define ("EDIT_TEMPERATURA_LEITURA_TIMEOUT", montaEdit ("grava_TEMPERATURA_LEITURA_TIMEOUT", TEMPERATURA_LEITURA_TIMEOUT, 10, "", $edicao, $novo, "60"));
	define ("EDIT_ESPACO_DISCO_SCRIPT", montaEdit ("grava_ESPACO_DISCO_SCRIPT", ESPACO_DISCO_SCRIPT, 100, "", $edicao, $novo, ""));
	define ("EDIT_MEMORIA_SCRIPT", montaEdit ("grava_MEMORIA_SCRIPT", MEMORIA_SCRIPT, 100, "", $edicao, $novo, ""));
	define ("EDIT_CPU_SCRIPT", montaEdit ("grava_CPU_SCRIPT", CPU_SCRIPT, 100, "", $edicao, $novo, ""));

	define ("EDIT_IP_LOCAL_SCRIPT", montaEdit ("grava_IP_LOCAL_SCRIPT", IP_LOCAL_SCRIPT, 100, "", $edicao, $novo, ""));

	$queryLocalidade = "SELECT seq, descricao from LOCALIDADE ORDER BY seq";
	// define ("SEL_STATUS", montaSelect ($arrStatus, "grava_STATUS", "RADIO", STATUS_0, $edicao, "1"));
	define ("SEL_LOCALIDADE", montaSelect ($queryLocalidade, "grava_COD_LOCALIDADE", "COMBO", COD_LOCALIDADE, $edicao, $novo, ""));
	
	define ("CHECK_ATIVO", montaCheck ("grava_ATIVO", "1,0", "ATIVO,NÃO", ($novo == "1") ? "0" : ATIVO, $edicao, "", "1"));
	define ("CHECK_DOWN_NOTIFICAR", montaCheck ("grava_DOWN_NOTIFICAR", "1,0", "SIM,NÃO", ($novo == "1") ? "1" : DOWN_NOTIFICAR, $edicao, "", "1"));
	
	define ("CHECK_LOG", montaCheck ("grava_LOG", "1,0", "SIM,NÃO", ($novo == "1") ? "0" : LOG, $edicao, "", "1"));

	define ("CHECK_TEMPERATURA", montaCheck ("grava_TEMPERATURA", "1,0", "SIM,NÃO", ($novo == "1") ? "0" : TEMPERATURA, $edicao, "", "1"));
	define ("CHECK_TEMPERATURA_NOTIFICAR", montaCheck ("grava_TEMPERATURA_NOTIFICAR", "1,0", "SIM,NÃO", ($novo == "1") ? "0" : TEMPERATURA_NOTIFICAR, $edicao, "", "1"));
	define ("EDIT_TEMPERATURA_LIMITE", montaEdit ("grava_TEMPERATURA_LIMITE", TEMPERATURA_LIMITE, 100, "", $edicao, $novo, ""));

	define ("CHECK_MEMORIA", montaCheck ("grava_MEMORIA", "1,0", "SIM,NÃO", ($novo == "1") ? "0" : MEMORIA, $edicao, "", "1"));
	define ("CHECK_MEMORIA_NOTIFICAR", montaCheck ("grava_MEMORIA_NOTIFICAR", "1,0", "SIM,NÃO", ($novo == "1") ? "0" : MEMORIA_NOTIFICAR, $edicao, "", "1"));
	define ("EDIT_MEMORIA_LIMITE", montaEdit ("grava_MEMORIA_LIMITE", MEMORIA_LIMITE, 100, "", $edicao, $novo, ""));

	define ("CHECK_ESPACO_DISCO", montaCheck ("grava_ESPACO_DISCO", "1,0", "SIM,NÃO", ($novo == "1") ? "0" : ESPACO_DISCO, $edicao, "", "1"));
	define ("CHECK_ESPACO_DISCO_NOTIFICAR", montaCheck ("grava_ESPACO_DISCO_NOTIFICAR", "1,0", "SIM,NÃO", ($novo == "1") ? "0" : ESPACO_DISCO_NOTIFICAR, $edicao, "", "1"));
	define ("EDIT_ESPACO_DISCO_LIMITE", montaEdit ("grava_ESPACO_DISCO_LIMITE", ESPACO_DISCO_LIMITE, 100, "", $edicao, $novo, ""));

	define ("CHECK_CPU", montaCheck ("grava_CPU", "1,0", "SIM,NÃO", ($novo == "1") ? "0" : CPU, $edicao, "", "1"));
	define ("CHECK_CPU_NOTIFICAR", montaCheck ("grava_CPU_NOTIFICAR", "1,0", "SIM,NÃO", ($novo == "1") ? "0" : CPU_NOTIFICAR, $edicao, "", "1"));
	define ("EDIT_CPU_LIMITE", montaEdit ("grava_CPU_LIMITE", CPU_LIMITE, 100, "", $edicao, $novo, ""));
   
   // botões de ação
	if ($novo == "1") {
		$mostrar = "Imprimir,Salvar";
		$esconder = "Editar,Excluir";
	}
	else {
		if ($edicao == "1") {
			$mostrar = "Imprimir,Salvar,Excluir";
			$esconder = "Editar";
		}
		else {
			$mostrar = "Editar";
			$esconder = "Imprimir,Salvar,Excluir";
		}
	}


?>

<script language="JavaScript" type="text/JavaScript">

//------------------------------------------------------------------------------
// javascripts do form

var edicao = '<?php echo $edicao ?>';
var from = "DET";
var seq = '<?php echo $valor_chave ?>';
var mostraLog = true;

//------------------------------------------------------------------------------

function processa_onLoad () {

// alert ('');

trataLayers (document, "<?php echo $mostrar ?>", "1", "layerbtn");
trataLayers (document, "<?php echo $esconder ?>", "0", "layerbtn");
toggleLog();
}

//------------------------------------------------------------------------------

function monitorar () {

var frm = document.forms[0];
document.getElementById('layerMonitorar').src = "monitorar.php?cod_servidor=" + seq;

}

//------------------------------------------------------------------------------

</script>
</head>
<body onload = 'processa_onLoad()'>
<form action='grava.php' method='GET'>

<!-- // campos de controle para gravação -->
   <input name='ctl_campo_chave' type='hidden' value='<?php echo $campo_chave  ?>'>
   <input name='ctl_valor_chave' type='hidden' value='<?php echo $valor_chave  ?>'>
   <input name='ctl_operacao'  type='hidden' value='<?php echo $operacao ?>'>
   <input name='ctl_sequence'  type='hidden' value='<?php echo $sequence ?>'>
   <input name='ctl_tabela'    type='hidden' value='<?php echo $tabela ?>'>
   <input name='ctl_redirect'  type='hidden' value='<?php echo $qs_redirect ?>'>


<table width="100%" height="8%"  border="0" align="center" bordercolor="#CCCCCC">
  <tr align="center" valign="middle" bgcolor="#D7ECFF" class="tabela2Fixo">
    <td height="100%" colspan="8" class="cabec_tabela1">SERVIDOR</td>
  </tr>
  <tr align="center" valign="middle">
    <td class="tabela1Fixo" height="100%" colspan="8">
    <input name="btnVoltar" type="button" class="bot" value="Voltar" onclick='voltar(getCampoTop ("visao"))'>
    <span id="layerbtnSalvar"><input name="btnSalvar" type="button" class="bot" value="Salvar" onclick='frmSubmit("salvar", "SEQ", seq, "<?php echo $valor_chave ?>")'></span>
    <span id="layerbtnEditar"><input name="btnEditar" type="button" class="bot" value="Editar" onclick='editar("SEQ", seq, "<?php echo $valor_chave ?>")'></span>
    <span id="layerbtnExcluir"><input name="btnExcluir" type="button" class="bot" value="Excluir" onclick='frmSubmit("excluir", "SEQ", seq, "<?php echo $valor_chave ?>")'></span>
    <span id="layerbtnImprimir"><input name="btnImprimir" type="button" class="bot" value="Imprimir"></span>
    <span id="layerbtnMonitorar"><input name="btnMonitorar" type="button" class="bot" value="MONITORAR" onclick='javascript:monitorar();'></span>
	</td>
  </tr>
</table>
<table width="100%"  border="0" bordercolor="#CCCCCC">
  <tr>
    <td class="tabela1Fixo"<div align="right">Nome do Servidor:</div></td>
    <td align="left" valign="middle" class="tabela2Fixo">
    	 <?php echo EDIT_NOME_SERVIDOR ?>
    </td>
  </tr>
  <tr>
    <td class="tabela1Fixo"><div align="right">Localidade:</div></td>
    <td align="left" valign="middle" class="tabela2Fixo">
    	 <?php echo SEL_LOCALIDADE ?>
    </td>
  </tr>
  <tr>
    <td class="tabela1Fixo"><div align="right">Status:</div></td>
    <td align="left" valign="middle" class="tabela2Fixo">
    	 <?php echo CHECK_ATIVO ?>
    </td>
  </tr>
  <tr>
    <td class="tabela1Fixo"><div align="right">Notificar queda / Script:</div></td>
    <td align="left" valign="middle" class="tabela2Fixo">
    	 <?php echo CHECK_DOWN_NOTIFICAR ?>
    </td>
  </tr>
  <tr>
    <td class="tabela1Fixo"><div align="right">Nro de ocorrências limite:</div></td>
    <td align="left" valign="middle" class="tabela2Fixo">
    	 <?php echo EDIT_NRO_VEZES_DOWN_AVISO ?> &nbsp;&nbsp;&nbsp;(Atual: <?php echo NRO_VEZES_DOWN ?>)
    </td>
  </tr>
  <tr>
    <td class="tabela1Fixo"><div align="right">Grava Log:</div></td>
    <td align="left" valign="middle" class="tabela2Fixo">
    	 <?php echo CHECK_LOG ?>
    </td>
  </tr>
  <tr>
    <td class="tabela1Fixo"<div align="right">Host / IP / IP_Externo:porta :</div></td>
    <td align="left" valign="middle" class="tabela2Fixo">
    	 <?php echo EDIT_HOST ?> / <?php echo EDIT_IP ?> / <?php echo EDIT_IP_EXTERNO ?>
    </td>
  </tr>
  <tr>
    <td class="tabela1Fixo"<div align="right">Script para descobrir IP local:</div></td>
    <td align="left" valign="middle" class="tabela2Fixo">
    	 <?php echo IP_LOCAL_SCRIPT ?>
    </td>
  </tr>
  <tr>
    <td class="tabela1Fixo"<div align="right">Username / Password:</div></td>
    <td align="left" valign="middle" class="tabela2Fixo">
    	 <?php echo EDIT_USERNAME ?> / <?php echo EDIT_PASSWORD ?>
    </td>
  </tr>
  <tr>
    <td class="tabela1Fixo"<div align="right">Monitorar Temperatura:</div></td>
    <td align="left" valign="middle" class="tabela2Fixo">
    	 <?php echo CHECK_TEMPERATURA ?> <?php echo EDIT_TEMPERATURA_SCRIPT ?>
    </td>
  </tr>
  <tr>
    <td class="tabela1Fixo"<div align="right">URL para Monitorar Temperatura / Timeout (Min):</div></td>
    <td align="left" valign="middle" class="tabela2Fixo">
    	 <?php echo EDIT_TEMPERATURA_URL ?> / <?php echo EDIT_TEMPERATURA_LEITURA_TIMEOUT ?> min
    </td>
  </tr>
  <tr>
    <td class="tabela1Fixo"<div align="right">Limite Temperatura(ºC):</div></td>
    <td align="left" valign="middle" class="tabela2Fixo">
    	 <?php echo CHECK_TEMPERATURA_NOTIFICAR ?> <?php echo EDIT_TEMPERATURA_LIMITE ?>
    </td>
  </tr>
  <tr>
    <td class="tabela1Fixo"<div align="right">Monitorar Espaço em Disco:</div></td>
    <td align="left" valign="middle" class="tabela2Fixo">
    	 <?php echo CHECK_ESPACO_DISCO ?> <?php echo EDIT_ESPACO_DISCO_SCRIPT ?>
    </td>
  </tr>
  <tr>
    <td class="tabela1Fixo"<div align="right">Limite Espaço Utilizado em Disco (%):</div></td>
    <td align="left" valign="middle" class="tabela2Fixo">
    	 <?php echo CHECK_ESPACO_DISCO_NOTIFICAR ?> <?php echo EDIT_ESPACO_DISCO_LIMITE ?>
    </td>
  </tr>
  <tr>
    <td class="tabela1Fixo"<div align="right">Monitorar Memória:</div></td>
    <td align="left" valign="middle" class="tabela2Fixo">
    	 <?php echo CHECK_MEMORIA ?> <?php echo EDIT_MEMORIA_SCRIPT ?>
    </td>
  </tr>
  <tr>
    <td class="tabela1Fixo"<div align="right">Limite Memória Utilizada (%):</div></td>
    <td align="left" valign="middle" class="tabela2Fixo">
    	 <?php echo CHECK_MEMORIA_NOTIFICAR ?> <?php echo EDIT_MEMORIA_LIMITE ?>
    </td>
  </tr>
  <tr>
    <td class="tabela1Fixo"<div align="right">Monitorar CPU:</div></td>
    <td align="left" valign="middle" class="tabela2Fixo">
    	 <?php echo CHECK_CPU ?> <?php echo EDIT_CPU_SCRIPT ?>
    </td>
  </tr>
  <tr>
    <td class="tabela1Fixo"<div align="right">Limite CPU Load (%):</div></td>
    <td align="left" valign="middle" class="tabela2Fixo">
    	 <?php echo CHECK_CPU_NOTIFICAR ?> <?php echo EDIT_CPU_LIMITE ?>
    </td>
  </tr>
  <tr>
    <td class="tabela1Fixo"<div align="right">Ordem de Exibição:</div></td>
    <td align="left" valign="middle" class="tabela2Fixo">
    	 <?php echo EDIT_ORDEM ?>
    </td>
  </tr>
</table>
<center>
</center>
<br>
<?php echo mostraLog ($tabela, $valor_chave . "^", false) ?>
</form>
<iframe src='' id='layerMonitorar' name="monitor" width="100%" height="350" scrolling="no" frameborder="0" style="border:0px"></iframe>
</body>
</html>