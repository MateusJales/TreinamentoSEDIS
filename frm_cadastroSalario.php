<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Formulário</title>
	</head>
	<?php
		$_cpfValue = "";
		if ( isset($_GET['cpf']) ) {
			$_cpfValue = $_GET['cpf'];
		}
	?>
	<body>
		<h1>Cálculo Salarial</h1>
		<form action="controller_cadastroSalario.php" method="POST">
			CPF: 
			<input name="cpf" type="text" value="<?php echo $_cpfValue ?>" maxlength="11">
			<br>
			<br>
			Funcionário: 
			<input name="funcionario" type="text">
			<br>
			<br>
			Ano de Nascimento: 
			<input name="nascimento" type="number" max="1999" min="1900">
			<br>
			<br>
			Salário Base: 
			<input name="salBase" type="text">
			<br>
			<br>
			Quantidade de Filhos: 
			<input name="numFilhos" type="number" min="0">
			<br>
			<br>
			<input value="Calcular" type="submit">
		</form>
	</body>
</html>	
