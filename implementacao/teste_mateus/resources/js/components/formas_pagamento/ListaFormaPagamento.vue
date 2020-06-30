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
                            <th nowrap="true" class="text-center">
                                Opções
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="forma in formasPagamentos">
                            <td>{{forma.id}}</td>
                            <td>{{forma.forma_pagamento}}</td>
                            <td style="text-align: center;">
                                <a :href="url+'/formas-pagamento/atualizar/'+forma.id" class="btn btn-sm btn-info">
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
                url: url,
                urlBase: urlBase,
                titulo: 'Atualizar filial',
                formRequest : '',
                form_errors: {},
                formasPagamentos: [],
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
            recuperarFormasPagamento : function(){
                self = this;
                this.$http.get(urlBase + '/formas-pagamento').then((response) => {
                    self.formasPagamentos = response.body.formasPagamentos;
                    console.log(self.formasPagamentos);
                    
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
            this.recuperarFormasPagamento();
        },
    };
</script>

<style scoped>
</style>
