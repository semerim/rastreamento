<?php

// echo phpversion();

session_start();

require_once('conexao.php');
require_once('inc_rastreamento.php');

send_Telegram(utf8_decode("\n<b>" . 'Teste de Mensagem CABEÇA SÃO MÕES' . "</b>\n\n" . 'Somente um teste 123 de çãoáíúóÚ'), TELEGRAM_RASTREAMENTO_BOT_TOKEN)

?>