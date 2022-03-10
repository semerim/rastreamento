<html>
<head>

<?php require_once('globais.php'); ?>
<?php require_once (RAIZ_INC . 'funcoesJS.php'); ?>
<?php require_once (RAIZ_INC . 'funcoesJS_validation.php'); ?>
<?php // require_once (RAIZ_INC . 'checkSession.php'); ?>

</head>

<?php

// echo phpversion();

session_start();

require_once(RAIZ_INC . 'conexao.php');
require_once(RAIZ_INC . 'inc_rastreamento.php');

require_once('globais.php');
dumpVar($_SESSION);
// timeout em minutos - calcular em segundos
$timeout = LOGIN_TIMEOUT * 60;
$ultima_atividade = isset($_SESSION['ultima_atividade']) ? $_SESSION['ultima_atividade'] : "0";
$logado_em = isset($_SESSION['logado_em']) ? $_SESSION['logado_em'] : "0";
$agora = time();

echo "<pre>";
echo "Timeout....................: $timeout<br>";
echo "Logado em..................: $logado_em<br>";
echo "Última atividade...........: $ultima_atividade<br>";
echo "Agora......................: $agora<br>";
echo "Tempo restante de Login....: " . remainingLoginTime() . "s<br>";
echo "Login expirado.............: " . (isLoginSessionExpired() ? "S" : "N") . "<br>";
echo "Tempo restante de Atividade: " . remainingActivityTime() . "s<br>";
echo "Atividade expirada.........: " . (isActivityExpired() ?"S" : "N") . "<br>";
echo "</pre>";


?>


</html>
