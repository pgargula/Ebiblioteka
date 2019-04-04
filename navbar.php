

<nav class="navbar sticky-top navbar-expand-md bg-dark navbar-dark justify-content-end">
  <!-- Brand -->
  <a class="navbar-brand" href="#"><img src="images/2000px-Bookshelf-40x20_grey.svg.png" alt="Logo" style="width:40px;">Ebiblioteka </a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav mr-auto">
      <li class="nav-right">
        <a class="nav-link" href="mojProfil.php">Mój profil</a>
      </li>
      <li class="nav-right">
        <a class="nav-link" href="mojzbior.php">Mój zbiór</a>
      </li>
      <li class="nav-right">
        <a class="nav-link" href="myTransaction.php">Moje transakcje</a>
      </li>
      <li class="nav-right">
        <a class="nav-link" href="market.php">Market</a>
      </li>
      <li class="nav-left">
      <a class="nav-link" href="logout.php">Wyloguj</a>
     
    </ul>
    <span class="navbar-text">
      Witaj: <?php echo $_SESSION['login'];?>
    </span>
    
  </div>
</nav> 