<?php
/*// Requerimentos

  // Biblioteca de funções do sistema
  require_once('../library/library.php');

  // Variáveis globais do sistema
  require_once('../config/config.php');
  $dado = 123;


  session_start();
  $_SESSION['teste'] = 1;
  print_r($_SESSION);
  KX_sendData($dado, 'http://'.IP_MAQUINA.'/SisPag/testes/teste1.php');
*/

require_once '../model/User.php';
$p_user = "Kruix";
$p_login = '1234';

$user = new User ($p_user, $p_login);
session_start();
$_SESSION['_user'] = new User ($p_user, $p_login);

var_dump($_SESSION);
if( ! isset($_SESSION['_user']->user)) {
  echo 'klsdfnvsalkm';
}




  ?>
