<?php 
require_once ("conf/confconexion.php");
require 'excel/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use \PhpOffice\PhpSpreadsheet\IOFactory;
$spreadsheet=new Spreadsheet();
$spreadsheet->getProperties()->setCreator("jonathan")->setTitle("5TDS");
$spreadsheet->getDefaultStyle()->getFont()->setName('Arial')
                                          ->setSize(11);          

$spreadsheet->setActiveSheetIndex(0);
$hojactiva= $spreadsheet->getActiveSheet();
$hojactiva->setCellValue('A1', 'NOMBRES ESTUDIANTES')
            ->setCellValue('B1', 'CARRERA')
            ->setCellValue('C1', 'JORNADA')
            ->setCellValue('D1', 'FECHA REGSITRO')
            ->setCellValue('E1', 'HORA DE ENTRADA')
            ->setCellValue('F1', 'HORA DE SALIDA')
            ->setCellValue('G1', 'ENERGENCIA')
            
            ->setCellValue('H1', 'ESTADO');
    
//$idcarre=$_POST['id_carrera'];
$i = 2;
$sql = "SELECT tb_estudiantes.nombres_apellidos,tb_carreras.descripcion AS carreras,tb_jornada2.descripcion AS jornada,
tb_asistencia.fecha,tb_asistencia.hora_entrada,tb_asistencia.hora_salida,tb_asistencia.emergencia,tb_asistencia.estado
FROM tb_asistencia,tb_estudiantes,tb_carreras,tb_jornada2 WHERE tb_asistencia.id_estudiantes= tb_estudiantes.id_estudiantes
AND tb_asistencia.id_jornada2= tb_jornada2.id_jornada2 AND tb_asistencia.id_carreras = tb_carreras.id_carreras;";
$result = mysqli_query($objConexion, $sql);
while ($usuarioArray=mysqli_fetch_array($result)){
        //CAPTURAMOS VALORES DE LA CONSULTA
       
        $NombrePersona=$usuarioArray['nombres_apellidos'];
        $carreass=$usuarioArray['carreras'];
        $jornads=$usuarioArray['jornada'];
        $fecha =$usuarioArray['fecha'];
        
        $hora_entada =$usuarioArray['hora_entrada'];
        $hora_salida=$usuarioArray['hora_salida'];
         $energencia=$usuarioArray['emergencia'];
         
        $idestado=$usuarioArray['estado'];
        
        if($idestado=='1'){
            $estado='ACTIVO';
        }elseif ($idestado=='0') {
            $estado='INACTIVO';
        } else {
            $estado='FINALIZO';
        }
            
       //ASIGNAMOS LOS DATOS A LA CELDA DE EXCEL             
  $spreadsheet->setActiveSheetIndex(0);
  $hojactiva->setCellValue("A$i", $NombrePersona)
            ->setCellValue("B$i", $carreass)
            ->setCellValue("C$i", $jornads)
            ->setCellValue("D$i", $fecha)
            ->setCellValue("E$i", $hora_entada)
            ->setCellValue("F$i", $hora_salida)
            ->setCellValue("G$i", $energencia)
            ->setCellValue("H$i", $estado);    
            
$i++;
}
//FIN DEL WHILE
//DAMOS ATRIBUTOS A LAS CELDAS
$hojactiva->getColumnDimension('A')->setAutoSize(true);
$hojactiva->getColumnDimension('B')->setAutoSize(true);
$hojactiva->getColumnDimension('C')->setAutoSize(true);
$hojactiva->getColumnDimension('D')->setAutoSize(true);
$hojactiva->getColumnDimension('E')->setAutoSize(true);
$hojactiva->getColumnDimension('F')->setAutoSize(true);
$hojactiva->getColumnDimension('G')->setAutoSize(true);
$hojactiva->getColumnDimension('H')->setAutoSize(true);



$hojactiva->setTitle('REPORTE DE ASISTENCIA');

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Asistencia.xlsx"');
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');

