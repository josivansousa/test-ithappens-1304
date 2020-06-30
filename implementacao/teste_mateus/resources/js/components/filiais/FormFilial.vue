<template>
    <div id="form-filial">
        <form class="m-form m-form--fit">
            <div class="m-portlet__body">
                <div class="m-form__section m-form__section--first">
                    <div class="form-group m-form__group row">
                        <div class="col-lg-6">
                            <label>
                                Nome:
                            </label>
                            <input type="text" class="form-control m-input" v-model="filial.nome" placeholder="Nome da filial">
                            <span class="m-form__help">
                                Por favor, digite o nome
                            </span>
                        </div>
                        <div class="col-lg-6">
                            <label>
                                CNPJ:
                            </label>
                            <the-mask :mask="['##.###.###/####-##']" v-model="filial.cnpj" class="form-control m-input"/>
                            <!-- <input type="text" class="form-control m-input" v-model="filial.cnpj" placeholder="CNPJ da filial"> -->
                            <span class="m-form__help">
                                Por favor, digite o CNPJ
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
        name: 'form-filial',
        data () {
            return {
                urlBase: urlBase,
                titulo: 'Cadastrar filial',
                formRequest : '',
                form_errors: {},
                filial: {
                    nome : '',
                    cnpj : '',
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
                    text: 'Salvar filial?',
                    showLoaderOnConfirm: true,
                    preConfirm: () => {
                        return self.$http.post(urlBase + '/filiais/salvar', self.filial).then((response) => {
                            self.retorno = response.body;
                            return Swal({
                                type: 'success',
                                title: 'Salvo!',
                                html: 'Filial salvo com sucesso',
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
