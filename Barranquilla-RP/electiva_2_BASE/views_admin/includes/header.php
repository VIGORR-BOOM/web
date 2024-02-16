<!-- Left navbar links -->
<ul class="navbar-nav">

  <li class="nav-item d-none d-sm-inline-block">
    <a href="hemo.php" class="nav-link">
    <i class="fa-solid fa-house"></i>
    ɪɴɪᴄɪᴏ </a>
  </li>

</ul>

  <!-- Right navbar links -->
<ul class="navbar-nav ml-auto">  
  <!-- Notifications Dropdown Menu -->
  <div class="text-white bg-success p-2">
    <?php
       echo $_SESSION["usuario"];

    ?>
    
  </div>

  <div class="navbar-nav">
        <a class="btn btn-danger" href=" ../../../.././../../../controlador/controlador_cerrar_session.php">
          <i class="fa-solid fa-right-from-bracket"></i>
        𝘊𝘦𝘳𝘳𝘢𝘳 𝘚𝘦𝘴𝘪𝘰𝘯</a>
  </div>

</ul>