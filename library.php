<?php
/*
Sistema..........: Biblioteca de funções genéricas
Nome do programa.: library.php
Objetivo.........: Coleção de funções para uso geral
Autor............: Mateus de Medeiros Jales
Data.............: 24/08/2017
Versão 1.0
*/

//Checar se número é negativo

function KX_isNegative ($p_num) {

	if ($p_num < 0) 
	  {
		return true;
	  }
	else
	  {
		return false;
	  }

}

// Checar CPF

function KX_isCPF ($p_cpf) {

	// Verifica tamanho do CPF
	   if ( strlen($_cpf ) < 11)
	     {
		return false;
	     }

	// Verifica se CPF apenas numérico
	   if ( ! ctype_digit($_cpf) )
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
