<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>
</head>
<body>
<table>
  <tr>
    <th>u_id</th>
    <th>name</th>
    <th>email</th> 
    <th>roles</th>
    
  </tr>
 

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

$u_id = $_POST['u_id'];
$conn = mysqli_connect("localhost","root","root","pallavi");

$sql = "SELECT u_id,fname,email,roles FROM logger WHERE u_id='$u_id'";


$result = $conn->query($sql);
if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
    
   

?>
<tr>

<td><?php echo $row['u_id']?></td>
<td><?php echo $row['fname']?></td>
<td><?php echo $row['email']?></td>
<td><?php echo $row['roles']?></td>
</tr>
<?php
}
} else {
    echo "0 results";
}
}
?>
</table>
</body>
</html>