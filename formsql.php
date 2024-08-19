<link href="fsql.css" rel="stylesheet">
<?php
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$jdate = $_POST['startingdate'];
$pkgs = $_POST['pkgs'];
$tclass = $_POST['tclass'];
$gendr = $_POST['gendr'];

$conn = new mysqli('localhost', 'root', '', 'trekbuddy');
if($conn->connect_error){
    die('Connection failed : '.$conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into entries(names, emails, contact_no, journey_date, package, t_class, gender)
    values(?,?,?,?,?,?,?)");
    $stmt->bind_param("ssissss", $name, $email, $phone, $jdate, $pkgs, $tclass, $gendr);
    $stmt->execute();
    echo "<marquee behavior='scroll' scrollamount='13'> Booking Successfull... </marquee>";
    $stmt->close();
    $conn->close();    
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = array();
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $jdate = $_POST['startingdate'];
    $pkgs = $_POST['pkgs'];
    $tclass = $_POST['tclass'];
    $gendr = $_POST['gendr'];
    if (empty($name)) {
    $errors[] = "Name is required.";
    }
    if (empty($email)) {
    $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email format.";
    }
    if (empty($phone)) {
    $errors[] = "Contact No is required.";
    }
    if (!empty($errors)) {
    echo "<h2>Validation Errors:</h2>";
    echo "<ul>";
    foreach ($errors as $error) {
    echo "<li>" . htmlspecialchars($error) . "</li>";
    }
    echo "</ul>";
    } else {
    echo "<h2>Form Data Received:</h2>";
    echo "Name: " . htmlspecialchars($name) . "<br>";
    echo "Email: " . htmlspecialchars($email) . "<br>";
    echo "Phone No: " . htmlspecialchars($phone) . "<br>";
    echo "Journey Starts From: " . htmlspecialchars($jdate) . "<br>";
    echo "Your chosen package is: " . htmlspecialchars($pkgs) . "<br>";
    echo "Your travel class is: " . htmlspecialchars($tclass) . "<br>";
    echo "Gender: " . htmlspecialchars($gendr) . "<br>";
    }
    } else {
    echo "Form not submitted.";
    } 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:\xampp\htdocs\WP2\Trek Buddy\PHPMailer-master\src/Exception.php';
require 'C:\xampp\htdocs\WP2\Trek Buddy\PHPMailer-master\src/PHPMailer.php';
require 'C:\xampp\htdocs\WP2\Trek Buddy\PHPMailer-master\src/SMTP.php';

if(isset($_POST['send'])){
$mail = new phpmailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'suwaidansari3919@gmail.com';  
    $mail->Password = 'tdsz kgqo qpjw jepp';  
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    //Recipients
    $mail->setFrom('suwaidansari3919@gmail.com');
    $mail->addAddress('suwaidansari32@gmail.com');

    //Content
    $mail->isHTML(true);
    $mail->Subject = 'TrekBuddy Booking Successfull';
    $mail->Body = 'Hello Sir/Mam, this mail is sent to you as a feedback that you have successfully booked your ticket on TrekBuddy.com, wishing you a happy journey!';

    $mail->send();
    echo 'A feedback has been sent.';
    echo"<br>";
    echo 'Please check your registered email...';
}
?>

