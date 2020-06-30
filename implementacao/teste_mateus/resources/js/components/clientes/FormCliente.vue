<template>
    <div id="form-cliente">
        <form class="m-form m-form--fit">
            <div class="m-portlet__body">
                <div class="m-form__section m-form__section--first">
                    <div class="form-group m-form__group row">
                        <div class="col-lg-6">
                            <label>
                                Cliente:
                            </label>
                            <input type="text" class="form-control m-input" v-model="cliente.nome" placeholder="Nome do cliente">
                            <span class="m-form__help">
                                Por favor, digite o nome
                            </span>
                        </div>
                        <div class="col-lg-6">
                            <label>
                                CPF: 
                            </label>
                            <the-mask :mask="['###.###.###-##']" v-model="cliente.cpf" class="form-control m-input"/>

                            <!-- <input type="text" class="form-control m-input" v-model="cliente.cpf" placeholder="CPF do cliente"> -->
                            <span class="m-form__help">
                                Por favor, digite o CPF
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
        name: 'form-cliente',
        data () {
            return {
                urlBase: urlBase,
                titulo: 'Cadastro de cliente',
                formRequest : '',
                form_errors: {},
                cliente: {
                    nome : '',
                    cpf : '',
                },
            }
        },
        methods : {
            salvar : function() {
                self = this;
                const ipAPI = '//api.ipify.org?format=json'

                Swal.queue([{
                    type: 'question',
                    showCancelButton: true,
                    title: 'Salvar',
                    confirmButtonText: 'Salvar',
                    text: 'Salvar cliente?',
                    showLoaderOnConfirm: true,
                    preConfirm: () => {
                        return self.$http.post(urlBase + '/clientes/salvar', self.cliente).then((response) => {
                            self.retorno = response.body;
                            return Swal({
                                type: 'success',
                                title: 'Salvo!',
                                html: 'Cliente salvo com sucesso',
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
