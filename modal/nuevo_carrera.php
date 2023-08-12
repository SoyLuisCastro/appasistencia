<?php
//Contiene las variables de configuracion para conectar a la base de datos
require_once ("../conf/confconexion.php");//Contiene funcion que conecta a la base de datos

$id=$_POST['id_p'];
if($id==0){
    $titulo="Nuevo carrera";
     $color='#E7B51A';
}
if($id>0){
     $color='#F4F11B';
    $titulo="Editar carrera";
    $sql="select * from tb_carreras where id_carreras=$id";
    $result= mysqli_query($objConexion, $sql);
    if($result!=null){
        if(mysqli_num_rows($result)>0){
            $usuarioA= mysqli_fetch_array($result);
            $descripcion=$usuarioA['descripcion'];
             $silgas=$usuarioA['siglas'];
            
     
          
             
           
             
          
        }else{
            echo "No se encontró registro con el código: ".$id;
            exit();
        }
    }else{
        echo "Ocurrió un problema al momento de ejecutar la consulta".mysqli_error_list();
        exit();
    }
}
?>
<script>
$(document).ready(function(){
    // capturar el valor del id que se recibe
    $('#IdUsuario').val(<?php echo $id; ?>);
     $('#guardar_estudiante').bind("submit", function (){
        //alert(123);
       $.ajax({
           type: $(this).attr("method"),
           url:'ajax/grabar_carrera.php',
           data:$(this).serialize(),
           success: function (data){
               $("#resultados_usuario").html(data);
               listar('ajax/listar_carrera.php');
           }
       }); 
       return false;
    });
});

</script>
<html>
<div class="modal fade" id="MyModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header"  style="background:<?php echo$color ?>;">
                
                <h5 class="modal-title" id="myModalLabel" style="color:#fff"><i class='fas fa-pencil-alt'></i> <?php echo $titulo; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
           <div class="modal-body">
                <form class="form-horizontal" method="post" id="guardar_estudiante" name="guardar_estudiante">
                     <div class="col-lg-12">
                    <div class="form-group">
                        <label for="Nombres_Apellidos" class="col-control-label font-weight-bold Negrita">Carrera</label>
                       
                        <input id="Nombres" name="descripcion_txt" class="form-control" value="<?php echo $descripcion; ?>" required placeholder="ingresa la descripcion "/>
                        </div>
                    </div>
                     <div class="col-lg-12">
                     <div class="form-group">
                        <label for="Cedula" class="col-control-label font-weight-bold Negrita"> Siglas</label>
                       
                        <input id="Nombres" name="siglas_txt" class="form-control" value="<?php echo  $silgas; ?>" required placeholder="ingrese las siglas"/>
                        </div>
                    </div>
                    
                   
                 
     
                     
                   
                    <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary" id="guardar_estudiante"><i class="glyphicon glyphicon-floppy-disk"></i> Guardar Datos</button>
            </div>
                     <div id="resultados_usuario"></div>
                     <input id="IdUsuario" name="IdUsuario" type="hidden">
                </form>
            </div>
            
        </div>
    </div>
</div>
</html>


