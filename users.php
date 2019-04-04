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


    <script src="http://cookiealert.sruu.pl/CookieAlert-latest.min.js"></script>
<script>CookieAlert.init();</script>



      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>



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
        <div class="row"> <label class="h5">Użytkownicy:</label>
             </div>
            

<hr>
<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Login</th>
                <th>Email</th>
                <th>Data ur.</th>
                <th>Telefon</th>
                <th>Akcja</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php



if (isset($_GET['idU'])){
    
    $_SESSION['id-uzytkownikW'] = $_GET['idU'];
    
    
    
}


$q = mysqli_query($link, "select * from Czytelnicy c inner join Weryfikacja w on w.id_weryfikacja=c.id_weryfikacja  ;");



while ($tabl = mysqli_fetch_assoc($q)){
    $tabl['login'] = htmlspecialchars($tabl['login']);
    $tabl['email'] = htmlspecialchars($tabl['email']);

   
    echo "<tr><td>$tabl[login]</td><td>$tabl[email]</td><td>$tabl[data_urodzenia]</td><td>$tabl[telefon]</td>
    <td><a class=\"btn btn-secondary\" href='?idU=$tabl[id_czytelnik]'>Banuj</a></td>
    </tr>";
}

?>           
            </tbody>
        <tfoot>
            <tr>
            
                <th>Login</th>
                <th>Email</th>
                <th>Data ur.</th>
                <th>Telefon</th>
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