<?php
echo $_GET['email'];
if((!empty($_GET['email']))&& !empty($_GET['hash'])){
 echo"Your mail is verified successfully..";   
 header("location:login.php");
}
else{
  echo"hello";  
}
?>