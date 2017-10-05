<?php
/*
Sistema..........: SisPag
Nome do programa.: controller_cadastroSalario.php
Objetivo.........: Processar e validar dados informados pelo formulário de dados salariais do arquivo de formulário
Autor............: Mateus de Medeiros Jales
Data.............: 24/08/2017
Versão 1.0
*/

// Requerimentos

	// Biblioteca do sistema
	require_once("../library/library.php");

	// Variáveis globais do sistema
	require_once("../config/config.php");

	// Verificação de login
	require_once('../session/session.php');

	// Ativação de Classes
	require_once('../model/Formulario.php');


// Definição dos parâmetros de entrada

	$_cpf = $_POST['_cpf'];
	$_funcionario = $_POST['_funcionario'];
	$_nascimento = $_POST['_nascimento'];
	$_salBase = $_POST['_salBase'];
	$_numFilhos = $_POST['_numFilhos'];

// Variáveis de configuração

	$_valido = true;
	$_dados = array( '_cpf' => '',
			'_funcionario' => '',
			'_nascimento' => $_nascimento,
			'_salBase' => '',
			'_numFilhos' => '');

// Validação de dados

	// Valida CPF

	if ( ! KX_isCPF($_cpf) )
	  {
		$_dados = $_POST;
		$_valido = false;
	  }

	// Valida salário base

	if ( KX_isSalBase($_salBase) )
	  {
		$_dados = $_POST;
		$_valido = false;
	  }

// Encaminha em caso de dados inválidos

	if (! $_valido)
	  {
		KX_sendData($_dados, 'http://'.IP_MAQUINA.'/SisPag/view/frm_cadastroSalario.php');
	  }

// Processa novas variáveis a serem exportadas

	else
	  {
		$form = new Formulario($_cpf, $_funcionario, $_nascimento, $_salBase, $_numFilhos);
	  }

// Envia de dados para mensagem final

	$_SESSION['dados'] = $form->returnData();

	KX_redirectPage('http://'.IP_MAQUINA.'/SisPag/view/view.php');
?>
