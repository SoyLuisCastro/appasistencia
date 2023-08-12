
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Reporte Asistencia por Estudiantes |El Laurel</title>
     <link rel="icon" href="img/logotipo_intercom.ico">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
   <?php 
   include 'cargandop.php'; 
   session_start();
    $idrolUsuario=$_SESSION['idRolUsuario_S'];
    require_once ("./conf/confconexion.php");
   ?>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

   <?php include 'menu.php'; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

               <?php include 'header.php';?>
                <!-- End of Topbar -->
<?php 
  if($idrolUsuario==1 || $idrolUsuario==3 ){
?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"> <i class="fas fa-fw fa-clipboard-check"></i> Reporte Asistencia por Pasantes </h1>
                        
                    </div>

                    <!-- Content Row -->
                    

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        
                    
                      <h5 class="m-0 font-weight-bold text-info"> <i class="fas fa-fw fa-file-pdf"></i> Reporte Asistencia por Pasantes</h5>

                             
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                      <div class="btn-group pull-left">
                           <label for="Jornadas" class="col-sm-3 control-label font-weight-bold Negrita">Nombres de Pasante </label>
                       <div class="col-sm-8">
                           
                         <select class="form-control" id="estudiante" name="txt_est" >
                            
                    
                             <option value="0">Selecionar......................</option>
                             <?php
                          
                              $sql_jornadas="select * from tb_estudiantes where estado=1;";  
                                $result_jornadas= mysqli_query($objConexion, $sql_jornadas);
                                while($jornadasA=mysqli_fetch_array($result_jornadas)){
                                    $DescripcionJornadas=$jornadasA['nombres_apellidos'];
                                    $idJornadas=$jornadasA['id_estudiantes'];
                                   
                                   
                                    ?>
                              
                                    <option value="<?php echo $idJornadas; ?>" <?php echo $seleccionaJornadas; ?> ><?php echo $DescripcionJornadas; ?></option>
                                    <?php
                                }////fin del while
                            ?>
                                   
                          </select>
                           
                        </div>
                           
                    </div>
                     <div class="btn-group pull-left">
                                <button type='button' class="btn btn-danger" data-toggle="modal" onclick="AsistenciaEstudiante();" ><span class="fas fa-fw fa-file-pdf"></span> Reporte Asistencia</button>
                            </div>
                                </div>
                            </div>
                        </div>
 
                        <!-- Pie Chart -->
                      
                    </div>

                    <!-- Content Row -->
                   

                </div>
                                             <?php 
    }else{
         echo "<div class='alert alert-danger' rol='alert'>No tienes permisos para acceder</div>";
    }
    ?>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

           <?php include 'fooder.php';?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <div id="show"></div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

   

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
  

</body>

</html>
<script type="text/javascript" src="js/VentanaCentrada.js"></script>
<script>
function AsistenciaEstudiante(){
   var idEstudiante=$('#estudiante').val();
    var parametro="Reporte_Asistencia";
    VentanaCentrada('./pdf/documentos/reporteasistenciaestudiante.php?idestudiante_p='+idEstudiante+'prueba_p='+parametro,'Reporte_Estudiante','','1024','768','true');
}
</script>