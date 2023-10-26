<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="newacc.css">
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
    $login = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $_password = $password;

    // Zabezpieczenie przed atakami SQL Injection
    $login = mysqli_real_escape_string($conn, $login);
    $email = mysqli_real_escape_string($conn, $email);

    // Hashowanie hasła
    $password = password_hash($password, PASSWORD_BCRYPT);

    // Zapytanie SQL do sprawdzenia, czy email jest już w bazie danych
    $check_query = "SELECT * FROM userdata WHERE email = '$email'";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        // Użytkownik o podanym emailu już istnieje
        header("Location: ../register.php?error=email_taken");
    } else {
        // Dodanie nowego użytkownika do bazy danych
        $insert_query = "INSERT INTO userdata (ID, Name, Email, Password, NEPassword) VALUES ('', '$login', '$email', '$password', '$_password')";
        if (mysqli_query($conn, $insert_query)) {
            // Rejestracja udana
            header("Location: ../login.php?error=success");
        } else {
            // Błąd podczas rejestracji
            header("Location: ../register.php?error=registration_failed");
        }
    }

    // Zakończenie połączenia z bazą danych
    mysqli_close($conn);
    ?>
</body>

</html>