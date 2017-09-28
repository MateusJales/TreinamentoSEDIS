<?php
/*
Sistema..........: SisPag
Nome do programa.: session.php
Objetivo.........: Iniciar e verificar a sessão em andamento
Autor............: Mateus de Medeiros Jales
Data.............: 24/08/2017
Versão 1.0
*/

// Requerimentos

	// Biblioteca de funções do sistema
	require_once('../library/library.php');

	// Variáveis globais do sistema
	require_once('../config/config.php');

	// Classe de Usuário
	require_once('../model/User.php');

  //session_name("sisPag");
  session_start();

  if ( ! isset($_SESSION['_user']->user) ) {
    KX_redirectPage('http://'.IP_MAQUINA.'/SisPag/view/login_sisPag.php');
  }


?>
