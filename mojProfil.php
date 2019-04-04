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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

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



<?PHP
if (isset($_POST['wyloguj'])){
include'logout.php';
}
?>

<?php include('navbar.php'); ?>

<form class="row justify-content-md-center">
<div class="col-12 col-md-9 justify-content-center shadow-lg p-3 mb-5 bg-white rounded" >
        <div class="row justify-content-center ">
        <div class="col-12 col-md-5">
            <div class="row">
                <div class="col-md-6">  
                    <label id="login" class="h3">Login:</label>           
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">  
                    <label id="email" class="h3">Email:</label>           
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">  
                    <label id="telefon" class="h3">Telefon:</label>           
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">  
                    <label id="data" class="h3">Data urodzenia:</label>           
                </div>
            </div>
            <button type="button" class="btn btn-secondary">Edytuj</button>
        </div>
        <div class="col-12 col-md-5">
            
                <img class="img-fluid"  src="images/user.png" alt="Generic placeholder image">             
                <button type="button" class="btn btn-secondary">Zmień avatar</button>
        </div>
        
        </div>
     <?php $loginS =$_SESSION["ID"]; echo $loginS; ?>
</div>
</form>

<script> 
  
  var userdb = {"name" :'', "email" :'', "telefon" :'', "data_urodzenia" :''};
    
$(document).ready(function(){
 // $("button").click(function(){

    
$.ajax({   
  type: 'GET',
  //dataType: "json",
  url:'userData.php',
  data:  userdb,
  success: function(data)
  {
   
    
      
      //data=JSON.parse(data);
       data= jQuery.parseJSON(data);
       document.getElementById("login").innerHTML+=data[0].name;
       document.getElementById("email").innerHTML+=data[0].email;
       document.getElementById("telefon").innerHTML+=data[0].telefon;
       document.getElementById("data").innerHTML+=data[0].data_urodzenia;

       
   
  },
  error : function(xhr, status) {
        alert('Przepraszamy, wystąpił problem!'+status);
    },
  
  complete : function(xhr, status) {
        
    }
  
});


//});
});
//document.getElementById("login").innerHTML+=userdb.name;
</script>

 

</body>
</html>