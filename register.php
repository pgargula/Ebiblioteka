<?php
if (isset($_POST['zapisz'])){
    $_POST['email'] = mysqli_real_escape_string($link, $_POST['email']);
    $_POST['password'] = mysqli_real_escape_string($link, $_POST['password']);
    $_POST['login'] = mysqli_real_escape_string($link, $_POST['login']);
    $_POST['telefon'] = mysqli_real_escape_string($link, $_POST['telefon']);
    $_POST['data'] = mysqli_real_escape_string($link, $_POST['data']);

    if($_POST['data']!=null)
    {
    $parts1 = explode('/', $_POST['data']);
    $data  = "$parts1[2]-$parts1[0]-$parts1[1]";
    }
    else{$data=null;}
$salt = uniqid();

$_POST['password']=$_POST['password'].$salt;
$hash=sha1($_POST['password']);

    mysqli_query($link, "insert into Weryfikacja (login, haslo, salt, typ) values ('$_POST[login]','$hash','$salt',1);");
    $q=mysqli_query($link,"select id_weryfikacja from Weryfikacja where login='$_POST[login]'");

    $tabl = mysqli_fetch_assoc($q);
    $tabl['id_weryfikacja'] = htmlspecialchars($tabl['id_weryfikacja']);
    
    
    mysqli_query($link, "insert into Czytelnicy (email, telefon, data_urodzenia, id_weryfikacja) values ('$_POST[email]','$_POST[telefon]','$data','$tabl[id_weryfikacja]');");
 

}
    ?>