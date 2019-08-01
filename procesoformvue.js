var procesoForm = new Vue({
    el: '#procesoForm',
    data: {
        showStep1: true,
        showStep2: false,
        showStep3: false,

        showNext: true,
        showPrev: false,
    },
    methods: {
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
            if(!formulario){
                event.preventDefault();
            }
            else {
                console.log(formulario);
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