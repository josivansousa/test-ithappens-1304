<template>
    <div id="form-edit-filial">
        <div class="m-content">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>
                                #
                            </th>
                            <th>
                                Produto
                            </th>
                            <th nowrap="true">
                                Código
                            </th>
                            <th nowrap="true" class="text-center">
                                Opções
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="produto in produtos.data">
                            <td>{{produto.id}}</td>
                            <td>{{produto.descricao}}</td>
                            <td>{{produto.codigo}}</td>
                            <td style="text-align: center;">
                                <button class="btn btn-sm btn-danger">
                                    Excluir
                                </button>
                                <button class="btn btn-sm btn-info">
                                    Editar
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'form-edit-filial',
        data () {
            return {
                urlBase: urlBase,
                titulo: 'Atualizar filial',
                formRequest : '',
                form_errors: {},
                produtos: '',
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
                console.log(8);
                
                self = this;
                this.$http.get(urlBase + '/produtos').then((response) => {
                    console.log(response.body.produtos);
                    
                    self.produtos = response.body.produtos;
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
