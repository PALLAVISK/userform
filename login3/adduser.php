<!Doctype html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

</head>
<h1>Registration by ADMIN</h1>
      <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" > 
      <label for="name">Name</label>
      <input type="text"  name="name" placeholder="Your name.."required>
      <label for="email">Email Address</label>
      <input type="email"  name="email" placeholder="Your email address"required>
      <label for="password">password</label>
      <input type="password" name="password" placeholder="your password.."required>
      <select name='roles'>
      <option value="admin">admin</option>
      <option value="guest">guest</option>
      </select>
      <input type="submit" value="add user">
      <a href ="login.php">Login</a>
</form>
</body>
</html>

<?php
// namespace pal\login3;
use  pal\login3\Database;
require 'vendor/autoload.php';
error_reporting(E_ALL);
 ini_set('display_errors', 1);
 $roles="guest";
 $roles="admin";
// $_POST['name'];
// $_POST['email'];
// $_POST['password'];
$obj=new Database();
$con=$obj->conn;
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if($obj->Added($_POST['name'],$_POST['email'],$_POST['password'],$roles)=="admin")
     {
        echo"Register successfully!!";
        header("location:admin.php");   
    

     }
    else{
        header("location:welcome.php");    
     }
}

?>