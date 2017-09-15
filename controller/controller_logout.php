<?php
// Requerimentos

	// Biblioteca de funções do sistema
	require_once('../library/library.php');

	// Variáveis globais do sistema
	require_once('../config/config.php');

  session_name("sisPag");
  session_start();
  session_destroy();
  KX_redirectPage('http://'.IP_MAQUINA.'/SisPag/view/login_sisPag.php');
?>
