<?php
// Requerimentos

  // Biblioteca de funções do sistema
  require_once('../library/library.php');

  // Variáveis globais do sistema
  require_once('../config/config.php');

  // Verificação de login
  require_once('../session/session.php');


  // Variáveis do POST

  $_dataToChange = $_POST;
  $_userId = array('_userId' => $_POST['_userId']);

  if ( isset($_dataToChange["_isAdmin"]) ) {
    $_dataToChange["_isAdmin"] = "1";
  } else {
    $_dataToChange["_isAdmin"] = "0";
  }

  if ( KX_validateChangeUser($_dataToChange["_user"], $_dataToChange["_password"]) ) {
    KX_changeUser($_dataToChange["_userToChange"], $_dataToChange["_user"], $_dataToChange["_password"], $_dataToChange["_isAdmin"]);
    KX_redirectPage('http://'.IP_MAQUINA.'/SisPag/view/manageUsersAdmin.php');
  } else {
    $_SESSION["_editingUser"] = array('_userId' => $_dataToChange["_user"],
                                      '_password' => $_dataToChange["_password"]);
    KX_redirectPage('http://'.IP_MAQUINA.'/SisPag/view/editUserAdmin.php');
  }
 ?>
