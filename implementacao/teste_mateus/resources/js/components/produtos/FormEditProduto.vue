<template>
    <div id="form-edit-filial">
         <form class="m-form m-form--fit">
            <div class="m-portlet__body">
                <div class="m-form__section m-form__section--first">
                    <div class="form-group m-form__group row">
                        <div class="col-lg-6">
                            <label>
                                Nome:
                            </label>
                            <input type="text" class="form-control m-input" 
                                v-model="produto.descricao" 
                                placeholder="Descrição do produto">
                            <span class="m-form__help">
                                Por favor, digite a descrição
                            </span>
                        </div>
                        <div class="col-lg-6">
                            <label>
                                Produto:
                            </label>
                            <input type="text" class="form-control m-input" 
                                v-model="produto.codigo" 
                                placeholder="Codigo do produto">
                            <span class="m-form__help">
                                Por favor, digite o codigo
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
        name: 'form-edit-filial',
    	props : ['id'],
        data () {
            return {
                urlBase: urlBase,
                titulo: 'Atualizar filial',
                formRequest : '',
                form_errors: {},
                produto: '',
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
                    text: 'Atualizar produto?',
                    showLoaderOnConfirm: true,
                    preConfirm: () => {
                        return self.$http.put(urlBase + '/produtos/atualizar/'+self.produto.id, self.produto).then((response) => {
                            self.retorno = response.body;
                            return Swal({
                                type: 'success',
                                title: 'Atualizado!',
                                html: 'Produto atualizado com sucesso',
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
            recuperarProduto : function(){
                self = this;
                this.$http.get(urlBase + '/produtos/recuperar/'+this.id).then((response) => {
                    self.produto = response.body.produto;
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
            this.recuperarProduto();
        },
    };
</script>

<style scoped>
</style>
