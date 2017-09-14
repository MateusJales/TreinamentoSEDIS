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

?>


<html>

	<head>

		<!-- Definição de metadados para exibição de caracteres especiais -->

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title> Login SisPag </title>

	</head>

	<body>

		<h1> SisPag </h1>

		<form action="../controller/controller_login.php" method="POST">

			Usuário:
			<input name="_user" type="text" required >
			<br>
			<br>
			Senha:
			<input name="_password" type="password" required >
			<br>
			<br>
			<input value="Entrar" type="submit">
		</form>
	</body>

</html>
