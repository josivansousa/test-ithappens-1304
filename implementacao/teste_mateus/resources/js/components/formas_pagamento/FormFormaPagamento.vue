<template>
    <div id="form-forma-pagamento">
        <form class="m-form m-form--fit">
            <div class="m-portlet__body">
                <div class="m-form__section m-form__section--first">
                    <div class="form-group m-form__group row">
                        <div class="col-lg-6">
                            <label>
                                Nome:
                            </label>
                            <input type="text" class="form-control m-input" v-model="forma_pagamento.forma_pagamento" placeholder="Nome da forma de pagamento">
                            <span class="m-form__help">
                                Por favor, digite o nome da forma de pagamento
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="m-portlet__foot m-portlet__foot--fit">
                <div class="m-form__actions m-form__actions">
                    <button type="button" @click="salvar()" class="btn btn-primary">
                        Salvar
                    </button>
                    <button type="reset" class="btn btn-secondary">
                        Cancelar
                    </button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        name: 'form-forma-pagamento',
        data () {
            return {
                urlBase: urlBase,
                titulo: 'Cadastrar forma de pagamento',
                formRequest : '',
                form_errors: {},
                forma_pagamento: {
                    forma_pagamento : ''
                },
            }
        },
        methods : {
            salvar : function() {
                self = this;
                Swal.queue([{
                    type: 'question',
                    showCancelButton: true,
                    title: 'Salvar',
                    confirmButtonText: 'Salvar',
                    text: 'Salvar forma de pagamento?',
                    showLoaderOnConfirm: true,
                    preConfirm: () => {
                        return self.$http.post(urlBase + '/formas-pagamento/salvar', self.forma_pagamento).then((response) => {
                            self.retorno = response.body;
                            return Swal({
                                type: 'success',
                                title: 'Salvo!',
                                html: 'Forma de pagamento salvo com sucesso',
                            });                            
                        }, response => {                          
                            var form = response.body;
                            self.formRequest = form;                           
                            self.retorno = 0;

                            self.form_errors = self.mountErrors(self.formRequest);
                            var msg = self.formErros(self.formRequest);

                            return Swal({
                                type: 'error',
                                title: 'Atenção!',
                                html: msg,
                            });

                        });
                    }
                }])
            }
        },
    };
</script>

<style scoped>
</style>
