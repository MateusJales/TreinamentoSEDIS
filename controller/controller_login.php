<?php

	require_once('../library/library.php');
	require_once('../config/config.php');
	require_once('../config/sessaoAtiva.php');

	// Variáveis do POST

	$_dadosLogin = $_POST;

	// Verificação

	if ( ($_dadosLogin['_usuario'] == 'kruix17') && ($_dadosLogin['_senha'] == '123456') )
	  {		
		$_estaAtivo = true;
		KX_redirectPage("http://".IP_MAQUINA."SisPag/view/frm_cadastroSalario.php");
	  }

?>
