<?php
$_POST['tytul'] = mysqli_real_escape_string($link, $_POST['tytul']);
$_POST['imie'] = mysqli_real_escape_string($link, $_POST['imie']);
$_POST['nazwisko'] = mysqli_real_escape_string($link, $_POST['nazwisko']);
$_POST['rok'] = mysqli_real_escape_string($link, $_POST['rok']);
$_POST['isbn'] = mysqli_real_escape_string($link, $_POST['isbn']);
$_POST['idk'] = mysqli_real_escape_string($link, $_POST['idk']);


echo $_POST['idk']; 
$result1=mysqli_query($link,"SELECT id_autor FROM Autorzy WHERE imie = '$_POST[imie]' AND nazwisko = '$_POST[nazwisko]';");
   if (mysqli_num_rows($result1) == 0)
   {
    
    mysqli_query($link, "insert into Autorzy (imie, nazwisko) values ('$_POST[imie]','$_POST[nazwisko]');");
   }


   $result2=mysqli_query($link,"SELECT id_autor FROM Autorzy WHERE imie = '$_POST[imie]' AND nazwisko = '$_POST[nazwisko]';");
   $tabU = mysqli_fetch_assoc($result2);
   $tabU['id_autor'] = htmlspecialchars($tabU['id_autor']);  
   
   
$result=mysqli_query($link,"SELECT tytul FROM Ksiazki WHERE tytul = '$_POST[tytul]';"); 
echo mysqli_num_rows($result);
   if (mysqli_num_rows($result) == 0)
   {
     
    mysqli_query($link, "insert into Ksiazki (tytul, rok_wydania, isbn, id_autor, id_kategoria) values ('$_POST[tytul]','$_POST[rok]','$_POST[isbn]','$tabU[id_autor]','$_POST[idk]');");
   }


   $typ =$_SESSION["typ"];
if($typ==1){
   $result3=mysqli_query($link,"SELECT id_ksiazka FROM Ksiazki WHERE tytul = '$_POST[tytul]';");
   $tab1 = mysqli_fetch_assoc($result3) ;
   $tab1['id_ksiazka'] = htmlspecialchars($tab1['id_ksiazka']);  
   $id =$_SESSION["ID"];
mysqli_query($link, "insert into Moj_Zbior (id_ksiazka, id_czytelnik) values ('$tab1[id_ksiazka]','$id');");
header('Location: mojzbior.php');}
if($typ==3)
{
   header('Location: adminStart.php');
}
?>