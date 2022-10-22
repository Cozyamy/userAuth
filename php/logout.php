<?php
function logout(){
    session_start();
   if($_SESSION){
       session_destroy();
       header("Location: ../index.php");
   }
 
   else{
       header("Location: ../index.php?error=not logged in");

   }
}

logout();