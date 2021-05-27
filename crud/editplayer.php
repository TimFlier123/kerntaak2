<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once "../includes/head.php"; ?>
    <link rel="stylesheet" href="../styling/style.css" type="text/css">
</head>

<?php
include_once('functions.php');
require_once "../config/crud.php";

// if form is submitted then run the function editPlayer, else show values
if (isset($_POST["id"]) && !empty($_POST["id"])) {
    $id = $_POST["id"];
    editPlayer($id);
} else {

    if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
        $id =  trim($_GET["id"]);

        $sql = "SELECT * FROM speler WHERE id = ?";
        if ($stmt = mysqli_prepare($link, $sql)) {

            mysqli_stmt_bind_param($stmt, "i", $param_id);

            $param_id = $id;

            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);

                if (mysqli_num_rows($result) == 1) {

                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    $name = $row["callsign"];
                    $insertion = $row["insertion"];
                    $lastname = $row["lastname"];
                    $school = $row["schoolID"];
                } else {
                    header("location: error.php");
                    exit();
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
    } else {
        header("location: error.php");
        exit();
    }
}
?>

<body style="background-color:#ff9623;">
    <div class="wrapperpx">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Speler Bewerken</h2>
                    <!-- edit player form -->
                    <form action="" method="post">
                        <div class="form-group">
                            <label>Voornaam</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                        </div>
                        <div class="form-group">
                            <label>Tussenvoegsel</label>
                            <input type="text" name="insertion" class="form-control" value="<?php echo $insertion; ?>">
                        </div>
                        <div class="form-group">
                            <label>Achternaam</label>
                            <input type="text" name="lastname" class="form-control" value="<?php echo $lastname; ?>">
                        </div>

                        <div class="form-group">
                        <select name="school">
                                <?php
                                
                                $sql = mysqli_query($link, "SELECT * FROM school");
                                while ($row = $sql->fetch_assoc()) {
                                    echo "<option value=\"{$row['ID']}\">{$row['ID']} - {$row['name']}</option>";
                                }
                                mysqli_stmt_close($stmt);
                                mysqli_close($link);
                                ?>
                            </select>
                            </div>
                        <!-- submit form -->
                        <input type="hidden" name="id" value="<?php echo $id; ?>" />
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="../?page=spelers" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>