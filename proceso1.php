<?php include('header.php'); ?>
<div class="process process1 procesoForm" name="procesoForm" id="procesoForm">
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
            <div class="col-xl-6 col-lg-8 offset-xl-1 offset-lg-1">
                <div class="container-main-txt">
                    <p class="heading heading-02 main-txt">
                        Gracias a tí un EXATEC participará para ser reconocido por su extraordinaria trayectoria.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="wrapper-form container-fluid">
        <div class="step-container container-fluid">
            <ul class="custom-list step-list">
                <li v-bind:class="{ selected: showStep1 }">1. Datos de contacto</li>
                <li v-bind:class="{ selected: showStep2 }">2. Datos del nominado</span></li>
                <li v-bind:class="{ selected: showStep3 }">3. Semblanza</span></li>
            </ul>
        </div>
        <form class="form-custom form-process" enctype="multipart/form-data" id="formulario" v-on:submit="enviar()" method="post" action="gracias.php">
            <div class="container-fluid background-form">
                <div class="row">
                    <div class="col-xl-8 col-lg-8 offset-xl-2 offset-lg-2 form-step" v-show="showStep1">
                        <div class="info-contact-content">
                            <h3 class="heading heading-03">1. Datos del contacto</h3>
                            <p class="info-contact-txt">
                                Es posible que necesitemos de tu apoyo para verificar la información de tu nominado, por
                                lo que te pedimos completar los siguientes campos.
                            </p>
                        </div>

                        <p class="title-section-checkbox">Selecciona una opción</p>
                        <div class="row">
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
                                <div class="wrapper-input wrapper-checkbox">
                                    <div class="">
                                        <label for="checkbox-persona-moral" class="label-checkbox">
                                            <input type="radio" value="1" id="checkbox-persona-moral"
                                                name="checkbox-persona-moral" class="input-checkbox" />
                                        </label>
                                    </div>
                                    <p class="input-label">Persona moral</p>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
                                <div class="wrapper-input wrapper-checkbox">
                                    <div class="">
                                        <input type="radio" id="checkbox-persona-fisica" name="checkbox-persona-fisica"
                                            class="input-checkbox" />
                                        <label for="checkbox-persona-fisica" class="label-checkbox"></label>
                                    </div>
                                    <p class="input-label">Persona física</p>
                                </div>
                            </div>
                        </div>
                        <hr class="separator">
                        <div class="row">
                            <div class="col-xl-4 col-lg-4">
                                <div class="wrapper-input">
                                    <label class="input-label" for="contacto-nombre">Nombre completo*</label>
                                    <input type="text" class="input-custom" name="contacto-nombre" id="contacto-nombre">
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4">
                                <div class="wrapper-input">
                                    <label class="input-label" for="contacto-telefono">Número de celular</label>
                                    <input type="text" class="input-custom" name="contacto-telefono"
                                        id="contacto-telefono">
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4">
                                <div class="wrapper-input">
                                    <label class="input-label" for="contacto-email">Email</label>
                                    <input type="text" class="input-custom" name="contacto-email" id="contacto-email">
                                </div>
                            </div>
                        </div>
                        <div class="wrapper-button" style="margin-top: 10px !important;">

                            <a class="button-general button-primary button-form-process" v-on:click="goNext()">
                                Siguiente paso
                                <i class="fas fa-chevron-right button-icon"></i>
                            </a>
                        </div>

                    </div>
                    <div class="col-xl-8 col-lg-8 offset-xl-2 offset-lg-2 form-step" v-show="showStep2">
                        <div class="info-contact-content">
                            <h3 class="heading heading-03">2. Datos del nominado</h3>
                            <p class="info-contact-txt">
                                Recuerda que al realizar tu nominación puedes compartir ejemplos personales, así como
                                cuidar el orden, sintaxis, conexión de ideas, gramática y ortografía en la postulación y
                                portafolio de evidencias, recuerda que esta información será revisada por los miembros
                                del jurado.
                            </p>
                        </div>
                        <p class="title-section-checkbox">
                            ¿Se trata de una nominación póstuma?
                            <span class="title-italic"> (no más de 5 años)</span>
                        </p>
                        <div class="row">
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
                                <div class="wrapper-input wrapper-checkbox">
                                    <div class="checkbox-custom">
                                        <input type="checkbox" value="1" id="checkbox-postumo-si" name="checkbox-postumo"
                                            class="input-checkbox" />
                                        <label for="checkbox-postumo-si" class="label-checkbox"></label>
                                    </div>
                                    <p class="input-label">Sí</p>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
                                <div class="wrapper-input wrapper-checkbox">
                                    <div class="checkbox-custom">
                                        <input type="checkbox" value="1" id="checkbox-postumo-no" name="checkbox-postumo"
                                            class="input-checkbox" />
                                        <label for="checkbox-postumo-no" class="label-checkbox"></label>
                                    </div>
                                    <p class="input-label">No</p>
                                </div>
                            </div>
                        </div>
                        <hr class="separator">
                        <p class="title-section-checkbox">
                            Selecciona uno o dos de las categorías en las que deseas que participe tu nominado
                        </p>
                        <div class="row">
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
                                <div class="wrapper-input wrapper-checkbox">
                                    <div class="checkbox-custom">
                                        <input type="checkbox" value="1" id="checkbox-trayectoria-exatec"
                                            name="checkbox-trayectoria-exatec" class="input-checkbox" />
                                        <label for="checkbox-trayectoria-exatec" class="label-checkbox"></label>
                                    </div>
                                    <p class="input-label">Trayectoria EXATEC</p>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
                                <div class="wrapper-input wrapper-checkbox">
                                    <div class="checkbox-custom">
                                        <input type="checkbox" value="1" id="checkbox-merito-exatec"
                                            name="checkbox-merito-exatec" class="input-checkbox" />
                                        <label for="checkbox-merito-exatec" class="label-checkbox"></label>
                                    </div>
                                    <p class="input-label">Mérito EXATEC</p>
                                </div>
                            </div>
                        </div>
                        <div class="row personal-info-fields">
                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 custom-columns">
                                <div class="wrapper-input">
                                    <label class="input-label" for="nominado-nombre">Nombre completo*</label>
                                    <input type="text" class="input-custom" id="nominado-nombre" name="nominado-nombre">
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 custom-columns">
                                <div class="wrapper-input">
                                    <label class="input-label" for="nominado-telefono">Número de celular</label>
                                    <input type="text" class="input-custom" name="nominado-telefono"
                                        id="nominado-telefono">
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 custom-columns">
                                <div class="wrapper-input">
                                    <label class="input-label" for="nominado-email">Email</label>
                                    <input type="text" class="input-custom" name="nominado-email" id="nominado-email">
                                </div>
                            </div>
                        </div>
                        <hr class="separator">
                        <div class="row attachment"> 
                            <div>
                                <p class="title-section-checkbox field-description">Evidencia de logros del nominado                             
                                    <span class="title-italic">
                                Como máximo se podrán adjuntar dos cartas en formato PDF no mayor a 2 cuartillas, que incluyan evidencia de logros profesionales; afiliaciones comunitarias / profesionales; premios, honores o condecoraciones; publicaciones; servicio y/o apoyo al TEC u otras organizaciones, entre otros.
                                    </span>
                                </p>
                            </div>
                           
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                           

                                <div class="wrapper-input wrapper-file">
                                   
                                    <a class="form-link" href="#">
                                        Descargar formato portafolio de evidencias.xml
                                        <span class="fig-download"></span>
                                    </a>
                                    <div class="container-input-file">
                                        <label class="form-input form-input--file ">
                                            <span class="form-input--file-text">Archivo</span>
                                            <span
                                                class="form-input--file-button button-general button-primary button-input-file">Cargar
                                                archivo</span>
                                            <input class="form-input-file" type="file" id="evidencias" name="evidencias"
                                                accept="image/*" size="14" />
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="wrapper-button">
                            <a class="button-general button-primary button-form-process" v-on:click="goPrev()">
                                <i class="fas fa-chevron-left button-icon"></i>
                                Paso anterior
                            </a>
                            <a class="button-general button-primary button-form-process" v-on:click="goNext()">
                                Siguiente paso
                                <i class="fas fa-chevron-right button-icon"></i>
                            </a>
                        </div>

                    </div>
                    <div class="col-xl-8 col-lg-8 offset-xl-2 offset-lg-2 form-step" v-show="showStep3">
                        <div class="info-contact-content">
                            <h3 class="heading heading-03">3. Curriculum del nominado</h3>
                            <p class="info-contact-txt">
                                Por último necesitamos el curriculum de la persona nominada. Recuerda que esta
                                información será revisada por los miembros del jurado.
                            </p>
                        </div>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6">
                                <div class="wrapper-input wrapper-file">
                                    <p class="input-label">Sube el currculum de la persona nominada</p>
                                    <div class="container-input-file">
                                        <label class="form-input form-input--file ">
                                            <span class="form-input--file-text">Archivo</span>
                                            <span
                                                class="form-input--file-button button-general button-primary button-input-file">Cargar
                                                archivo</span>
                                            <input class="form-input-file" type="file" id="cv" name="cv"
                                                accept="application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/msword,application/pdf,image/*" size="14" />
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6">
                                <div class="wrapper-input">
                                    <label class="input-label" for="ejemplos">Razón de nominar</label>
                                    <p class="field-description">Describe y/o justifica las razones por las cuales propones al Premio al Mérito EXATEC al egresado postulado y que lo hacen merecedor de este reconocimiento. 
Tip. Comparte ejemplos personales, esta es una manera memorable de 
hacer que tu candidato se destaque.
Máximo 3000 caracteres</span></p>

                                    <input type="text" class="input-custom" name="ejemplos" placeholder="Escribir">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-8 col-lg-8 offset-xl-6 offset-lg-4">
                                <div class="wrapper-button">
                                    <a class="button-general button-primary button-form-process" v-on:click="goPrev()">
                                        <i class="fas fa-chevron-left button-icon"></i>
                                        Paso anterior
                                    </a>
                                    <button type="submit" class="button-general button-primary button-form-process">
                                        Siguiente paso
                                        <i class="fas fa-chevron-right button-icon"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="procesoformvue.js"></script>
<hr class="mt-5 mb-5">
<?php include('footer.php'); ?>