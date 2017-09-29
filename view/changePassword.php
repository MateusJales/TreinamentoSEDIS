<?php
/*
Sistema..........: SisPag
Nome do programa.:
Objetivo.........:
Autor............: Mateus de Medeiros Jales
Data.............: 24/08/2017
Versão 1.0
*/

// Requerimentos

	// Biblioteca do sistema
	require_once("../library/library.php");

	// Variáveis globais do sistema
	require_once("../config/config.php");

  	// Verificação de login
 	 require_once('../session/session.php');

 	// Cabeçalho
	include('../templates/header.php');

?>


<html>

	<head>

		<!-- Definição de metadados para exibição de caracteres especiais -->

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title> Alterar Senha SisPag </title>

	</head>

	<body>

		<h1> Alterar Senha </h1>

		<form action="../controller/controller_changePassword.php" method="POST">

			Senha:
			<input name="_password" type="password" required >
			<br>
			<br>
			Nova Senha:
			<input name="_newPassword" type="password" required >
			<br>
			<br>
      Confirmar Nova Senha:
			<input name="_newPasswordConfirm" type="password" required >
			<br>
			<br>
			<input value="Alterar Senha" type="submit">

		</form>

	</body>

</html>
