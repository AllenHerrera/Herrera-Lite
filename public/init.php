<?php

function my_autoloader($class) {

  if(file_exists(ENGINE. $class . '.php')) {

    include ENGINE . $class . '.php';
    //echo "<br>including : $class";
  } else {
   echo "<br>Startup: " .ENGINE ."$class.php not found <br>";
  }
}

spl_autoload_extensions(".php");
spl_autoload_register('my_autoloader');

?>
