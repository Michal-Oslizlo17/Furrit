<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="checklogin.css">
    <link rel="stylesheet" href="../config.css">
</head>

<body>
    <?php
    // Połączenie z bazą danych
    $servername = "localhost"; // Adres serwera bazy danych
    $username = "root"; // Nazwa użytkownika bazy danych
    $password = ""; // Hasło do bazy danych
    $dbname = "acc"; // Nazwa bazy danych
    
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Sprawdzenie, czy połączenie się udało
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Pobranie danych z formularza
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Zabezpieczenie przed atakami SQL Injection
    $email = mysqli_real_escape_string($conn, $email);

    // Hashowanie hasła
    $password = password_hash($password, PASSWORD_BCRYPT);

    // Zapytanie SQL do sprawdzenia danych logowania
    $sql = "SELECT * FROM `userdata` WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if ($row = mysqli_fetch_assoc($result)) {
        // Sprawdzenie, czy hasło jest poprawne
        if (password_verify($_POST['password'], $row['Password'])) {
            // Logowanie udane
            session_start();
            $_SESSION['email'] = $email;
            // Zapisz username jako zmienną sesji
            $_SESSION['username'] = $row['Name'];
            header("Location: ../homepage.php?code=good"); // Przekierowanie do strony głównej
        } else {
            // Logowanie nieudane - błędne hasło
            header("Location: ../login.php?error=invaliddata"); // Przekierowanie do strony błędu logowania
        }
    } else {
        // Logowanie nieudane - brak użytkownika o podanym emailu
        header("Location: ../login.php?error=noexist"); // Przekierowanie do strony błędu logowania
    }

    // Zakończenie połączenia z bazą danych
    mysqli_close($conn);
    ?>
</body>

</html>