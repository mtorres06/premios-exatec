<?php 
    include('header.php');
?>
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
                <li v-bind:class="{ selected: showStep3 }">3. Semblanza del nominado</span></li>
            </ul>
        </div>
        <form class="form-custom form-process" enctype="multipart/form-data" id="formulario" method="post" action="gracias.php">
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
                                    <div class="checkbox-custom">                                        
                                            <input type="checkbox" id="checkbox-persona-moral"
                                                v-model="formularioValues.personaMoral"
                                                v-on:change="personaMoralChecks()"
                                                name="checkbox-persona-moral" class="input-checkbox" />
                                                <label for="checkbox-persona-moral" class="label-checkbox"></label>
                                        
                                    </div>
                                    <p class="input-label">Persona moral</p>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
                                <div class="wrapper-input wrapper-checkbox">
                                    <div class="checkbox-custom">
                                        <input type="checkbox" id="checkbox-persona-fisica" name="checkbox-persona-fisica"
                                        v-model="formularioValues.personaFisica"  
                                        v-on:change="personaFisicaChecks()"  
                                        class="input-checkbox" />
                                        <label for="checkbox-persona-fisica" class="label-checkbox"></label>
                                    </div>
                                    <p class="input-label">Persona física</p>
                                </div>
                            </div>
                        </div>
                        <hr class="separator" />
                        <p class="title-section-checkbox">¿Eres EXATEC?</p>
                        <div class="row">
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
                                <div class="wrapper-input wrapper-checkbox">
                                    <div class="checkbox-custom">                                        
                                        <input type="checkbox" id="checkbox-exatec-si" name="checkbox-exatec-si"
                                            v-model="formularioValues.exatecSi"
                                            v-on:change="exatecSiChecks()" class="input-checkbox" />
                                        <label for="checkbox-exatec-si" class="label-checkbox"></label>
                                    </div>
                                    <p class="input-label">Si</p>
                                    <div v-if="formularioValues.exatecSi">
                                        <label class="input-label" for="contacto-nombre">Matricula</label>
                                        <input type="text" v-model="formularioValues.matricula" class="input-custom" name="matricula" id="matricula">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
                                <div class="wrapper-input wrapper-checkbox">
                                    <div class="checkbox-custom">
                                        <input type="checkbox" id="checkbox-exatec-no" name="checkbox-exatec-no"
                                            v-model="formularioValues.exatecNo"  
                                            v-on:change="exatecNoChecks()"  class="input-checkbox" />
                                        <label for="checkbox-exatec-no" class="label-checkbox"></label>
                                    </div>
                                    <p class="input-label">No</p>
                                </div>
                            </div>
                        </div>
                        <hr class="separator" />
                        <p class="title-section-checkbox">¿Deseas que tu nominaci&oacute;n sea an&oacute;nima?</p>
                        <div class="row">
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
                                <div class="wrapper-input wrapper-checkbox">
                                    <div class="checkbox-custom">                                        
                                        <input type="checkbox" id="checkbox-nominacion-anonima-si" name="checkbox-nominacion-anonima-si"
                                            v-model="formularioValues.nominacionAnonimaSi"
                                            v-on:change="nominacionAnonimaSiChecks()" class="input-checkbox" />
                                        <label for="checkbox-nominacion-anonima-si" class="label-checkbox"></label>
                                    </div>
                                    <p class="input-label">Si</p>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-6">
                                <div class="wrapper-input wrapper-checkbox">
                                    <div class="checkbox-custom">
                                        <input type="checkbox" id="checkbox-nominacion-anonima-no" name="checkbox-nominacion-anonima-no"
                                        v-model="formularioValues.nominacionAnonimaNo"
                                        v-on:change="nominacionAnonimaNoChecks()" class="input-checkbox" />
                                        <label for="checkbox-nominacion-anonima-no" class="label-checkbox"></label>
                                    </div>
                                    <p class="input-label">No</p>
                                </div>
                            </div>
                        </div>
                        <hr class="separator" />
                        <div class="row">
                            <div class="col-xl-4 col-lg-4">
                                <div class="wrapper-input">
                                    <label class="input-label" for="contacto-nombre">Nombre completo *</label>
                                    <input type="text" v-model="formularioValues.contactoNombre" class="input-custom" name="contacto-nombre" id="contacto-nombre">
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4">
                                <div class="wrapper-input">
                                    <label class="input-label" for="contacto-celular">N&uacute;mero de celular *</label>
                                    <input type="text" v-model="formularioValues.contactoCelular" class="input-custom" name="contacto-celular"
                                        id="contacto-celular">
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4">
                                <div class="wrapper-input">
                                    <label class="input-label" for="contacto-email" required>Email *</label>
                                    <input type="email" v-model="formularioValues.contactoEmail" class="input-custom" name="contacto-email" id="contacto-email">
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
                                        <input type="checkbox" id="checkbox-postumo-si" name="checkbox-postumo"
                                        v-model="formularioValues.nominacionPostumaSi"
                                        v-on:change="nominacionPostumaSiChecks()"
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
                                        v-model="formularioValues.nominacionPostumaNo"
                                        v-on:change="nominacionPostumaNoChecks()"    
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
                                        v-model="formularioValues.trayectoria"
                                        v-on:click="trayectoriaChecks()"    
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
                                        v-model="formularioValues.merito"
                                        v-on:click="meritoChecks()"     
                                        name="checkbox-merito-exatec" class="input-checkbox" />
                                        <label for="checkbox-merito-exatec" class="label-checkbox"></label>
                                    </div>
                                    <p class="input-label">Mérito EXATEC</p>
                                </div>
                            </div>
                        </div>
                        <p class="title-section-checkbox">
                            Selecciona el campus al que deseas dirigir esta nominaci&oacute;n
                        </p>
                        <div class="row personal-info-fields">
                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 custom-columns">
                                <select v-model="formularioValues.campusSeleccionado" class="input-custom">
                                    <option v-for="campus in campus" v-bind:value="campus.value">
                                        {{ campus.text }}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="row personal-info-fields">
                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 custom-columns">
                                <div class="wrapper-input">
                                    <label class="input-label" for="nominado-nombre">Nombre completo *</label>
                                    <input type="text" v-model="formularioValues.nominadoNombre" class="input-custom" id="nominado-nombre" name="nominado-nombre">
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 custom-columns">
                                <div class="wrapper-input">
                                    <label class="input-label" for="nominado-celular">N&uacute;mero de celular *</label>
                                    <input type="text" v-model="formularioValues.nominadoCelular" class="input-custom" name="nominado-celular"
                                        id="nominado-celular">
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 custom-columns">
                                <div class="wrapper-input">
                                    <label class="input-label" for="nominado-email">Email *</label>
                                    <input type="email" v-model="formularioValues.nominadoEmail" class="input-custom" name="nominado-email" id="nominado-email">
                                </div>
                            </div>
                        </div>
                        <hr class="separator">
                        <div class="row attachment"> 
                            <div>
                                <p class="title-section-checkbox field-description">Evidencia de logros del nominado                             
                                    <span class="title-italic">
                                    Anexa a continuación un documento tipo PDF que integre aquellas evidencia de logros de tu nominado, tanto profesionales como afiliaciones comunitarias, premios, honores o condecoraciones, publicaciones, servicio extraordinarios y/o apoyo al TEC u otras organizaciones, entre otros.
                                    </span>
                                </p>
                            </div>
                           
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <template>
                                <div class="example-full">
                                <div class="upload">
                                    
                                    <div class="table-responsive">
                                    <table class="table table-hover" v-if="evidencias.archivos.length > 0">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="(file, index) in evidencias.archivos" :key="file.id">
                                            <td>{{index + 1}}</td>
                                            <td>
                                            <div class="filename">
                                                {{file.name}}
                                            </div>
                                            </td>
                                            <td>
                                            <div class="btn-group">
                                                <button class="btn btn-danger btn-sm" @click.prevent="quitarArchivo(evidencias.archivos, index)">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    </div>
                                    <div class="example-foorer">
                                    <div class="btn-group">
                                        <file-upload
                                            name="evidenciaArchivos"
                                            input-id="evidenciaArchivos"
                                        class="btn btn-primary"
                                        post-action="api/nominacion.php"
                                        :put-action="putAction"
                                        extensions="pdf"
                                        accept="application/pdf"
                                        :multiple="true"
                                        :maximum="2"
                                        v-model="evidencias.archivos" 
                                        >
                                        <i class="fa fa-plus"></i>
                                        Cargar Archivo
                                        </file-upload>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                </template>
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
                            <h3 class="heading heading-03">3. Semblanza del nominado</h3>
                            <p class="info-contact-txt">
                                Por &uacute;ltimo necesitamos la semblanza de la persona nominada. Recuerda que esta
                                información será revisada por los miembros del jurado.
                            </p>
                        </div>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6">                       
                                <template>
                                <div class="example-full">
                                <div class="upload">
                                    <p class="info-contact-txt">Sube el curriculum de la persona nominada</p>
                                    <div class="table-responsive">
                                    <table class="table table-hover" v-if="semblanza.archivos.length > 0">
                                        <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="(file, index) in semblanza.archivos" :key="file.id">
                                            <td>
                                            <div class="filename">
                                                {{file.name}}
                                            </div>
                                            </td>
                                            <td>
                                            <div class="btn-group">
                                                <button class="btn btn-danger btn-sm" @click.prevent="quitarArchivo(semblanza.archivos, index)">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    </div>
                                    <div class="example-foorer">
                                    <div class="btn-group">
                                        <file-upload 
                                            name="semblanzaArchivo"
                                            input-id="semblanzaArchivo"
                                        class="btn btn-primary"
                                        post-action="api/p.php"
                                        extensions="pdf"
                                        accept="application/pdf"
                                        :multiple="false"
                                        v-model="semblanza.archivos"
                                        :size="1024 * 1024 * 10"
                                        >
                                        <i class="fa fa-plus"></i>
                                        Cargar Archivo
                                        </file-upload>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                </template>
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <template>
                                <div class="example-full">
                                <div class="upload">
                                    <p class="info-contact-txt">Sube una foto o imagen del candidato</p>
                                    <div class="table-responsive">
                                    <table class="table table-hover" v-if="semblanza.imagenes.length > 0">
                                        <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="(file, index) in semblanza.imagenes" :key="file.id">
                                            <td>
                                            <div class="filename">
                                                {{file.name}}
                                            </div>
                                            </td>
                                            <td>
                                            <div class="btn-group">
                                                <button class="btn btn-danger btn-sm" @click.prevent="quitarArchivo(semblanza.imagenes, index)">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    </div>
                                    <div class="example-foorer">
                                    <div class="btn-group">
                                        <file-upload
                                            name="semblanzaImagen"
                                            input-id="semblanzaImagen"
                                        class="btn btn-primary"
                                        :post-action="postAction"
                                        :put-action="putAction"
                                        extensions="jpg,png"
                                        accept="image/jpeg,image/png"
                                        :multiple="false"
                                        v-model="semblanza.imagenes"
                                        >
                                        <i class="fa fa-plus"></i>
                                        Cargar Archivo
                                        </file-upload>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                </template>
                            </div>
                        </div>
                        <hr class="mt-5" />
                        <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 custom-columns">
                                <div class="wrapper-input">
                                    <label class="input-label" for="pagina-linkedin">P&aacute;gina LinkedIn del nominado</label>
                                    <input type="url" v-model="formularioValues.paginaLinkedIn" class="input-custom" id="pagina-linkedin" name="pagina-linkedin">
                                </div>
                            </div>
                        </div>
                        <hr class="mt-5 " />
                        <div class="row">
                            <div class="col-12 info-contact-content">
                                    <p class="info-contact-txt">
                                    Describe y/o justifica las razones por las cuales propones a tu candidato al Premio seleccionado y que lo hacen merecedor de este reconocimiento. <strong><br/>¿Por qué nominar?</strong></p>
	                                <p class="info-contact-txt">
                                        <strong>Tip</strong> Comparte ejemplos personales, esta es una 	manera memorable de hacer que tu candidato se destaque.</p></span>
                                    </p>
                                <div class="wrapper-input">
                                <label class="input-label" for="ejemplos">Razón de nominar</label>
                                    <textarea class="input-custom" name="ejemplos" placeholder="Escribir" v-model="formularioValues.razonNominacion"></textarea>
                                    <small>(Máximo 3000 caracteres)</small>
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
                                    <a v-on:click="enviar()" class="button-general button-primary button-form-process">
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
<script src="https://unpkg.com/vue-upload-component"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.js"></script>

<script src="https://unpkg.com/vue-select@3.0.0"></script>
<link rel="stylesheet" href="https://unpkg.com/vue-select@3.0.0/dist/vue-select.css">

<script src="procesoformvue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<hr class="mt-5 mb-5">
<?php include('footer.php'); ?>