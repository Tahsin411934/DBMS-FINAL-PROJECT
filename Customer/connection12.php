<?php

// Create connection
$conn = mysqli_connect("localhost", "root","","library_management_system");

// Check connection
if (mysqli_connect_error()) {
  echo("Connection failed: " . mysqli_connect_errno());
}

?>