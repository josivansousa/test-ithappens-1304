<template>
    <div id="lista-filiais">
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
                                CNPJ
                            </th>
                            <th nowrap="true" class="text-center">
                                Opções
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="filial in filiais.data">
                            <td>{{filial.id}}</td>
                            <td>{{filial.nome}}</td>
                            <td>{{filial.cnpj}}</td>
                            <td style="text-align: center;">
                                <a :href="url+'/filiais/atualizar/'+filial.id" class="btn btn-sm btn-info">
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
        name: 'lista-filiais',
        data () {
            return {
                url : url,
                urlBase: urlBase,
                titulo: 'Lista de filiais',
                formRequest : '',
                form_errors: {},
                filiais: [],
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
            recuperarFiliais : function(){
                self = this;
                this.$http.get(urlBase + '/filiais').then((response) => {                   
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
            this.recuperarFiliais();
        },
    };
</script>

<style scoped>
</style>
