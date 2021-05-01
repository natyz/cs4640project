<!-- AUTHORS: WAN LI AND NATALIE ZHANG -->

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
<?php include "./navbar.php"; ?>

</script>

<body>
<?php
if (isset($_SESSION['user'])) {
    ?>
    
    <body>
    <div class="board" id="cards">
    <h1 style="margin-bottom: 5vh;">Friends</h1>
    <button id="myButton" class="float-left submit-button" >Add Friend</button>
    
    </div>
    </body>
    
    <?php
} else {
    header('Location: login.php');
    // Force login. If the user has not logged in, redirect to login page
}
?>
    <script type="text/javascript">
    document.getElementById("myButton").onclick = function () {
        location.href = "http://localhost:4200/";
    };
    </script>
</body>

</html>