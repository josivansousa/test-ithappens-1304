<template>
    <div id="form-edit-usuario">
        <form class="m-form m-form--fit">
            <div class="m-portlet__body">
                <div class="m-form__section m-form__section--first">
                    <div class="form-group m-form__group row">
                        <div class="col-lg-6">
                            <label>
                                Nome:
                            </label>
                            <input type="text" class="form-control m-input" 
                                v-model="usuario.nome" 
                                placeholder="Nome do usuário">
                            <span class="m-form__help">
                                Por favor, digite o nome do usuário
                            </span>
                        </div>
                        <div class="col-lg-6">
                            <label>
                                E-mail:
                            </label>
                            <input type="text" class="form-control m-input" 
                                v-model="usuario.email" 
                                placeholder="E-mail do usuário">
                            <span class="m-form__help">
                                Por favor, digite o email do usuário
                            </span>
                        </div>
                        <div class="col-lg-6">
                            <label class="">
                                Filial:
                            </label>
                            <select class="form-control m-input" v-model="usuario.filial_id">
                                <option value="" selected> -- Selecione a filial --</option>
                                <option v-for="(filial, key) in filiais" :value="filial.id">
                                    {{filial.nome}}
                                </option>
                            </select>
                            <span class="m-form__help">
                                Por favor, selecione a filial
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
        name: 'form-edit-usuario',
    	props : ['id'],
        data () {
            return {
                urlBase: urlBase,
                titulo: 'Atualizar usuario',
                formRequest : '',
                form_errors: {},
                filiais: '',
                usuario: '',
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
                    text: 'Atualizar usuario?',
                    showLoaderOnConfirm: true,
                    preConfirm: () => {
                        return self.$http.put(urlBase + '/usuarios/atualizar/'+self.usuario.id, self.usuario).then((response) => {
                            self.retorno = response.body;
                            return Swal({
                                type: 'success',
                                title: 'Atualizado!',
                                html: 'Usuário atualizado com sucesso',
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
            recuperarUsuario : function(){
                self = this;
                this.$http.get(urlBase + '/usuarios/recuperar/'+this.id).then((response) => {
                    self.usuario = response.body.usuario;                    
                }, response => {                          
                    return Swal({
                        type: 'error',
                        title: 'Atenção!',
                        html: 'Ocorreu um erro ao processar informação!s',
                    });
                });
            },
            recuperarFiliais : function(){
                self = this;
                this.$http.get(urlBase + '/filiais/listar-todos').then((response) => {
                    self.filiais = response.body.filiais;                    
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
            this.recuperarUsuario();
            this.recuperarFiliais();
        },
    };
</script>

<style scoped>
</style>
