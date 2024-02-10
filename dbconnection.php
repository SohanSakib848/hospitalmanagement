<?php

$con = mysqli_connect('localhost','root','','patient');
if ($con -> connect_errno) {
  echo "Failed to connect to MySQL: " . $con -> connect_error;
  exit();
}
?>