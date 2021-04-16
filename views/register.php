<link type="text/css" rel="stylesheet" href="styling/login.css" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.min.js" integrity="sha384-5h4UG+6GOuV9qXh6HqOLwZMY4mnLPraeTrjT5v07o347pj6IkfuoASuGBhfDsp3d" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
    $('#modaltrigger').click(function() {
        $('#myModal').modal({
            show: true
        });
    });
</script>

<body class="text-center">
    <!-- login form box -->
    <main class="form-signin">
        <!-- register form -->
        <form method="post" action="register.php" name="registerform">
            <h1 class="h3 mb-3 fw-normal">Registreren</h1>
            <!-- the user name input field uses a HTML5 pattern check -->
            <div class="form-floating">

                <input id="login_input_username" class="form-control" type="text" pattern="[a-zA-Z0-9]{2,64}" name="user_name" placeholder="Gebruikersnaam" required />
                <!-- <label for="login_input_username">Username (only letters and numbers, 2 to 64 characters)</label> -->
            </div>

            <!-- the email input field uses a HTML5 email type check -->
            <div class="form-floating">
                <!-- <label for="login_input_email">User's email</label> -->
                <input id="login_input_email" class="form-control" type="email" name="user_email" placeholder="Email" required />
            </div>
            <div class="form-floating">
                <!-- <label for="login_input_password_new">Password (min. 6 characters)</label> -->
                <input id="login_input_password_new" class="form-control" type="password" name="user_password_new" placeholder="Wachtwoord" pattern=".{6,}" required autocomplete="off" />
            </div>
            <div class="form-floating">
                <!-- <label for="login_input_password_repeat">Repeat password</label> -->
                <input id="login_input_password_repeat" class="form-control" type="password" name="user_password_repeat" placeholder="Wachtwoord herhalen" pattern=".{6,}" required autocomplete="off" />
            </div>
            <div class="checkbox mb-3">
                <label>
                    <input type="submit" class="w-100 btn btn-lg btn-primary" name="register" value="Registreren" />
                </label>
            </div>

        </form>

        <?php
        // show potential errors / feedback (from registration object)
        if (isset($registration)) {
            if ($registration->errors) {
                foreach ($registration->errors as $error) {
                    echo $error;
                }
            }
            if ($registration->messages) {
                foreach ($registration->messages as $message) {
                    echo $message;
                }
            }
        }
        ?>

        <a href="/" class="btn btn-secondary btn-sm" role="button">
            Terug naar Login
        </a>

        <!-- Button trigger modal -->
        <button type="button" id="modaltrigger" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#myModal">
            Bekijk Registratie Regels
        </button>

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Registratie Regels</h4>
                    </div>
                    <div class="modal-body">

                        <div class="row" style="margin-bottom: 5% !important">
                            <div class="col-4">
                                <div class="list-group" id="list-tab" role="tablist">
                                    <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Gebruikersnaam</a>
                                    <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Wachtwoord</a>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">Alleen letters en nummers, minimaal 2 en maximaal 64 karakters</div>
                                    <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">Minimaal 6 karakters</div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Sluiten</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>