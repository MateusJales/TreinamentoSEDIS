<?php
/*
Sistema..........: SisPag
Nome do programa.: view.php
Objetivo.........: Exibe dados finais do usuário
Autor............: Mateus de Medeiros Jales
Data.............: 24/08/2017
Versão 1.0
*/

// Requerimentos

	// Biblioteca de funções do sistema
	require_once('../library/library.php');

	// Variáveis globais do sistema
	require_once('../config/config.php');

	// Verificação de login
	require_once('../session/session.php');

	// Cabeçalho
	include('./header.php');


// Definição de parâmetros de entrada

	$_dados = $_SESSION['dados'];

// Exibição de resultados finais para o usuário

	echo "CPF: ".$_dados['_cpf'];
	echo "<br>";
	echo "<br>";
	echo "Funcionário: ".$_dados['_funcionario'];
	echo "<br>";
	echo "<br>";
	echo "Ano de nascimento: ".$_dados['_nascimento'];
	echo "<br>";
	echo "<br>";
	echo "Idade: ".$_dados['_idade'];
	echo "<br>";
	echo "<br>";
	echo "Salário Base: ".$_dados['_salBase'];
	echo "<br>";
	echo "<br>";
	echo "Salário Família: ".$_dados['_salFamilia'];
	echo "<br>";
	echo "<br>";
	echo "Abono: ".$_dados['_abono'];
	echo "<br>";
	echo "<br>";
	echo "Salário Bruto: ".$_dados['_salBruto'];
	echo "<br>";
	echo "<br>";
	echo "INSS: ".$_dados['_inss'];
	echo "<br>";
	echo "<br>";
	echo "Salário Líquido: ".$_dados['_salLiquido'];
	echo "<br>";
	echo "<br>";

?>
