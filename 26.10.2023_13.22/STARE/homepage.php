<!DOCTYPE html>
<html lang="en">

<head>
    <title>Furrit - Home Page UwU</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="config.css">
    <link rel="stylesheet" href="homepage.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="src/Furrit_Paw_Text.png" alt="Logo" style="height: 25px; position: relative; bottom: 2.5px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#myNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Projects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
                <?php
                session_start();

                if (isset($_SESSION['email'])) {
                    $username = $_SESSION['username'];
                    $email = $_SESSION['email'];

                    $maxUsernameLength = 255;
                    $maxEmailLength = 255;

                    if (strlen($username) > $maxUsernameLength) {
                        $username = substr($username, 0, $maxUsernameLength) . "...";
                    }

                    if (strlen($email) > $maxEmailLength) {
                        $email = substr($email, 0, $maxEmailLength) . "...";
                    }

                    echo "<li class='nav-item text-light' id='logininfo'>Zalogowany użytkownik: <b style='color: aqua;'>$username <span style='color: gray;'>($email)</span></b></li>";
                    echo "<li class='nav-item'><a class='nav-link' href='logout.php'><span class='fa fa-sign-out-alt'></span> Wyloguj się</a></li>";
                } else {
                    echo "<li class='nav-item'><a class='nav-link' href='login.php'><span class='fa fa-sign-in-alt'></span> Zaloguj się</a></li>";
                }
                ?>
            </div>
        </div>
    </nav>

    <div class="container-fluid text-center">
        <div class="row content">
            <div class="col-sm-2 sidenav">

            </div>
            <div class="col-sm-8 text-left">
                <h1>Tekst</h1>
                <p>Tekst</p>
                <hr>
                <h3>Test</h3>
                <p>Tekst</p>
            </div>
            <div class="col-sm-2 sidenav">
                <div class="well">
                    <p>Tekst</p>
                </div>
                <div class="well">
                    <p>Tekst</p>
                </div>
            </div>
        </div>
    </div>

    <footer class="container-fluid text-center">
        <p>&copy; Page Brought to you by Micheal, Simon, and Bart</p>
    </footer>
</body>

</html>