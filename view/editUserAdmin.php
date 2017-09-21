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

  // Variáveis do POST

  $_usersData = KX_ativaDadosLogin();
  $_userId = $_POST['_userId'];

?>


<html>

	<head>

		<!-- Definição de metadados para exibição de caracteres especiais -->

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title> Editar Usuário </title>

	</head>

	<body>

		<h1> Editar Usuário </h1>

		<form action="../controller/controller_editUser.php" method="POST">

			Usuário: <?php echo $_usersData[$_userId]['user']; ?>
      <br>
			<input name="_user" type="text" required >
			<br>
			<br>
			Senha: <?php echo $_usersData[$_userId]['password']; ?>
      <br>
			<input name="_password" type="password" required >
			<br>
			<br>
      Administrador:
			<input type="checkbox" name="_isAdmin" <?php if ( $_usersData[$_userId]['isAdmin'] == '1' ) {echo 'checked';} ?>>
			<br>
			<br>
			<input value="Editar" type="submit">
		</form>

	</body>

</html>
