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

	$_url = "http://10.4.5.13/folha/form.html";

// Validação
	// Validação de CPF

	if ( KX_isCPF($_cpf) ) {
		KX_redirectPage($_url);
		exit;
	}

	// Validação de nome do funcionário

	if(strlen($_funcionario) < 1) {
		echo "Nome do funcionário inválido!<br>";
		exit;
	}

	// Validação de salário base

	if ( KX_isNegative($_salBase) )
	  {
		KX_redirectPage($_url);
		exit;
	  }

	// Validação de número de filhos

	if ( KX_isNegative($_numFilhos) )
	  {
		KX_redirectPage($_url);
		exit;
	  }
		
//Processamento de novas variáveis a serem exportadas

	$_salFamilia = 30 * $__numFilhos;
	$_abono = 0;
	$_idade = 2017 - $_nascimento;
	if($_idade > 40) {
		$abono = 800;
	}
	$_salBruto = $_abono + $_salFamilia + $_salBase;
	$_inss = 0.08 * $_salBase;
	$_salLiquido = $_salBruto - $inss;
?>
