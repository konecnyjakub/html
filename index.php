<?php
/**
 * Autoloader for HTML library
 * 
 * @param string $class Name of class to load
 * @return void
 */
function html_lib_autoload($class) {
  $pieces = explode("\\", $class);
  if($pieces[0] != "HTML") return;
  $filename = __DIR__ . "/src";
  foreach($pieces as $level => $piece) {
    if(!$level) continue;
    $filename .= "/$piece";
  }
  $filename .= ".php";
  require $filename;
}

spl_autoload_register("html_lib_autoload");
?>