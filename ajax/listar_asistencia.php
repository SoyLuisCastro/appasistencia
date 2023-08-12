<?php
require_once '../conf/confconexion.php';//conexion a la base de datos
if($estadoconexion==0){
    echo "<div class='alert alert-danger' role='alert'>No se pudo conectar al servidor, favor comunicar a TICS</div>";
    exit();
}
$fechaAactual=date('Y-m-d');
session_start();
   $cedulaUsuar= $_SESSION['cedulasuserio_s'];
      $idrolUsuario=$_SESSION['idRolUsuario_S'];
      if($idrolUsuario==2){
    $sql = "SELECT * FROM tb_estudiantes Where cedula=$cedulaUsuar;"; 
    $result = mysqli_query($objConexion, $sql);
    while ($rowx = $result->fetch_assoc()) {
       echo $id_asitencia=$rowx['id_estudiantes'];
    }

}
if($idrolUsuario==1 || $idrolUsuario==3){
   $sql = "SELECT * FROM tb_asistencia ORDER BY id_asistencia desc;";
$result = mysqli_query($objConexion, $sql); 
}
if($idrolUsuario==2){
  
   $sql = "SELECT * FROM tb_asistencia where id_estudiantes=$id_asitencia;";
$result = mysqli_query($objConexion, $sql); 
}
?>
<html>
    <head>
        <meta charset="UTF-8">
       <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css"/>
        <script type="text/javascript" src="datatables/datatables.min.js"></script>   
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">       

    </head>
    
    <script>
    $(document).ready(function() {    
    $('#tablaListar').DataTable({
    //para cambiar el lenguaje a español
        "language": {
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast":"Último",
                    "sNext":"Siguiente",
                    "sPrevious": "Anterior"
			     },
			     "sProcessing":"Procesando...",
            }
    });     
});
    </script>
    <body>
        <div class="">
         <!--<div class="col-lg-12">-->
                    <div class="table-responsive">  
        
        <table id="tablaListar" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
               <th>Estudiante</th>
                <!--<th>cedula</th>-->
                 <th>Jornada</th>
                <th>Carrera</th>
             
                    <!--<th>Lugar Asignacion</th>-->
              
                      <th>Fecha</th>
                      <th>hora_entrada</th>
                      <th>hora_salida</th>
                      <th>emergencia</th>
                      
                      <th>Estado</th>
                       <th>Opciones</th>
                
                <!--<th>Salary</th>-->
            </tr>
        </thead>
        
        
        <tfoot>
            <tr>
                <th>ID</th>
             <th>Estudiante</th>
                <!--<th>cedula</th>-->
                 <th>Jornada</th>
                <th>Carrera</th>
             
                    <!--<th>Lugar Asignacion</th>-->
              
                      <th>Fecha</th>
                      <th>hora_entrada</th>
                      <th>hora_salida</th>
                      <th>emergencia</th>
                      
                      <th>Estado</th>
                       <th>Opciones</th>
            </tr>
        </tfoot>
        
         <tbody>
					<?php  while ($fila = $result->fetch_assoc()) { 
                                            
                                             if($fila['estado'] == '1'){
                                                 $estado = "ACTIVO";
                                                    $class = " btn btn-success";
                                            }elseif ($fila['estado'] == '0') {
        
    
                                                    $estado = "INACTIVO";
                                                      $class = " btn btn-warning";    
                                                    } else {
                                                        $estado = "FINALIZO";
                                                      $class = " btn btn-info";
                                                    }
                     
                                            
                                            
                                            ?>
                                         
						<tr>
                                                    <td><?php echo $fila['id_asistencia']; ?></td>
                                                    <?php
                                                              $idcarreras=$fila['id_estudiantes'];
                                                             $sqlCarreras="select * from tb_estudiantes where id_estudiantes=$idcarreras;";
                                                                $resultCarreras= mysqli_query($objConexion, $sqlCarreras);
                                                                    $CarrerasArray= mysqli_fetch_array($resultCarreras);
                                                                    $DescripcionCarreras=$CarrerasArray['nombres_apellidos'];
                                                                         ?>
                                                           <td><?php echo $DescripcionCarreras?></td>
                                                        
                                                
                                                     
                                                        <?php
                                                              $idjornadas=$fila['id_jornada2'];
                                                             $sqlJornadas="select * from tb_jornada2 where id_jornada2=$idjornadas;";
                                                                $resultJornadas= mysqli_query($objConexion, $sqlJornadas);
                                                                    $JornadasArray= mysqli_fetch_array($resultJornadas);
                                                                    $DescripcionJornadas=$JornadasArray['descripcion'];
                                                                         ?>
                                                                    <td><?php echo $DescripcionJornadas?></td>          
                                                            <?php
                                                              $idcarreras=$fila['id_carreras'];
                                                             $sqlCarreras="select * from tb_carreras where id_carreras=$idcarreras;";
                                                                $resultCarreras= mysqli_query($objConexion, $sqlCarreras);
                                                                    $CarrerasArray= mysqli_fetch_array($resultCarreras);
                                                                    $DescripcionCarreras=$CarrerasArray['descripcion'];
                                                                         ?>
                                                                    <td><?php echo $DescripcionCarreras?></td>
                                                        
                                                        
                                                                 
                                                                    
                                                         <td><?php echo $fila['fecha']; ?></td>
                                                        <td><?php echo $fila['hora_entrada']; ?></td>
                                                        <td><?php echo $fila['hora_salida']; ?></td>
                                                        <td><?php echo $fila['emergencia']; ?></td>
                                                        
                                                       
							<td><span class="label label-<?php echo $class; ?>"><?php echo $estado?></span></td>
                                                        <td>
                                                            <?php 
                                                            if($fila['fecha']==$fechaAactual && $idrolUsuario==2){
                                                            
                                                           
                                                            ?>
                                                            <button  class='btn btn-info' title='Editar Aaistencia' onclick="editarAsignacion(<?php echo $fila['id_asistencia']?>)"><i class="fas fa-pencil-alt"></i> R.salida</button>
              
                                                            <?php 
                                                             }
                                                            if($idrolUsuario==1){
                                                                
                                                         
                                                            ?>
                                                             <button  class='btn btn-info' title='Editar Aaistencia' onclick="editarAsignacion(<?php echo $fila['id_asistencia']?>)"><i class="fas fa-pencil-alt"></i> R.salida</button>
                                                            <button  class='btn btn-danger' title='Eliminar Asignacion' onclick="eliminarAsignacion(<?php echo $fila['id_asistencia']?>)"><i class="fas fa-trash"></i></button>
                                                       
                                                        
                                                        </td>
							<!--<td> </td>-->
						</tr>
					 <?php 
                                            }
                                                            }
                                         ?> 
				</tbody>
        
    </table>
                
         </div>
        </div>
        <!--</div>-->        
    </body>
</html>



