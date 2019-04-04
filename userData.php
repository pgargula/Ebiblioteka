


<?php
include'session.php';
include'dbConnect.php';

$loginS =$_SESSION["ID"];

$user = mysqli_query($link, "SELECT login, email, telefon, data_urodzenia FROM Czytelnicy c left join Weryfikacja w on w.id_weryfikacja=c.id_weryfikacja  WHERE id_czytelnik = '$loginS';");
$result = array();


while ($tabU = mysqli_fetch_assoc($user)){
    $tabU['login'] = htmlspecialchars($tabU['login']);
    $tabU['email'] = htmlspecialchars($tabU['email']);
    $tabU['telefon'] = htmlspecialchars($tabU['telefon']);
    $tabU['data_urodzenia'] = htmlspecialchars($tabU['data_urodzenia']);
   
    $dbname=$tabU['login'];
    $dbemail=$tabU['email'];
    $dbtelefon=$tabU['telefon'];
    $dbdata=$tabU['data_urodzenia'];

    $result[]= array( 'name' => $dbname,'email' => $dbemail,'telefon' => $dbtelefon,'data_urodzenia' => $dbdata);
}

$tabU1="ellle1";
//header('Content-type:application/json;charset=utf-8');
echo json_encode($result,JSON_FORCE_OBJECT);
//echo $result;
?>           