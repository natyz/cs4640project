<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="author" content="Wan & Natalie">
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- required to handle IE -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  
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
<!-- NAVIGATION BAR -->
<header class="header">
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
          <li class="nav-item mr-auto">
            <a class="nav-link" href="logout.php" style="right: 3vw; color: black; background-color: lightblue; 
          border-radius: 10px; width: 12vw; text-align: center; border-color: black; border-width: 1px; border-style: solid;">Logout</a>
          </li>
        </ul>
    </div>

  </nav>
</header>

<?php session_start(); // make sessions available ?>

<?php
if (isset($_SESSION['user']))
{
?>
<body>
  <div class="board" id="cards">
    <h1 style="margin-bottom: 5vh;">Inbox for <?php echo $_COOKIE['user'] ?></h1>
    <!-- CARDS THAT DISPLAY A NOTE PREVIEW AND THE IMAGE -->
    <div class="notes">
      <div class="card bg-success mb-3" style="width: 18vw; margin-right: 1vw;">
        <img class="card-img-top" src="https://64.media.tumblr.com/tumblr_md923niK1p1qc4uvwo1_400.gifv"
          alt="Note Image">
        <div class="card-body">
          <h5 class="card-title">Checking in</h5>
          <p class="card-text">Hi Andy! I just wanted to know how...</p>
        </div>
      </div>

      <div class="card bg-success mb-3" style="width: 18vw; margin-right: 1vw;">
        <img class="card-img-top" src="https://i.imgur.com/0xxsg1R.gif?noredirect" alt="Note Image">
        <div class="card-body">
          <h5 class="card-title">Checking in</h5>
          <p class="card-text">Hi Andy! I just wanted to know how...</p>
        </div>
      </div>

      <div class="card bg-success mb-3" style="width: 18vw; margin-right: 1vw;">
        <img class="card-img-top" src="https://i.pinimg.com/originals/9d/29/3a/9d293a6baece811a07a1c2f41d592065.gif"
          alt="Note Image">
        <div class="card-body">
          <h5 class="card-title">Checking in</h5>
          <p class="card-text">Hi Andy! I just wanted to know how...</p>
        </div>
      </div>

      <div class="card bg-success mb-3" style="width: 18vw; margin-right: 1vw;">
        <img class="card-img-top" src="https://i.pinimg.com/originals/63/3e/8a/633e8a837a39bea065eb23613ce40b06.gif"
          alt="Note Image">
        <div class="card-body">
          <h5 class="card-title">Checking in</h5>
          <p class="card-text">Hi Andy! I just wanted to know how...</p>
        </div>
      </div>

    </div>
  </div>
</body>
<?php
}
else {
  header('Location: login.php');
  // Force login. If the user has not logged in, redirect to login page
}

?>

</html>