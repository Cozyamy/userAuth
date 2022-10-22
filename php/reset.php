<?php
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    resetPassword($email, $password);
}

function resetPassword($email, $password){
    $file = fopen('../storage/users.csv', 'r');
    while(!feof($file)){
        $line = fgetcsv($file);
        if($line[1] == $email){
           $line[2] = $password;
           fclose($file);
           $file = fopen('../storage/users.csv', 'w');
           fputcsv($file, $line);
           fclose($file);
           echo "<h3 style='color: blue'>
           Password Succesfully Modified 
           <br> 
           <a href='../forms/login.html'>Login Here</a>
           </h3>";
           exit();
       }
   }

echo "<h3 style='color: red'>User does not exist</h3>";
fclose($file);
}