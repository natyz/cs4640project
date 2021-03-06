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
  <style>
    .login {
      display: flex;
      flex-direction: column;
      flex: 100;
      margin: 3vw;
      justify-content: center;
      align-items: center;
      background-color: #cfc;
    }
  </style>
</head>

<?php session_start(); // make sessions available 
?>

<?php include "./navbar.php"; ?>

<?php
if (isset($_SESSION['user'])) {
?>

  <body>
    <div class="board" id="cards">
      <h1 style="margin-bottom: 5vh;">Inbox for <?php echo $_COOKIE['user'] ?></h1>
      <!-- CARDS THAT DISPLAY A NOTE PREVIEW AND THE IMAGE -->
      <div class="notes">

        <?php
        require_once('./connect-db.php');
        $con = new mysqli($hostname, $username, $password, $dbname);
        // Check connection
        if (mysqli_connect_errno()) {
          echo ("Can't connect to MySQL Server. Error code: " .
            mysqli_connect_error());
          return null;
        } ?>

        <?php
        $sql = "SELECT * FROM notes WHERE receiver='" . $_COOKIE['user'] . "' ORDER BY date";
        $result = mysqli_query($con, $sql);

        $exeQuery = mysqli_query($con, $sql);

        while ($row = mysqli_fetch_array($exeQuery)) {
          echo  "<div class='card bg-success mb-3' style='width: 18vw; margin-right: 1vw;'>";
          echo "<img class='card-img-top' src='";
          echo $row['pic'];
          echo "' alt='Note Image'>";
          echo  "<div class='card-body'>";
          echo "<h5 class='card-title'>";
          echo $row['sender'];
          echo "</h5>";
          echo "<p class='card-text'>";
          echo $row['message'];
          echo "</p> <p class='card-text'>";
          echo $row['date'];
          echo "</p></div></div>";
        }

        mysqli_close($con);
        ?>

      </div>
      <div class="button">
        <input class="btn btn-success" id="addFriend" type="button" value="Add new friend" />
      </div>

    </div>
  </body>
<?php
} else {
  header('Location: login.php');
  // Force login. If the user has not logged in, redirect to login page
}

?>

<script type="text/javascript">
  document.getElementById("addFriend").onclick = function() {
    location.href = "http://localhost:4200/";
  };
</script>

</html>