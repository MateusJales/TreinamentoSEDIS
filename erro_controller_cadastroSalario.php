<?php require_once("./library.php"); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Erro</title>
	</head>
	
	<body>
		<h1>Erro!</h1>
		<br>
		<?php
			$_arrayErro = KX_getToArray($_GET);
			KX_mensagemErro($_arrayErro);
		?>
		<a href=<?php echo "http://10.4.5.13/folha/frm_cadastroSalario.php?cpf=" ?>>Voltar ao menu inicial</a>
	</body>
</html>
