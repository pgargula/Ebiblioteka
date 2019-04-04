<?php

	include'session.php';
?>
<?php include'dbConnect.php' ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>EBiblioteka</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" />
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>


      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>


  <script src="http://cookiealert.sruu.pl/CookieAlert-latest.min.js"></script>
<script>CookieAlert.init();</script>




<style>
  body  {
  background-image: url("images/what-the-hex.png");
  
}
</style>


</head>
<body>


<?php include('adminNavbar.php'); ?>









 <form method="post"  class="row justify-content-md-center ">
 
 <div class="col-12 col-md-9 shadow-lg p-3 mb-5 bg-white rounded" >
        <div class="row"><a class="btn btn-secondary mr-2" href="addBook.php" role="button">Dodaj książke</a>
        <div ><button class="btn btn-secondary ml-2 mr-2" name="addAuthor" type="submit">Dodaj autora</button></div>
        <div ><button class="btn btn-secondary ml-2 mr-5" name="addCategory" type="submit">Dodaj kategorie</button></div>
             </div>
            <?PHP
             

             if (isset($_POST['addA'])){
               
                $_POST['imieA'] = mysqli_real_escape_string($link, $_POST['imieA']);
                $_POST['nazwiskoA'] = mysqli_real_escape_string($link, $_POST['nazwiskoA']);
                mysqli_query($link, "insert into Autorzy (imie, nazwisko) values ('$_POST[imieA]','$_POST[nazwiskoA]');");
             }
             if (isset($_POST['addC'])){
               
                $_POST['nazwaN'] = mysqli_real_escape_string($link, $_POST['nazwaN']);
                mysqli_query($link, "insert into Kategorie (nazwa) values ('$_POST[nazwaN]');");
            
                
            }
            
            if (isset($_POST['addAuthor'])){
                include('addAuthor.php');
            }   
            if (isset($_POST['addCategory'])){
            include('addCategory.php');
            } 
            ?>

<hr>
<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Tytuł</th>
                <th>Imie</th>
                <th>Nazwisko</th>
                <th>Kategoria</th>
                <th>Rok Wydania</th>
                <th>Akcja</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php

if (isset($_GET['id'])){
    
    $_GET['id'] = mysqli_real_escape_string($link, $_GET['id']);
   
    
    mysqli_query($link, "delete from Ksiazki where id_ksiazka = '$_GET[id]' limit 1;");
    
}

if (isset($_GET['idW'])){
    
    $_SESSION['id-ksiazkaW'] = $_GET['idW'];
    header('location:addLend.php');
    
    
}


$q = mysqli_query($link, "select * from Ksiazki k  inner join Autorzy a on a.id_autor=k.id_autor  inner join Kategorie ka on ka.id_kategoria=k.id_kategoria  ;");



while ($tabl = mysqli_fetch_assoc($q)){
    $tabl['tytul'] = htmlspecialchars($tabl['tytul']);
    $tabl['imie'] = htmlspecialchars($tabl['imie']);
    $tabl['nazwisko'] = htmlspecialchars($tabl['nazwisko']);
    $tabl['nazwa'] = htmlspecialchars($tabl['nazwa']);
   
    echo "<tr><td>$tabl[tytul]</td><td>$tabl[imie]</td><td>$tabl[nazwisko]</td><td>$tabl[nazwa]</td><td>$tabl[rok_wydania]</td>
    <td><a class=\"btn btn-secondary\" href='?idW=$tabl[id_ksiazka]'>Edytuj</a></td><td><a class=\"btn btn-danger\" href='?id=$tabl[id_ksiazka]'>usuń</a></td>
    </tr>";
}

?>           
            </tbody>
        <tfoot>
            <tr>
            
                <th>Tytuł</th>
                <th>Imie</th>
                <th>Nazwisko</th>
                <th>Kategoria</th>
                <th>Rok Wydania</th>
                <th>Akcja</th>
                <th></th>
        
            </tr>
        </tfoot>
    </table>

    </div>
    
</form>
<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>

</body>
</html>