<?php
 if(!isset($_SESSION)) 
 {	session_start(); }


	if (!isset($_SESSION["zalogowany"])){
	  header("Location: logowanie.php");
	 exit();
	} 
?>