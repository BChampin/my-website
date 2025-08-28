<?php
function chargerClasse($classe)
{
  if(preg_match("/model/",$classe) || $classe == "Model")require model . $classe . '.php';
  else require controller . $classe . '.php';
}
spl_autoload_register('chargerClasse');
?>
