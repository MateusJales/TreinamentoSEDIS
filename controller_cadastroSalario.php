<?php
/*
Sistema..........: SisPag
Nome do programa.: processarFormulario.php
Objetivo.........: Processar e validar dados informados pelo formulário de dados salariais do arquivo html
Autor............: Mateus de Medeiros Jales
Data.............: 24/08/2017
*/

// Bibliotecas do sistema

	require_once("./library.php");

// Parâmetros de entrada

	$_cpf = $_POST['cpf'];
	$_funcionario = $_POST['funcionario'];
	$_nascimento = $_POST['nascimento'];
	$_salBase = $_POST['salBase'];
	$_numFilhos = $_POST['numFilhos'];

// Variáveis de configuração

	$_urlErro = "http://10.4.5.13/folha/erro_controller_cadastroSalario.php?";
	$_valido = true;

// Validação
	// Validação de CPF

	if ( !KX_isCPF($_cpf) )
	  {
		$_urlErro = $_urlErro."cpf=".$_cpf."&";
		$_valido = false;
	  }

	// Validação de nome do funcionário

	if ( KX_isEmpty($_funcionario) )
	  {
		$_urlErro = $_urlErro."funcionario=erro&";
		$_valido = false;
	  }

	// Validação de salário base

	if ( KX_isNegative($_salBase) )
	  {
		$_urlErro = $_urlErro."salBase=".$_salBase."&";
		$_valido = false;
	  }

	// Validação de número de filhos

	if ( KX_isNegative($_numFilhos) )
	  {
		$_urlErro = $_urlErro."numFilhos=".$_numFilhos."&";
		$_valido = false;
	  }
	
// Encaminhamento de acordo com a validação

	if (! $_valido) {
		KX_redirectPage($_urlErro);
	}

// Processamento de novas variáveis a serem exportadas

	$_salFamilia = 30 * $_numFilhos;
	$_abono = 0;
	$_idade = 2017 - $_nascimento;
	if($_idade > 40)
	  {
		$abono = 800;
	  }
	$_salBruto = $_abono + $_salFamilia + $_salBase;
	$_inss = 0.08 * $_salBase;
	$_salLiquido = $_salBruto - $inss;
?>
