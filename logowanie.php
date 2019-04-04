<?PHP
ini_set( 'display_errors', 'On' ); 
error_reporting( E_ALL );
session_start();
?>
<?php include'dbConnect.php' ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Logowanie</title>
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

div[class=container]{
  background-color: #ffffff; 
}
</style>


</head>
<body>
<nav class="navbar navbar-expand-md bg-dark navbar-dark justify-content-end">
  <!-- Brand -->
  <a class="navbar-brand" href="#"><img src="images/2000px-Bookshelf-40x20_grey.svg.png" alt="Logo" style="width:40px;">Ebiblioteka </a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav text-right">
      <li class="nav-right">
        <a class="nav-link" href="mojProfil.php">Mój profil</a>
      </li>
      <li class="nav-right">
        <a class="nav-link" href="mojzbior.php">Mój zbiór</a>
      </li>
      <li class="nav-right">
        <a class="nav-link" href="#">Market</a>
      </li>
    </ul>
  </div>
</nav> 

<?PHP
if (isset($_POST['Loguj']))
{
 include'logVerify.php';
}
?>



    <form method="post"  class="container justify-content-md-center">

            <ul class="nav nav-tabs class="row justify-content-md-center>
                    <li class="nav-item">
                            <a class="nav-link active " href=logowanie.php>Logowanie</a>          

                  </li>
                    <li class="nav-item">
                      <a class="nav-link" href=rejestracja.php>Rejestracja</a>
                    
                    </li>
                   
                  </ul> 

           
                  <div class="container shadow-lg p-3 mb-5 bg-white rounded">
                        <div class="row">
                                <div class="col-sm-6">
                                        <div class="form-group">
                                                <label for="exampleInputEmail1">Login:</label>
                                                <input type="text" class="form-control"  name="login" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Wprowadź Login...">
                                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                              </div>
                                              <div class="form-group">
                                                <label for="exampleInputPassword1" >Hasło:</label>
                                                <input type="password" class="form-control" name="haslo" id="exampleInputPassword1" placeholder="Wprowadź hasło...">
                                              </div>
                                            
                                              <button type="submit" class="btn btn-success" name="Loguj">Loguj</button>
                                             
            
                                </div>
            
            
                                <div class="col-sm-6">
                                <div class="alert alert-warning" role="alert">
                                       Jeśli nie posiadasz konta zarejestruj sie!
                                    </div>
                              </div>
            </div>
                        </div>
  
</form>




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>