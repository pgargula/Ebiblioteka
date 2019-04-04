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

    
    <script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />


    <script src="http://cookiealert.sruu.pl/CookieAlert-latest.min.js"></script>
<script>CookieAlert.init();</script>



    <style>
  body  {
  background-image: url("images/what-the-hex.png");
  
}
</style>

</head>
<body>




<?php include('navbar.php'); ?>


<?PHP
if (isset($_POST['addLend'])){
    
    include'addLendC.php';
}
?>


 <form method="post"  class="row justify-content-md-center ">
 
 <div class="col-12 col-md-9 shadow-lg p-3 mb-5 bg-white rounded" >
 <div class="row">
    <div class=" col-12 col-md-3">
            <div class="col-10 ">
                <div class="row"><label >Dostępne od:</label>   </div>
                
                <div class="row"><input name="Dod" id="datepicker" width="300" /></div>
                <div class="row  mt-4"><label >Dostępne do:</label>   </div>
                <div class="row"><input name="Ddo" id="datepicker1" width="300" /></div>
                <div class="row  mt-4"><label >Cena:</label>   </div>
                <div class="row"><input name="cena" type="text" class="form-control"  name="cena"  width="300" placeholder="Wprowadz Cene"></div>
                <div class="row  mt-5"><button type="submit" class="btn btn-success" width="300" name="addLend">Dodaj książke do listy wypożyczeń</button></div>
            </div> 
        
    </div>
    <div class=" col-12 col-md-8">
    <hr>
<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Tytuł</th>
                <th>Imie</th>
                <th>Nazwisko</th>
                <th>Kategoria</th>
                <th>Dostepne od</th>
                <th>Dostepne do</th>
                <th>Cena zł</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php

if (isset($_GET['id'])){
    
    $_GET['id'] = mysqli_real_escape_string($link, $_GET['id']);
    
    mysqli_query($link, "delete from Transakcje where id_transakcje = '$_GET[id]' limit 1;");
    
}



if($_SESSION['typ']==1)
{
    $id=$_SESSION['ID']; 
$q = mysqli_query($link, "select * from Transakcje w inner join Ksiazki k on k.id_ksiazka=w.id_ksiazka inner join Autorzy a on a.id_autor=k.id_autor  inner join Kategorie ka on ka.id_kategoria=k.id_kategoria  Where w.id_czytelnik_dawca=$id and w.status=1;");

}
if($_SESSION['typ']==2)
{
    $id=$_SESSION['ID']; 
$q = mysqli_query($link, "select * from Transakcje w  inner join Ksiazki k on k.id_ksiazka=w.id_ksiazka inner join Autorzy a on a.id_autor=k.id_autor  inner join Kategorie ka on ka.id_kategoria=k.id_kategoria  Where w.id_biblioteka_dawca=$id and w.status=1;");

}


while ($tabl = mysqli_fetch_assoc($q)){
    $tabl['tytul'] = htmlspecialchars($tabl['tytul']);
    $tabl['imie'] = htmlspecialchars($tabl['imie']);
    $tabl['nazwisko'] = htmlspecialchars($tabl['nazwisko']);
    $tabl['nazwa'] = htmlspecialchars($tabl['nazwa']);
    $tabl['cena'] = htmlspecialchars($tabl['cena']);
   
    echo "<tr><td>$tabl[tytul]</td><td>$tabl[imie]</td><td>$tabl[nazwisko]</td><td>$tabl[nazwa]</td><td>$tabl[dostepnosc_od]</td><td>$tabl[dostepnosc_do]</td><td>$tabl[cena]</td>
    <td><a class=\"btn btn-danger\" href='?id=$tabl[id_transakcje]'>usuń</a></td>
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
                <th>Dostepne od</th>
                <th>Dostepne do</th>
                <th>Cena zł</th>
                <th></th>
        
            </tr>
        </tfoot>
    </table>

    </div>
    </div>
 </div>
 </div>
    
    </form>
    
    

    <script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4'
            
        });
    </script>
    <script>
        $('#datepicker1').datepicker({
            uiLibrary: 'bootstrap4'
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
   
    </body>
    </html>