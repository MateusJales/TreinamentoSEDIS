<?php
 
class MyClass
{
  public $prop1 = "Sou uma propriedade de classe!";
 
  public function __construct()
  {
      echo 'A classe "', __CLASS__, '" foi instanciada!<br />';
  }
 
  public function __destruct()
  {
      echo 'A classe "', __CLASS__, '" foi destruída.<br />';
  }
 
  public function __toString()
  {
      echo "Usando o método toString: ";
      return $this->getProperty();
  }
 
  public function setProperty($newval)
  {
      $this->prop1 = $newval;
  }
 
  public function getProperty()
  {
      return $this->prop1 . "<br />";
  }
}
 
class MyOtherClass extends MyClass
{
  public function newMethod()
  {
      echo "De um novo método na classe " . __CLASS__ . ".<br />";
  }
}
 
// Cria um novo objeto
$newobj = new MyOtherClass;
 
// Usa o método da nova classe
echo $newobj->newMethod();
 
// Usa um método da classe pai
echo $newobj->getProperty();
 
?>