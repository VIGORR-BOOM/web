<?php
  session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title> 𝘉𝘢𝘳𝘳𝘢𝘯𝘲𝘶𝘪𝘭𝘭𝘢-𝘙𝘗 </title>
	<link rel="icon" href="../imgs/ICO.ico">

	<meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="https://kit.fontawesome.com/57faba85b1.js" crossorigin="anonymous"></script>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../templates/AdminLTE-3.0.5/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../templates/AdminLTE-3.0.5/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../templates/AdminLTE-3.0.5/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="sidebar-collapse sidebar-mini">

<?php include "includes/config.php"; ?>

<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand <?php echo $headerStyle; ?>">
    <?php 
      include "includes/header.php";
    ?>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar <?php echo $lateralStyle; ?> elevation-4">
    <?php 
    include "includes/lateralaside.php";
     ?>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 align="center"> █▓▒░⡷⠂𝘗𝘢𝘨𝘪𝘯𝘢 𝘗𝘳𝘪𝘯𝘤𝘪𝘱𝘢𝘭⠐⢾░▒▓█ </h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!--ZONA ENCABEZADO DE IMPRESION SOLAMENTE-->
      <div class="row"><!-- fila contenedora -->
        <div class="col-md-12"> <!-- fin columna de contenido -->

          <div class="card">
            <div class="card-body">
                <img src="../imgs/LOGO/barrranquilla-home.webp" width="100%">
              </div>
            <!-- Para controles de formularios siempre usar etiqueta FORM -->
            <div class="card-body">

              <h1 align="center"> 𝘛𝘦 𝘥𝘢𝘮𝘰𝘴 𝘭𝘢 𝘣𝘪𝘦𝘯𝘷𝘦𝘯𝘪𝘥𝘢 𝘢 𝘴𝘦𝘳𝘷𝘪𝘥𝘰𝘳 𝘮𝘵𝘢 𝘉𝘢𝘳𝘳𝘢𝘯𝘲𝘶𝘪𝘭𝘭𝘢-𝘙𝘗 (𝘣𝘦𝘵𝘢) </h1>

              <h4 align="center"> ¡𝘉𝘪𝘦𝘯𝘷𝘦𝘯𝘪𝘥𝘰𝘴 𝘢 𝘦𝘴𝘵𝘢 𝘤𝘰𝘮𝘶𝘯𝘪𝘥𝘢𝘥 𝘷𝘪𝘣𝘳𝘢𝘯𝘵𝘦 𝘺 𝘭𝘭𝘦𝘯𝘢 𝘥𝘦 𝘦𝘯𝘦𝘳𝘨í𝘢! 𝘘𝘶𝘦 𝘤𝘢𝘥𝘢 𝘦𝘹𝘱𝘦𝘳𝘪𝘦𝘯𝘤𝘪𝘢 𝘦𝘯 𝘉𝘢𝘳𝘳𝘢𝘯𝘲𝘶𝘪𝘭𝘭𝘢 𝘙𝘗 𝘴𝘦𝘢 ú𝘯𝘪𝘤𝘢 𝘺 𝘦𝘮𝘰𝘤𝘪𝘰𝘯𝘢𝘯𝘵𝘦. ¡𝘈 𝘫𝘶𝘨𝘢𝘳 𝘺 𝘢 𝘥𝘪𝘴𝘧𝘳𝘶𝘵𝘢𝘳! </h4>
              <h3 align="center"> 💠 baufuawhfahfh 💠 </h3>

            </div> <!-- /.fin card-body -->

          </div>
        </div> <!--/ fin col -->
      </div><!-- ./ fin row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer bg-dark">
    <?php 
      include "includes/footer.php";
     ?>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../templates/AdminLTE-3.0.5/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../templates/AdminLTE-3.0.5/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../templates/AdminLTE-3.0.5/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Tempusdominus Bootstrap 4 -->
<script src="../templates/AdminLTE-3.0.5/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- AdminLTE App -->
<script src="../templates/AdminLTE-3.0.5/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../templates/AdminLTE-3.0.5/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../templates/AdminLTE-3.0.5/dist/js/demo.js"></script>

</body>
</html>