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


  <script src="http://cookiealert.sruu.pl/CookieAlert-latest.min.js"></script>
<script>CookieAlert.init();</script>


    
    <script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />

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
 
    
        <hr>
    <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                <th>Tytuł</th>
                    <th>Autor</th>
                    <th>Kategoria</th>
                    <th>Pożyczający</th>
                    <th></th>
                    <th>Termin</th>
                    <th>Cena zł</th>
                    <th>Status</th>
                    <th>Akcja</th>
                    
                </tr>
            </thead>
            <tbody>
            <?php

    if (isset($_GET['id'])){
        
        $_GET['id'] = mysqli_real_escape_string($link, $_GET['id']);
        $id=$_SESSION['ID']; 
        mysqli_query($link, "update Transakcje set status=status+1, id_czytelnik_biorca='$id' where id_transakcje='$_GET[id]';");
    }



    if($_SESSION['typ']==1)
    {
        $id=$_SESSION['ID']; 
    $q = mysqli_query($link, "select * from Transakcje w inner join Ksiazki k on k.id_ksiazka=w.id_ksiazka inner join Autorzy a on a.id_autor=k.id_autor 
    left Join Biblioteka b on b.id_pracownik=w.id_biblioteka_dawca 
    left join Czytelnicy c on w.id_czytelnik_dawca=c.id_czytelnik left join Weryfikacja ww on ww.id_weryfikacja=c.id_weryfikacja inner join Kategorie ka on ka.id_kategoria=k.id_kategoria  
    Where (w.id_czytelnik_dawca=$id or w.id_czytelnik_biorca=$id) and w.status!=1;");

    }
    if($_SESSION['typ']==2)
    {
        $id=$_SESSION['ID']; 
    $q = mysqli_query($link, "select * from Transakcje w inner join Ksiazki k on k.id_ksiazka=w.id_ksiazka inner join Autorzy a on a.id_autor=k.id_autor 
    left Join Biblioteka b on b.id_pracownik=w.id_biblioteka_dawca  
    left join Czytelnicy c on w.id_czytelnik_dawca=c.id_czytelnik left join Weryfikacja ww on ww.id_weryfikacja=b.id_weryfikacja inner join Kategorie ka on ka.id_kategoria=k.id_kategoria
     Where (w.id_biblioteka_dawca=$id or w.id_biblioteka_biorca=$id)  and w.status!=1;");

    }


    while ($tabl = mysqli_fetch_assoc($q)){
        $tabl['tytul'] = htmlspecialchars($tabl['tytul']);
        $tabl['nazwisko'] = htmlspecialchars($tabl['nazwisko']);
        $tabl['nazwa'] = htmlspecialchars($tabl['nazwa']); // nazwa gatunku
        $tabl['Nazwa'] = htmlspecialchars($tabl['Nazwa']); // nazwa biblioteki
        $tabl['login'] = htmlspecialchars($tabl['login']);
        
        echo "<tr><td>$tabl[tytul]</td><td>$tabl[nazwisko]</td><td>$tabl[nazwa]</td><td>$tabl[login]</td><td>$tabl[Nazwa]</td><td>$tabl[dostepnosc_do]</td><td>$tabl[cena]</td><td>"; 
            if($tabl['status']==2)
    {echo"<div class=\"alert alert-info\" role=\"alert\">zamówiona</div></td>";if($tabl['id_czytelnik']==$id){echo "<td><a class=\"btn btn-warning\" href='?id=$tabl[id_transakcje]'>odebrano</a></td>";}else{echo "<td>-</td>";}}
            if($tabl['status']==3)
{echo"<div class=\"alert alert-warning\" role=\"alert\">odebrana</div></td>";if($tabl['id_czytelnik']==$id){echo "<td><a class=\"btn btn-success\" href='?id=$tabl[id_transakcje]'>zwrócono</a></td>";}else{echo "<td>-</td>";}}
            if($tabl['status']==4)
            {echo"<div class=\"alert alert-success\" role=\"alert\">zakończona</div></td>";if($tabl['id_czytelnik']==$id){echo "<td>-</td>";}else{echo "<td>-</td>";}}
            
            "</tr>";
    }
    
    ?>           
                </tbody>
            <tfoot>
                <tr>
                
                    <th>Tytuł</th>
                    <th>Autor</th>
                    <th>Kategoria</th>
                    <th>Pożyczający</th>
                    <th></th>
                    <th>Termin</th>
                    <th>Cena zł</th>
                    <th>Status</th>
                    <th>Akcja</th>
            
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