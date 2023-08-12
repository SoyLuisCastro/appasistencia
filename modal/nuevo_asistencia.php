<?php
//Contiene las variables de configuracion para conectar a la base de datos
require_once ("../conf/confconexion.php");//Contiene funcion que conecta a la base de datos
session_start();
  $cedulaUsuar= $_SESSION['cedulasuserio_s'];
      $idrolUsuario=$_SESSION['idRolUsuario_S'];
$id=$_POST['id_p'];
if($id==0){
    $titulo="Registrar hora Entrada";
     $color='#E7B51A';
}
if($id>0){
     $color='#F4F11B';
    $titulo="Registrar hora de entrada o emergencia";
    $sql="select * from tb_asistencia where id_asistencia=$id";
    $result= mysqli_query($objConexion, $sql);
    if($result!=null){
        if(mysqli_num_rows($result)>0){
            $usuarioA= mysqli_fetch_array($result);
         
            $estudiante=$usuarioA['id_estudiantes'];
           
             $jornada=$usuarioA['id_jornada2'];
             $Carrera=$usuarioA['id_carreras'];
           
             
          
            $Estado=$usuarioA['estado'];
            if($Estado=='1'){
                $seleccionaA="selected";
//                $seleccionaI="";
            }
              elseif($Estado=='0'){
                $seleccionaI="selected";
//                $seleccionaA="";
            }
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
           url:'ajax/grabar_asistencia.php',
           data:$(this).serialize(),
           success: function (data){
               $("#resultados_usuario").html(data);
               listar('ajax/listar_asistencia.php');
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
                <strong><h5 class="modal-title" id="myModalLabel" style="color:#fff"><i class='fas fa-pencil-alt'></i> <?php echo $titulo; ?></h5></strong>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                
            </div>
           <div class="modal-body">
                <form  class="form-horizontal" method="post" id="guardar_estudiante" name="guardar_estudiante">
                   
                      <div class="col-lg-12">
                    <div class="form-group">
                        <label for="Jornadas" class="col-control-label font-weight-bold Negrita">Nombres de Estudiantes </label>
                     
                           
                         <select class="form-control" id="estudiante" name="txt_est" >
                            
                    
                             <option value="0">Selecionar......................</option>
                             <?php
                            if($idrolUsuario==1){
                              $sql_jornadas="select * from tb_estudiantes where estado=1;";  
                            }
                            if($idrolUsuario==2){
                               $sql_jornadas="select * from tb_estudiantes where cedula=$cedulaUsuar"; 
                            }
                                
                                $result_jornadas= mysqli_query($objConexion, $sql_jornadas);
                                while($jornadasA=mysqli_fetch_array($result_jornadas)){
                                    $DescripcionJornadas=$jornadasA['nombres_apellidos'];
                                    $idJornadas=$jornadasA['id_estudiantes'];
                                   $seleccionaJornadas='';
                                    if($idJornadas==$estudiante){
                                        $seleccionaJornadas='selected';
                                    }
                                   
                                    ?>
                              
                                    <option value="<?php echo $idJornadas; ?>" <?php echo $seleccionaJornadas; ?> ><?php echo $DescripcionJornadas; ?></option>
                                    <?php
                                }////fin del while
                            ?>
                                   
                          </select>
                           
                        </div>
                        
                        
      
               
                         </div>
                       <div class="col-lg-12">
                     <div class="form-group">
                        <label for="Jornada" class="col-control-label font-weight-bold Negrita">Jornada</label>
                     
                         <select class="form-control" id="jornadas" name="Jornadas_txt" required>
                               <option value="0">Selecionar......................</option>
                            <?php
                                $sql_jornadas="select * from tb_jornada2;";
                                $result_jornadas= mysqli_query($objConexion, $sql_jornadas);
                                while($jornadasA=mysqli_fetch_array($result_jornadas)){
                                    $DescripcionJornadas=$jornadasA['descripcion'];
                                    $idJornadas=$jornadasA['id_jornada2'];
                                    $seleccionaJornadas='';
                                    if($idJornadas==$jornada){
                                        $seleccionaJornadas='selected';
                                    }
                                    ?>
                                    <option value="<?php echo $idJornadas; ?>" <?php echo $seleccionaJornadas; ?>><?php echo $DescripcionJornadas; ?></option>
                                    <?php
                                }////fin del while
                            ?>
                          </select>
                        </div>
                    </div>
                      <div class="col-lg-12">

                      <?php 
                      if($idrolUsuario==1){
                        $sql_carreras="select * from tb_carreras;";
                      }elseif($idrolUsuario==2){
                        $sql_carreras=" SELECT tb_carreras.descripcion,tb_carreras.id_carreras FROM tb_estudiantes,tb_carreras
                        WHERE tb_estudiantes.id_carreras = tb_carreras.id_carreras AND tb_estudiantes.cedula=$cedulaUsuar;";
                         

                      }

                      ?> 
                     <div class="form-group">
                        <label for="Correo" class="col-control-label font-weight-bold Negrita"> Carrera</label>
                      
                         <select class="form-control" id="carreras" name="Carreras_txt" required>
                               <option value="0">Selecionar......................</option>
                            <?php
                               
                                $result_carreras= mysqli_query($objConexion, $sql_carreras);
                                while($carrerasA=mysqli_fetch_array($result_carreras)){
                                    $DescripcionCarreras=$carrerasA['descripcion'];
                                    $idCarreras=$carrerasA['id_carreras'];
                                    $seleccionaCarreras='';
                                    if($idCarreras==$Carrera){
                                        $seleccionaCarreras='selected';
                                    }
                                    ?>
                                    <option value="<?php echo $idCarreras; ?>" <?php echo $seleccionaCarreras; ?>><?php echo $DescripcionCarreras; ?></option>
                                    <?php
                                }////fin del while
                            ?>
                          </select>
                        </div>
                    </div>
                            
                 
                   
                   
                    
                     <div class="col-lg-12">
                    <div class="form-group">
                        <label for="tipo" class="col-control-label font-weight-bold Negrita">Registar hora</label>
                      
                         <select class="form-control" id="estado" name="hora_txt" >
                               <option value="">Selecionar......................</option>
                               <?php
                               if($id==0){
                               ?>
                            <option value="0">hora entrada</option>
                            <?php   }
                            else{
                            ?>
                            
                        <option value="1">hora salida</option>
                        <option value="2">emergencia</option>
                            <?php }?>
                      
                          </select>
                        </div>
                    </div>
                    <?php 
//                    if($idrolUsuario==1){
//                        $etiqye='';
//                    } else {
//                        $etiqye='disabled';
//                    }
                    ?>
                       <div class="col-lg-12">
                    <div class="form-group">
                        <label for="estado" class="col-control-label font-weight-bold Negrita">Estado</label>
                     
                        <select class="form-control" id="estado" name="Estado_txt"  >
                             <option value="1" <?php echo $seleccionaA; ?>>Activo</option>
                             <option value="0" <?php echo $seleccionaI; ?>>Inactivo</option>
                          
                          </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary" id="guardar_estudiante"><i class="bi bi-hdd-fill"></i> Guardar Datos</button>
            </div>
                     <div id="resultados_usuario"></div>
                     <input id="IdUsuario" name="IdUsuario" type="hidden">
                </form>
            </div>
            
        </div>
    </div>
</div>
</html>
