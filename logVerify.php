<?php 


//$link = mysqli_connect("149.156.136.151", "pgargula", "1234567890.", "pgargula") or die(mysqli_connect_error()); 
include'dbConnect.php';

 $_POST['login'] = mysqli_real_escape_string($link,$_POST['login']);
 $_POST['haslo'] = mysqli_real_escape_string($link,$_POST['haslo']);

 
   // sprawdzamy czy login i hasło są dobre
   $result=mysqli_query($link,"SELECT id_weryfikacja,  login, haslo, salt, typ FROM Weryfikacja WHERE login = '$_POST[login]';");
   echo mysqli_num_rows($result);
  
  
  
  
  
   if (mysqli_num_rows($result) > 0)
   {
      $tabU = mysqli_fetch_assoc($result);
      $tabU['id_weryfikacja']=htmlspecialchars($tabU['id_weryfikacja']);
      
      $_POST['haslo']= $_POST['haslo'].$tabU['salt'];
      $hash=sha1( $_POST['haslo']);
      

      if($hash==$tabU['haslo'])
      {
         if ($tabU['typ']==1){
         $result1=mysqli_query($link,"SELECT id_czytelnik FROM Czytelnicy WHERE id_weryfikacja = '$tabU[id_weryfikacja]';");
         $tabU1 = mysqli_fetch_assoc($result1);
         $tabU1['id_czytelnik']=htmlspecialchars($tabU1['id_czytelnik']);
        
         echo $_POST['login'];
      $_SESSION['zalogowany'] = true;
      $_SESSION['login'] = $_POST['login'];
      $_SESSION['ID']=htmlspecialchars($tabU1['id_czytelnik']);
      $_SESSION['typ']=$tabU['typ'];
      echo "zalogowano";
      
      header('Location: mojzbior.php');
      
      }



      if ($tabU['typ']==2){
         $result1=mysqli_query($link,"SELECT id_pracownik FROM Biblioteka WHERE id_weryfikacja = '$tabU[id_weryfikacja]';");
         $tabU1 = mysqli_fetch_assoc($result1);
         $tabU1['id_pracownik']=htmlspecialchars($tabU1['id_pracownik']);
        
         echo $_POST['login'];
      $_SESSION['zalogowany'] = true;
      $_SESSION['login'] = $_POST['login'];
      $_SESSION['ID']=htmlspecialchars($tabU1['id_pracownik']);
      $_SESSION['typ']=$tabU['typ'];
      echo "zalogowano";
      
      header('Location: mojzbior.php');}


      if ($tabU['typ']==3){
         
        
         echo $_POST['login'];
      $_SESSION['zalogowany'] = true;
      $_SESSION['login'] = "admin";
      
      $_SESSION['typ']=$tabU['typ'];
      echo "zalogowano";
      
      header('Location: adminStart.php');}
      


   }
   }
   
   
   
   
   
      else echo "Wpisano złe dane.";
      
   


   
   ?>
