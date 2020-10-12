<?php

 require_once "./modelo/conexion.php";

 $con = new conexion();

 $estudiantes = $con->getEstudiantes();

 echo json_encode($estudiantes);