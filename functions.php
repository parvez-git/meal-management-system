<?php

spl_autoload_register(function ($class) {
    include 'libs/' . $class . '.php';
});

function view( $path, $data )
{
  if ($data) {
    extract($data);
  }
  $path = $path . '.view.php';
  include 'views/layout.php';
}



// temporary
function vd($data){
  print('<pre>');
  var_dump($data);
  print('</pre>');
  die();
}
