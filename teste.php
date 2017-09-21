<?php
$localizacao = '/home/mateusjales/dados/data_sisPag.txt';
$handle = fopen($localizacao, 'r');
$id = 0;
$dados = array(array());
while(!feof($handle)) {
  $linhaDado = fgets($handle);
  if ( ! empty($linhaDado) ) {
    $cadaDado = explode(";", $linhaDado);
    $dados[$id]['user'] = $cadaDado[0];
    $dados[$id]['password'] = trim($cadaDado[1]);
    $dados[$id]['isAdmin'] = trim($cadaDado[2]);
    $id ++;
  }
}
fclose($handle);
var_dump($dados);
?>
