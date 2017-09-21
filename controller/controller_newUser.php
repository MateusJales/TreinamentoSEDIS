<?php

// Requerimentos

	// Biblioteca de funções do sistema
	require_once('../library/library.php');

	// Variáveis globais do sistema
	require_once('../config/config.php');

	// Variáveis do POST

	$_dadosNewUser = $_POST;

	// Verificação

  if ( KX_validateNewUser($_dadosNewUser['_user'], $_dadosNewUser['_password'], $_dadosNewUser['_passwordConfirm']) ) {
    KX_newUser($_dadosNewUser['_user'], $_dadosNewUser['_password']);
    KX_redirectPage('http://'.IP_MAQUINA.'/SisPag/view/login_sisPag.php');
  } else {
    KX_redirectPage('http://'.IP_MAQUINA.'/SisPag/view/newUser.php');
  }

?>
