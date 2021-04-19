<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="author" content="Wan & Natalie">
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- required to handle IE -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <!-- ICON  -->
  <link rel="shortcut icon" href="https://media2.giphy.com/media/n9wqJ8gTR9lQnXTvf3/giphy_s.gif" type="image/ico" />
  <!-- EXTERNAL CSS -->
  <link href="./styles/home.css" rel="stylesheet" type="text/css" />
</head>
<!-- NAVIGATION BAR -->
<!-- START SESSION -->
<?php session_start();    // make sessions available
// Session data are accessible from an implicit $_SESSION global array variable
// after a call is made to the session_start() function.
?>
<?php include "./navbar.php";?>

</script>

<body>
  <!-- JUMBOTRON HEADER -->
  <div class="jumbotron">
    <h1 class="display-4">Personalized Notes</h1>
    <p class="lead">Let them know that you're there.</p>
    <p>Ready to make your first note?</p>
    <p class="lead">
      <a href="login.php"><button type="button" class="btn btn-md btn-block btn-outline-dark" style="background-color: lightblue; width: 20vw;">Get started!</button></a>
    </p>
  </div>
  <!-- FRONT PAGE DESIGN WITH GIFS -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm">
        <h3>hiiiii nice to meet you!</h3>
        <p>welcome to our website! we hope you enjoy it!</p>
        <img src="https://media1.giphy.com/media/2vkUyaJW3gVQtSfs2I/200.gif">
      </div>
      <div class="col-sm">
        <h3>relax and have fun!</h3>
        <p>the images are of bella and yuta. they're super cute!</p>
        <img src="https://media1.giphy.com/media/jyuuoHidVXPuJ2iBRT/giphy.gif">
      </div>
      <div class="col-sm">
        <form action="contact-mail.php" method="post">
          <div class="form-group">
            <h3>contact us!</h3>
            <p>let us know if you have any comments or you want to talk!</p>
            <img src="https://media0.giphy.com/media/n9wqJ8gTR9lQnXTvf3/source.gif">
            <input name="name" type="text" class="form-control" placeholder="Name">
          </div>
          <div class="form-group">
            <input name="email" type="email" class="form-control" placeholder="Email Address">
          </div>
          <div class="form-group">
            <textarea name="comment" class="form-control" rows="4" placeholder="Note"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>

  <!-- FOOTER -->
  <footer class="footer">
    <div class="footer-body">
      <div class="footer-info">
        <h2>Additional Information</h2>
        <a>About Us</a>
        <a style="text-decoration: underline; color: white;" href="https://giphy.com/tontonfriends">More Bella &
          Yuta!</a>
        <a>Navigation</a>
      </div>
      <!-- CONTACT INFO -->
      <div class="footer-info">
        <h2>Contact</h2>
        <p>1234 TheSkyIsUp Ct, Charlottesville, VA 22903</p>
        <a href="mailto:wl9wgc@virginia.edu">wl9wgc@virginia.edu</a>
        <a href="mailto:nyz7tc@virginia.edu">nyz7tc@virginia.edu</a>
      </div>
    </div>
    <!-- COPYRIGHT -->
    <div class="footer-bottom">
      <p>&copy; 2021 Copyright: Wan & Natalie</p>
    </div>
  </footer>

  </div>
</body>

</html>