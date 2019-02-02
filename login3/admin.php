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
    <th>update</th>
    
  </tr>
 

<?php
$conn;
$conn = mysqli_connect("localhost","root","root","pallavi");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
// echo "Connected successfully";

$sql = "SELECT u_id,fname,email,roles FROM logger";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
?>

<tr>
<td><?php echo $row['u_id']?></td>
<td><?php echo $row['fname']?></td>
<td><?php echo $row['email']?></td>
<td><?php echo $row['roles']?></td>
<?php echo '<td><a href="Update.php?u_id='. $row["u_id"]. '">edit</a></td>'?>

</tr>
<?php
}
} else {
    echo "0 results";
}
?>
</table>
<a href="adduser.php">Add user</a><br><br>


<form action="admin.php" method="POST" > 
u_id:<input type="text" name="u_id" required>
<button type="submit">Remove user </button><br>
</form> 


<form action="filter.php" method="POST" > 
u_id:<input type="text" name="u_id" required>
<button type="submit">Filter user </button><br>
</form>
</body>
</html>


<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
$u_id = $_POST['u_id'];
var_dump($_POST['u_id']);
$sql = "DELETE FROM logger WHERE u_id='$u_id'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: ";
}
}
?>








