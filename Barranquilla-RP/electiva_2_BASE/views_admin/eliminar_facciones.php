<?php
   require ("../models/models_admin.php");
   include "../controllers/controller_consultas_backend.php";
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
        <?php include "includes/header.php";?>
      </nav>
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar <?php echo $lateralStyle; ?> elevation-4">
        <?php include "includes/lateralaside.php";?>
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12">
              <h1 align="center"> █▓▒░⡷⠂𝘍𝘈𝘊𝘊𝘐𝘖𝘕𝘌𝘚⠐⢾░▒▓█</h1>
            </div>
          </div>
          </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <?php
          if(isset($_GET["id"])){//URL PERFECTA

            $objDB = new ExtraerDatos();

            $facciones = array();
            $facciones = $objDB->editarFAC($_GET["id"]);

            if($facciones){//VERIFICA QUE LA INFORMACION EXISTE
        ?>

        <section class="content">
          <div class="row text-dark">
            <div class="col-md-12">

              <div class="card">
                <div class="card-header bg-indigo">
                  <h3 class="card-title">𝘊𝘰𝘯𝘧𝘪𝘳𝘮𝘢𝘳 𝘱𝘢𝘳𝘢 𝘦𝘭𝘪𝘮𝘪𝘯𝘢𝘳 𝘜𝘴𝘶𝘢𝘳𝘪𝘰 𝘥𝘦𝘭 𝘴𝘦𝘳𝘷𝘦𝘳 𝘥𝘦 𝘔𝘛𝘈 𝘉𝘢𝘳𝘳𝘢𝘯𝘲𝘶𝘪𝘭𝘭𝘢-𝘙𝘗 </h3>
                </div>
                  
                <?php
                  if(isset($_POST["txt_id"])){

                    $id = $_POST["txt_id"];

                    $objDBO = new DBConfig();
                    $objDBO->config();
                    $objDBO->conexion();

                    $ejecucion = $objDBO->Operaciones("DELETE FROM facciones 
                                                       WHERE id=$id");

                    if($ejecucion)
                    {
                      echo "<div class='alert alert-success'>
                             𝘌𝘴𝘵𝘦𝘴 𝘜𝘴𝘶𝘢𝘳𝘪𝘰 𝘩𝘢 𝘴𝘪𝘥𝘰 𝘦𝘭𝘪𝘮𝘪𝘯𝘢𝘥𝘰 𝘤𝘰𝘳𝘳𝘦𝘤𝘵𝘢𝘮𝘦𝘯𝘵𝘦
                            </div>
                            <a href='lista_Amnsrtv.php' class='btn btn-default'>Ver Listado</a>";
                    }
                    else
                    {
                      echo "<div class='alert alert-danger'>
                               𝘏𝘢 𝘰𝘤𝘶𝘳𝘳𝘪𝘥𝘰 𝘶𝘯 𝘦𝘳𝘳𝘰𝘳 𝘪𝘯𝘦𝘹𝘱𝘦𝘳𝘢𝘥𝘰
                            </div>";
                    }

                    $objDBO->close();
                  }else{
                ?>

                <form role="form" id="frm_prods" name="frm_prods" method="POST" action="eliminar_facciones.php?id=<?php echo $_GET['id']; ?>" enctype="multipart/form-data">

                  <div class="card-body">
                       𝘜𝘴𝘵𝘦𝘥 𝘷𝘢 𝘢 𝘌𝘭𝘪𝘮𝘪𝘯𝘢𝘳 𝘦𝘭 𝘜𝘴𝘶𝘢𝘳𝘪𝘰
                       <b><?php echo $facciones[0]['user_mta']; ?></b>
                       𝘤𝘰𝘯 𝘊𝘢𝘳𝘨𝘰 
                       <b><?php echo $facciones[0]['cargos']; ?></b>
                       𝘐𝘋
                       <b><?php echo $facciones[0]['id']; ?></b>
                       <br>

                       𝘗𝘳𝘦𝘴𝘪𝘰𝘯𝘦 <b>𝘈𝘤𝘦𝘱𝘵𝘢𝘳</b> 𝘱𝘢𝘳𝘢 𝘦𝘭𝘪𝘮𝘪𝘯𝘢𝘳. <br><br>

                       <b>𝘐𝘮𝘱𝘰𝘳𝘵𝘢𝘯𝘵𝘦</b>. 𝘜𝘯𝘢 𝘷𝘦𝘻 𝘦𝘭𝘪𝘮𝘪𝘯𝘢𝘥𝘰 𝘯𝘰 𝘱𝘰𝘥𝘳𝘢 𝘳𝘦𝘤𝘶𝘱𝘦𝘳𝘢𝘳𝘴𝘦.

                  </div>

                  <div class="card-footer">
                    <button type="submit" id="btn_Eliminar" class="btn btn-danger"><i class="nav-icon fas fa-trash"></i> 𝘈𝘤𝘦𝘱𝘵𝘢𝘳</button>
                    <a href="lista_facciones.php" class="btn btn-warning"><i class="nav-icon fas fa-ban"></i> 𝘊𝘢𝘯𝘤𝘦𝘭𝘢𝘳</a>
                  </div>

                  <input type="hidden" id="txt_id" name="txt_id" value="<?php echo $facciones[0]['id']; ?>">


                </form> <!-- /.fin form -->

                <?php
                }
                ?>
                  
              </div><!-- /.card -->
            </div>
          </div>
        </section>

      <?php
      }else{//en caso la URL tiene un valor incorrecto
            echo"<div class='alert alert-danger'>
                      <b> ❎👇 Acceso Denegado 👇❎ </b><br>
                          Información no existe en base de datos
                 </div>";
      }

      }else{//en caso que URL haya sido alterada
          echo"<div class='alert alert-danger'>
                    <b>❎👇 Acceso Denegado 👇❎</b><br>
                    Usted esta accediendo de forma incorrecta
               </div>";
      }
      ?>
        <!-- /.content -->
      </div>

      <!-- /.content-wrapper -->

      <footer class="main-footer bg-dark">
        <?php include "includes/footer.php";?>
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