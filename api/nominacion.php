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
                    $errorCargaNominadoCurriuculm = true;
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
			$r = array();

        if ((!$errorCargaEvidencia) && (!$errorCargaNominadoCurriuculm) && (!$errorCargaNominadoFoto)) {
            $r["camposEvidencias"] = $camposEvidencias;
            $r["camposNominado"] = $camposNominado;
            $r["valoresEvidencias"] = $valoresEvidencias;
            $r["valoresNominado"] = $valoresNominado;
			header('Content-type: application/json');
            echo '{ "camposEvidencias": "'.$camposEvidencias.'", "camposNominado": "'.$camposNominado.'", "valoresEvidencias": "'.$valoresEvidencias.'", "valoresNominado": "'.$valoresNominado.'" }';
        }
    }

    if (isset($_POST["personaMoral"])){        
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
            .",paginaLinkedIn"
            .",fechaRegistro"
            .$_POST["camposEvidencias"]
            .$_POST["camposNominado"]
            .")"
            ." VALUES("
            .($_POST["personaMoral"] == true ? $_POST["personaMoral"] : '0')
            .",".($_POST["personaFisica"] == true ? $_POST["personaFisica"] : '0')
            .",".($_POST["exatecSi"] == true ? $_POST["exatecSi"] : '0')
            .",".($_POST["exatecNo"] == true ? $_POST["exatecNo"] : '0')
            .",'".$_POST["matricula"]."'"
            .",".($_POST["nominacionAnonimaSi"] == true ? $_POST["nominacionAnonimaSi"] : '0')
            .",".($_POST["nominacionAnonimaNo"] == true ? $_POST["nominacionAnonimaNo"] : '0')
            .",'".$_POST["contactoNombre"]."'"
            .",'".$_POST["contactoCelular"]."'"
            .",'".$_POST["contactoEmail"]."'"
            .",".($_POST["nominacionPostumaSi"] == true ? $_POST["nominacionPostumaSi"] : '0')
            .",".($_POST["nominacionPostumaNo"] == true ? $_POST["nominacionPostumaNo"] : '0')
            .",".($_POST["trayectoria"] == true ? $_POST["trayectoria"] : '0')
            .",".($_POST["merito"] == true ? $_POST["merito"] : '0')
            .",".$_POST["campusSeleccionado"]
            .",'".$_POST["nominadoNombre"]."'"
            .",'".$_POST["nominadoCelular"]."'"
            .",'".$_POST["nominadoEmail"]."'"
            .",'".$_POST["razonNominacion"]."'"
            .",'".$_POST["paginaLinkedIn"]."'"
            .",NOW()"
            .$_POST["valoresEvidencias"]
            .$_POST["valoresNominado"]
            .");";

        $r = array();
        if ($conn->query($query) === TRUE) {
            $r["registrado"] = true;
        } else {
            $r["registrado"] = false;
        }  
		header('Content-type: application/json');
        echo '{ "registrado": '.$r["registrado"].' }';
    }
?>