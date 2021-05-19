<script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
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

if (isset($_FILES['xmlPlayers'])) {
    spelersImporteren($_FILES['xmlPlayers'], $conn);
}
elseif (isset($_FILES['xmlSchools'])) {
    schoolImporteren($_FILES['xmlSchools'], $conn);
}
elseif (isset($_FILES['xmlTournaments'])) {
    tournamentImporteren($_FILES['xmlTournaments'], $conn);
}
elseif (isset($_FILES['xmlRegistrations'])) {
    aanmeldingenImporteren($_FILES['xmlRegistrations'], $conn);
}
?>

<style>
.form-select {
    display: none;   
}    
</style>


<select name="options" id="email-list">
  <option value="1">Spelers</option>
  <option value="2">Scholen</option>
  <option value="3">Toernooien</option>
  <option value="4">Aanmeldingen</option>
</select>

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

<script>window.onload = function(){
document.getElementById('email-list').onchange = function() {
    var i = 1;
    var myDiv = document.getElementById(i);
    while(myDiv) {
        myDiv.style.display = 'none';
        myDiv = document.getElementById(++i);
    }
    document.getElementById(this.value).style.display = 'block';
}};

</script>