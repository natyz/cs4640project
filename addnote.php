<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="author" content="Wan & Natalie">
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- required to handle IE -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
  <!-- ICON  -->
  <link rel="shortcut icon" href="https://media2.giphy.com/media/n9wqJ8gTR9lQnXTvf3/giphy_s.gif" type="image/ico" />
  <!-- EXTERNAL CSS -->
  <link rel="stylesheet" href="./styles/addnote.css">
</head>
<?php session_start(); // make sessions available ?>
<header>
  <!--NAVIGATION BAR -->
  <nav class="navbar navbar-expand-md navbar-light" style="background-color: pink;">
    <a class="navbar-brand" href="home.php">PeronsalNotes</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="justify-content-end" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="inbox.php">Inbox</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="sentmail.php">Sent</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Friends</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Motivation Board</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.html">Contact</a>
        </li>
      </ul>
    </div>

  </nav>
</header>


<?php
if (isset($_SESSION['user']))
{
?>
<body>
  <!--NOTE WHERE USER CAN CREATE PERSONALIZED NOTE-->
  <div class="note">
    <h1>New Note...</h1>
    <section id="bignote">
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
      <h3>From: <?php echo $_COOKIE['user'] ?> <br /></h3><br />
      <h3>Friend's account email: <br /></h3>
      <input type="text" id="receiver" name="receiver">
      <br /><br />
      <!-- WILL AUTOMATICALLY ADD THE DATE WITH THE ANONYMOUS FUNCTION -->
      <h3>Date: </h3>
      <h4 id="date" name="date"></h4>
      <br /><br />
      <h3>URL image for the note: </h3>
      <input type="text" id="pic" name="pic">
      <br /><br />
      <!-- ALLOWS THE USER TO WRITE THE NOTE -->
      <h3>Description </h3> <br />
      <textarea id="note" name="message" rows="10" cols="50" class="form-control" placeholder="Hi! How are you doing?"></textarea>
      <!--ROW OF BUTTONS THAT FORMAT TEXT IN TEXTAREA -->
      <div class="row-fluid">
        <div class="span4 text-left">
          <button class="notebtn" onclick="boldText()"><b>B</b></button>
          <button class="notebtn" onclick="italicText()"><i>I</i></button>
          <button class="notebtn" onclick="underlineText()"><u>U</u></button>
        </div>
        <!-- ALLOWS THE USER TO SAVE OR DELETE THE NOTE -->
        <div class="span4 text-right">
          <input type="submit" name="btnaction" value="SAVE"></button>
          <button onclick="deleteNote()">DELETE</button>
        </div>
      </div>
      <br /><br />
    </form>  
    </section>
  </div>
</body>

<?php
}
else {
  header('Location: login.php');
  // Force login. If the user has not logged in, redirect to login page
}

?>
<!-- INCLUDE THE JAVASCRIPT FOR FORMATING THE TEXT IN THE TEXTAREA -->
<script src="note.js"></script>
<script>
  // ANONYMOUS FUNCTIONS
  // AUTOMATICALLY GETS THE CURRENT DATE
  (function () {
    n = new Date();
    y = n.getFullYear();
    m = n.getMonth() + 1;
    d = n.getDate();
    document.getElementById("date").innerHTML = y + "-" + m + "-" + d;
  })();

  // ALERTS THE USER THAT THE NOTE HAS BEEN DELETED AND REDIRECTS
  let deleteNote = function () {
    alert("Deleted");
    location.href("mynotes.html");
  }

  // ALERTS THE USER THAT THE NOTE HAS BEEN SAVED AND REDIRECTS
  let saveNote = function () {
    alert("Saved");
    location.href("mynotes.html");
  }
</script>

<?php
    require_once('./connect-db.php');
    $con = new mysqli($hostname, $username, $password, $dbname);
    // Check connection
    if (mysqli_connect_errno()) {
    echo("Can't connect to MySQL Server. Error code: " .
    mysqli_connect_error());
    return null;
    }?>

<?php
if (isset($_GET['btnaction'])) {
  echo "it works!";
  try {
    insertData();
  } 
  catch (Exception $e)       // handle any type of exception
   {
      $error_message = $e->getMessage();
      echo "<p>Error message: $error_message </p>";
   }   
}
?>
<?php 
function insertData()
{
  global $db;

  if (isset($_GET['btnaction'])) {
  $sender = $_COOKIE['user']; 
  $receiver = $_POST['receiver']; 
  $date = $_POST['date'];
  $message = $_POST['message'];
  $pic = $_POST['pic'];

  $query = "INSERT INTO notes VALUES (:sender, :receiver, :dates, :messages, :pic)";  // prevents injection attacks
  
  $statement = $db->prepare($query);
  $statement->bindValue(':sender', $sender);
  $statement->bindValue(':receiver', $receiver);
  $statement->bindValue(':dates', $date);
  $statement->bindValue(':messages', $message);
  $statement->bindValue(':pic', $pic);
  $statement->execute();
  
  $statement->closeCursor();

  echo "<script type='text/javascript'>";
  echo "alert(Message Sent); location.href('sentmail.php');";
  echo "</script>";
  }
}

?>

</html>