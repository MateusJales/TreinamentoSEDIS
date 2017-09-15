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
		$_salFamilia = KX_calculaSalFamilia($_numFilhos);
		$_idade = KX_calculaIdade($_nascimento);
		$_abono = KX_calculaAbono($_idade);
		$_salBruto = KX_calculaSalBruto($_abono, $_salFamilia, $_salBase);
		$_inss = KX_calculaInss($_salBase);
		$_salLiquido = KX_calculaSalLiquido($_salBruto, $_inss);
	  }

// Envia de dados para mensagem final

	$_SESSION['dados'] = array( '_cpf' => $_cpf,
			'_funcionario' => $_funcionario,
			'_nascimento' => $_nascimento,
			'_idade' => $_idade,
			'_salBase' => $_salBase,
			'_salFamilia' => $_salFamilia,
			'_abono' => $_abono,
			'_salBruto' => $_salBruto,
			'_inss' => $_inss,
			'_salLiquido' => $_salLiquido);

	KX_redirectPage('http://'.IP_MAQUINA.'/SisPag/view/view.php');
?>
