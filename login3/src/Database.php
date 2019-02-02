<?php
namespace pal\login3;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// $email=$_POST['email'];
class Database {
   public $conn;
    function __construct()
    {
        // Create connection
        $this->conn = mysqli_connect("localhost","root","root","pallavi");

        // Check connection
        if ($this->conn->connect_error) 
        {
         die("Connection failed: " . $this->conn->connect_error);
        }
        else
        {
         echo "Connected successfully<br/>";
        }
 
    }
    public function check($email,$pass){
        $hash=md5($pass);
        $sql = "SELECT * FROM logger
        WHERE email='$email' and password1='$hash'";
        $result =($this->conn->query($sql));

        if ($result->num_rows > 0) {
            echo "You are already registered<br/>";
            
            return true;
            // header("location:welcome.php");

        }
        else{
            // echo"Register first...<br/>";
            return false;
        }     
    }
    public function Added($name,$email,$pass)
    {
        echo $name.$email.$pass;
        $hash=md5($pass);
        print_r($hash);
        $sql = "INSERT INTO logger (fname, email,password1) VALUES ('$name','$email','$hash')";
        //print_r($conn);
        if ($this->conn->query($sql) === TRUE) {
            // echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }
    }
    public function mailer($email,$hash)
    {
        //Load Composer's autoloader
        require 'vendor/autoload.php';

        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
        //Server settings
        $mail->SMTPDebug = 2;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'alshayakapoor@gmail.com';                 // SMTP username
        $mail->Password = 'Vrushali@123';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('pallaviskadam95@gmail.com', 'Mailer');
        $mail->addAddress($email, ' ');     // Add a recipient
        //   $mail->addAddress('ellen@example.com');               // Name is optional
        //   $mail->addReplyTo('info@example.com', 'Information');
        //   $mail->addCC('cc@example.com');
        //   $mail->addBCC('bcc@example.com');


        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Here is the subject';
        $mail->Body    = 'http://localhost:8888/login3/verify.php?email='.$email.'&hash='.$hash.'';
        ;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
        } 
        catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }
      
}    
    

?>