<?php

require '../conf/confconexion.php';
 $id=$_POST['IdUsuario'];
 $id_p=$_POST['id_p'];
$mensaje=$_POST['mensaje'];
$desci=$_POST['descripcion_txt'];
$silgas=$_POST['siglas_txt'];

//$url="<iframe src='$enlace' width='100%' height='100%' style='border:0;' allowfullscreen='' loading='lazy'></iframe>";






//insert
if($id==0){
    $sql="insert into tb_carreras(siglas,descripcion) values('$silgas','$desci');";
}
if($mensaje=='eliminar'){
        $sql="delete from tb_carreras where id_carreras=$id_p";
    }else{
    if($id>0){
        $sql="update tb_carreras set descripcion='$desci', siglas='$silgas' where id_carreras=$id";
    }
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
