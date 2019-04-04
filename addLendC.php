<?php
$_POST['Dod'] = mysqli_real_escape_string($link, $_POST['Dod']);
$_POST['Ddo'] = mysqli_real_escape_string($link, $_POST['Ddo']);
$_POST['cena'] = mysqli_real_escape_string($link, $_POST['cena']);



$parts1 = explode('/', $_POST['Dod']);
$od  = "$parts1[2]-$parts1[0]-$parts1[1]";

$parts = explode('/', $_POST['Ddo']);
$do  = "$parts[2]-$parts[0]-$parts[1]";

$id_ksiazka= $_SESSION['id-ksiazkaW'];
$id_user =$_SESSION["ID"];



    mysqli_query($link, "insert into Transakcje (id_ksiazka, id_czytelnik_dawca, dostepnosc_od, dostepnosc_do, status, cena) values ('$id_ksiazka','$id_user','$od','$do',1,'$_POST[cena]');");


        header('Location: mojzbior.php');


  
?>