<link type="text/css" rel="stylesheet" href="styling/login.css" />

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<body class="text-center">
    <!-- login form box -->
    <main class="form-signin">
        <form method="post" action="index.php" name="loginform">
            <h1 class="h3 mb-3 fw-normal">Inloggen</h1>

            <div class="form-floating">
                <input id="login_input_username" class="form-control" type="text" name="user_name" placeholder="Gebruikersnaam" required />
            </div>
            <div class="form-floating">
                <input id="login_input_password" class="form-control" type="password" name="user_password" placeholder="Wachtwoord" autocomplete="off" required />
            </div>
            <div class="checkbox mb-3">
                <label>
                    <input type="submit" class="w-100 btn btn-lg btn-primary" name="login" value="Log in" />
                </label>

            </div>
            <a href="register.php" class="btn btn-secondary btn-sm" role="button">
                Naar registratie pagina
            </a>
        </form>
        <?php
        // show potential errors / feedback (from login object)
        if (isset($login)) {
            if ($login->errors) {
                foreach ($login->errors as $error) {
                    echo $error;
                }
            }
            if ($login->messages) {
                foreach ($login->messages as $message) {
                    echo $message;
                }
            }
        }
        ?>
    </main>
</body>