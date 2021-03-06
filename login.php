<!-- AUTHORS: WAN LI AND NATALIE ZHANG -->

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
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
    <link rel="stylesheet" href="./styles/login.css">
</head>
<!-- START SESSION -->
<?php session_start();    // make sessions available
// Session data are accessible from an implicit $_SESSION global array variable
// after a call is made to the session_start() function.
?>
<header>
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
                    <a class="nav-link" href="#p">Sent</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
            </ul>
        </div>

    </nav>
</header>

<body>
    <?php
    require('connect-db.php');

    $number_attempt = 0; // null;  
    if (isset($_GET['attempt'])) {
        echo "You have unsuccessfully tried to log in " . $_GET['attempt'] . " times.<br/>";
        echo "You have " . (3 - $_GET['attempt'] . " tries left.<br/>");
        $number_attempt = intval($_GET['attempt']);

        if (intval($_GET['attempt']) >= 3)
            echo "Please contact the admin <br/>";
    } else
        $number_attempt = 0;

    if (isset($_POST['submit'])) {
        $user = $_POST['useremail'];
        $passwordstr = $_POST['loginpwd'];
        $query = "SELECT password FROM login WHERE username = '$user'";

        $statement = $db->prepare($query);
        $statement->execute();
        $results = $statement->fetchAll();

        if (!empty($results)) { {
                //verify that the typed password matches the hashed password in the table
                if (strcmp($passwordstr, $results[0]['password'])) {
                    $_SESSION['user'] = $user;
                    header("Location: inbox.php");
                } else {
                    echo "<div class=\"text-center\">That's the wrong password. Please try again.</div>";
                }
            }
        } else {
            echo "<div class=\"text-center\">That account doesn't exist.</div>";
        }
    }
    ?>
    <div>
        <div class="whole">
            <div class="body">
                <div class="login" style="background-color: #cfc; height: 60vh;">
                    <div class="form-group">
                        <h1>Log In Here!</h1>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        Email: <input type="text" name="useremail" required /> <br />
                        Password: <input type="password" name="loginpwd" required /> <br />
                        <input type="hidden" value="<?php if (isset($_GET['attempt'])) echo $_GET['attempt']  // $number_attempt
                                                    ?>" name="attempt" />
                        <input type="submit" value="Submit" class="btn btn-success" <?php if ($number_attempt >= 3) { ?> disabled <?php } ?> />
                    </form>
                    <span class="msg"><?php if (isset($_GET['msg'])) echo $_GET['msg'] ?></span>
                    <br />
                    <br />
                    <p>Don't have an account? <a href="signup.php">Sign up here</a></p>
                </div>
            </div>
        </div>

        <?php
        // $pwd = password_hash('password', PASSWORD_BCRYPT); // strongest password hash; we want to encrypt
        // echo $pwd;
        function authenticate()
        {
            global $mainpage;
            global $number_attempt;
            // Assume there exists a hashed password for a user 
            $hash = '$2y$10$idWH5jRDJZCvl2McWT3kduRcv8Cs4nPKe7JIGQF.0gLKsb2i5549e';     // hash for 'password'

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // AUTHENTICATE FIRST
                $user = trim($_POST['useremail']);
                $pwd = htmlspecialchars($_POST['loginpwd']);

                if (password_verify($pwd, $hash)) {
                    //SET COOKIES
                    setcookie('user', $_POST['useremail']); //save username to cookie

                    // successfully login, redirect a user to the main page
                    header("Location: " . $mainpage);

                    //SET UP SESSIONS
                    $_SESSION['user'] = $user;

                    $hash_pwd = md5($pwd);

                    $_SESSION['pwd'] = $hash_pwd;
                } else {
                    //          echo "<span class='msg'>Username and password do not match our record</span> <br/>";
                    $number_attempt = intval($_POST['attempt']) + 1;
                    header("Location: " . $_SERVER['PHP_SELF'] . "?attempt=$number_attempt&msg=Username and password do not match our record");
                }
            }
        }

        $mainpage = "inbox.php";
        authenticate();
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>

</html>