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

  // Variáveis que serão usadas
  $_usersData = KX_ativaDadosLogin();
  $_userId = 0;

?>
<html>

	<head>

		<!-- Definição de metadados para exibição de caracteres especiais -->

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title> Gerenciar Usuários </title>

	</head>

	<body>

		<h1> Gerenciar Usuários </h1>

    <table border="1">
      <tr>
        <th>Usuário</th>
        <th>Senha</th>
        <th>Administrador</th>
				<th></th>
      </tr>
      <?php
      while ($_userId < count($_usersData)) {
        echo '<tr>';
          echo '<td>';
            echo $_usersData[$_userId]['user'];
          echo '</td>';
          echo '<td>';
            echo $_usersData[$_userId]['password'];
          echo '</td>';
          echo '<td>';
            if ( $_usersData[$_userId]['isAdmin'] == '1' ) {
              echo 'Sim';
            } else {
              echo 'Não';
            }
          echo '</td>';
					echo '<td>';
						echo '<form action="../view/editUserAdmin.php" method="POST">';
							echo '<input name="_userId" type="hidden" value="'.$_userId.'">';
							echo '<input value="Editar" type="submit">';
						echo '</form>';
					echo '</td>';
				echo '</tr>';
				$_userId ++;
      }
      ?>
    </table>

	</body>

</html>
