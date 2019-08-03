var procesoForm = new Vue({
    el: '#procesoForm',
    components: {
        FileUpload: VueUploadComponent
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
            contactoNombre: '',
            contactoCelular: '',
            contactoEmail: '',
            nominacionPostumaSi: false,
            nominacionPostumaNo: false,
            trayectoria: [],
            merito: false,
            nominadoNombre: '',
            nominadoCelular: '',
            nominadoEmail: '',
            evidencias: {
                archivos: []
            },
            semblanza: {
                archivos: [],
                imagenes: []
            },
            razonNominacion: ''
        },

        postAction: '/upload/post',
        putAction: '/upload/put',
        headers: {
            'X-Csrf-Token': 'xxxx',
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
            if (newFile && newFile.error === 'unencrypted' && !oldFile) {
                new Promise(function (resolve, reject) {
                    //.. async

                    let file = newFile.file

                    // ...

                    resolve(new File(['xxx'], newFile.name, { type: newFile.type }))
                }).then((file) => {
                    // Encryption is successful
                    // deleted the error
                    this.$refs.upload.update(newFile, { file, error: '' })
                }).catch((e) => {
                    // Encryption failed
                    // Modify the error
                    this.$refs.upload.update(newFile, { error: e.code || e.error || e.message || e })
                })
            }
        },
        // -------

        validarFormulario: function () {
            console.log(this.formularioValues.trayectoria);
            if ((!!this.formularioValues.personaFisica) === false
                && (!!this.formularioValues.personaMoral) === false) {
                return {
                    valid: false,
                    message: 'Seleccione persona física o moral.'
                };
            }
            if ((!!this.formularioValues.exatecSi) === false
                && (!!this.formularioValues.exatecNo) === false) {
                return {
                    valid: false,
                    message: 'Seleccione si es o no Exatec.'
                };
            }
            if ((!!this.formularioValues.nominacionAnonimaSi) === false
                && (!!this.formularioValues.nominacionAnonimaNo) === false) {
                return {
                    valid: false,
                    message: 'Seleccione si desea o no una nominación anónima.'
                };
            }
            if (!!this.formularioValues.contactoNombre === false) {
                return {
                    valid: false,
                    message: 'Ingrese el nombre del contacto.'
                };
            }
            if (!!this.formularioValues.contactoCelular === false) {
                return {
                    valid: false,
                    message: 'Ingrese el celular del contacto.'
                };
            }
            if (!!this.formularioValues.contactoEmail === false) {
                return {
                    valid: false,
                    message: 'Ingrese el email del contacto.'
                };
            }

            if ((!!this.formularioValues.nominacionPostumaSi) === false
                && (!!this.formularioValues.nominacionPostumaNo) === false) {
                return {
                    valid: false,
                    message: 'Seleccione si es o no una nominación póstuma.'
                };
            }
            if ((!!this.formularioValues.trayectoria) === false
                && (!!this.formularioValues.merito) === false) {
                return {
                    valid: false,
                    message: 'Seleccione al menos una categoría que desee que participe el nominado.'
                };
            }
            if (!!this.formularioValues.nominadoNombre === false) {
                return {
                    valid: false,
                    message: 'Ingrese el nombre del nominado.'
                };
            }
            if (!!this.formularioValues.nominadoCelular === false) {
                return {
                    valid: false,
                    message: 'Ingrese el celular del nominado.'
                };
            }
            if (!!this.formularioValues.nominadoEmail === false) {
                return {
                    valid: false,
                    message: 'Ingrese el email del nominado.'
                };
            }
            if (!!this.formularioValues.evidencias.archivos.length == 0) {
                return {
                    valid: false,
                    message: 'Selecione al menos una evidencia de los logros del nominado.'
                };
            }

            if (!!this.formularioValues.semblanza.archivos.length == 0) {
                return {
                    valid: false,
                    message: 'Seleccione el curriculum del nominado.'
                };
            }



            return {
                valid: true,
                message: 'Se estan enviando los datos.'
            };
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
            this.showStep1 = true;
            this.showStep2 = false;
            this.showStep3 = false;

            this.showNext = true;
            this.showPrev = false;
        },
        goToStep2: function () {
            this.showStep1 = false;
            this.showStep2 = true;
            this.showStep3 = false;

            this.showNext = true;
            this.showPrev = true;
        },
        goToStep3: function () {
            this.showStep1 = false;
            this.showStep2 = false;
            this.showStep3 = true;

            this.showNext = false;
            this.showPrev = true;
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
        enviar: function (event) {
            var formulario = $('#formulario').serialize();
            var url = $('#formulario')[0].action;

            var validado = this.validarFormulario();
            if (validado.valid === false) {
                swal("Error de validación", validado.message, "info");
                //event.preventDefault();
                // return;
            }
            else {
                swal("Enviando información", validado.message, "success");
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
        },
        /**
         * Has changed
         * @param  Object|undefined   newFile   Read only
         * @param  Object|undefined   oldFile   Read only
         * @return undefined
         */
        inputFile: function (newFile, oldFile) {
            if (newFile && oldFile && !newFile.active && oldFile.active) {
                // Get response data
                console.log('response', newFile.response)
                if (newFile.xhr) {
                    //  Get the response status code
                    console.log('status', newFile.xhr.status)
                }
            }
        },
        /**
         * Pretreatment
         * @param  Object|undefined   newFile   Read and write
         * @param  Object|undefined   oldFile   Read only
         * @param  Function           prevent   Prevent changing
         * @return undefined
         */
        inputFilter: function (newFile, oldFile, prevent) {
            if (newFile && !oldFile) {
                // Filter non-image file
                if (!/\.(jpeg|jpe|jpg|gif|png|webp)$/i.test(newFile.name)) {
                    return prevent()
                }
            }

            // Create a blob field
            newFile.blob = ''
            let URL = window.URL || window.webkitURL
            if (URL && URL.createObjectURL) {
                newFile.blob = URL.createObjectURL(newFile.file)
            }
        }
    }
});
procesoForm.Init();