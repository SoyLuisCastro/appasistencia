<?php

require '../conf/confconexion.php';
$id=$_POST['IdUsuario'];
  $id_hora=$_POST['hora_txt'];
  $id_p=$_POST['id_p'];
$mensaje=$_POST['mensaje'];
$id_estudiante=$_POST['txt_est'];


  echo $Carreras=$_POST['Carreras_txt'];
  $hora_entrada= date("H:i:s");
    $hora_sal= date("00:00:00");
     $hora_entt= date("00:00:00");
    $hora_ener= date("00:00:00");
$hora_salidad= date("H:i:s");
$emergencia= date("H:i:s");

 $Jornadas=$_POST['Jornadas_txt'];

 $Fecha_registro=date('Y-m-d');
$Estado=$_POST['Estado_txt'];



//insert
if($id_hora==0){
    $sql="insert into tb_asistencia(id_estudiantes,id_jornada2,id_carreras,fecha,hora_entrada,hora_salida,emergencia,estado) values('$id_estudiante','$Jornadas','$Carreras','$Fecha_registro','$hora_entrada','$hora_sal','$hora_ener','$Estado');";
}
if($mensaje=='eliminar'){
        $sql="delete from tb_asistencia where id_asistencia=$id_p";
    }elseif($id_hora==1){
    $sql="update tb_asistencia set hora_salida='$hora_salidad',estado='$Estado' where id_asistencia=$id";
    }elseif ($id_hora==2) {
   $sql="update tb_asistencia set emergencia='$emergencia',estado='$Estado' where id_asistencia=$id";
}

//ejecuto
$result=mysqli_query($objConexion,$sql);
if($result){
    if($mensaje=='eliminar'){
       ?> 
<script>
Swal.fire(
      'Eliminado!',
      'eliminado existosamente .',
      'success'
    )
</script>
<?php
//        echo "<div class='alert alert-success' rol='alert'>Registro Eliminado Correctamente</div>";
    }else{
        
       ?>
<script>
Swal.fire(
      'Registrado!',
      'Registro Guardado Correctamente.',
      'success'
    )
</script>
<?php
//        echo "<div class='alert alert-success' rol='alert'>Registro Guardado Correctamente</div>";
    }
}
else{
    echo "<div class='alert alert-danger' rol='alert'>Ocurrió un problema al momento de guardar. Favor intentar de nuevo</div>". mysqli_error();
}
