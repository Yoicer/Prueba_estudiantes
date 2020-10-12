<?php

 require_once "./modelo/conexion.php";

 $con = new conexion();

 $estudiantes = $con->getEstudiantes();

 require_once "./vista/estudiantes.php";

 if (isset($_GET['id'])) {
     $id = $_GET['id'];
     $con->eliminarEstudiante($id);
  }

  if(isset($_POST['nombre'])){
        $datos['codigo'] = $_POST['codigo'];
        $datos['nombre'] = $_POST['nombre'];
        $datos['apellido'] = $_POST['apellido'];
        $datos['municipio'] = $_POST['municipio'];
        $datos['semestre'] = $_POST['semestre'];
        $datos['estrato'] = $_POST['estrato'];
        $datos['promedio'] = $_POST['promedio'];

        if($con->getEstudiante($datos['codigo']) > 0){
            echo '<script language="javascript">alert("Estudiante '.$datos['nombre'].' no pudo ser agregado");</script>';
        }else{
            if($con->agregarEstudiante($datos)){
                echo '<script language="javascript">alert("Estudiante '.$datos['nombre'].' agregado");</script>';
            }
        }
  }

  if(isset($_POST['id'])){
    $datos['id'] = $_POST['id'];
    $datos['nombre'] = $_POST['nombreEdit'];
    $datos['apellido'] = $_POST['apellidoEdit'];
    $datos['municipio'] = $_POST['municipioEdit'];
    $datos['semestre'] = $_POST['semestreEdit'];

    $con->actualizarEstudiante($datos['codigo']);
    echo '<script language="javascript">alert("Se han actualizado los datos");</script>';
    
    }
