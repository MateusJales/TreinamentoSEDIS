<?php
/*
Sistema..........: Biblioteca de funções genéricas
Nome do programa.: library.php
Objetivo.........: Coleção de funções para uso geral
Autor............: Mateus de Medeiros Jales
Data.............: 24/08/2017
Versão 1.0
*/

	// Passagem de dados sem formulário

	function KX_sendData ($p_dados, $p_url) {

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $p_url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $p_dados);
		curl_exec($ch);
		curl_close($ch);

	}

	//Resposta as entradas inválidas

	function KX_mensagemErro ($p_entrada) {

		if ($entrada != "" && $entrada != 'erro')
		  {
			echo " inválido!";
			echo "<br>";
		  }
		if ($p_G['funcionario'] == "erro")
		  {
			echo "Funcionário inválido!";
			echo "<br>";
		  }
		if ($p_G['salBase'] != "")
		  {
			echo "Salário base inválido!";
			echo "<br>";
		  }
		if ($p_G['numFilhos'] != "")
		  {
			echo "Número de filhos inválido!";
			echo "<br>";
		  }

	}

	//Checar se número é negativo

	function KX_isNegative ($p_num) {

		if ( $p_num < 0 )
		  {
			return true;
		  }
		else
		  {
			return false;
		  }

	}

	// Checar se o nome não é vazio

	function KX_isEmpty ($p_name) {

		if ( strlen($p_name ) < 1 )
		  {
			return true;
		  }
		
		return false;

	}


	// Checar CPF

	function KX_isCPF ($p_cpf) {

		// Verifica tamanho do CPF
		if ( strlen($p_cpf ) < 11)
		  {
			return false;
		  }

		// Verifica se CPF apenas numérico
		if ( ! ctype_digit($p_cpf) )
		  {
			return false;
		  }

	return true;

	}

	// Cálculo dos valores finais

	function KX_calculaSalFamilia ($p_numFilhos) {

		return 30 * $p_numFilhos;

	}

	function KX_calculaIdade ($p_nascimento) {
		
		return 2017 - $p_nascimento;

	}

	function KX_calculaAbono ($p_idade) {

		if($p_idade > 40)
		  {
			return 800;
		  }
		else
		  {
			return 0;
		  }
	}

	function KX_calculaSalBruto ($p_abono, $p_salFamilia, $p_salBase) {

		return $p_abono + $p_salFamilia + $p_salBase;

	}

	function KX_calculaInss ($p_salBase) {

		return 0.08 * $p_salBase;

	}

	function KX_calculaSalLiquido ($p_salBruto, $p_inss) {

		return $p_salBruto - $p_inss;

	}


	// Redireciona página

	function KX_redirectPage ($p_url) {

		header('Location: '.$p_url);

	}
?>
