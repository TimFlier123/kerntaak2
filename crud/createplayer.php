<?php
include_once('functions.php');
require_once "../config/crud.php";

$name = $insertion = $lastname = $school = "";
$name_err = $insertion_err = $lastname_err = $school = "";

// if user submits form  run function
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    createPlayer();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Speler Toevoegen</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper {
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>

<body style="background-color:#ff9623;">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- new player form -->
                    <h2 class="mt-5">Nieuwe Speler</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Voornaam</label>
                            <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                            <span class="invalid-feedback"><?php echo $name_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Tussenvoegsels</label>
                            <input type="text" name="insertion" class="form-control <?php echo (!empty($insertion_err)) ? 'is-invalid' : ''; ?>"><?php echo $insertion; ?></input>
                            <span class="invalid-feedback"><?php echo $insertion_err; ?></span>
                        </div>
                        <div class="form-group">
                            <label>Achternaam</label>
                            <input type="text" name="lastname" class="form-control <?php echo (!empty($lastname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $lastname; ?>">
                            <span class="invalid-feedback"><?php echo $lastname_err; ?></span>
                        </div>

                        <div class="form-group">
                            <label>School</label>
                            <!-- select schools to fill dropdown -->
                            <select name="school">
                                <?php
                                $sql = mysqli_query($link, "SELECT * FROM school");
                                while ($row = $sql->fetch_assoc()) {
                                    echo "<option value=\"{$row['ID']}\">{$row['name']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <!-- submit form -->
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="../?page=spelers" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>