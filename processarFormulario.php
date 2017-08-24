<?php
	echo "<h1>Cupom Salarial</h1>";
	echo "<br>";
	echo "<br>";
	if(strlen($_POST[_cpf]) < 11) {
		echo "CPF curto desfsfdsfgdsfgs!<br>";
		exit;
	}
	if(! ctype_digit($_POST[_cpf])) {
		echo "CPF não aceita letras, apenas números!<br>";
		exit;
	}		
	if(strlen($_POST[_funcionario]) < 1) {
		echo "Nome do funcionário inválido!<br>";
		exit;
	}
	if((float) $_POST[_salBase] < 0) {
		echo "Salário Base inválido!";
		exit;
	}
	$salFamilia = 30 * $_POST[_numFilhos];
	$abono = 0;
	if((2017 - $_POST[_nascimento]) > 40) {
		$abono = 800;
	}
	$salBruto = $abono + $salFamilia + $_POST[_salBase];
	$inss = 0.08 * $_POST[_salBase];
	$salLiquido = $salBruto - $inss;
	echo "CPF: ".$_POST[_cpf];
	echo "<br>";
	echo "<br>";
	echo "Funcionário: ".$_POST[_funcionario];
	echo "<br>";
	echo "<br>";
	echo "Ano de Nascimento: ".$_POST[_nascimento];
	echo "<br>";
	echo "<br>";
	echo "Salário Base: ".$_POST[_salBase];
	echo "<br>";
	echo "<br>";
	echo "Salaŕio Família: ".$salFamilia;
	echo "<br>";
	echo "<br>";
	echo "Abono: ".$abono;
	echo "<br>";
	echo "<br>";
	echo "Salário Bruto: ".$salBruto;
	echo "<br>";
	echo "<br>";
	echo "INSS: ".$inss;
	echo "<br>";
	echo "<br>";
	echo "Salário Líquido: ".$salLiquido;
	
	
	
?>
