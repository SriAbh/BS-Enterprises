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
$fullname = $_POST["fullname"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$messagein = $_POST["messagein"];
$services = $_POST["services"];

// Insert data into the database
$sql = "INSERT INTO contactentry (fullname, email, phone, messagein, services) VALUES (?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "sssss", $fullname, $email, $phone, $messagein, $services);



if (mysqli_stmt_execute($stmt))  {
    // process form data here
  
    // show pop-up message
    echo "<script>alert('Your form has been submitted successfully!');window.location.href='index.html';</script>";
  
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
    $fullname=$_POST['fullname'];
    $email=$_POST['email'];
    $password=$_POST['phone'];
    $messagein=$_POST['messagein'];
    $services = $_POST['services'];
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
    $mail->Password   = 'jpff zabp lvbs ximd';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('aditya123dudy@gmail.com', 'Contact Form');
    $mail->addAddress('adityadudy456@gmail.com', 'Aditya Dudy');     //Add a recipient


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Client contact request';
    $mail->Body    = "Full Name - $fullname <br>Email - $email <br>Phone - $phone <br>Message - $messagein <br>Services - $services";
    

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>
