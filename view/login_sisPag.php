<?php

	require_once('../config/sessaoAtiva.php');
	$_estaAtiva = false;

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
			<input name="_usuario" type="text" required >
			<br>
			<br>
			Senha:
			<input name="_senha" type="password" required >
			<br>
			<br>
			<input value="Entrar" type="submit">
		</form>	
	</body>

</html>
