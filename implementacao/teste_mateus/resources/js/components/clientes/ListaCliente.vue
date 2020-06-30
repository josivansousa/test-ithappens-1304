<template>
    <div id="lista-forma-pagamento">
        <div class="m-content">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>
                                #
                            </th>
                            <th>
                                Nome
                            </th>
                            <th nowrap="true">
                                CPF
                            </th>
                            <th nowrap="true" class="text-center">
                                Opções
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="cliente in clientes.data">
                            <td>{{cliente.id}}</td>
                            <td>{{cliente.nome}}</td>
                            <td>{{cliente.cpf}}</td>
                            <td style="text-align: center;">
                                <a :href="url+'/clientes/atualizar/'+cliente.id" class="btn btn-sm btn-info">
                                    Editar
                                </a>
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
                url : url,
                urlBase: urlBase,
                titulo: 'Listar de clientes',
                formRequest : '',
                form_errors: {},
                clientes: [],
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
            recuperarClientes : function(){
                self = this;
                this.$http.get(urlBase + '/clientes').then((response) => {                   
                    self.clientes = response.body.clientes;
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
            this.recuperarClientes();
        },
    };
</script>

<style scoped>
</style>
