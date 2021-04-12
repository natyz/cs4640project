<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

  <title>PHP State Maintenance (Cookies)</title>
</head>
<?php session_start(); // make sessions available 
?>

<body>
  <?php
  // DELETES COOKIES
  if (count($_COOKIE) > 0) { // can also use sizeof($_COOKIE)
    foreach ($_COOKIE as $key => $value) {
      unset($_COOKIE[$key]); // remove param-value from server
      //completley remov efrom client
      setcookie($key, '', time() - 3600); // expire in past
    }
    //redirect
  }

  // DELETES SESSIONS
  if (count($_SESSION) > 0)     // Check if there are session variables
  {
    foreach ($_SESSION as $key => $value) {
      // Deletes the variable (array element) where the value is stored in this PHP.
      // However, the session object still remains on the server.    	
      unset($_SESSION[$key]);
    }
    session_destroy();     // complete terminate the session instance

    // redirect to the login page immediately 
    //    header('Location: login.php');

    // redirect with 5 seconds delay
    echo "Successful logout. You will be redirected to the login page in 5 seconds.";
    header('refresh:5; url=login.php');
  }

  ?>

</body>

</html>