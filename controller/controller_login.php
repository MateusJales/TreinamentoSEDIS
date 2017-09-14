<?php

// Requerimentos

	// Biblioteca de funções do sistema
	require_once('../library/library.php');

	// Variáveis globais do sistema
	require_once('../config/config.php');

	// Variáveis do POST

	$_dadosLogin = $_POST;

	// Verificação

	KX_login($_dadosLogin["_user"], $_dadosLogin["_password"]);
	KX_redirectPage('http://'.IP_MAQUINA.'/SisPag/view/frm_cadastroSalario.php');

?>
