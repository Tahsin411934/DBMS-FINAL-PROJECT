<?php

// Create connection
$conn = mysqli_connect("localhost", "root","","adminuser");

// Check connection
if (mysqli_connect_error()) {
  echo("Connection failed: " . mysqli_connect_errno());
}

?>