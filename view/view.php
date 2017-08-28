<?php
/*
Sistema..........: SisPag
Nome do programa.: view.php
Objetivo.........: Exibe dados finais do usuário
Autor............: Mateus de Medeiros Jales
Data.............: 24/08/2017
Versão 1.0
*/

// Definição de parâmetros de entrada

	$_cpf = $_POST['_cpf'];
	$_funcionario = $_POST['_funcionario'];
	$_nascimento = $_POST['_nascimento'];
	$_idade = $_POST['_idade'];
	$_salBase = $_POST['_salBase'];
	$_salFamilia = $_POST['_salFamilia'];
	$_abono = $_POST['_abono'];
	$_salBruto = $_POST['_salBruto'];
	$_inss = $_POST['_inss'];
	$_salLiquido = $_POST['_salLiquido'];

// Exibição de resultados finais para o usuário

	echo "CPF: ".$_cpf;
	echo "<br>";
	echo "<br>";
	echo "Funcionário: ".$_funcionario;
	echo "<br>";
	echo "<br>";
	echo "Ano de nascimento: ".$_nascimento;
	echo "<br>";
	echo "<br>";
	echo "Idade: ".$_idade;
	echo "<br>";
	echo "<br>";
	echo "Salário Base: ".$_salBase;
	echo "<br>";
	echo "<br>";
	echo "Salário Família: ".$_salFamilia;
	echo "<br>";
	echo "<br>";
	echo "Abono: ".$_abono;
	echo "<br>";
	echo "<br>";
	echo "Salário Bruto: ".$_salBruto;
	echo "<br>";
	echo "<br>";
	echo "INSS: ".$_inss;
	echo "<br>";
	echo "<br>";
	echo "Salário Líquido: ".$_salLiquido;
	echo "<br>";
	echo "<br>";

?>
