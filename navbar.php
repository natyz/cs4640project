<!-- AUTHORS: WAN LI AND NATALIE ZHANG -->

<link href="./styles/navbar.css" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

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
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
                <!-- LOGIN VS LOGOUT-->
                <?php
                if (isset($_SESSION['user'])) {
                ?>
                    <li class="nav-item">
                        <a class="nav-link login" href="logout.php" style="right: 3vw; color: black; background-color: lightblue; 
            border-radius: 10px; width: 12vw; text-align: center; border-color: black; border-width: 1px; border-style: solid; top: -5vh;">Logout</a>
                    </li>
                <?php
                } else {
                ?>
                    <li class="nav-item">
                        <a class="nav-link login" href="login.php" style="right: 3vw; color: black; background-color: lightblue; 
          border-radius: 10px; width: 12vw; text-align: center; border-color: black; border-width: 1px; border-style: solid; top: -5vh;">Login</a>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>

    </nav>
</header>