<?php

	require_once('../library/library.php')

?>

<!DOCTYPE html>
<html>

	<head>

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Formulário</title>

	</head>

	<?php

		
		$_dados = array('_cpf' => '',
				'_funcionario' => '',
				'_salBase' => '',
				'_numFilhos' => '');
		if ( ! empty($_POST) )
		  {
			$_dados = $_POST;
		  }

	?>

	<body>

		<h1>Cálculo Salarial</h1>

		<form action="../controller/controller_cadastroSalario.php" method="POST">

			CPF: 
			<input name="_cpf" type="text" maxlength="11" value=<?php echo $_dados['_cpf'];?>>
			<?php

				if ( KX_isCPF($_dados['_cpf'] )
				  {
					echo "CPF inválido!";
				  }

			?>
			<br>
			<br>

			Funcionário: 
			<input name="_funcionario" type="text" value=<?php echo $_dados['_funcionario'];?>>
			<?php

				if ( KX_isEmpty($_dados['_funcionario'] )
				  {
					echo "Funcionário inválido!";
				  }

			?>

			<br>
			<br>

			Ano de Nascimento: 
			<input name="_nascimento" type="number" max="1999" min="1900">
			<br>
			<br>

			Salário Base: 
			<input name="_salBase" type="text" value=<?php echo $_dados['_salBase'];?>>
			<?php

				if ( KX_isNegative($_dados['_salBase']) )
				  {
					echo "Salário Base inválido!";
				  }

			?>

			<br>
			<br>

			Quantidade de Filhos: 
			<input name="_numFilhos" type="number" min="0" value=<?php echo $_dados['_numFilhos'];?>>
			<?php

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
