<?php

if(isset($_POST["query"]))
{
    include'dbConnect.php';
 $request = mysqli_real_escape_string($link, $_POST["query"]);
 $query = "
  SELECT * FROM Ksiazki 
  WHERE tytul LIKE '%".$request."%' 
  
 ";
 $result = mysqli_query($link, $query);
 $data =array();
 $html = '';
 
 if(mysqli_num_rows($result) > 0)
 {
  while($row = mysqli_fetch_array($result))
  {
   $data[] = $row["tytul"];
   
 
   
 }

 if(isset($_POST['typehead_search']))
 {
  echo $html;
 }
 else
 {
  $data = array_unique($data);
  echo json_encode($data);
 }
}}

?>