<?php include('header.php'); ?>
<?php
    $formulario = $_POST;
    if(isset($formulario)){
        $conn = new mysqli(MYSQL_SERVER, MYSQL_USER, MYSQL_PASS, DB, MYSQL_PORT);
  
        if ($conn->connect_error) {
          die("ERROR: Unable to connect: " . $conn->connect_error);
        } 
      
        $sql = "INSERT INTO ". DB .".registros(`checkbox-persona-moral`, `checkbox-persona-fisica`, `contacto-nombre`, `contacto-telefono`, `contacto-email`, `checkbox-postumo-si`, `checkbox-postumo-no`, `checkbox-merito-trayectoria`, `checkbox-merito-exatec`, `nominado-nombre`, `nominado-telefono`, `nominado-email`, `evidencias`, `cv`, `ejemplos`)";
        $sql = $sql . " VALUES(<{checkbox-persona-moral: }>,<{checkbox-persona-fisica: }>,<{contacto-nombre: }>,<{contacto-telefono: }>,<{contacto-email: }>,<{checkbox-postumo-si: }>,<{checkbox-postumo-no: }>,<{checkbox-merito-trayectoria: }>,<{checkbox-merito-exatec: }>,<{nominado-nombre: }>,<{nominado-telefono: }>,<{nominado-email: }>,<{evidencias: }>,<{cv: }>,<{ejemplos: }>); ";

        $sql = str_replace("<{checkbox-persona-moral: }>", isset( $formulario["checkbox-persona-moral"]) ? "'" . $formulario["checkbox-persona-moral"] ."'" : '0', $sql);
        $sql = str_replace("<{checkbox-persona-fisica: }>", isset( $formulario["checkbox-persona-fisica"]) ? "'" . $formulario["checkbox-persona-fisica"] . "'" : '0'  , $sql);
        $sql = str_replace("<{contacto-nombre: }>", isset( $formulario["contacto-nombre"]) ? "'" .  $formulario["contacto-nombre"] . "'": '' , $sql);
        $sql = str_replace("<{contacto-telefono: }>", isset( $formulario["contacto-telefono"]) ? "'" . $formulario["contacto-telefono"] . "'": '', $sql);
        $sql = str_replace("<{contacto-email: }>", isset( $formulario["contacto-email"]) ? "'" . $formulario["contacto-email"] ."'" : '', $sql);
        $sql = str_replace("<{checkbox-postumo-si: }>", isset( $formulario["checkbox-postumo-si"]) ? "'" . $formulario["checkbox-postumo-si"] ."'" : '0', $sql);
        $sql = str_replace("<{checkbox-postumo-no: }>", isset( $formulario["checkbox-postumo-no"]) ? "'" . $formulario["checkbox-postumo-no"] ."'": '0', $sql);
        $sql = str_replace("<{checkbox-merito-trayectoria: }>", isset( $formulario["checkbox-merito-trayectoria"]) ? "'" . $formulario["checkbox-merito-trayectoria"] ."'" : '0', $sql);
        $sql = str_replace("<{checkbox-merito-exatec: }>", isset( $formulario["checkbox-merito-exatec"]) ? "'" . $formulario["checkbox-merito-exatec"] ."'" : '0', $sql);
        $sql = str_replace("<{nominado-nombre: }>", isset($formulario["nominado-nombre"]) ? "'" . $formulario["nominado-nombre"] ."'" : '', $sql);
        $sql = str_replace("<{nominado-telefono: }>", isset($formulario["nominado-telefono"]) ? "'" . $formulario["nominado-telefono"] ."'" : '', $sql);
        $sql = str_replace("<{nominado-email: }>", isset($formulario["nominado-telefono"]) ? "'" . $formulario["nominado-email"] ."'":'', $sql);
        $sql = str_replace("<{evidencias: }>", isset($formulario["evidencias"]) ? "'" . $formulario["evidencias"] ."'":'', $sql);
        $sql = str_replace("<{cv: }>",  isset($formulario["cv"]) ? "'" . $formulario["cv"] ."'":'', $sql);
        $sql = str_replace("<{ejemplos: }>",  isset($formulario["ejemplos"]) ? "'" . $formulario["ejemplos"] ."'":'', $sql);


        if ($conn->query($sql) === TRUE) {
            //echo "New record created successfully: " . $sql . "<br>";
        } else {
            //echo "Error: " . $sql . "<br>" . $conn->error;
        }  
      
        $conn->close();
    }
?>
<div class="thank-you">
    <div class="banner banner-simple banner-process1">
        <div class="bg-title">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-8 offset-sm-2">
                        <h1 class="title">Nomina a un EXATEC</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="fig-scroll"></div>
        <div class="filter"></div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-8 col-lg-8 offset-xl-1 offset-lg-1">
                <div class="container-main-txt">
                    <p class="heading heading-02 main-txt">
                        Gracias, tu nominación ha sido enviada.    
                    </p>
                    <p class="heading heading-02 main-txt">
                        Recuerda que es posible que te busquemos para verificar la información.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6 offset-xl-6 offset-lg-6 offset-md-6">
            <div class="wrapper-button">
                <a class="button-general button-primary button-form-process" href="index.php">
                    Volver al sitio
                    <i class="fas fa-chevron-right button-icon"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>