<?php
   require ("../models/models_admin.php");
   date_default_timezone_set("America/Bogota");
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
            <h1 align="center">█▓▒░⡷⠂ᴀᴅᴍɪɴɪꜱᴛʀᴀᴛɪᴠᴀ⠐⢾░▒▓█ </h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
      <!-- COLUMNA DE FORMULARIO  -->
        <div class="col-md-12"><!-- columna de contenido -->
          
          
            <!-- /.card-header -->
            <div class="card">
            <div class="card-header bg-indigo">
              <h3 class="card-title">𝘕𝘶𝘦𝘷𝘰 𝘜𝘴𝘶𝘢𝘳𝘪𝘰 𝘈𝘮𝘯𝘴𝘳𝘵𝘷</h3>
            </div>
            <!-- Para controles de formularios siempre usar etiqueta FORM -->
            <?php
                if (isset($_POST["txt_Corre"])) {
                  
                  $corre = $_POST["txt_Corre"];
                  $nombr = $_POST["txt_Nombr"];
                  $user = $_POST["txt_User"];
                  $umta = $_POST["txt_Mta"];
                  $cargo = $_POST["lst_Cargo"];
                  $estad = $_POST["lst_Estad"];


                  $objDBO = new DBConfig();
                  $objDBO->config();
                  $objDBO->conexion();

                  $ejecucion = $objDBO->Operaciones("INSERT INTO administrativa(correo,nombre,usuario,user_mta,cargos,estado_actual) 
                    values('$corre','$nombr','$user','$umta','$cargo','$estad');");

                  if($ejecucion){
                    echo "<div class='alert alert-success'>
                           𝘜𝘴𝘶𝘢𝘳𝘪𝘰 𝘩𝘢 𝘴𝘪𝘥𝘰 𝘤𝘳𝘦𝘢𝘥𝘰 𝘤𝘰𝘳𝘳𝘦𝘤𝘵𝘢𝘮𝘦𝘯𝘵𝘦 𝘤𝘰𝘯 𝘦𝘭 𝘤𝘢𝘳𝘨𝘰
                          </div>
                          <a href='lista_Amnsrtv.php' class='btn btn-default'>Ver Listado</a>";

                  }else{
                    echo "<div class='alert alert-danger'>
                            𝘏𝘰 𝘰𝘤𝘶𝘳𝘳𝘪𝘥𝘰 𝘶𝘯 𝘦𝘳𝘳𝘰𝘳 𝘪𝘯𝘦𝘹𝘱𝘦𝘳𝘢𝘥𝘰
                          </div>";
                  }
                }
            ?>

            <form role="form" name="frm_AmnS" id="frm_AmnS" method="POST" action="Nuevo_Amnsrtv.php" enctype="multipart/form-data">
              <div class="card-body">

                <div class="row">

                  <!-- Correo electrónico -->
                  <div class="col-md-4 col-sm-4 col-12">
                    <div class="form-group">
                      <label for="txt_Corre">𝘊𝘰𝘳𝘳𝘦𝘰</label>
                      <input type="text" class="form-control" id="txt_Corre" name="txt_Corre" placeholder="𝘊𝘰𝘳𝘳𝘦𝘰 𝘦𝘭𝘦𝘤𝘵𝘳ó𝘯𝘪𝘤𝘰">
                    </div> 
                  </div>

                  <!-- Nombre y Apellido -->
                  <div class="col-md-4 col-sm-4 col-12">
                    <div class="form-group">
                      <label for="txt_Nombr">𝘕𝘰𝘮𝘣𝘳𝘦</label>
                      <input type="text" class="form-control" id="txt_Nombr" name="txt_Nombr" placeholder="𝘕𝘰𝘮𝘣𝘳𝘦 𝘊𝘰𝘮𝘱𝘭𝘦𝘵𝘰">
                    </div> 
                  </div>


                  <!-- Teléfono -->
                  <div class="col-md-4 col-sm-4 col-12">
                    <div class="form-group">
                      <label for="txt_User">𝘜𝘴𝘶𝘢𝘳𝘪𝘰</label>
                      <input type="text" class="form-control" id="txt_User" name="txt_User" placeholder="𝘜𝘴𝘶𝘢𝘳𝘪𝘰 𝘋𝘪𝘴𝘤𝘰𝘳𝘥">
                    </div> 
                  </div>

                  <!-- Teléfono -->
                  <div class="col-md-4 col-sm-4 col-12">
                    <div class="form-group">
                      <label for="txt_Mta">𝘜𝘴𝘶𝘢𝘳𝘪𝘰 𝘔𝘛𝘈</label>
                      <input type="text" class="form-control" id="txt_Mta" name="txt_Mta" placeholder="𝘜𝘴𝘶𝘢𝘳𝘪𝘰 𝘔𝘛𝘈">
                    </div> 
                  </div>

                  <!-- Metodo de Pago -->
                  <div class="col-md-4 col-sm-4 col-12">
                    <div class="form-group">
                      <label>𝘊𝘢𝘳𝘨𝘰𝘴</label>
                      <select class="form-control" name="lst_Cargo" id="lst_Cargo">
                        <option value="" hidden>𝘚𝘦𝘭𝘦𝘤𝘤𝘪𝘰𝘯𝘢𝘳 𝘶𝘯 𝘙𝘰𝘭</option>
                        <option value="𝘋𝘶𝘦ñ𝘰">𝘋𝘶𝘦ñ𝘰</option>
                        <option value="𝘋𝘦𝘴𝘢𝘳𝘳𝘰𝘭𝘭𝘢𝘥𝘰𝘳">𝘋𝘦𝘴𝘢𝘳𝘳𝘰𝘭𝘭𝘢𝘥𝘰𝘳</option>
                        <option value="𝘈𝘥𝘮𝘪𝘯𝘪𝘵𝘳𝘢𝘥𝘰𝘳">𝘈𝘥𝘮𝘪𝘯𝘪𝘵𝘳𝘢𝘥𝘰𝘳</option>
                        <option value="𝘚𝘶𝘱𝘦𝘳𝘔𝘰𝘥𝘦𝘳𝘢𝘥𝘰𝘳">𝘚𝘶𝘱𝘦𝘳𝘔𝘰𝘥𝘦𝘳𝘢𝘥𝘰𝘳</option>
                        <option value="𝘌𝘯𝘤.𝘍𝘢𝘤𝘤𝘪𝘰𝘯𝘦𝘴">𝘌𝘯𝘤.𝘍𝘢𝘤𝘤𝘪𝘰𝘯𝘦𝘴</option>
                        <option value="𝘌𝘯𝘤.𝘚𝘵𝘢𝘧𝘧">𝘌𝘯𝘤.𝘚𝘵𝘢𝘧𝘧</option>
                        <option value="𝘌𝘯𝘤.𝘋𝘪𝘴𝘤𝘰𝘳𝘥">𝘌𝘯𝘤.𝘋𝘪𝘴𝘤𝘰𝘳𝘥</option>
                        <option value="𝘈𝘺𝘶𝘥𝘢𝘯𝘵𝘦">𝘈𝘺𝘶𝘥𝘢𝘯𝘵𝘦</option>
                      </select>
                    </div> 
                  </div>

                  <!-- Metodo de Pago -->
                  <div class="col-md-4 col-sm-4 col-12">
                    <div class="form-group">
                      <label>𝘌𝘴𝘵𝘢𝘥𝘰 𝘢𝘤𝘵𝘶𝘢𝘭</label>
                      <select class="form-control" name="lst_Estad" id="lst_Estad">
                        <option value="" hidden>𝘌𝘴𝘵𝘢𝘥𝘰 𝘢𝘤𝘵𝘶𝘢𝘭 𝘥𝘦𝘭 𝘶𝘴𝘶𝘢𝘳𝘪𝘰 𝘮𝘵𝘢</option>
                        <option value="𝘈𝘤𝘵𝘪𝘷𝘢">𝘈𝘤𝘵𝘪𝘷𝘢</option>
                        <option value="𝘐𝘯𝘢𝘤𝘵𝘪𝘷𝘢𝘥𝘢">𝘐𝘯𝘢𝘤𝘵𝘪𝘷𝘢𝘥𝘢</option>
                        <option value="𝘌𝘯 𝘱𝘳𝘰𝘤𝘦𝘴𝘰 𝘥𝘦 𝘤𝘢𝘳𝘨𝘰">𝘌𝘯 𝘱𝘳𝘰𝘤𝘦𝘴𝘰 𝘥𝘦 𝘤𝘢𝘳𝘨𝘰</option>
                        <option value="𝘌𝘹𝘱𝘶𝘭𝘴𝘢𝘳 𝘥𝘦𝘭 𝘤𝘢𝘳𝘨𝘰">𝘌𝘹𝘱𝘶𝘭𝘴𝘢𝘳 𝘥𝘦𝘭 𝘤𝘢𝘳𝘨𝘰</option>
                        <option value="𝘉𝘢𝘯𝘦𝘢𝘳 𝘥𝘦𝘭 𝘤𝘢𝘳𝘨𝘰 𝘱𝘦𝘳𝘮𝘢𝘯𝘦𝘯𝘵𝘦">𝘉𝘢𝘯𝘦𝘢𝘳 𝘥𝘦𝘭 𝘤𝘢𝘳𝘨𝘰 𝘱𝘦𝘳𝘮𝘢𝘯𝘦𝘯𝘵𝘦</option>
                      </select>
                    </div> 
                  </div>

                </div>  <!-- /.fin row -->   
                
              </div>  <!-- /.fin card-body -->

              <div class="card-footer" align="center">
                
                <button type="submit" class="btn btn-warning"><i class="nav-icon fas fa-solid fa-box" id="btn_Registrar"></i> 𝘙𝘦𝘨𝘪𝘴𝘵𝘳𝘢𝘳 𝘈𝘮𝘯𝘴𝘳𝘵𝘷 </button>

                <button type="reset" class="btn btn-info"><i class="nav-icon fas fa-broom"></i> 𝘓𝘪𝘮𝘱𝘪𝘢𝘳</button>
                
              </div>

            </form> <!-- /.fin Form -->

          </div>

        </div><!-- Fin contenido formulario -->

          

    </div>


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