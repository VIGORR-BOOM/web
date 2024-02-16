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
              <h1 align="center"> █▓▒░⡷⠂ᴠɪᴘ⠐⢾░▒▓█ </h1>
            </div>
          </div>
          </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <?php
          if(isset($_GET["id"])){//URL PERFECTA

            $objDB = new ExtraerDatos();

            $pedido = array();
            $pedido = $objDB->editarVIP($_GET["id"]);

            if($pedido){//VERIFICA QUE LA INFORMACION EXISTE
        ?>

        <section class="content">
          <div class="row text-dark">
            <div class="col-md-12">

              <div class="card">
                <div class="card-header bg-indigo">
                  <h3 class="card-title">Confirmar para eliminación este pedido </h3>
                </div>
                  
                <?php
                  if(isset($_POST["txt_id"])){

                    $id = $_POST["txt_id"];

                    $objDBO = new DBConfig();
                    $objDBO->config();
                    $objDBO->conexion();

                    $ejecucion = $objDBO->Operaciones("DELETE FROM vip 
                                                       WHERE id=$id");

                    if($ejecucion)
                    {
                      echo "<div class='alert alert-success'>
                             Estes producto ha sido eliminado correctamente
                            </div>
                            <a href='lista_VIP.php' class='btn btn-default'>Ver Listado</a>";
                    }
                    else
                    {
                      echo "<div class='alert alert-danger'>
                               Ha ocurrido un error inexperado
                            </div>";
                    }

                    $objDBO->close();
                  }else{
                ?>

                <form role="form" id="frm_prods" name="frm_prods" method="POST" action="eliminar_VIP.php?id=<?php echo $_GET['id']; ?>" enctype="multipart/form-data">

                  <div class="card-body">
                       Usted va a Eliminar el Pedido con Nombre <b><?php echo $pedido[0]['nombre']; ?></b> ID <b><?php echo $pedido[0]['id']; ?></b><br>

                       Presione <b>Aceptar</b> para eliminar. <br><br>

                       <b>Importante</b>. Una vez eliminado no podra recuperarse.
                  </div>

                  <div class="card-footer">
                    <button type="submit" id="btn_Eliminar" class="btn btn-danger"><i class="nav-icon fas fa-trash"></i> Aceptar</button>
                    <a href="lista_VIP.php" class="btn btn-warning"><i class="nav-icon fas fa-ban"></i> Cancelar</a>
                  </div>

                  <input type="hidden" id="txt_id" name="txt_id" value="<?php echo $pedido[0]['id']; ?>">


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