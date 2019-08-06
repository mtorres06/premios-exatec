<?php
    include('../config.php');
    
    if (isset($_FILES["evidencia01"])){
        $timeStamp = date("Ymd_His");
        $extensionesValidas = array("jpg","jpeg","png","pdf");

        $camposEvidencias = "";
        $valoresEvidencias = "";
        $errorCargaEvidencia = false;
        $nombreArchivoEvidencias = $timeStamp . '_evidencia0';

        if (isset($_FILES["evidencia01"])){
            $rutaOrigen = $_FILES['evidencia01']['tmp_name'];
            $extension = pathinfo($_FILES['evidencia01']['name'], PATHINFO_EXTENSION);
            if(in_array(strtolower($extension), $extensionesValidas) ) {
                $nombreArchivo = $nombreArchivoEvidencias . '1.' . $extension;
                $rutaArchivo = "../uploads/" . $nombreArchivo;
                if(move_uploaded_file($rutaOrigen, $rutaArchivo)) {
                    $camposEvidencias .= ",evidencia01";
                    $valoresEvidencias .= ",'" . $nombreArchivo . "'";
                } else {
                    $errorCargaEvidencia = true;
                }
            }
        } else {
            $errorCargaEvidencia = true;
        }

        if (isset($_FILES["evidencia02"])){
            $rutaOrigen = $_FILES['evidencia02']['tmp_name'];
            $extension = pathinfo($_FILES['evidencia02']['name'], PATHINFO_EXTENSION);
            if(in_array(strtolower($extension), $extensionesValidas) ) {
                $nombreArchivo = $nombreArchivoEvidencias . '2.' . $extension;
                $rutaArchivo = "../uploads/" . $nombreArchivo;
                if(move_uploaded_file($rutaOrigen, $rutaArchivo)) {
                    $camposEvidencias .= ",evidencia02";
                    $valoresEvidencias .= ",'" . $nombreArchivo . "'";
                } else {
                    $errorCargaEvidencia = true;
                }
            }
        } else {
            $errorCargaEvidencia = true;
        }

        $errorCargaNominadoCurriuculm = false;
        $errorCargaNominadoFoto = false;
        $nombreArchivoNominado = $timeStamp . '_nominado_';
        $camposNominado = "";
        $valoresNominado = "";
        if (isset($_FILES["nominadoCurriculum"])){
            $rutaOrigen = $_FILES['nominadoCurriculum']['tmp_name'];
            $extension = pathinfo($_FILES['nominadoCurriculum']['name'], PATHINFO_EXTENSION);
            if(in_array(strtolower($extension), $extensionesValidas) ) {
                $nombreArchivo = $nombreArchivoNominado . 'curriculum.' . $extension;
                $rutaArchivo = "../uploads/" . $nombreArchivo;
                if(move_uploaded_file($rutaOrigen, $rutaArchivo)) {
                    $camposNominado .= ",nominadoCurriculum";
                    $valoresNominado .= ",'" . $nombreArchivo . "'";
                } else {
                    $errorCargaEvidencia = true;
                }
            }
        } else {
            $errorCargaNominadoCurriuculm = true;
        }

        if (isset($_FILES["nominadoFoto"])){
            $rutaOrigen = $_FILES['nominadoFoto']['tmp_name'];
            $extension = pathinfo($_FILES['nominadoFoto']['name'], PATHINFO_EXTENSION);
            if(in_array(strtolower($extension), $extensionesValidas) ) {
                $nombreArchivo = $nombreArchivoNominado . 'foto.' . $extension;
                $rutaArchivo = "../uploads/" . $nombreArchivo;
                if(move_uploaded_file($rutaOrigen, $rutaArchivo)) {
                    $camposNominado .= ",nominadoFoto";
                    $valoresNominado .= ",'" . $nombreArchivo . "'";
                } else {
                    $errorCargaNominadoFoto = true;
                }
            }
        }

        if ((!$errorCargaEvidencia) && (!$errorCargaNominadoCurriuculm) && (!$errorCargaNominadoFoto)) {

            $r["camposEvidencias"] = $camposEvidencias;
            $r["camposNominado"] = $camposNominado;
            $r["valoresEvidencias"] = $valoresEvidencias;
            $r["valoresNominado"] = $valoresNominado;
            echo json_encode($r);
        }
    }

    if (isset($_POST["datosNominacion"])){
        $datosNominacion = json_decode($_POST["datosNominacion"], true);
        $evidenciasNominacion = json_decode($_POST["evidenciasNominacion"], true);
        
        $conn = new mysqli(MYSQL_SERVER, MYSQL_USER, MYSQL_PASS, DB, MYSQL_PORT);
            if ($conn->connect_error) {
                die("ERROR: Unable to connect: " . $conn->connect_error);
            } 

            $query = "INSERT INTO registros("
                ."personaMoral"
                .",personaFisica"
                .",exatecSi"
                .",exatecNo"
                .",exatecMatricula"
                .",nominacionAnonimaSi"
                .",nominacionAnonimaNo"
                .",contactoNombre"
                .",contactoTelefono"
                .",contactoEmail"
                .",nominacionPostumaSi"
                .",nominacionPostumaNo"
                .",trayectoriaExatec"
                .",meritoExatec"
                .",campus"
                .",nominadoNombre"
                .",nominadoTelefono"
                .",nominadoEmail"
                .",razonNominacion"
                .",paginaLinkedIn",
                .",fechaRegistro"
                .$evidenciasNominacion["camposEvidencias"]
                .$evidenciasNominacion["camposNominado"]
                .")"
                ." VALUES("
                .($datosNominacion["personaMoral"] == true ? $datosNominacion["personaMoral"] : '0')
                .",".($datosNominacion["personaFisica"] == true ? $datosNominacion["personaFisica"] : '0')
                .",".($datosNominacion["exatecSi"] == true ? $datosNominacion["exatecSi"] : '0')
                .",".($datosNominacion["exatecNo"] == true ? $datosNominacion["exatecNo"] : '0')
                .",'".$datosNominacion["matricula"]."'"
                .",".($datosNominacion["nominacionAnonimaSi"] == true ? $datosNominacion["nominacionAnonimaSi"] : '0')
                .",".($datosNominacion["nominacionAnonimaNo"] == true ? $datosNominacion["nominacionAnonimaNo"] : '0')
                .",'".$datosNominacion["contactoNombre"]."'"
                .",'".$datosNominacion["contactoCelular"]."'"
                .",'".$datosNominacion["contactoEmail"]."'"
                .",".($datosNominacion["nominacionPostumaSi"] == true ? $datosNominacion["nominacionPostumaSi"] : '0')
                .",".($datosNominacion["nominacionPostumaNo"] == true ? $datosNominacion["nominacionPostumaNo"] : '0')
                .",".($datosNominacion["trayectoria"] == true ? $datosNominacion["trayectoria"] : '0')
                .",".($datosNominacion["merito"] == true ? $datosNominacion["merito"] : '0')
                .",".$datosNominacion["campusSeleccionado"]
                .",'".$datosNominacion["nominadoNombre"]."'"
                .",'".$datosNominacion["nominadoCelular"]."'"
                .",'".$datosNominacion["nominadoEmail"]."'"
                .",'".$datosNominacion["razonNominacion"]."'"
                .",'".$datosNominacion["paginaLinkedIn"]."'"
                .",NOW()"
                .$evidenciasNominacion["valoresEvidencias"]
                .$evidenciasNominacion["valoresNominado"]
                .");";

            if ($conn->query($query) === TRUE) {
                $r["registrado"] = true;
            } else {
                $r["registrado"] = false;
            }  
            echo json_encode($r);
    }
?>