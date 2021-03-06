<?php

    class conexion{

        private $con;

        public function __construct()
        {
            $this->con = new mysqli('localhost', 'root', 'root', 'prueba');

        }

        public function getEstudiantes(){
            $query = $this->con->query("SELECT * FROM `estudiante`");

            $i = 0;
            $retorno = [];

            while($fila = $query->fetch_assoc()){
                $retorno[$i] = $fila;
                $i++;
            }
            return $retorno;
        }
        public function getEstudiantesSemestre(){
            $query = $this->con->query("SELECT count(idestudiante) as estudiantes, semestre
                                        FROM `estudiante`
                                        GROUP BY semestre");

            $i = 0;
            $retorno = [];

            while($fila = $query->fetch_assoc()){
                $retorno[$i] = $fila;
                $i++;
            }
            return $retorno;
        } 
        public function getEstudiantesMunicipio(){
            $query = $this->con->query("SELECT count(idestudiante) as estudiantes, municipio
                                        FROM `estudiante`
                                        GROUP BY municipio"
                                    );

            $i = 0;
            $retorno = [];

            while($fila = $query->fetch_assoc()){
                $retorno[$i] = $fila;
                $i++;
            }
            return $retorno;
        }
        public function getModaMunicipio(){
            $query = $this->con->query(" SELECT  municipio,COUNT(municipio) as cont
                                        FROM estudiante
                                        GROUP BY municipio
                                        ORDER BY cont DESC
                                        limit 1 "
                                    );

            $i = 0;
            $retorno = [];

            while($fila = $query->fetch_assoc()){
                $retorno[$i] = $fila;
                $i++;
            }
            return $retorno;
        }
        public function getMedia(){
            $query = $this->con->query(" SELECT (sum(promedio)/count(promedio)) AS promedio,
                                        (sum(semestre)/count(semestre)) AS semestre,
                                        (sum(estrato)/count(estrato)) AS estrato
                                FROM estudiante"
                                    );

            $i = 0;
            $retorno = [];

            while($fila = $query->fetch_assoc()){
                $retorno[$i] = $fila;
                $i++;
            }
            return $retorno;
        }public function getDesviacion(){
            $query = $this->con->query(" SELECT SQRT(AVG(promedio*promedio) - AVG(promedio)*AVG(promedio)) AS promedio,
                                        SQRT(AVG(semestre*semestre) - AVG(semestre)*AVG(semestre)) AS semestre,
                                        SQRT(AVG(estrato*estrato) - AVG(estrato)*AVG(estrato)) AS estrato
                                    FROM estudiante; "
                                    );

            $i = 0;
            $retorno = [];

            while($fila = $query->fetch_assoc()){
                $retorno[$i] = $fila;
                $i++;
            }
            return $retorno;
        }

        public function getEstudiante($codigo){
            $query = $this->con->query("SELECT * FROM estudiante WHERE codigo = $codigo ");

            $i = 0;
            $retorno = [];

            while($fila = $query->fetch_assoc()){
                $retorno[$i] = $fila;
                $i++;
            }
            return $i;
        }

        public function eliminarEstudiante($id){
            $query = $this->con->query(" DELETE FROM estudiante
                                            WHERE ((idestudiante = $id));"
                                        );
            return $query;
        }

        public function agregarEstudiante($datos){
            $codigo = $datos['codigo'];
            $nombre = $datos['nombre'];
            $apellido = $datos['apellido'];
            $municipio = $datos['municipio'];
            $semestre = $datos['semestre'];
            $estrato = $datos['estrato'];
            $promedio = $datos['promedio'];

            $query = $this->con->query(" INSERT INTO estudiante (codigo, nombre, apellido, municipio, semestre, estrato, promedio)
                                            VALUES ( '$codigo', '$nombre', '$apellido', '$municipio', '$semestre', '$estrato', '$promedio');
                                        ");

            return $query;  
        }
        
        public function actualizarEstudiante($datos){

            $id = $datos['id'];
            $nombre = $datos['nombre'];
            $apellido = $datos['apellido'];
            $municipio = $datos['municipio'];
            $semestre = $datos['semestre'];

           $query = $this->con->query(" UPDATE estudiante 
                                        SET
                                            nombre = '$nombre',
                                            apellido = '$apellido',
                                            municipio = '$municipio',
                                            semestre = '$semestre'
                                        WHERE idestudiante = '$id'; 
                                ");

            return $query;  
        }


    }