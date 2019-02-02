<?php
namespace pal\login3;
use  pal\login3\Database;
?>
<!Doctype html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

</head>

<body>
      <h1>LOGIN HERE....</h1>
      <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST"> 
      <!-- <label for="name">Name</label> -->
      <!-- <input type="text"  name="name" placeholder="Your name.."> -->
      <label for="email">Email Address</label>
      <input type="email"  name="email" value="<?php if(isset($_COOKIE["email"])) { echo $_COOKIE["email"]; } ?>" placeholder="Your email address">
      <label for="password">password</label>
      <input type="password" name="password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>" placeholder="your password..">
      <label>
      <input type="checkbox" name="remember_me" id="remember_me">
      Remember me 
      </label>

      <input type="submit" value="login">
      <a href ="register.php">Register</a>
      </form>
</body>
</html>

<?php
session_start();
require 'vendor/autoload.php';
$obj=new Database();
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if($obj->check($_POST['email'],$_POST['password']))
    {
        if($_POST["remember_me"]=='1' || $_POST["remember_me"]=='on')
        {             
            setcookie('email', $_POST['email'],time()+120);
            setcookie('password', $_POST['password']);
        }   
    $_SESSION['email']=$_POST['email'];
     //$_SESSION['email'];
    //exit();
    header("location:welcome.php");
    }
    else{
        echo"Register first";
    }
    //$_SESSION["email"] = $email;
}
?>