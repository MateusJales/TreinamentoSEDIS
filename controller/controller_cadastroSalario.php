<?php
/*
Sistema..........: SisPag
Nome do programa.: controller_cadastroSalario.php
Objetivo.........: Processar e validar dados informados pelo formulário de dados salariais do arquivo html
Autor............: Mateus de Medeiros Jales
Data.............: 24/08/2017
*/

// Bibliotecas do sistema

	require_once("../library/library.php");

// Parâmetros de entrada

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

// Validação

	// Validação de CPF

	if ( ! KX_isCPF($_cpf) )
	  {
		$_dados = $_POST;
		$_valido = false;
	  }

	// Validação de nome do funcionário

	if ( KX_isEmpty($_funcionario) )
	  {
		$_dados = $_POST;
		$_valido = false;
	  }

	// Validação de salário base

	if ( KX_isNegative($_salBase) )
	  {
		$_dados = $_POST;
		$_valido = false;
	  }

	// Validação de número de filhos

	if ( KX_isNegative($_numFilhos) )
	  {
		$_dados = $_POST;
		$_valido = false;
	  }
	
// Encaminhamento caso dados inválidos

	if (! $_valido)
	  {
		KX_sendData($_dados, 'http://10.4.5.13/cadastroSalario/view/frm_cadastroSalario.php');
	  }

// Processamento de novas variáveis a serem exportadas
	else
	  {
		$_salFamilia = KX_calculaSalFamilia($_numFilhos);
		$_idade = KX_calculaIdade($_nascimento);
		$_abono = KX_calculaAbono($_idade);
		$_salBruto = KX_calculaSalBruto($_abono, $_salFamilia, $_salBase);
		$_inss = KX_calculaInss($_salBase);
		$_salLiquido = KX_calculaSalLiquido($_salBruto, $_inss);

// Envio de dados para mensagem final

	$_dados = array( '_cpf' => $_cpf,
			'_funcionario' => $_funcionario,
			'_nascimento' => $_nascimento,
			'_idade' => $_idade,
			'_salBase' => $_salBase,
			'_salFamilia' => $_salFamilia,
			'_abono' => $_abono,
			'_salBruto' => $_salBruto,
			'_inss' => $_inss,
			'_salLiquido' => $_salLiquido);
	KX_sendData($_dados, 'http://10.4.5.13/cadastroSalario/view/view.php');
	  }
?>
