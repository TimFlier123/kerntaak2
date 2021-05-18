<!-- Bootstrap CSS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<nav class="navbar navbar-expand-lg navbar-light" style="background-color:#ff9623;">
  <a class="navbar-brand" href="/"><img src="media/logo.jpg" alt="Girl in a jacket" width="30" height="30"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <style>
    .navbar .nav {
      overflow: visible;
    }
  </style>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <?php $activePage = @$_GET['page']; ?>

      <li class="nav-item">
        <a class="nav-link <?= ($activePage == 'page1') ? 'active' : ''; ?>" href="?page=spelers">Spelers</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= ($activePage == 'page1') ? 'active' : ''; ?>" href="?page=schools">Scholen</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= ($activePage == 'page2') ? 'active' : ''; ?>" href="?page=toernooien">Toernooien</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= ($activePage == 'handmatig') ? 'active' : ''; ?>" href="?page=handmatig">Handmatig</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= ($activePage == 'importeren') ? 'active' : ''; ?>" href="?page=importeren">Importeren</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= ($activePage == 'sluiten') ? 'active' : ''; ?>" href="?page=sluiten">Sluiten</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= ($activePage == 'csv') ? 'active' : ''; ?>" href="?page=csv">Toernooioverzicht</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= ($activePage == 'csv') ? 'active' : ''; ?>" href="?page=csv">Uitslagen beheren</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= ($activePage == 'csv') ? 'active' : ''; ?>" href="?page=csv">Indelen Volg Ronde</a>
      </li>
      <!-- <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Basisgegevens
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="nav-link <?= ($activePage == 'spelers') ? 'active' : ''; ?>" href="?page=spelers">Spelers</a>
          <a class="nav-link <?= ($activePage == 'scholen') ? 'active' : ''; ?>" href="?page=schools">Scholen</a>
          <a class="nav-link <?= ($activePage == 'toernooien') ? 'active' : ''; ?>" href="?page=toernooien">Toernooien</a>
        </div>
      </div>
      <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Aanmelden
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="nav-link <?= ($activePage == 'spelers') ? 'active' : ''; ?>" href="?page=handmatig">Handmatig</a>
          <a class="nav-link <?= ($activePage == 'scholen') ? 'active' : ''; ?>" href="?page=importeren">Importeren</a>
          <a class="nav-link <?= ($activePage == 'toernooien') ? 'active' : ''; ?>" href="?page=sluiten">Sluiten</a>
        </div>
      </div> -->
    </ul>

    <span class="navbar-text">
      Hallo, <?php echo $_SESSION['user_name']; ?>.<a href="?logout">Uitloggen</a>
    </span>
  </div>
</nav>