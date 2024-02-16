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
            <h1 align="center"> █▓▒░⡷⠂𝘍𝘈𝘊𝘊𝘐𝘖𝘕𝘌𝘚⠐⢾░▒▓█ </h1>
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
      <div class="row">
      <!-- COLUMNA DE FORMULARIO  -->
        <div class="col-md-12"><!-- columna de contenido -->
          
          
            <!-- /.card-header -->
            <div class="card">
            <div class="card-header bg-indigo">
              <h3 class="card-title">𝘌𝘋𝘐𝘛𝘈𝘙 𝘓𝘐𝘚𝘛𝘈 𝘋𝘌 𝘜𝘚𝘜𝘈𝘙𝘐𝘖𝘚 𝘍𝘈𝘊𝘊𝘐𝘖𝘕𝘌𝘚</h3>
            </div>
            <!-- Para controles de formularios siempre usar etiqueta FORM -->
            <?php
                if (isset($_POST["txt_Corre"])) {

                  $id = $_POST["txt_id"];
                  $corre = $_POST["txt_Corre"];
                  $nombr = $_POST["txt_Nombr"];
                  $user = $_POST["txt_User"];
                  $umta = $_POST["txt_Mta"];
                  $cargo = $_POST["lst_Cargo"];
                  $estad = $_POST["lst_Estad"];

                  $objDBO = new DBConfig();
                  $objDBO->config();
                  $objDBO->conexion();

                  $ejecucion = $objDBO->Operaciones("UPDATE facciones SET correo='$corre',nombre='$nombr',usuario='$user',user_mta='$umta',cargos='$cargo',estado_actual='$estad' WHERE id=$id ");

                  if($ejecucion){
                    echo "<div class='alert alert-success'>
                           𝘌𝘴𝘵𝘦 𝘶𝘴𝘶𝘢𝘳𝘪𝘰 𝘩𝘢 𝘴𝘪𝘥𝘰 𝘦𝘥𝘪𝘵𝘢𝘥𝘰 𝘤𝘰𝘳𝘳𝘦𝘤𝘵𝘢𝘮𝘦𝘯𝘵𝘦
                          </div>";

                  }else{
                    echo "<div class='alert alert-danger'>
                            𝘏𝘰 𝘰𝘤𝘶𝘳𝘳𝘪𝘥𝘰 𝘶𝘯 𝘦𝘳𝘳𝘰𝘳 𝘪𝘯𝘦𝘹𝘱𝘦𝘳𝘢𝘥𝘰
                          </div>";
                  }
                }
            ?>

            <form role="form" name="frm_prods" id="frm_prods" method="POST" action="editar_facciones.php?id=<?php echo $_GET['id']; ?>" enctype="multipart/form-data">
              <div class="card-body">

                <div class="row">

                 <!-- Correo electrónico -->
                  <div class="col-md-4 col-sm-4 col-12">
                    <div class="form-group">
                      <label for="txt_Corre">𝘊𝘰𝘳𝘳𝘦𝘰</label>
                      <input type="text" class="form-control" id="txt_Corre" name="txt_Corre" placeholder="𝘊𝘰𝘳𝘳𝘦𝘰 𝘦𝘭𝘦𝘤𝘵𝘳ó𝘯𝘪𝘤𝘰" value="<?php echo $facciones[0]['correo']; ?>">
                    </div> 
                  </div>

                  <!-- Nombre y Apellido -->
                  <div class="col-md-4 col-sm-4 col-12">
                    <div class="form-group">
                      <label for="txt_Nombr">𝘕𝘰𝘮𝘣𝘳𝘦</label>
                      <input type="text" class="form-control" id="txt_Nombr" name="txt_Nombr" placeholder="𝘕𝘰𝘮𝘣𝘳𝘦 𝘊𝘰𝘮𝘱𝘭𝘦𝘵𝘰" value="<?php echo $facciones[0]['nombre']; ?>">
                    </div> 
                  </div>


                  <!-- Teléfono -->
                  <div class="col-md-4 col-sm-4 col-12">
                    <div class="form-group">
                      <label for="txt_User">𝘜𝘴𝘶𝘢𝘳𝘪𝘰</label>
                      <input type="text" class="form-control" id="txt_User" name="txt_User" placeholder="𝘜𝘴𝘶𝘢𝘳𝘪𝘰 𝘋𝘪𝘴𝘤𝘰𝘳𝘥" value="<?php echo $facciones[0]['usuario']; ?>">
                    </div> 
                  </div>

                  <!-- Teléfono -->
                  <div class="col-md-4 col-sm-4 col-12">
                    <div class="form-group">
                      <label for="txt_Mta">𝘜𝘴𝘶𝘢𝘳𝘪𝘰 𝘔𝘛𝘈</label>
                      <input type="text" class="form-control" id="txt_Mta" name="txt_Mta" placeholder="𝘜𝘴𝘶𝘢𝘳𝘪𝘰 𝘔𝘛𝘈" value="<?php echo $facciones[0]['user_mta']; ?>">
                    </div> 
                  </div>

                  <!-- Metodo de Pago -->
                  <div class="col-md-4 col-sm-4 col-12">
                    <div class="form-group">
                      <label>𝘊𝘢𝘳𝘨𝘰𝘴</label>
                      <select class="form-control" name="lst_Cargo" id="lst_Cargo">
                        <option value="" hidden><?php echo $facciones[0]['cargos']; ?></option>
                        <option value="𝘓𝘪𝘥𝘦𝘳 𝘗𝘰𝘭𝘪𝘤𝘪𝘢">𝘓𝘪𝘥𝘦𝘳 𝘗𝘰𝘭𝘪𝘤𝘪𝘢</option>
                        <option value="𝘓𝘪𝘥𝘦𝘳 𝘌𝘔𝘚">𝘓𝘪𝘥𝘦𝘳 𝘌𝘔𝘚</option>
                        <option value="𝘓𝘪𝘥𝘦𝘳 𝘔𝘦𝘤𝘢𝘯𝘪𝘤𝘰">𝘓𝘪𝘥𝘦𝘳 𝘔𝘦𝘤𝘢𝘯𝘪𝘤𝘰</option>
                        <option value="𝘗𝘰𝘭𝘪𝘤𝘪𝘢">𝘗𝘰𝘭𝘪𝘤𝘪𝘢</option>
                        <option value="𝘌𝘔𝘚">𝘌𝘔𝘚</option>
                        <option value="𝘔𝘦𝘤𝘢𝘯𝘪𝘤𝘰">𝘔𝘦𝘤𝘢𝘯𝘪𝘤𝘰</option>
                      </select>
                    </div> 
                  </div>

                  <!-- Metodo de Pago -->
                  <div class="col-md-4 col-sm-4 col-12">
                    <div class="form-group">
                      <label>𝘌𝘴𝘵𝘢𝘥𝘰 𝘢𝘤𝘵𝘶𝘢𝘭</label>
                      <select class="form-control" name="lst_Estad" id="lst_Estad">
                        <option value="" hidden><?php echo $facciones[0]['estado_actual']; ?></option>
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
                
                <button type="submit" id="btn_actulizar" class="btn btn-warning">
                                 <i class="nav-icon fas fa-solid fa-sd-card"></i>
                                                        𝘎𝘶𝘢𝘳𝘥𝘢𝘳 𝘊𝘢𝘮𝘣𝘪𝘰𝘴 </button>

                <a href="lista_facciones.php" class="btn btn-info">
                       <i class="nav-icon fas a-solid fa-clipboard"></i> 
                                                          𝘝𝘦𝘳 𝘓𝘪𝘴𝘵𝘢𝘴</a>

              </div>

              <input type="hidden" name="txt_id" id="txt_id" value="<?php echo $facciones[0]['id']; ?>">

            </form> <!-- /.fin Form -->

          </div>

        </div><!-- Fin contenido formulario -->

          

    </div>


    </section>

    <?php
      }else{//en caso la URL tiene un valor incorrecto
            echo"<div class='alert alert-danger'>
                      <b> ❎👇 Esta ID 👇❎ </b><br>
                          Información no existe en base de datos
                 </div>";
      }
    ?>

    <?php
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