<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/">Bedrijfsnaam</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <?php $activePage = @$_GET['page']; ?>

      <li class="nav-item">
        <a class="nav-link <?= ($activePage == '') ? 'active' : ''; ?>" href="/">Home </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= ($activePage == 'page1') ? 'active' : ''; ?>" href="?page=page1">Pagina</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= ($activePage == 'page2') ? 'active' : ''; ?>" href="?page=page2">Pagina2</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?= ($activePage == 'csv') ? 'active' : ''; ?>" href="?page=csv">CSV</a>
      </li>
    </ul>

    <span class="navbar-text">
      Hallo, <?php echo $_SESSION['user_name']; ?>.<a href="?logout">Uitloggen</a>
    </span>
  </div>
</nav>