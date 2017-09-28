<html>

	<head>

		<!-- Definição de metadados para exibição de caracteres especiais -->
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

	</head>

  <body>
		Versão 1.0
		<?php
		if ( $_SESSION['_user']->isAdmin == '1' ) {
			echo ' - Administrador';
			echo '<form action="../view/manageUsersAdmin.php">';
			echo '<input value="Gerenciar Usuários" type="submit">';
			echo '</form>';
		}
		?>
    <form action="../controller/controller_logout.php">

			<input value="Logout" type="submit">

    </form>

		<form action="./changePassword.php" >
			<input value="Alterar Senha" type="submit">
		</form>

  </body>

</html>
