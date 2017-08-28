<?php
/*
Sistema..........: SisPag
Nome do programa.: frm_cadastroSalario.php
Objetivo.........: Apresenta interface inicial e recebe dados de entrada do usuário
Autor............: Mateus de Medeiros Jales
Data.............: 24/08/2017
Versão 1.0
*/

// Requerimentos

	// Biblioteca de funções do sistema
	require_once('../library/library.php');

	// Variáveis globais do sistema
	require_once('../config/config.php');

?>

<!DOCTYPE html>
<html>

	<head>
		<!-- Definição de metadados para exibição de caracteres especiais -->

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Formulário</title>

	</head>

	<?php

		// Variável auxiliar para o caso de segundo ciclo com erros

		$_dados = array('_cpf' => '',
				'_funcionario' => '',
				'_nascimento' => '',
				'_salBase' => '',
				'_numFilhos' => '');
		if ( ! empty($_POST) )
		  {
			$_dados = $_POST;
		  }
	?>

	<body>

		<h1>Cálculo Salarial</h1>

		<!-- Leitura de dados fornecidos pelo usuário -->

		<form action="../controller/controller_cadastroSalario.php" method="POST">

			CPF: 
			<input name="_cpf" type="text" maxlength="11" value="<?php echo $_dados['_cpf']; ?>" required >
			<?php

				// Exibição de alerta para caso de entrada inválida

				if ( (! KX_isCPF($_dados['_cpf'])) && ($_dados['_cpf'] != '') )
				  {
					echo "CPF inválido!";
				  }

			?>
			<br>
			<br>

			Funcionário: 
			<input name="_funcionario" type="text" value="<?php echo $_dados['_funcionario']; ?>" required>
			<br>
			<br>

			Ano de Nascimento: 
			<input name="_nascimento" type="number" max="1999" min="1900" value="<?php echo $_dados['_nascimento']; ?>" required>
			<br>
			<br>

			Salário Base: 
			<input name="_salBase" type="text" value="<?php echo $_dados['_salBase']; ?>" required>
			<?php

				// Exibição de alerta para caso de entrada inválida

				if ( KX_isNegative($_dados['_salBase']) )
				  {
					echo "Salário Base inválido!";
				  }

			?>
			<br>
			<br>

			Quantidade de Filhos: 
			<input name="_numFilhos" type="number" min="0" value="<?php echo $_dados['_numFilhos']; ?>" required>
			<?php

				// Exibição de alerta para caso de entrada inválida

				if ( KX_isNegative($_dados['_numFilhos']) )
				  {
					echo "Número de filhos inválido!";
				  }

			?>
			<br>
			<br>

			<input value="Calcular" type="submit">

		</form>

	</body>

</html>	
