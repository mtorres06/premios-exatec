var procesoForm = new Vue({
    el: '#procesoForm',
    data: {
        showStep1: true,
        showStep2: false,
        showStep3: false,

        showNext: true,
        showPrev: false,

        formularioValues: {
            personaFisica: false,
            personaMoral: false,
            contactoNombre: '',
            nominacionPostumaSi: false,
            nominacionPostumaNo: false,
            trayectoria:false,
            merito:false,
            nominadoNombre: '',
            evidenciaFile:'',
            cv:'',
        }

    },
    methods: {
        validarFormulario: function() {
            if((!!this.formularioValues.personaFisica) === false 
            && (!!this.formularioValues.personaMoral) === false ) {
                   return {
                       valid: false,
                       message: 'Seleccione persona física o moral.'
                   };
            }
            if((!!this.formularioValues.nominacionPostumaSi) === false 
            && (!!this.formularioValues.nominacionPostumaNo) === false ) {
                   return {
                       valid: false,
                       message: 'Seleccione si es o no una nominación póstuma.'
                   };
            }
            if(!!this.formularioValues.nominadoNombre === false) {
                return {
                    valid: false,
                    message: 'Ingrese el nombre del nominado.'
                };
            }
            if(!!this.formularioValues.contactoNombre === false) {
                return {
                    valid: false,
                    message: 'Ingrese el nombre del contacto.'
                };
            }
            // if(!!this.formularioValues.evidenciaFile === false) {
            //    return {
              //      valid: false,
                //    message: 'El archivo de evidencias es requerido.'
          //      };
            //}
        //    if(!!this.formularioValues.cv === false) {
         //       return {
          //          valid: false,
           //         message: 'El CV es requerido.'
            //    };
            //}
            return {
                valid: true,
                message: ''
            };
        },
        personaFisicaChecks: function() {
            this.formularioValues.personaMoral = !this.formularioValues.personaFisica;
        },
        personaMoralChecks: function() {
            this.formularioValues.personaFisica = !this.formularioValues.personaMoral;
        },
        nominacionPostumaSiChecks: function() {
            this.formularioValues.nominacionPostumaNo = !this.formularioValues.nominacionPostumaSi;
        },
        nominacionPostumaNoChecks: function() {
            this.formularioValues.nominacionPostumaSi = !this.formularioValues.nominacionPostumaNo;
        },
        trayectoriaChecks: function() {
            this.formularioValues.merito = !this.formularioValues.trayectoria;
        },
        meritoChecks: function(){
            this.formularioValues.trayectoria = !this.formularioValues.merito;
        },
        goToStep1: function() {
            this.showStep1 = true;
            this.showStep2 = false;
            this.showStep3 = false;

            this.showNext = true;
            this.showPrev = false;
        },
        goToStep2: function() {
            this.showStep1 = false;
            this.showStep2 = true;
            this.showStep3 = false;

            this.showNext = true;
            this.showPrev = true;
        },
        goToStep3: function() {
            this.showStep1 = false;
            this.showStep2 = false;
            this.showStep3 = true;

            this.showNext = false;
            this.showPrev = true;
        },
        goNext: function() {
            if(this.showStep1) {
                this.goToStep2();
            } else if(this.showStep2) {
                this.goToStep3();
            } else if(this.showStep3) {
                console.log('click next');
            }
        },
        goPrev: function() {
            if(this.showStep1) {
                console.log('click prev');
            } else if(this.showStep2) {
                this.goToStep1();
            } else if (this.goToStep3) {
                this.goToStep2();
            }
        },
        enviar:function(event) {
            var formulario = $('#formulario').serialize();
            var url = $('#formulario')[0].action;

            var validado = this.validarFormulario();
            if(validado.valid === false)
            {
                swal("Error de validación", validado.message, "info");
                //event.preventDefault();
                // return;
            }
            else
            {
                if(!formulario){
                    //event.preventDefault();
                }
                else {
                    console.log(formulario);
                    $('#formulario').submit();
                }
            }
        },
        Init: function() {
            this.showStep1 = true;
            this.showStep2 = false;
            this.showStep3 = false;

            this.showNext = true;
            this.showPrev = false;
        }
    }
});
procesoForm.Init();