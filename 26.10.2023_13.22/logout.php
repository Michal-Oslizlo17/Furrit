<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Your Site</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="src/favicon/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="homepage_style.css" rel="stylesheet" />
    <link rel="stylesheet" href="cursor.css">
</head>

<body>
    <?php
    session_start(); // Rozpocznij sesję, jeśli jeszcze jej nie ma
    $_SESSION = array(); // Opróżnij zmienną sesyjną, która jest używana
    // Zniszcz obecną sesję i wygeneruj nowy identyfikator sesji w celu uniknięcia ataków CSRF
    session_regenerate_id(true);

    if (isset($_SESSION['email'])) {
        // Jeśli w sesji istnieje zmienna 'email', co sugeruje zalogowanie użytkownika
        // to zniszcz sesję, aby wylogować użytkownika
        session_destroy();
    }

    // Przekieruj użytkownika na stronę logowania
    header("Location: login.php?error=logout");
    ?>
</body>

</html>