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
            <h1 align="center"> █▓▒░⡷⠂ᴠɪᴘ⠐⢾░▒▓█ </h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <?php
      if(isset($_GET["id"])){//URL PERFECTA

        $objDB = new ExtraerDatos();

        $tvip = array();
        $tvip = $objDB->editarVIP($_GET["id"]);

        if($tvip){//VERIFICA QUE LA INFORMACION EXISTE

    ?>


    <section class="content">
      <div class="row">
      <!-- COLUMNA DE FORMULARIO  -->
        <div class="col-md-12"><!-- columna de contenido -->
          
          
            <!-- /.card-header -->
            <div class="card">
            <div class="card-header bg-indigo">
              <h3 class="card-title">𝘊𝘖𝘔𝘗𝘓𝘌𝘛𝘈 𝘌𝘓 𝘊𝘈𝘔𝘗𝘖 𝘋𝘌 𝘜𝘚𝘜𝘈𝘙𝘐𝘖 𝘝𝘐𝘗 𝘗𝘈𝘙𝘈 𝘝𝘌𝘙𝘐𝘍𝘐𝘊𝘈𝘙 𝘌𝘓 𝘝𝘐𝘗</h3>
            </div>
            <!-- Para controles de formularios siempre usar etiqueta FORM -->
            <?php
                if (isset($_POST["txt_Nombr"])){

                  $id = $_POST["txt_id"];
                  $corre = $_POST["txt_Corre"];
                  $nombr = $_POST["txt_Nombr"];
                  $user = $_POST["txt_User"];
                  $mta = $_POST["txt_Mta"];
                  $vip = $_POST["lst_vip"];
                  $tp = $_POST["lst_Tp"];
                  $metod= $_POST["lst_Metod"];
                  $refer = $_POST["txt_Refer"];
                  $docruta = $_POST["txt_foto"];
                  $fecin = $_POST["txt_Fecin"];
                  $fecci = $_POST["txt_FecCi"];
                  $verif = $_POST["lst_Verif"];
                  $evip = $_POST["lst_Evip"];

                  //Verificamos que el usuario haya seleccionado archivos y se procede a subir al servidor y elazarlo a la base de datos    
                    $ext =""; $msgfile = ""; $logError="";
                    
                    if(isset($_FILES["txt_SCP"]['name']) && $_FILES["txt_SCP"]['name']!=null )
                    {           
                      $extens = array('.jpeg'=>'JPEG','.JPEG'=>'JPEG','.jpg' => 'JPG', '.png' => 'PNG', '.JPG' => 'JPG', '.PNG' => 'PNG');
                      $ext = strrchr(basename($_FILES["txt_SCP"]['name']),".");
                      
                      if($extens[$ext])
                      {            
                        if($_FILES["txt_SCP"]['error'] == UPLOAD_ERR_OK ) //Si el archivo se paso correctamente Continuamos 
                        {
                          $docruta = "imgs/Comprobante_Pago/";
                          $postname = date("Y").date("m").date("d")."_".date("H").date("i");
                          $fullname = explode(".",basename($_FILES["txt_SCP"]['name'])); // variabe temporal para sacar el nombre y separarlo de la extension
                          $NombreOriginal = $fullname[0];//Obtenemos el nombre original del archivo
                          $temporal = $_FILES["txt_SCP"]['tmp_name']; //Obtenemos la ruta Original del archivo
                          $Destino = "../".$docruta.$NombreOriginal."_".$postname.$ext; //Creamos una ruta de destino con la variable ruta y el nombre original del archivo 
                          $docruta = $docruta.$NombreOriginal."_".$postname.$ext; //Esto se guarda en el campo imagend e la base de dato
                        
                          if(copy($temporal, $Destino)) //Movemos el archivo temporal a la ruta especificada   
                          {            
                            $msgfile = "Imagen subida.";
                          }
                          else
                          {
                            $msgfile .= "<span class='label label-danger'>la imagen del Producto .</span>";
                            $logError = "No se pudo subir la imagen del Producto, puede ser por tamaño. \n";
                          }  
                        }
                        else
                        {
                          $msgfile .= "<span class='label label-danger'>Error al transferirse el archivo.</span> ";
                        }

                      }
                      else
                      {
                        $msgfile .= "<span class='label label-danger'><i class='fa fa-file-o'></i> Por seguridad se bloqueo el envío del archivo con extension no permitida [$ext].</span>"  ;  
                        $logError .="Por seguridad se bloqueo el envío del archivo con extension no permitida [$ext]. \n";
                      } 
                    }//Fin de código 


                  $objDBO = new DBConfig();
                  $objDBO->config();
                  $objDBO->conexion();

                  $ejecucion = $objDBO->Operaciones("UPDATE vip SET correo='$corre', nombre='$nombr',usuario='$user', user_mta='$mta', vip='$vip', total_pagar='$tp', metodo_pago='$metod', numero_referencia='$refer', comprobante_pago='$docruta', fecha_inicio='$fecin', fecha_cierre='$fecci', verificar='$verif', estado_vip='$evip' WHERE id=$id ");

                  if($ejecucion){
                    echo "<div class='alert alert-success'>
                           Producto ha sido creado correctamente
                          </div>";

                  }else{
                    echo "<div class='alert alert-danger'>
                            Ho ocurrido un error inexperado
                          </div>";
                  }
                }
            ?>

            <form role="form" name="frm_prods" id="frm_prods" method="POST" action="editar_VIP.php?id=<?php echo $_GET['id']; ?>" enctype="multipart/form-data">
              <div class="card-body">

                <div class="row">

                  <!-- Correo electrónico -->
                  <div class="col-md-4 col-sm-4 col-12">
                    <div class="form-group">
                      <label for="txt_Corre">𝘊𝘰𝘳𝘳𝘦𝘰</label>
                      <input type="text" class="form-control" id="txt_Corre" name="txt_Corre" placeholder="𝘊𝘰𝘳𝘳𝘦𝘰 𝘦𝘭𝘦𝘤𝘵𝘳ó𝘯𝘪𝘤𝘰" value="<?php echo $tvip[0]['correo']; ?>">
                    </div> 
                  </div>

                  <!-- Nombre y Apellido -->
                  <div class="col-md-4 col-sm-4 col-12">
                    <div class="form-group">
                      <label for="txt_Nombr">𝘕𝘰𝘮𝘣𝘳𝘦</label>
                      <input type="text" class="form-control" id="txt_Nombr" name="txt_Nombr" placeholder="𝘕𝘰𝘮𝘣𝘳𝘦 𝘊𝘰𝘮𝘱𝘭𝘦𝘵𝘰" value="<?php echo $tvip[0]['nombre']; ?>">
                    </div> 
                  </div>


                  <!-- Teléfono -->
                  <div class="col-md-4 col-sm-4 col-12">
                    <div class="form-group">
                      <label for="txt_User">𝘜𝘴𝘶𝘢𝘳𝘪𝘰</label>
                      <input type="text" class="form-control" id="txt_User" name="txt_User" placeholder="𝘜𝘴𝘶𝘢𝘳𝘪𝘰 𝘋𝘪𝘴𝘤𝘰𝘳𝘥" value="<?php echo $tvip[0]['usuario']; ?>">
                    </div> 
                  </div>

                  <!-- Teléfono -->
                  <div class="col-md-4 col-sm-4 col-12">
                    <div class="form-group">
                      <label for="txt_Mta">𝘜𝘴𝘶𝘢𝘳𝘪𝘰 𝘔𝘛𝘈</label>
                      <input type="text" class="form-control" id="txt_Mta" name="txt_Mta" placeholder="𝘜𝘴𝘶𝘢𝘳𝘪𝘰 𝘔𝘛𝘈" value="<?php echo $tvip[0]['user_mta']; ?>">
                    </div> 
                  </div>

                  <!-- Metodo de Pago -->
                  <div class="col-md-4 col-sm-4 col-12">
                    <div class="form-group">
                      <label> 𝘝𝘐𝘗 </label>
                      <select class="form-control" name="lst_vip" id="lst_vip">
                        <option value="" hidden><?php echo $tvip[0]['vip']; ?></option>
                        <option value="𝘉𝘳𝘰𝘯𝘤𝘦">𝘉𝘳𝘰𝘯𝘤𝘦</option>
                        <option value="𝘗𝘭𝘢𝘵𝘢">𝘗𝘭𝘢𝘵𝘢</option>
                        <option value="𝘖𝘳𝘰">𝘖𝘳𝘰</option>
                        <option value="𝘗𝘭𝘢𝘵𝘪𝘯𝘰">𝘗𝘭𝘢𝘵𝘪𝘯𝘰</option>
                        <option value="𝘋𝘪𝘢𝘮𝘢𝘯𝘵𝘦">𝘋𝘪𝘢𝘮𝘢𝘯𝘵𝘦</option>
                      </select>
                    </div> 
                  </div>

                  <!-- Metodo de Pago -->
                  <div class="col-md-4 col-sm-4 col-12">
                    <div class="form-group">
                      <label> 𝘛𝘰𝘵𝘢𝘭 𝘢 𝘗𝘢𝘨𝘢𝘳 𝘥𝘦𝘭 𝘝𝘐𝘗 </label>
                      <select class="form-control" name="lst_Tp" id="lst_Tp">
                        <option value="" hidden><?php echo $tvip[0]['total_pagar']; ?></option>
                        <option value="𝘉 10.000 MIL">𝘉 10.000 MIL</option>
                        <option value="𝘗 15.000 MIL">𝘗 15.000 MIL</option>
                        <option value="𝘖 20.000 MIL">𝘖 20.000 MIL</option>
                        <option value="𝘗 25.000 MIL">𝘗 25.000 MIL</option>
                        <option value="𝘋 30.000 MIL">𝘋 30.000 MIL</option>
                      </select>
                    </div> 
                  </div>

                  <!-- Metodo de Pago -->
                  <div class="col-md-4 col-sm-4 col-12">
                    <div class="form-group">
                      <label>𝘔𝘦𝘵𝘰𝘥𝘰 𝘥𝘦 𝘗𝘢𝘨𝘰</label>
                      <select class="form-control" name="lst_Metod" id="lst_Metod">
                        <option value="" hidden ><?php echo $tvip[0]['metodo_pago']; ?></option>
                        <option value="𝘕𝘦𝘲𝘶𝘪">𝘕𝘦𝘲𝘶𝘪</option>
                        <option value="𝘋𝘢𝘷𝘪𝘱𝘭𝘢𝘵𝘢">𝘋𝘢𝘷𝘪𝘱𝘭𝘢𝘵𝘢</option>
                        <option value="𝘗𝘢𝘺𝘱𝘢𝘭">𝘗𝘢𝘺𝘱𝘢𝘭</option>
                      </select>
                    </div> 
                  </div>

                  <!-- Numero de Referencia de Pago -->
                  <div class="col-md-4 col-sm-4 col-12">
                    <div class="form-group">
                      <label for="txt_Refer"> 𝘕𝘶𝘮𝘦𝘳𝘰 𝘥𝘦 𝘙𝘦𝘧𝘦𝘳𝘦𝘯𝘤𝘪𝘢 𝘥𝘦 𝘗𝘢𝘨𝘰 </label>
                      <input type="text" class="form-control" id="txt_Refer" name="txt_Refer" placeholder="𝘕𝘶𝘮𝘦𝘳𝘰 𝘥𝘦 𝘙𝘦𝘧𝘦𝘳𝘦𝘯𝘤𝘪𝘢" value="<?php echo $tvip[0]['numero_referencia']; ?>">
                    </div> 
                  </div>

                  <!-- Comprobante de Pago -->                
                  <div class="col-md-4 col-sm-4 col-12">
                      <img src="../<?php echo $tvip[0]['comprobante_pago']; ?>" width="100">
                    <div class="form-group">
                      <label for="txt_SCP">𝘊𝘰𝘮𝘱𝘳𝘰𝘣𝘢𝘯𝘵𝘦 𝘥𝘦 𝘗𝘢𝘨𝘰</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="txt_SCP" name="txt_SCP" accept=".png, .jpg" required>
                          <label class="custom-file-label" for="txt_SCP">𝘚𝘶𝘣𝘪𝘳 𝘦𝘭 𝘊𝘰𝘮𝘱𝘳𝘰𝘣𝘢𝘯𝘵𝘦 𝘥𝘦 𝘗𝘢𝘨𝘰</label>
                        </div>                    
                      </div>
                    </div>
                  </div>

                  <!-- 𝘍𝘦𝘤𝘩𝘢 𝘥𝘦 𝘐𝘯𝘪𝘤𝘪𝘰 -->
                  <div class="col-md-4 col-sm-4 col-12">
                    <div class="form-group">
                      <label for="txt_FecAp">𝘍𝘦𝘤𝘩𝘢 𝘥𝘦 𝘐𝘯𝘪𝘤𝘪𝘰</label>
                      <input type="date" class="form-control" id="txt_FecAp" name="txt_Fecin" placeholder="𝘍𝘦𝘤𝘩𝘢 𝘥𝘦 𝘐𝘯𝘪𝘤𝘪𝘰" value="<?php echo $tvip[0]['fecha_inicio']; ?>">
                    </div> 
                  </div>

                  <!-- 𝘍𝘦𝘤𝘩𝘢 𝘥𝘦 𝘊𝘪𝘦𝘳𝘳𝘦 -->
                  <div class="col-md-4 col-sm-4 col-12">
                    <div class="form-group">
                      <label for="txt_FecCi">𝘍𝘦𝘤𝘩𝘢 𝘥𝘦 𝘊𝘪𝘦𝘳𝘳𝘦</label>
                      <input type="date" class="form-control" id="txt_FecCi" name="txt_FecCi" placeholder="𝘍𝘦𝘤𝘩𝘢 𝘥𝘦 𝘊𝘪𝘦𝘳𝘳𝘦" value="<?php echo $tvip[0]['fecha_cierre']; ?>">
                    </div> 
                  </div>

                  <!-- 𝘝𝘦𝘳𝘪𝘧𝘪𝘤𝘢𝘳 𝘛𝘳𝘢𝘯𝘴𝘢𝘤𝘤𝘪ó𝘯 -->
                  <div class="col-md-4 col-sm-4 col-12">
                    <div class="form-group">
                      <label>𝘝𝘦𝘳𝘪𝘧𝘪𝘤𝘢𝘳 𝘛𝘳𝘢𝘯𝘴𝘢𝘤𝘤𝘪ó𝘯</label>
                      <select class="form-control" name="lst_Verif" id="lst_Verif">
                        <option value=""hidden ><?php echo $tvip[0]['verificar']; ?></option>
                        <option value="𝘗𝘢𝘨𝘰 𝘙𝘦𝘤𝘩𝘢𝘻𝘢𝘥𝘰">𝘗𝘢𝘨𝘰 𝘙𝘦𝘤𝘩𝘢𝘻𝘢𝘥𝘰</option>
                        <option value="𝘗𝘢𝘨𝘰 𝘌𝘹𝘪𝘵𝘰𝘴𝘢">𝘗𝘢𝘨𝘰 𝘌𝘹𝘪𝘵𝘰𝘴𝘢</option>
                      </select>
                    </div> 
                  </div>

                  <!-- 𝘌𝘴𝘵𝘢𝘥𝘰 𝘥𝘦 𝘝𝘐𝘗 -->
                  <div class="col-md-12 col-sm-12 col-12">
                    <div class="form-group">
                      <label>𝘌𝘴𝘵𝘢𝘥𝘰 𝘥𝘦 𝘝𝘐𝘗</label>
                      <select class="form-control" name="lst_Evip" id="lst_Evip">
                        <option value="" hidden><?php echo $tvip[0]['estado_vip']; ?></option>
                        <option value="𝘗𝘳𝘰𝘤𝘦𝘴𝘰">𝘗𝘳𝘰𝘤𝘦𝘴𝘰</option>
                        <option value="𝘌𝘴𝘱𝘦𝘳𝘢𝘯𝘥𝘰 𝘦𝘯𝘵𝘳𝘦𝘨𝘢">𝘌𝘴𝘱𝘦𝘳𝘢𝘯𝘥𝘰 𝘦𝘯𝘵𝘳𝘦𝘨𝘢</option>
                        <option value="𝘌𝘯𝘵𝘳𝘦𝘨𝘢𝘥𝘰">𝘌𝘯𝘵𝘳𝘦𝘨𝘢𝘥𝘰</option>
                      </select>
                    </div> 
                  </div>  

              </div>  <!-- /.fin row -->   
                
            </div>  <!-- /.fin card-body -->

              <div class="card-footer" align="center">
                
                <button type="submit" id="btn_actulizar" class="btn btn-warning">
                                 <i class="nav-icon fas fa-solid fa-sd-card"></i>
                                                        Guardar Cambios </button>

                <a href="lista_VIP.php" class="btn btn-info">
                       <i class="nav-icon fas a-solid fa-clipboard"></i> 
                                                          Ver Listas</a>

              </div>

              <input type="hidden" name="txt_id" id="txt_id" value="<?php echo $tvip[0]['id']; ?>">

              <input type="hidden" name="txt_foto" id="txt_foto" value="<?php echo $tvip[0]['comprobante_pago']; ?>">

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