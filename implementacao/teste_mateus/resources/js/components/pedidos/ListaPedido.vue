<template>
    <div id="form-edit-filial">
        <br>
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
                            <th nowrap="true">
                                Criado em
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
                            <td>{{pedido.created_at | dateTime}}</td>
                            <td style="text-align: center;">
                                <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalExemplo" @click="recuperarItensPedido(pedido.id)">
                                    Ver itens
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Itens de pedido
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th nowrap="true">
                                    Produto
                                </th>
                                <th nowrap="true">
                                    Qtd.
                                </th>
                                <th nowrap="true">
                                    Valor unitário
                                </th>
                                <th nowrap="true">
                                    Valor total
                                </th>
                                <th nowrap="true">
                                    Status
                                </th>
                                <!-- <th nowrap="true" class="text-center">
                                    Opções
                                </th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="item in itensPedido">
                                <td>{{item.id}}</td>
                                <td>{{item.produtos.descricao}}</td>
                                <td>{{item.qtd}}</td>
                                <td>R$ {{item.valor_unitario | formaMoeda}}</td>
                                <td>R$ {{(item.qtd * item.valor_unitario) | formaMoeda}}</td>
                                <td><strong>{{item.status.status_item}}</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
                </div>
            </div>
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
                itensPedido : [],
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
            },
            recuperarItensPedido : function(pedido_estoque_id){
                self = this;
                this.$http.get(urlBase + '/itens-pedido/recuperar-pedido/'+pedido_estoque_id).then((response) => {
                    self.itensPedido = response.body.itensPedido;
                }, response => {                          
                    return Swal({
                        type: 'error',
                        title: 'Atenção!',
                        html: 'Ocorreu um erro ao processar informação!s',
                    });
                });
            },
            // retiradaItem : function(item){
            //     self = this;
            //     self = this;
            //     Swal.queue([{
            //         type: 'question',
            //         showCancelButton: true,
            //         title: 'Atualizar',
            //         confirmButtonText: 'Salvar',
            //         text: 'Atualizar produto?',
            //         showLoaderOnConfirm: true,
            //         preConfirm: () => {
            //             return self.$http.put(urlBase + '/itens-pedido/retirada/'+item.id).then((response) => {
            //                 if (response.body.status == 'sucesso') {
            //                     console.log("ok");
                                
            //                     self.recuperarItensPedido(item.pedido_estoque_id);
            //                 }else{
            //                     return Swal({
            //                         type: 'error',
            //                         title: 'Atensção!',
            //                         html: response.body.mensagem,
            //                     });
            //                 }
            //             }, response => {                          
            //                 return Swal({
            //                     type: 'error',
            //                     title: 'Atenção!',
            //                     html: 'Ocorreu um erro ao processar informação!s',
            //                 });
            //             });
            //         }
            //     }])
            // }

        },
        created () {
            this.recuperarPedido();
        },
    };
</script>

<style scoped>
</style>
