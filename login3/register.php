<?php
namespace pal\login3;
use  pal\login3\Database;

session_start();
print_r($_SESSION['email']);
if($_SESSION['email'])
{
echo "You are already logged in.Go to Home <a href='welcome.php'></a>";
}
else{
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
?>

<!Doctype html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

</head>

<body>
      <h1>REGISTER HERE..</h1>
      <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" > 
      <label for="name">Name</label>
      <input type="text"  name="name" placeholder="Your name.."required>
      <label for="email">Email Address</label>
      <input type="email"  name="email" placeholder="Your email address"required>
      <label for="password">password</label>
      <input type="password" name="password" placeholder="your password.."required>
      <input type="submit" value="register">
      <a href ="login.php">Login</a>
      </form>
</body>
</html>

<?php


// include "Database.php";
// echo $_POST['name'].$_POST['email'].$_POST['password'];
require 'vendor/autoload.php';
$obj=new Database();
$con=$obj->conn;
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(!$obj->check($_POST['email'],$_POST['password']))
    {
    $obj->Added($_POST['name'],$_POST['email'],$_POST['password']);
     echo"Register successfully!!";
    // header("location:welcome.php");   
    }
}
$obj->mailer($_POST['email'],md5($_POST['password']));
}
?>