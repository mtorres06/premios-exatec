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

    <div class="wrapper-form">
        <div class="step-container">
            <ul class="custom-list step-list">
                <li v-bind:class="{ selected: showStep1 }">1. Datos de contacto</li>
                <li v-bind:class="{ selected: showStep2 }">2. Datos del nominado</span></li>
                <li v-bind:class="{ selected: showStep3 }">3. Resumen</span></li>
            </ul>
        </div>
        <form class="form-custom form-process" id="formulario" method="post" action="gracias.php">
            <div class="container-fluid background-form">
                <div class="row">
                    <div class="col-xl-8 col-lg-8 offset-xl-2 offset-lg-2" v-show="showStep1">
                        <div class="info-contact-content">
                            <h3 class="heading heading-03">1. Datos del contacto</h3>
                            <p class="info-contact-txt">
                                Es posible que necesitemos de tu apoyo para verificar la información de tu nominado, por lo que te pedimos completar los siguientes campos.
                            </p>
                        </div>

                        <p class="title-section-checkbox">Selecciona una opción</p>
                        <div class="row">
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
                                <div class="wrapper-input wrapper-checkbox">
                                    <div class="">
                                        <label for="checkbox-persona-moral" class="label-checkbox">
                                            <input type="radio" value="1" id="checkbox-persona-moral" id="persona" name="persona" class="input-checkbox" />
                                        </label>
                                    </div>
                                    <p class="input-label">Persona moral</p>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
                                <div class="wrapper-input wrapper-checkbox">
                                    <div class="">
                                        <input type="radio" id="checkbox-persona-fisica" id="persona" name="persona" class="input-checkbox" />
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
                                    <label class="input-label" for="name">Nombre completo*</label>
                                    <input type="text" class="input-custom" name="name" placeholder="Fernando Raúl Montemayor Díaz">
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4">
                                <div class="wrapper-input">
                                    <label class="input-label" for="telefono">Número de celular</label>
                                    <input type="text" class="input-custom" name="telefono" placeholder="811 320 78 56">
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4">
                                <div class="wrapper-input">
                                    <label class="input-label" for="email">Email</label>
                                    <input type="text" class="input-custom" name="email" placeholder="fernando.montemayor@gmail.com">
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
                    <div class="col-xl-8 col-lg-8 offset-xl-2 offset-lg-2" v-show="showStep2">
                        <div class="info-contact-content">
                            <h3 class="heading heading-03">2. Datos del nominado</h3>
                            <p class="info-contact-txt">
                                Recuerda que al realizar tu nominación puedes compartir ejemplos personales, así como cuidar el orden, sintaxis, conexión de ideas, gramática y ortografía en la postulación y portafolio de evidencias, recuerda que esta información será revisada por los miembros del jurado.
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
                                        <input type="checkbox" value="1" id="checkbox-postumo-si" id="postuma" name="postuma" class="input-checkbox" />
                                        <label for="checkbox-postumo-si" class="label-checkbox"></label>
                                    </div>
                                    <p class="input-label">Sí</p>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
                                <div class="wrapper-input wrapper-checkbox">
                                    <div class="checkbox-custom">
                                        <input type="checkbox" value="1" id="checkbox-postumo-no" id="postuma" name="postuma" class="input-checkbox" />
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
                                        <input type="checkbox" value="1" id="checkbox-trayectoria-exatec" id="trayectoria" name="trayectoria" class="input-checkbox" />
                                        <label for="checkbox-trayectoria-exatec" class="label-checkbox"></label>
                                    </div>
                                    <p class="input-label">Trayectoria EXATEC</p>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
                                <div class="wrapper-input wrapper-checkbox">
                                    <div class="checkbox-custom">
                                        <input type="checkbox" value="1" id="checkbox-merito-exatec" id="merito" name="merito" class="input-checkbox" />
                                        <label for="checkbox-merito-exatec" class="label-checkbox"></label>
                                    </div>
                                    <p class="input-label">Mérito EXATEC</p>
                                </div>
                            </div>
                        </div>
                        <div class="row personal-info-fields">
                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 custom-columns">
                                <div class="wrapper-input">
                                    <label class="input-label" for="name">Nombre completo*</label>
                                    <input type="text" class="input-custom" name="name" placeholder="Fernando Raúl Montemayor Díaz">
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 custom-columns">
                                <div class="wrapper-input">
                                    <label class="input-label" for="telefono">Número de celular</label>
                                    <input type="text" class="input-custom" name="telefono" placeholder="811 320 78 56">
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 custom-columns">
                                <div class="wrapper-input">
                                    <label class="input-label" for="email">Email</label>
                                    <input type="text" class="input-custom" name="email" placeholder="fernando.montemayor@gmail.com">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="wrapper-input wrapper-file">
                                    <p class="input-label">Completa y sube el formato de portafolio de evidencias</p>
                                    <a class="form-link" href="#">
                                        Descargar formato portafolio de evidencias.xml
                                        <span class="fig-download"></span>
                                    </a>
                                    <div class="container-input-file">
                                        <label class="form-input form-input--file ">
                                            <span class="form-input--file-text">Archivo</span>
                                            <span class="form-input--file-button button-general button-primary button-input-file">Cargar archivo</span>
                                            <input class="form-input-file" type="file" id="file" accept="image/*" size="14" />
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
                    <div class="col-xl-8 col-lg-8 offset-xl-2 offset-lg-2" v-show="showStep3">
                        <div class="info-contact-content">
                            <h3 class="heading heading-03">3. Curriculum del nominado</h3>
                            <p class="info-contact-txt">
                                Por último necesitamos el curriculum de la persona nominada. Recuerda que esta información será revisada por los miembros del jurado.
                            </p>
                        </div>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6">
                                <div class="wrapper-input wrapper-file">
                                    <p class="input-label">Sube el currculum de la persona nominada</p>
                                    <div class="container-input-file">
                                        <label class="form-input form-input--file ">
                                            <span class="form-input--file-text">Archivo</span>
                                            <span class="form-input--file-button button-general button-primary button-input-file">Cargar archivo</span>
                                            <input class="form-input-file" type="file" id="file" accept="image/*" size="14" />
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6">
                                <div class="wrapper-input">
                                    <label class="input-label" for="name">Escribe ejemplos personales</label>
                                    <input type="text" class="input-custom" name="name" placeholder="Escribir">
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
                                    <a class="button-general button-primary button-form-process" v-on:click="enviar()">
                                        Siguiente paso
                                        <i class="fas fa-chevron-right button-icon"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="procesoformvue.js">
    <?php include('footer.php'); ?>