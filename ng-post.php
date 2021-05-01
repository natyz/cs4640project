
<?php
// Natalie and Wan
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
header('Access-Control-Allow-Origin: http://localhost:4200/');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Authorization, Accept, Client-Security-Token, Accept-Encoding');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT');

$postdata = file_get_contents("php://input");

// Process data
// (this example simply extracts the data and restructures them back)

// Extract json format to PHP array
$request = json_decode($postdata);

$data = [];
foreach ($request as $k => $v)
{
  $temp = "$k => $v";
  $data[0]['post_'.$k] = $v;
}
// $temp will have the last key-value pair of the array

$current_date = date("Y-m-d");

// Send response (in json format) back the front end
$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->Mailer = "smtp";

    $mail->SMTPDebug = 0;                     // 1 = Enable verbose debug output. 2 = message only. 0 = nothing. only confirm message
    $mail->SMTPAuth = TRUE;                   // Enable SMTP authentication
    $mail->SMTPSecure = "tls";                // Enable TLS encryption, 'ssl' (a predecessor to TSL) is also accepted
    $mail->Port = 587;                        // TCP port to connect to (587 is a standard port for SMTP)
    $mail->Host = "smtp.gmail.com";           // Specify main and backup SMTP servers
    $mail->Username = "natandwan2@gmail.com";  // SMTP username
    $mail->Password = "natandwan4640";         // SMTP password 

    $user = $data[0]['post_name'];
    $friend_email=$data[0]['post_email'];
  
    //Recipient
    $mail->setFrom('natandwan2@gmail.com', 'NatAndWan');
    $mail->addAddress('natandwan2@gmail.com');

    $mail->isHTML(true);

    $mail->Subject = 'You got a friend requeset!';
    $mail->Body = 'From='. $user . ' : friend_email address=' . $friend_email . ': comment=You got a friend request from ' . $user;

    $mail->send();

    // Send to website's email
    $mail->setFrom('natandwan2@gmail.com', 'NatAndWan');
    $mail->addAddress('natandwan2@gmail.com');

    $mail->isHTML(true);

    $mail->Subject = 'You sent a friend request!';
    $mail->Body = 'From=natandwan2@gmail.com : sender_email address=' . $user . ': comment=You sent a friend request to ' . $friend_email;

    $mail->send();
} catch (Exception $e) {
    $msg = "sorry it was not sent.";
}
echo json_encode(['content'=>$data, 'response_on'=>$current_date]);

// function insertData($data){
//   global $db;
//   $friend_name="";
//   $friend_email="";
//   $friend_status="";
//   $nickname="";
//   $user="";
//   foreach ($data as $k => $v)
//   {
//     $temp = "$k => $v";
//     if ($k="post_friend_name"){
//       $friend_name=$v;
//     }
//     elseif($k="post_name"){
//       $user=$v;
//     }
//     elseif($k="post_email"){
//       $friend_email=$v;
//     }
//     elseif($k="post_status_option"){
//       $friend_status=$v;
//     }
//     else{
//       $nickname=$v;
//     }
//   }
//   if($name=""){
//     $friend_name="myname";
//     $friend_email="friendname";
//     $friend_status="f";
//     $nickname="";
//     $user="";
//     $query = "INSERT INTO friend VALUES (:user, :friend_name, :friend_email, :friend_status, :nickname)";  // prevents injection attacks

//     $statement = $db->prepare($query);
//     $statement->bindValue(':user', $user);
//     $statement->bindValue(':friend_name', $friend_name);
//     $statement->bindValue(':friend_email', $friend_email);
//     $statement->bindValue(':friend_status', $friend_status);
//     $statement->bindValue(':nickname', $nickname);
//     $statement->execute();
  
//     $statement->closeCursor();
//   }



  
 ?>
