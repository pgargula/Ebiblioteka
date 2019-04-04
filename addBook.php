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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" />
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>


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
if (isset($_POST['addBook'])){
    
    include'addBookC.php';
}
?>

<?php 
 $typ =$_SESSION["typ"];
 if($typ==3){
include('adminNavbar.php'); 
 }
 else{include('navbar.php');}
?>

 <form method="post"  class="row justify-content-md-center ">
 
 <div class="col-12 col-md-9 shadow-lg p-3 mb-5 bg-white rounded" >
 <div class="row">
    <div class=" col-12 col-md-8">
        <div class="row mt-4 justify-content-md-center">
            <div class="col-10  " id="search_area">
                <div class="row"><label >Tytuł:</label>   </div>
                <div id="search_area">
                    <input type="text" name="tytul" id="tytul" class="form-control input-lg" autocomplete="off" placeholder="Wprowadz tytuł" />
                </div>
                
                <div id="employee_data"></div>
                
            </div> 
            
        
        </div>
        <div class="row mt-4 justify-content-md-center">
            <div class="col-10 col-md-4">
                <div class="row"><label >Imie autora:</label>   </div>
                <div class="row"><input type="text" class="form-control"  name="imie"   placeholder="Wprowadz imie autora"></div>
                
            </div> 
            <div class="col-10 col-md-2"></div>
            <div class="col-10 col-md-4">
                <div class="row"><label >Nazwisko autora:</label>   </div>
                <div class="row"><input type="text" class="form-control"  name="nazwisko"   placeholder="Wprowadz nazwisko autora"></div>
            </div> 
        
        </div>    
        <div class="row mt-4 justify-content-md-center">
            <div class="col-10 col-md-3">
                <div class="row"><label >Wydawnictwo:</label>   </div>
                <div class="row"><input type="text" class="form-control"  name="Wydawnictwo"   placeholder="Wprowadz Wydawnictwo"></div>
            </div> 
            <div class="col-10 col-md-1"></div>
            <div class="col-10 col-md-2">
                <div class="row"><label >Rok wydania:</label>   </div>
                <div class="row"><input type="text" class="form-control"  name="rok"   placeholder="Wprowadz rok wydania"></div>
            </div> 
            <div class="col-10 col-md-1"></div>
            <div class="col-10 col-md-3">
                <div class="row"><label >Numer ISBN:</label>   </div>
                <div class="row"><input type="text" class="form-control"  name="isbn"   placeholder="Wprowadz numer ISBN"></div>
            </div>
        </div> 
        <div class="row mt-4 justify-content-md-center">
            <div class="col-10 col-md-3 align-self-start">
                <div class="row"><label >Wybierz kategorie:</label>   </div>
                <select class="custom-select my-1 mr-sm-3" name="idk" id="inlineFormCustomSelectPref">
                    <option selected>Kategoria...</option>
                    <?php 
                        $sql = mysqli_query($link, "SELECT id_kategoria, nazwa FROM Kategorie");
                        while ($row = $sql->fetch_assoc()){
                        echo "<option value=\"". $row['id_kategoria'] . "\">" . $row['nazwa'] . "</option>";
                        }
                        
                    ?>
                </select>

            </div> 
            <div class="col-10 col-md-4"></div>
            <div class="col-10 col-md-3 align-self-end">
                <div class="row mt-4"><label ></label>   </div>
                <div><button type="submit" class="btn btn-success" name="addBook">Dodaj książke</button></div>
            </div> 
            
        
        </div>    
    </div>
    <div class=" col-12 col-md-4">
    <img class="img-fluid"  src="images/addBook.png" alt="Generic placeholder image">
    </div>
 </div>
 </div>
    
    </form>


    <script>
$(document).ready(function(){
 
 load_data('');
 
 function load_data(query, typehead_search = 'yes')
 {
  $.ajax({
   url:"addBookSearch.php",
   method:"POST",
   data:{query:query, typehead_search:typehead_search},
   success:function(data)
   {
    $('#employee_data').html(data);
   }
  });
 }
 
 $('#tytul').typeahead({
  source: function(query, result){
   $.ajax({
    url:"addBookSearch.php",
    method:"POST",
    data:{query:query},
    dataType:"json",
    success:function(data){
     result($.map(data, function(item){
      return item;
     }));
     load_data(query, 'yes');
    }
   });
  }
 });
 
 $(document).on('click', 'li', function(){
  var query = $(this).text();
  load_data(query);
 });
 
});
</script>

    
    </body>
    </html>