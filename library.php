	<?php
	/*
	Sistema..........: Biblioteca de funções genéricas
	Nome do programa.: library.php
	Objetivo.........: Coleção de funções para uso geral
	Autor............: Mateus de Medeiros Jales
	Data.............: 24/08/2017
	Versão 1.0
	*/

	//Resposta as entradas inválidas

	function KX_respostaErro ($p_G) { //Necessidade de mudança
		if ($p_G['cpf'] != "") {
			echo "CPF inválido!";
			echo "<br>";
		}
		if ($p_G['funcionario'] == "erro") {
			echo "Funcionário inválido!";
			echo "<br>";
		}
		if ($p_G['salBase'] != "") {
			echo "Salário base inválido!";
			echo "<br>";
		}
		if ($p_G['numFilhos'] != "") {
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

// Redireciona página

function KX_redirectPage ($p_url) {

	header('Location: '.$p_url);

}
?>
