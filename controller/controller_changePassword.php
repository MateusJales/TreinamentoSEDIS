<?php

// Requerimentos

	// Biblioteca de funções do sistema
	require_once('../library/library.php');

	// Variáveis globais do sistema
	require_once('../config/config.php');

  // Verificação de login
  require_once('../session/session.php');


	// Variáveis do POST

	$_dadosNewPassword = $_POST;
  $_user = $_SESSION['_user'];

	// Verificação

  if ( KX_validateNewPassword($_user, $_dadosNewPassword['_password'], $_dadosNewPassword['_newPassword'], $_dadosNewPassword['_newPasswordConfirm']) ) {
    KX_changePassword($_user, $_dadosNewPassword['_newPassword']);
    KX_redirectPage('http://'.IP_MAQUINA.'/SisPag/view/frm_cadastroSalario.php');
  } else {
    KX_redirectPage('http://'.IP_MAQUINA.'/SisPag/view/changePassword.php');
  }

?>
