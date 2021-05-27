<head>
    <?php include_once "includes/head.php"; ?>
    <link rel="stylesheet" href="styling/style.css" type="text/css">
</head>

<?php
include_once('crud/functions.php');
$servername = "localhost";
$username = "admin";
$password = "admin";
$dbname = "flitim_kerntaak2";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check which category they want to insert to
if (isset($_FILES['xmlPlayers'])) {
    spelersImporteren($_FILES['xmlPlayers'], $conn);
} elseif (isset($_FILES['xmlSchools'])) {
    schoolImporteren($_FILES['xmlSchools'], $conn);
} elseif (isset($_FILES['xmlTournaments'])) {
    tournamentImporteren($_FILES['xmlTournaments'], $conn);
} elseif (isset($_FILES['xmlRegistrations'])) {
    aanmeldingenImporteren($_FILES['xmlRegistrations'], $conn);
} elseif (isset($_FILES['xmlGames'])) {
    wedstrijdImporteren($_FILES['xmlGames'], $conn);
}
?>

<body>
<!-- Select which category you want to import to -->
<select name="options" id="email-list">
    <option value="1">Spelers</option>
    <option value="2">Scholen</option>
    <option value="3">Toernooien</option>
    <option value="4">Aanmeldingen</option>
    <option value="5">Wedstrijden</option>
</select>

<!-- XML Players Upload -->
<div id="1" class="form-select" style="display: block">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <form action="" method="post" enctype="multipart/form-data">
                        Spelers:
                        <input type="file" name="xmlPlayers">
                        <input type="submit" name="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- XML Schools Upload -->
<div id="2" class="form-select">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <form action="" method="post" enctype="multipart/form-data">
                        Scholen:
                        <input type="file" name="xmlSchools">
                        <input type="submit" name="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- XML Tournaments Upload -->
<div id="3" class="form-select">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <form action="" method="post" enctype="multipart/form-data">
                        Toernooien:
                        <input type="file" name="xmlTournaments">
                        <input type="submit" name="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- XML Registrations Upload -->
<div id="4" class="form-select">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <form action="" method="post" enctype="multipart/form-data">
                        Aanmeldingen:
                        <input type="file" name="xmlRegistrations">
                        <input type="submit" name="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- XML Games Upload -->
<div id="5" class="form-select">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <form action="" method="post" enctype="multipart/form-data">
                        Wedstrijden:
                        <input type="file" name="xmlGames">
                        <input type="submit" name="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
</body>

<!-- Script to show certain category to import to -->
<script>
    window.onload = function() {
        document.getElementById('email-list').onchange = function() {
            var i = 1;
            var myDiv = document.getElementById(i);
            while (myDiv) {
                myDiv.style.display = 'none';
                myDiv = document.getElementById(++i);
            }
            document.getElementById(this.value).style.display = 'block';
        }
    };
</script>