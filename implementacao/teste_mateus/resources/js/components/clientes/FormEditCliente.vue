<template>
    <div id="form-edit-cliente">
        <form class="m-form m-form--fit">
            <div class="m-portlet__body">
                <div class="m-form__section m-form__section--first">
                    <div class="form-group m-form__group row">
                        <div class="col-lg-6">
                            <label>
                                Cliente: {{id}}
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
        name: 'form-edit-cliente',
    	props : ['id'],
        data () {
            return {
                urlBase: urlBase,
                titulo: 'Atualizar cliente',
                formRequest : '',
                form_errors: {},
                cliente: '',
            }
        },
        methods : {
            salvar : function() {
                self = this;
                Swal.queue([{
                    type: 'question',
                    showCancelButton: true,
                    title: 'Atualizar',
                    confirmButtonText: 'Salvar',
                    text: 'Atualizar cliente?',
                    showLoaderOnConfirm: true,
                    preConfirm: () => {
                        return self.$http.put(urlBase + '/clientes/atualizar/'+self.cliente.id, self.cliente).then((response) => {
                            self.retorno = response.body;
                            return Swal({
                                type: 'success',
                                title: 'Atualizado!',
                                html: 'Cliente atualizado com sucesso',
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
            },
            recuperarCliente : function(){
                self = this;
                this.$http.get(urlBase + '/clientes/recuperar/'+this.id).then((response) => {
                    self.cliente = response.body.cliente;
                }, response => {                          
                    return Swal({
                        type: 'error',
                        title: 'Atenção!',
                        html: 'Ocorreu um erro ao processar informação!s',
                    });
                });
            }
            
        },
        created () {
            this.recuperarCliente();
        },
    };
</script>

<style scoped>
</style>
