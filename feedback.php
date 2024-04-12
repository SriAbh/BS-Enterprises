<?php
// Database credentials
$host = "127.0.0.1";
$user = "root";
$password = "root";
$database = "contactform";

// Create a connection
$conn = mysqli_connect($host, $user, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle form submission
// Retrieve form data

$fname = $_POST["fname"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$messagefd = $_POST["messagefd"];


// Insert data into the database
$sql = "INSERT INTO feedback (fname, email, phone, messagefd ) VALUES (?, ?, ?, ? )";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ssss", $fname, $email, $phone, $messagefd );



if (mysqli_stmt_execute($stmt))  {
    // process form data here
  
    // show pop-up message
    echo "<script>alert('Your form has been submitted successfully!');window.location.href='feedback.html';</script>";
  
    // redirect to home page
    
  }
 else {
    echo "Error: " . mysqli_stmt_error($stmt);
}

// Close the database connection
mysqli_stmt_close($stmt);
mysqli_close($conn);



//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST["send"]))
{
    $fname=$_POST['fname'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $messagefd=$_POST['messagefd'];
}


//Load Composer's autoloader
require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings    
                   //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'adityadudy456@gmail.com';                     //SMTP username
    $mail->Password   = 'zama hxvw encm kgxk';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('aditya123dudy@gmail.com', 'Contact Form');
    $mail->addAddress('adityadudy456@gmail.com', 'Aditya Dudy');     //Add a recipient


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Client feedback ';
    $mail->Body    = "Full Name - $fname <br>Email - $email <br>Phone - $phone <br>Message - $messagefd  ";
    

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>
