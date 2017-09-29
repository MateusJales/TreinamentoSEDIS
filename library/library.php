<?php
/*
Sistema..........: SisPag
Nome do programa.: library.php
Objetivo.........: Disponibiliza funções para uso do sistema
Autor............: Mateus de Medeiros Jales
Data.............: 24/08/2017
Versão 1.0
*/

// Variáveis globais do sistema

	require_once("../config/config.php");

// Troca dados de usuário

	function KX_changeUser($p_userToChange, $p_user, $p_password, $p_isAdmin) {
		$usersData = KX_ativaDadosLogin();
		for ( $i = 0; $i < count($usersData); $i++ ) {
			if ( $usersData[$i]['user'] == $p_userToChange ) {
				$usersData[$i]['user'] = $p_user;
				$usersData[$i]['password'] = $p_password;
				$usersData[$i]['isAdmin'] = $p_isAdmin;
			}
		}
		$handle = fopen(USERS_DATA_PATH, 'w');
		for ( $i = 0; $i < count($usersData); $i++ ) {
			$txt = $usersData[$i]['user'].";".$usersData[$i]['password'].";".$usersData[$i]['isAdmin']."\n";
			fwrite($handle, $txt);
		}
		fclose($handle);
	}

// Valida dados para alteração de dados de usuário

function KX_validateChangeUser($p_user, $p_password) {
	if ( (strpos($p_password, ';' ) !== false) || (strpos($p_password, ' ' ) !== false) || (strpos($p_user, ';' ) !== false) || (strpos($p_user, ' ' ) !== false) ) {
		return false;
	}
	return true;
}



// Verifica se nova senha é válida

	function KX_validateNewPassword($p_user, $p_password, $p_newPassword, $p_newPasswordConfirm) {
		$usersData = KX_ativaDadosLogin();
		for ( $i = 0; $i < count($usersData); $i++ ) {
			if ( $otherUsers[$i]['user'] == $p_user ) {
				if ( $otherUsers[$i]['password'] != $p_password ) {
					return false;
				}
			}
		}
		if ( (strpos($p_newPassword, ';' ) !== false) || (strpos($p_newPassword, ' ' ) !== false) ) {
			return false;
		}
		if ( $p_newPassword != $p_newPasswordConfirm ) {
			return false;
		}
		return true;
	}

// Troca senha de usuário

	function KX_changePassword ($p_user, $p_newPassword) {
		$usersData = KX_ativaDadosLogin();
		for ( $i = 0; $i < count($usersData); $i++ ) {
			if ( $usersData[$i]['user'] == $p_user ) {
				$usersData[$i]['password'] = $p_newPassword;
			}
		}
		$handle = fopen(USERS_DATA_PATH, 'w');
		for ( $i = 0; $i < count($usersData); $i++ ) {
			$txt = $usersData[$i]['user'].";".$usersData[$i]['password'].";".$usersData[$i]['isAdmin']."\n";
			fwrite($handle, $txt);
		}
		fclose($handle);
	}

// Verifica se novo usuário é válido

	function KX_validateNewUser($p_user, $p_password, $p_passwordConfirm) {
		$otherUsers = KX_ativaDadosLogin();
		if ( (strpos($p_user, ';' ) !== false) || (strpos($p_user, ' ' ) !== false) || (strpos($p_password, ';' ) !== false) || (strpos($p_password, ' ' ) !== false) ) {
			return false;
		}
		for ( $i = 0; $i < count($otherUsers); $i++ ) {
			if ( $otherUsers[$i]['user'] == $p_user ) {
				return false;
			}
		}
		if ( $p_password != $p_passwordConfirm ) {
			return false;
		}
		return true;
	}

// Insere novo usuário no banco de dados

	function KX_newUser($p_user, $p_password) {
		$handle = fopen(USERS_DATA_PATH, 'a');
		$txt = $p_user.";".$p_password.";0\n";
		fwrite($handle, $txt);
		fclose($handle);
	}

// Verifica se o login é correto

	function KX_ativaDadosLogin() {
		$handle = fopen(USERS_DATA_PATH, 'r');
		$id = 0;
		$dados = array(array());
		while(!feof($handle)) {
			$linhaDado = fgets($handle);
			if ( ! empty($linhaDado) ) {
				$cadaDado = explode(";", $linhaDado);
				$dados[$id]['user'] = $cadaDado[0];
				$dados[$id]['password'] = trim($cadaDado[1]);
				$dados[$id]['isAdmin'] = trim($cadaDado[2]);
				$id ++;
			}
		}
		fclose($handle);
		return($dados);
	}

	function KX_login($p_user, $p_password) {
		$dadosLogin = KX_ativaDadosLogin();
		for ( $i = 0; $i < count($dadosLogin); $i++ ) {
			if ( $dadosLogin[$i]['user'] == $p_user && $dadosLogin[$i]['password'] == $p_password ) {
				session_start();
				$_SESSION['_user'] = new User ($p_user, $dadosLogin[$i]['isAdmin']);
				break;
			}
		}
		KX_redirectPage('http://'.IP_MAQUINA.'/SisPag/view/login_sisPag.php');
	}

	function KX_sendData ($p_dados, $p_url) {
		session_write_close();

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $p_url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $p_dados);
		curl_setopt($ch, CURLOPT_COOKIESESSION, true);
		curl_exec($ch);
		curl_close($ch);

	}

//Checa se valor de Salário Base é válido

	function KX_isSalBase ($p_num) {

		if ( $p_num < 0 )
		  {
			return true;
		  }
		else
		  {
			return false;
		  }

	}

// Checa se o nome não é vazio

	function KX_isEmpty ($p_name) {

		if ( strlen($p_name ) < 1 )
		  {
			return true;
		  }

		return false;

	}


// Checa CPF

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

// Cálcula valores finais

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
