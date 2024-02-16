<?php
   include "../controllers/controller_consultas_backend.php";
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
            <h1 align="center"> █▓▒░⡷⠂ᴠɪᴘ⠐⢾░▒▓█ </h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->

    <?php

      $objDB = new ExtraerDatos();

      $prods = array();
      if(isset($_POST["txtBuscar"])){ //se filtro algo
         $prods = $objDB->busquedaVIP($_POST["txtBuscar"]); //filtramos coincidencia
      }else{
        $prods = $objDB->listadoVIP(); //traemos todo
      }

    ?>

    <section class="content">

        <!--ZONA ENCABEZADO DE IMPRESION SOLAMENTE-->
        <div class="row d-none d-print-block"><!-- fila contenedora -->
          <div class="col-md-12"> <!-- fin columna de contenido -->

            <div class="card">
              <!-- Para controles de formularios siempre usar etiqueta FORM -->
              <div class="card-body">
                <img src="../imgs/VIP.png" width="100%">
              </div> <!-- /.fin card-body -->
            </div>
          </div> <!--/ fin col -->
        </div><!-- ./ fin row -->

        <!--GUIA COMPONENTE CARD PARA AGRUPAR CONTENIDO -->

        <div class="row d-print-none">.<!--fila contenedora-->

         <div class="col-md-12"> <!-- fin columna de contenido -->

          <form name="frm_filtro" id="frm_filtro" method="POST" action="lista_VIP.php">
              <div class="card">

                  <div class="card-header bg-indigo">
                   <h3 class="card-title"> 𝘍𝘪𝘭𝘵𝘢𝘳 𝘝𝘐𝘗 </h3>
                 </div>
                 <!-- /. card-header-->

                 <!--Para controles de formularios siempre usar etiqueta FORM -->
                 <div class="card-body">
                    <label for="txtBuscar">𝘗𝘰𝘳 𝘝𝘐𝘗</label>
                    <div class="input-group input-group-sm">
                      <input type="text" id="txtBuscar" name="txtBuscar" class="form-control">
                      <span class="input-group-append">
                        <button type="submit" class="btn btn-warning">
                        <i class="fa-solid fa-magnifying-glass" style="color: #4a4e54;">
                        </i>𝘉𝘶𝘴𝘤𝘢𝘳</button>

                        <a href="lista_VIP.php" class="btn btn-danger">
                        <i class="fa-solid fa-clipboard"></i>
                        𝘝𝘦𝘳 𝘛𝘰𝘥𝘰𝘴</a>
                      </span>
                    </div>
                 </div> <!-- /. Fin card-body -->
              </div>
          </form>

         </div> <!-- -/ Fin col -->
         
        </div> <!-- -/Fin row-->

      <div class="row">
        <!-- COLUMNA DE TABLA DE DATOS  -->
        <div class="col-md-12"><!--  -->

          <div class="card">
              <div class="card-header bg-indigo">
                <h3 class="card-title">𝘓𝘐𝘚𝘛𝘈𝘚 𝘋𝘌 𝘜𝘚𝘜𝘈𝘙𝘐𝘖𝘚 𝘝𝘐𝘗</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <?php if($prods) //verifiva si hay registro de datos ?>
                  <a href="#" id="btn_print" class="btn btn-info btn-xs float-right d-print-none"><i class="fa fa-print"></i>Imprimir</a>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>𝘐𝘋</th>
                      <th>𝘊𝘰𝘳𝘳𝘦𝘰𝘌𝘭𝘦𝘤𝘵𝘳ó𝘯𝘪𝘤𝘰</th>
                      <th>𝘕𝘰𝘮𝘣𝘳𝘦</th>
                      <th>𝘋𝘪𝘴𝘤𝘰𝘳𝘥</th>
                      <th>𝘜𝘴𝘦𝘳 𝘔𝘵𝘢</th>
                      <th>𝘝𝘐𝘗</th>
                      <th>𝘔𝘦𝘵𝘰𝘥𝘰 𝘥𝘦 𝘗𝘢𝘨𝘰</th>
                      <th>📝 🗑️</th>
                    </tr>
                  </thead>
                 
                  <tbody>
                    <?php 
                    //RECORRIDO DE ELEMENTOS DE FORMA REPETITIVA
                    foreach ($prods as $row) {                                           
                    ?>

                    <tr>
                      <td><?php echo $row["id"]; ?></td>
                      <td><?php echo $row["correo"]; ?></td>
                      <td><?php echo $row["nombre"]; ?></td>
                      <td><?php echo $row["usuario"]; ?></td>
                      <td><?php echo $row["user_mta"]; ?></td>
                      <td><?php echo $row["vip"]; ?></td>
                      <td><?php echo $row["metodo_pago"]; ?></td>
                      <td>

                        <a href="Ver_VIP.php?id=<?php echo $row["id"]; ?>"  class="bnt btn-xs btn-success"><i class="fa-solid fa-eye"></i></a>

                        <a href="editar_VIP.php?id=<?php echo $row["id"]; ?>"  class="bnt btn-xs btn-warning"><i class="fa fa-edit"></i></a>

                        <a href="eliminar_VIP.php?id=<?php echo $row["id"]; ?>" class="bnt btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                          
                      </td>
                    </tr>
                    <?php 
                    }//FIN CICLO REPETITIVO DE DATOS
                    ?>  
                                    
                  </tbody>

                </table>
              
              </div>
              <!-- /.card-body -->
            </div>

        </div><!-- Fin contenido TABLA DE DATO -->
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

<script type="text/javascript">

  $("#btn_print").click(function(){ //Capturamos el click
    window.print();

  })
  
</script>
</body>
</html>