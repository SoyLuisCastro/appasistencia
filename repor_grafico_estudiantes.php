
<?php 
 require_once ("./conf/confconexion.php");
           session_start();
           $idrolUsuario=$_SESSION['idRolUsuario_S'];
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Reporte Estadistico Estudiantes |Grupo Intercom</title>
     <link rel="icon" href="img/logotipo_intercom.ico">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
   <?php include 'cargandop.php'; ?>
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
  if($idrolUsuario==1){
?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-chart-area"></i> Grafico Estadistico Estudiantes </h1>
                        
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
                          <h5 class="m-0 font-weight-bold text-info"> <i class="fas fa-fw fa-chart-area"></i> Reporte Estadistico Estudiantes</h5>
                                    
                                </div>
                                <!-- Card Body -->
                                <div class="card-body ">
                                    <canvas id="estudiante"></canvas> 
                                </div>
                            </div>
                        </div>
 
                        <!-- Pie Chart -->
                      
                    </div>

                    <!-- Content Row -->
                   

                </div>
                <!-- /.container-fluid -->
                          <?php 
    }else{
         echo "<div class='alert alert-danger' rol='alert'>No tienes permisos para acceder</div>";
    }
    ?>
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
<script src="js/chart.min.js"></script>
      <?php


  $sql_carreras="SELECT tb_carreras.descripcion AS Carreras,COUNT(*) AS cantidad FROM tb_estudiantes,tb_carreras
    WHERE tb_estudiantes.id_carreras = tb_carreras.id_carreras GROUP BY Carreras  ;";
                                    $result_carreras= mysqli_query($objConexion, $sql_carreras);
                                    foreach ($result_carreras as $data){
                                        $careras []= $data['Carreras'];
                                        $cantidad []= $data['cantidad'];
                                    }

                                    
                                    ?>
<script>
const ctx = document.getElementById('estudiante').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($careras) ?>,
        datasets: [{
            label: 'Cantidad De Estudiantes Registrados ',
            data: <?php echo json_encode($cantidad) ?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(255, 159, 64, 0.2)'
//                'rgba(153, 102, 255, 0.2)',
//                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(255, 159, 64, 1)'
//                'rgba(153, 102, 255, 1)',
//                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
 
</html>

