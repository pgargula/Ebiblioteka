

<?php

try {
    $link = mysqli_connect("149.156.136.151", "pgargula", "1234567890.", "pgargula") or die(mysqli_connect_error());
  } 
catch (Exception $e) {
  
    echo "Błąd połączenia z bazą danych";
  
  }
//$link = mysqli_connect("localhost", "1373017", "505023657", "1373017") or die(mysqli_connect_error()); 
    $link->set_charset("utf8mb4");?>