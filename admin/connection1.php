<?php

// Create connection
$conn = mysqli_connect("localhost", "root","","abc");

// Check connection
if (mysqli_connect_error()) {
  echo("Connection failed: " . mysqli_connect_errno());
}

?>