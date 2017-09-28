<?php
// Requerimentos

  // Biblioteca de funções do sistema
  require_once('../library/library.php');

  // Variáveis globais do sistema
  require_once('../config/config.php');
  //session_name("teste");
  session_start();

  print_r($_SESSION);
  print_r($_POST);

?>
