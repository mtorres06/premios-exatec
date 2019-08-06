var procesoForm = new Vue({
    el: '#procesoForm',
    components: {
        FileUpload: VueUploadComponent,
        VSelect: VueSelect
    },
    data: {
        showStep1: true,
        showStep2: false,
        showStep3: false,

        showNext: true,
        showPrev: false,

        formularioValues: {
            personaFisica: false,
            personaMoral: false,
            exatecSi: false,
            exatecNo: false,
            nominacionAnonimaSi: false,
            nominacionAnonimaNo: false,
            matricula: '',
            contactoNombre: '',
            contactoCelular: '',
            contactoEmail: '',
            nominacionPostumaSi: false,
            nominacionPostumaNo: false,
            trayectoria: false,
            merito: false,
            nominadoNombre: '',
            nominadoCelular: '',
            nominadoEmail: '',
            paginaLinkedIn: '',
            razonNominacion: '',
            campusSeleccionado: ''
        },
        evidencias: {
            archivos: []
        },
        semblanza: {
            archivos: [],
            imagenes: []
        },
        campus: [
            { text: 'Cd. Juárez', value: '1' },
            { text: 'Cd. Obregón', value: '2' },
            { text: 'Chiapas', value: '3' },
            { text: 'Chihuahua', value: '4' },
            { text: 'Cuernavaca', value: '5' },
            { text: 'EGADE', value: '6' },
            { text: 'EGOB', value: '7' },
            { text: 'Guadalajara', value: '8' },
            { text: 'Hidalgo', value: '9' },
            { text: 'Irapuato', value: '10' },
            { text: 'Laguna', value: '11' },
            { text: 'León', value: '12' },
            { text: 'Morelia', value: '13' },
            { text: 'Puebla', value: '14' },
            { text: 'Querétaro', value: '15' },
            { text: 'Región Cd. de México', value: '16' },
            { text: 'Saltillo', value: '17' },
            { text: 'San Luis Potosí', value: '18' },
            { text: 'Sinaloa', value: '19' },
            { text: 'Sonora Norte', value: '20' },
            { text: 'Tampico', value: '21' },
            { text: 'Toluca', value: '22' },
            { text: 'Zacatecas', value: '23' },
            { text: 'Premio Trayectoria Nacional', value: '24' }
        ],
        files: [],
        file: '',
        postAction: '/api/p.php',
        putAction: '/api/put',
        headers: {
            'X-Csrf-Token': '32charactersOfRandomStringNoise!',
        },
        data: {
            '_csrf_token': 'xxxxxx',
        },
    },
    methods: {
        quitarArchivo(listaArchivos, index) {
            listaArchivos.splice(index, 1);
        },
        inputFile(newFile, oldFile) {

            if (newFile && !oldFile) {
                // add
                console.log('add', newFile)
            }
            if (newFile && oldFile) {
                // update
                console.log('update', newFile)
            }
            if (!newFile && oldFile) {
                // remove
                console.log('remove', oldFile)
            }
        },

        inputFilter(newFile, oldFile, prevent) {
            if (newFile && !oldFile) {
                // Before adding a file
                // 添加文件前
                // Filter system files or hide files
                // 过滤系统文件 和隐藏文件
                if (/(\/|^)(Thumbs\.db|desktop\.ini|\..+)$/.test(newFile.name)) {
                    return prevent()
                }
                // Filter php html js file
                // 过滤 php html js 文件
                if (/\.(php5?|html?|jsx?)$/i.test(newFile.name)) {
                    return prevent()
                }
            }
        },
        // -------

        validarFormulario: function () {
            var errorMessages = "";
            if (!!this.semblanza.archivos.length == 0) {
                errorMessages += '- Seleccione el curriculum del nominado.\n';
            }
            if (this.formularioValues.razonNominacion === "") {
                errorMessages += '- Describa la razón de nominar.\n';
            }

            if (errorMessages != "") {
                return {
                    valid: false,
                    message: errorMessages
                };
            } else {
                return {
                    valid: true,
                    message: 'Se estan enviando los datos.'
                };
            }
        },
        personaFisicaChecks: function () {
            this.formularioValues.personaMoral = !this.formularioValues.personaFisica;
        },
        personaMoralChecks: function () {
            this.formularioValues.personaFisica = !this.formularioValues.personaMoral;
        },
        exatecSiChecks: function () {
            this.formularioValues.exatecNo = !this.formularioValues.exatecSi;
        },
        exatecNoChecks: function () {
            this.formularioValues.exatecSi = !this.formularioValues.exatecNo;
        },
        nominacionAnonimaSiChecks: function () {
            this.formularioValues.nominacionAnonimaNo = !this.formularioValues.nominacionAnonimaSi;
        },
        nominacionAnonimaNoChecks: function () {
            this.formularioValues.nominacionAnonimaSi = !this.formularioValues.nominacionAnonimaNo;
        },
        nominacionPostumaSiChecks: function () {
            this.formularioValues.nominacionPostumaNo = !this.formularioValues.nominacionPostumaSi;
        },
        nominacionPostumaNoChecks: function () {
            this.formularioValues.nominacionPostumaSi = !this.formularioValues.nominacionPostumaNo;
        },
        trayectoriaChecks: function () {
            this.formularioValues.trayectoria = !this.formularioValues.trayectoria;
        },
        meritoChecks: function () {
            this.formularioValues.merito = !this.formularioValues.merito;
        },
        goToStep1: function () {
            var errorMessages = "";

            if (errorMessages != "") {
                swal("Error de validación", errorMessages, "info");
            } else {
                this.showStep1 = true;
                this.showStep2 = false;
                this.showStep3 = false;

                this.showNext = true;
                this.showPrev = false;
            }
        },
        goToStep2: function () {
            var errorMessages = "";
            if ((!!this.formularioValues.personaFisica) === false
                && (!!this.formularioValues.personaMoral) === false) {
                errorMessages += '- Seleccione persona física o moral.\n';
            }
            if ((!!this.formularioValues.exatecSi) === false
                && (!!this.formularioValues.exatecNo) === false) {
                errorMessages += '- Seleccione si es o no Exatec.\n';
            }
            if ((this.formularioValues.exatecSi) && (!!this.formularioValues.matricula == false)) {
                errorMessages += '- Si eres Exatec ingresa tu matricula.\n';
            }
            if ((!!this.formularioValues.nominacionAnonimaSi) === false
                && (!!this.formularioValues.nominacionAnonimaNo) === false) {
                errorMessages += '- Seleccione si desea o no una nominación anónima.\n';
            }
            if (!!this.formularioValues.contactoNombre === false) {
                errorMessages += '- Ingrese el nombre del contacto.\n';
            }
            if (!!this.formularioValues.contactoCelular === false) {
                errorMessages += '- Ingrese el celular del contacto.\n';
            } else {
                console.log(/^[0-9]+$/.test(this.formularioValues.contactoCelular));
                if (!/^[0-9]+$/.test(this.formularioValues.contactoCelular)) {
                    errorMessages += '- El formato del número celular del contacto no es valido.\n';
                }
            }
            if (!!this.formularioValues.contactoEmail === false) {
                errorMessages += '- Ingrese el email del contacto.\n';
            } else {
                if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(this.formularioValues.contactoEmail)) {
                    errorMessages += '- El formato del email del contacto no es valido.\n';
                }
            }

            if (errorMessages != "") {
                swal("Error de validación", errorMessages, "info");
            } else {
                this.showStep1 = false;
                this.showStep2 = true;
                this.showStep3 = false;

                this.showNext = true;
                this.showPrev = true;
            }
        },
        goToStep3: function () {
            console.log(this.formularioValues.trayectoria + " | " + this.formularioValues.merito);
            var errorMessages = "";
            if ((!!this.formularioValues.nominacionPostumaSi) === false
                && (!!this.formularioValues.nominacionPostumaNo) === false) {
                errorMessages += '- Seleccione si es o no una nominación póstuma.\n';
            }
            if ((!!this.formularioValues.trayectoria) === false
                && (!!this.formularioValues.merito) === false) {
                errorMessages += '- Seleccione al menos una categoría que desee que participe el nominado.\n';
            }
            if (!!this.formularioValues.nominadoNombre === false) {
                errorMessages += '- Ingrese el nombre del nominado.\n';
            }
            if (!!this.formularioValues.nominadoCelular === false) {
                errorMessages += '- Ingrese el celular del nominado.\n';
            } else {
                if (!/^[0-9]+$/.test(this.formularioValues.nominadoCelular)) {
                    errorMessages += '- El formato del número celular del nominado no es valido.\n';
                }
            }
            if (!!this.formularioValues.nominadoEmail === false) {
                errorMessages += '- Ingrese el email del nominado.\n';
            } else {
                if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(this.formularioValues.nominadoEmail)) {
                    errorMessages += '- El formato del email del nominado no es valido.\n';
                }
            }
            if (!!this.evidencias.archivos.length == 0) {
                errorMessages += '- Selecione al menos una evidencia de los logros del nominado.\n';
            }

            if (errorMessages != "") {
                swal("Error de validación", errorMessages, "info");
            } else {
                this.showStep1 = false;
                this.showStep2 = false;
                this.showStep3 = true;

                this.showNext = false;
                this.showPrev = true;
            }
        },
        goNext: function () {
            if (this.showStep1) {
                this.goToStep2();
            } else if (this.showStep2) {
                this.goToStep3();
            } else if (this.showStep3) {
                console.log('click next');
            }
        },
        goPrev: function () {
            if (this.showStep1) {
                console.log('click prev');
            } else if (this.showStep2) {
                this.goToStep1();
            } else if (this.goToStep3) {
                this.goToStep2();
            }
        },
        updatetSemblanzaArchivo: function (value) {
            this.files = value;
        },
        enviar: function (event) {
            var formulario = $('#formulario').serialize();
            console.log(formulario);
            var url = $('#formulario')[0].action;

            var validado = this.validarFormulario();
            if (validado.valid === false) {
                swal("Error de validación", validado.message, "info");
                //event.preventDefault();
                // return;
            }
            else {
                var formData = new FormData();
                /*
                var archivos = [];
                archivos = archivos.concat(
                    evidencias.archivos,
                    this.formularioValues.semblanza.archivos,
                    this.formularioValues.semblanza.imagenes
                );
                for (var i = 0; i < archivos.length; i++) {
                    let archivo = archivos[i];
                    formData.append('Content-Type', archivo.type || 'application/octet-stream');
                    formData.append('files[' + i + ']', JSON.stringify(archivo));
                    formData.append('archivos[' + i + ']', archivo);
                }
                */
                /*
                 for (var i = 0; i < this.evidencias.archivos.length; i++) {
                     formData.append('evidencias0' + (i + 1).toString(), this.evidencias.archivos[i].file);
                 }*/
                formData.append('evidencia01', this.evidencias.archivos[0].file);
                if (this.evidencias.archivos.length > 1) {
                    formData.append('evidencia02', this.evidencias.archivos[1].file);
                }
                formData.append("nominadoCurriculum", this.semblanza.archivos[0].file);
                formData.append("nominadoFoto", this.semblanza.imagenes[0].file);

                var formularioValues = this.formularioValues;

                axios.post('api/nominacion.php',
                    //axios.post('api/p.php',
                    formData,
                    {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    }
                ).then(function (response) {
                    console.log('SUCCESS!!');
                    if (response.data.camposEvidecias != "") {
                        formData = new FormData();
                        formData.append("datosNominacion", JSON.stringify(formularioValues));
                        formData.append("evidenciasNominacion", JSON.stringify(response.data));
                        axios.post('api/nominacion.php',
                            formData).then(function () {
                                swal("Enviando información", validado.message, "success");
                                location.href = "gracias.php";
                            }).catch(function () {
                                console.log('FAILURE!!');
                            });
                    } else {
                        swal("Enviando información", "Ocurrio un error, intentelo nuevamente mas tarde.", "warning");
                    }
                })
                    .catch(function () {
                        console.log('FAILURE!!');
                    });
                /*
                if (!formulario) {
                    //event.preventDefault();
                }
                else {
                    console.log(formulario);
                    $('#formulario').submit();
                }
                */
            }
        },
        Init: function () {
            this.showStep1 = true;
            this.showStep2 = false;
            this.showStep3 = false;

            this.showNext = true;
            this.showPrev = false;
        }
    }
});
procesoForm.Init();