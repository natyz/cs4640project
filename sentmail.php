<!-- AUTHORS: WAN LI AND NATALIE ZHANG -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="author" content="Wan & Natalie">
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- required to handle IE -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <!-- ICON  -->
  <link rel="shortcut icon" href="https://media2.giphy.com/media/n9wqJ8gTR9lQnXTvf3/giphy_s.gif" type="image/ico" />
  <!-- EXTERNAL CSS -->
  <link rel="stylesheet" href="./styles/mynotes.css">

</head>
<!-- NAVIGATION BAR -->
<?php session_start(); // make sessions available 
?>
<?php include "./navbar.php"; ?>
<?php
if (isset($_SESSION['user'])) {
?>

  <body>
    <div class="board" id="cards">
      <h1 style="margin-bottom: 5vh;">Sent mail from <?php echo $_COOKIE['user'] ?></h1>
      <!-- CARDS THAT DISPLAY A NOTE PREVIEW AND THE IMAGE -->
      <div class="notes">

        <?php
        require('./connect-db.php');
        $con = new mysqli($hostname, $username, $password, $dbname);
        // Check connection
        if (mysqli_connect_errno()) {
          echo ("Can't connect to MySQL Server. Error code: " .
            mysqli_connect_error());
          return null;
        }

        ?>

        <?php
        $sql = "SELECT * FROM notes WHERE sender='" . $_COOKIE['user'] . "' ORDER BY date";
        $result = mysqli_query($con, $sql);

        $exeQuery = mysqli_query($con, $sql);

        while ($row = mysqli_fetch_array($exeQuery)) {
          echo  "<div class='card bg-success mb-3' style='width: 18vw; margin-right: 1vw;'>";
          echo "<img class='card-img-top' name='pic' src='" . $row['pic'] . "' alt='Note Image' value='" . $row['pic'] . "'>";
          echo  "<div class='card-body'>";
          echo "<h5 class='card-title' name='receiver' value='" . $row['receiver'] . "'>" . $row['receiver'] . "</h5>";
          echo "<p class='card-text' name='message' value='" . $row['message'] . "'>" . $row['message'] . "</p>";
          echo "<p class='card-text' name='date' value='" . $row['date'] . "'>" . $row['date'] . "</p>";
          echo "<div>";
          echo '<form action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '"method="GET">';
          echo "<input class='button' type='submit' name='btnaction' value='delete'>";
          echo '<input type="hidden" name="receiver" value="' . $row['receiver'] . '" />'; //receiver
          echo '<input type="hidden" name="message" value="' . $row['message'] . '" />'; // message
          echo '<input type="hidden" name="date" value="' . $row['date'] . '" />'; // message
          echo '<input type="hidden" name="pic" value="' . $row['pic'] . '" />'; // message

          // <input type="hidden" name="task_id" value="<?php echo $task['task_id'] "/>
          echo "</form></div></div></div>";
        }

        //  echo '<form action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '"method="POST">';
        //  echo '<input class="btn btn-primary" type="submit" value="Delete" name="action" />';
        // echo '<input type="hidden" name="receiver" value="' . $row['name'] . '" />';
        // echo '<input type="hidden" name="pDOB2" value="' . $row['dob'] . '" />';
        // echo '<input type="hidden" name="pImg2" value="' . $row['image'] . '" />';
        // echo "</form>";

        mysqli_close($con);
        ?>

      </div>
      <!--ADD NOTE BUTTON -->
      <div class="button">
        <input class="btn btn-success" id="addnote" type="button" value="Add note" />
      </div>
    </div>
  </body>
<?php
} else {
  header('Location: login.php');
  // Force login. If the user has not logged in, redirect to login page
}
?>

<?php
if (!empty($_GET['btnaction']) && ($_GET['btnaction'] == 'delete')) {
  try {
    delete();
  } catch (Exception $e)       // handle any type of exception
  {
    $error_message = $e->getMessage();
    echo "<p>Error message: $error_message </p>";
  }
}

function delete()
{
  global $db;
  if (isset($_GET['btnaction'])) {
    $sender = $_COOKIE['user'];
    $receiver = $_GET['receiver'];
    $date = $_GET['date'];
    $message = $_GET['message'];
    $pic = $_GET['pic'];
    // echo $$_COOKIE['user'];

    $query = "DELETE FROM notes WHERE sender=:sender and receiver=:receiver and date=:dates and message=:messages and pic=:pic";  // prevents injection attacks

    $statement = $db->prepare($query);
    $statement->bindValue(':sender', $sender);
    $statement->bindValue(':receiver', $receiver);
    $statement->bindValue(':dates', $date);
    $statement->bindValue(':messages', $message);
    $statement->bindValue(':pic', $pic);
    $statement->execute();

    $statement->closeCursor();

    echo "<script type='text/javascript'>";
    echo "alert('Message Deleted!'); window.location='sentmail.php'";
    echo "</script>";
  }
}
?>
<!--EVENT LISTENER -->
<script>
  // Click "add note" button redirects to a different page
  document.getElementById("addnote").addEventListener("click", function() {
    document.location.href = "addnote.php";
  });
</script>

</html>