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
    <link rel="stylesheet" href="register_style.css">
</head>

<body>
    <div class="login-dark">
        <form method="post" action="php/newacc.php">
            <!-- Dodaj miejsce na wyświetlanie komunikatu błędu -->
            <div id="error-message" style="color: aqua; text-align: center;"></div><br>
            <div class="form-group text-left" style="font-size: 16px;">
                <span class="text-primary" id="password-requirements"></span>
            </div>
            <script>
                // Odczytaj parametry z adresu URL
                const urlParams = new URLSearchParams(window.location.search);
                const error = urlParams.get('error');

                // Wyświetl odpowiedni komunikat w zależności od parametru 'error'
                if (error === 'email_taken') {
                    document.getElementById('error-message').innerText = 'Podany adres email jest już w użyciu.';
                } else if (error === 'registration_failed') {
                    document.getElementById('error-message').innerText = 'Wystąpił błąd podczas rejestracji.';
                }

                // Sprawdzanie hasła
                document.addEventListener("DOMContentLoaded", function() {
                    const passwordInput = document.querySelector('input[name="password"]');
                    const confirmPasswordInput = document.querySelector('input[name="confirmpassword"]');
                    const submitButton = document.querySelector('button[type="submit"]');
                    const errorMessage = document.getElementById('error-message');
                    const passwordRequirements = document.getElementById('password-requirements');
                    const passwordStrengthBar = document.getElementById('password-strength-bar');

                    function updateSubmitButtonState() {
                        const password = passwordInput.value;
                        const confirmPassword = confirmPasswordInput.value;

                        const passwordStrength = calculatePasswordStrength(password);
                        const isValidPassword = passwordStrength >= 3; // Minimalna siła hasła z uwzględnieniem znaku specjalnego
                        const isMatchingPasswords = password === confirmPassword;

                        if (!isValidPassword || !isMatchingPasswords) {
                            submitButton.disabled = true;
                        } else {
                            submitButton.disabled = false;
                        }
                    }

                    passwordInput.addEventListener('input', function() {
                        const password = passwordInput.value;
                        const passwordStrength = calculatePasswordStrength(password);

                        const isValid = passwordStrength >= 3; // Minimalna siła hasła z uwzględnieniem znaku specjalnego

                        if (!isValid) {
                            errorMessage.innerText = 'Hasło jest za słabe. Wymaga co najmniej 8 znaków, w tym małych i dużych liter, cyfr oraz znaku specjalnego.';
                            displayPasswordRequirements(password);
                        } else {
                            errorMessage.innerText = '';
                            passwordRequirements.innerText = ''; // Wyczyść informacje o wymaganiach, gdy hasło jest wystarczająco silne
                        }

                        // Aktualizuj pasek siły hasła
                        updatePasswordStrengthBar(passwordStrength);

                        // Aktualizuj stan przycisku "submit"
                        updateSubmitButtonState();
                    });

                    confirmPasswordInput.addEventListener('input', function() {
                        // Aktualizuj stan przycisku "submit"
                        updateSubmitButtonState();
                    });

                    function calculatePasswordStrength(password) {
                        const minLength = 8;
                        const hasLowerCase = /[a-z]/.test(password);
                        const hasUpperCase = /[A-Z]/.test(password);
                        const hasDigit = /\d/.test(password);
                        const hasSpecialChar = /[!@#$%^&*(),.?":{ }|<>]/.test(password);

                        const conditionsMet = [password.length >= minLength, hasLowerCase, hasUpperCase, hasDigit, hasSpecialChar];
                        return conditionsMet.filter(Boolean).length;
                    }

                    function displayPasswordRequirements(password) {
                        passwordRequirements.innerText = 'Wymagania:';
                        if (!/[a-z]/.test(password)) {
                            passwordRequirements.innerText += '\n- Mała litera';
                        }
                        if (!/[A-Z]/.test(password)) {
                            passwordRequirements.innerText += '\n- Duża litera';
                        }
                        if (!/\d/.test(password)) {
                            passwordRequirements.innerText += '\n- Cyfra';
                        }
                        if (!/[!@#$%^&*(),.?":{ }|<>]/.test(password)) {
                            passwordRequirements.innerText += '\n- Znak specjalny';
                        }
                    }

                    function updatePasswordStrengthBar(strength) {
                        const progressBar = passwordStrengthBar;
                        progressBar.style.width = (strength / 5) * 100 + '%';
                        progressBar.style.backgroundColor = strength < 2 ? '#FF6B6B' : strength < 3 ? '#FFD56D' : strength < 4 ? '#6BFF6B' : strength < 5 ? '#6D6DFF' : '#9D6DFF';
                    }
                });
            </script>
            <h2 class="sr-only sr-only-focusable">Register Form</h2>
            <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>
            <div class="form-group"><input class="form-control" type="text" name="username" placeholder="Username" maxlength="8192" required></div>
            <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email" maxlength="8192" required></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password" maxlength="8192" required></div>
            <div class="form-group"><input class="form-control" type="password" name="confirmpassword" placeholder="Confirm Password" maxlength="8192" required></div>
            <div class="progress" style="background-color: gray;">
                <div class="progress-bar" id="password-strength-bar" role="progressbar" style="width: 0%;"></div>
            </div>
            <div class="form-group text-center"><button class="btn btn-primary btn-block" type="submit">Sign up</button></div>
            <a href="#" class="problems"><i>Contact Support here!</i></a>
            <a href="login.php" class="loginback"><i>Do you want to login?</i></a>
        </form>
    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>