<!Doctype html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

</head>
<body>

<h1>UPDATE</h1>
      <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" > 
      <label for="name">Name</label>
      <input type="text"  name="name" placeholder="Your name.."required>
      <label for="email">Email Address</label>
      <input type="email"  name="email" placeholder="Your email address"required>
      <select name='roles'>
      <option value="admin">admin</option>
      <option value="Guest">guest</option>
      </select>
      <input type="submit" value="update">
</body>
</html>




<?php

// error_reporting(E_ALL);
//  ini_set('display_errors', 1)
$conn = mysqli_connect("localhost","root","root","pallavi");


// $u_id = $_POST['u_id'];
$name = $_POST['name'];
$email = $_POST['email'];
$roles=$_POST['roles'];
// var_dump($_POST['u_id']);

if($_SERVER["REQUEST_METHOD"]=="POST")
{   
$sql = "UPDATE logger SET fname='$name',email='$email',roles='$roles'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    
     header("location:admin.php");   
} else {
    echo "Error updating record: " . $conn->error;
}
}



?>





