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
                            <th nowrap="true">
                                Cliente
                            </th>
                            <th nowrap="true">
                                Filial
                            </th>
                            <th nowrap="true">
                                status
                            </th>
                            <th nowrap="true">
                                Usuario
                            </th>
                             <th nowrap="true" class="text-center">
                                Opções
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="pedido in pedidosEstoque.data">
                            <td>{{pedido.id}}</td>
                            <td>{{pedido.cliente.nome}}</td>
                            <td>{{pedido.filial.nome}}</td>
                            <td>{{pedido.status.status_pedido}}</td>
                            <td>{{pedido.usuario.nome}}</td>
                            <td style="text-align: center;">
                                <button class="btn btn-sm btn-danger">
                                    Excluir
                                </button>
                                <button class="btn btn-sm btn-info">
                                    Editar
                                </button>
                                <button class="btn btn-sm btn-success">
                                    Ver itens
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
                pedidosEstoque: [],
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
            recuperarPedido : function(){              
                self = this;
                this.$http.get(urlBase + '/pedidos-estoque').then((response) => {
                    self.pedidosEstoque = response.body.pedidosEstoque;
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
            this.recuperarPedido();
        },
    };
</script>

<style scoped>
</style>
