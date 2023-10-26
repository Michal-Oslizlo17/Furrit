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
    <link rel="stylesheet" href="login_style.css">
</head>

<body>
    <div class="login-dark">
        <form method="post" action="php/checklogin.php">
            <!-- Dodaj miejsce na wyświetlanie komunikatu błędu -->
            <div id="error-message" style="color: aqua; text-align: center;"></div>
            <script>
                // Odczytaj parametry z adresu URL
                const urlParams = new URLSearchParams(window.location.search);
                const error = urlParams.get('error');

                // Wyświetl odpowiedni komunikat w zależności od parametru 'error'
                if (error === 'success') {
                    document.getElementById('error-message').innerText = 'Rejestracja przebiegła pomyślnie.';
                } else if (error === 'registration_failed') {
                    document.getElementById('error-message').innerText = 'Wystąpił błąd podczas rejestracji.';
                } else if (error === 'invaliddata') {
                    document.getElementById('error-message').innerText = 'Błędne dane logowania.';
                } else if (error === 'noexist') {
                    document.getElementById('error-message').innerText = 'Użytkownik o podanych danych nie istnieje.';
                } else if (error === 'logout') {
                    document.getElementById('error-message').innerText = 'Użytkownik został wylogowany pomyślnie.';
                }
            </script>
            <h2 class="sr-only sr-only-focusable text-center">Login Form</h2>
            <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>
            <div class="form-group">
                <input class="form-control" type="email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="password" placeholder="Password" required>
            </div>
            <div class="form-group text-center">
                <button class="btn btn-primary btn-block" type="submit">Log In</button>
            </div>
            <div class="form-group">
                <a href="#" class="forgot">Forgot your email or password?</a>
            </div>
            <div class="form-group" style="font-size: 12px;">
                <a href="register.php" class="register">Don't have an account?</a>
            </div>
        </form>
    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>