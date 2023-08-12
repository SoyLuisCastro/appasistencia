<?php
require_once '../conf/confconexion.php';//conexion a la base de datos
if($estadoconexion==0){
    echo "<div class='alert alert-danger' role='alert'>No se pudo conectar al servidor, favor comunicar a TICS</div>";
    exit();
}
$sql = "SELECT * FROM tb_carreras;";
$result = mysqli_query($objConexion, $sql);
session_start();
 $idrolUsuario=$_SESSION['idRolUsuario_S'];
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
         <?php 
             if($idrolUsuario==1||$idrolUsuario==3){
         ?>
        <div class="table-responsive">
     
        <table id="tablaListar" class="table table-striped table-bordered dataTable" style="width:100%" cellspacing="0" role="grid" aria-describedby="tablaListar_info">       
        

        <thead>
            <tr>
               
                <th>ID</th>
                <th>Descripcion</th>
                 <!--<th>telefono</th>-->
                <th>Siglas</th>

                       <th>Opc</th>
                
                <!--<th>Salary</th>-->
            </tr>
        </thead>
        
        
        <tfoot>
            <tr>
              
                   <th>ID</th>
                <th>Descripcion</th>
                 <!--<th>telefono</th>-->
                <th>Siglas</th>

                       <th>Opc</th>
                
                <!--<th>Salary</th>-->
            </tr>
        </tfoot>
        
         <tbody>
					<?php while($fila = $result->fetch_assoc()) { 
                                            
                                             
                                            
                                            
                                            ?>
                                                       
						<tr>
							
							<td><?php echo $fila['id_carreras']; ?></td>
							
                                                        <td><?php echo $fila['descripcion']; ?></td>
                                                        <td><?php echo $fila['siglas']; ?></td>
                                                        
                                                        <td> <button  class='btn btn-info' title='Editar Curso' onclick="editarcarrera(<?php echo $fila['id_carreras']?>)"><i class="fas fa-pencil-alt"></i></button>
                                                           
                                                            <button  class='btn btn-danger' title='Eliminar curso' onclick="eliminarcarrera(<?php echo $fila['id_carreras']?>)"><i class="fas fa-trash"></i></button>
                                                       
                                                                    
                                                        </td>
							<!--<td> </td>-->
						</tr>
					<?php } ?>
				</tbody>
        
    </table>
         </div>
      <?php }?>   
    </body>
</html>




