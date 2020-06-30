<template>
    <div id="form-usuario">
    <div class="row">
        <div class="col-sm-12">
             <div class="pos-rel">
               <!-- Nav pills -->
               <ul class="nav nav-pills justify-content-center nav-justified" role="tablist">
                  <li class="nav-item">
                     <a class="nav-link active btn btn-primary" data-toggle="pill" href="#organizer-details">
                         Pedido
                     </a>
                  </li>
                  <!-- v-if="pedido.id" -->
                  <li class="nav-item" v-if="pedido.id">
                        <a class="nav-link btn btn-primary" data-toggle="pill" href="#event-details">
                            Itens
                        </a>
                  </li>
               </ul>
               <div class="connected-line"></div>
               <!-- Tab panes -->
               <div class="tab-content">
                  <div id="organizer-details" class="container tab-pane active">
                      <br> <br>
                    <!-- <form class=""> -->
                        <form class="m-form m-form--fit">
                            <div class="m-portlet__body">
                                <div class="m-form__section m-form__section--first">
                                    <div class="form-group m-form__group row">
                                        <div class="col-lg-6">
                                            <label class="">
                                                Tipo de pedido:
                                            </label>
                                            <select class="form-control m-input" v-model="pedido.status_pedido_id">
                                                <option value="" selected> -- Selecione o tipo de pedido --</option>
                                                <option v-for="(status, key) in statusPedido" :value="status.id">
                                                    {{status.status_pedido}}
                                                </option>
                                            </select>
                                            <span class="m-form__help">
                                                Por favor, selecione a filial
                                            </span>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="">
                                                Usuario:
                                            </label>
                                            <select class="form-control m-input" v-model="pedido.user_id">
                                                <option value="" selected> -- Selecione o usuário --</option>
                                                <option v-for="(usuario, key) in usuarios.data" :value="usuario.id">
                                                    {{usuario.nome}}
                                                </option>
                                            </select>
                                            <span class="m-form__help">
                                                Por favor, selecione a filial
                                            </span>
                                        </div>
                                        <div class="col-lg-12">
                                            <hr>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="">
                                                Filial:
                                            </label>
                                            <select class="form-control m-input" v-model="pedido.filial_id">
                                                <option value="" selected> -- Selecione a filial --</option>
                                                <option v-for="(filial, key) in filiais" :value="filial.id">
                                                    {{filial.nome}}
                                                </option>
                                            </select>
                                            <span class="m-form__help">
                                                Por favor, selecione a filial
                                            </span>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="">
                                                Cliente:
                                            </label>
                                            <select class="form-control m-input" v-model="pedido.cliente_id">
                                                <option value="" selected> -- Selecione o cliente --</option>
                                                <option v-for="(cliente, key) in clientes.data" :value="cliente.id">
                                                    {{cliente.nome}}
                                                </option>
                                            </select>
                                            <span class="m-form__help">
                                                Por favor, selecione o cliente
                                            </span>
                                        </div>
                                        <div class="col-lg-12">
                                            <hr>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="">
                                                Forma de pagamento:
                                            </label>
                                            <select class="form-control m-input" v-model="pedido.forma_pagamento_id">
                                                <option value="" selected> -- Selecione o cliente --</option>
                                                <option v-for="(forma, key) in formasPagamentos" :value="forma.id">
                                                    {{forma.forma_pagamento}}
                                                </option>
                                            </select>
                                            <span class="m-form__help">
                                                Por favor, selecione a forma de pagamento
                                            </span>
                                        </div>
                                        <div class="col-lg-6">
                                            <label>
                                                Observação de entrega:
                                            </label>
                                            <input type="text" class="form-control m-input" 
                                                v-model="pedido.observacao" 
                                                placeholder="Digite uma observação de entrega">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="m-portlet__foot m-portlet__foot--fit">
                                <div class="m-form__actions m-form__actions">
                                    <button type="button" @click="salvarPedido()" class="btn btn-primary">
                                        Adicionar item
                                    </button>
                                </div>
                            </div>
                        </form>
                    <!-- </form> -->
                  </div>

                  <div id="event-details" class="container tab-pane fade">
                        <br><br>
                        <form class="m-form m-form--fit">
                            <div class="m-portlet__body">
                                <div class="m-form__section m-form__section--first">
                                    <div class="form-group m-form__group row">
                                        <div class="col-lg-3">
                                            <label class="">
                                                Produto:
                                            </label>
                                            <input type="item" class="form-control m-input" 
                                                v-model="string_pesquisa" 
                                                @keyup="buscarProduto()"
                                                placeholder="Digite a descrição ou código">
                                                <br>

                                            <!-- <div v-if="itens_pesquisados.length != 0" style="margin-top: 10px;"> -->
                                                <ul style="list-style: none;margin-left: -30px;">
                                                    <li v-if="itens_pesquisados.length == 0">
                                                        Produto não encontrado
                                                    </li>
                                                    <li v-for="(item_pesquisados, key) in itens_pesquisados">
                                                        <a href="javascript:void(0)" @click="selecionarProduto(item_pesquisados)">
                                                            Selecionar
                                                        </a>
                                                         - {{item_pesquisados.codigo}} - {{item_pesquisados.descricao}}
                                                    </li>
                                                </ul>
                                            <!-- </div> -->
                                        </div>
                                        <div class="col-lg-3">
                                            <label>
                                                Qtd.:
                                            </label>
                                            <input type="text" class="form-control m-input" 
                                                v-model="item.qtd" 
                                                placeholder="Digite a quantidade">
                                        </div>
                                        <div class="col-lg-3">
                                            <label>
                                                Valor:
                                            </label>
                                            <!-- <input type="text" class="form-control m-input" 
                                                v-model="item.valor_unitario" 
                                                placeholder="Valor"> -->
                                            <money v-model="item.valor_unitario" v-bind="money" class="form-control m-input"></money>

                                        </div>
                                        <div class="col-lg-3">
                                            <label>
                                                Adicionar:
                                            </label>
                                            <button type="button" @click="salvarItem()" class="form-control m-input btn btn-info">
                                                Adicionar
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <p>Itens adicionados</p>
                                
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
                                                <th nowrap="true">
                                                    Qtd
                                                </th>
                                                <th nowrap="true">
                                                    Valor unitário
                                                </th>
                                                <th nowrap="true">
                                                    Valor total
                                                </th>
                                                <th nowrap="true" class="text-center">
                                                    Opções
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="(item, key) in itensAdicionados">
                                                <td>{{item.item.id}}</td>
                                                <td>{{item.produto.descricao}}</td>
                                                <td>{{item.produto.codigo}}</td>
                                                <td>{{item.item.qtd}}</td>
                                                <td>R$ {{item.item.valor_unitario}}</td>
                                                <td>R$ {{(item.item.valor_unitario * item.item.qtd)}}</td>
                                                <td style="text-align: center;">
                                                    <button type="button" @click="excluirItem(item.item.id, key)" class="btn btn-sm btn-danger">
                                                        Excluir
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" style="text-align: right;">
                                                    <strong>Valor total do pedido:</strong>
                                                </td>
                                                <td>R$ {{(valorTotalPedido())}}</td>
                                                <td style="text-align: center;">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="m-portlet__foot m-portlet__foot--fit">
                                <div class="m-form__actions m-form__actions">
                                    <button type="button" @click="confirmarPedido()" class="btn btn-primary">
                                        Confirmar pedidos
                                    </button>
                                </div>
                            </div>
                        </form>
                  </div>
               </div>
            </div>
        </div>
    </div>  
    </div>
</template>

<script>
    export default {
        name: 'form-usuario',
        components: {

        },
        data () {
            return {
                url : url,
                money: {
                    decimal: ',',
                    thousands: '.',
                    // prefix: 'R$ ',
                    // suffix: ' #',
                    precision: 2,
                    masked: false
                },
                urlPesquisa: urlBase+'/produtos/buscar-produto/',
                urlBase: urlBase,
                titulo: 'Cadastrar usuário',
                formRequest : '',
                form_errors: {},
                filiais: [],
                usuarios: [],
                statusPedido: [],
                clientes: [],
                formasPagamentos: [],
                itens_pesquisados : [],
                string_pesquisa: '',
                item : {
                    pedido_estoque_id: '',
                    produto_id : '',
                    qtd : '',
                    valor_unitario: '',
                    item: '',
                },
                pedido: {
                    status_pedido_id : '',
                    user_id : '',
                    filial_id : '',
                    cliente_id : '',
                    forma_pagamento_id : '',
                    observacao : '',
                },
                itensAdicionados : [],
            }
        },
        methods : {
            salvarPedido : function() {
                self = this;
                if (!self.pedido.id) {
                    return self.$http.post(urlBase + '/pedidos-estoque/salvar', self.pedido).then((response) => {
                        self.pedido = response.body.pedidoEstoque;

                        if (response.body.status == 'erro') {
                            return Swal({
                                type: 'eror',
                                title: 'Erro!',
                                html: 'Ocorreu um erro ao processar informação!',
                            });                            
                        }
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

                // Swal.queue([{
                //     type: 'question',
                //     showCancelButton: true,
                //     title: 'Salvar',
                //     confirmButtonText: 'Salvar',
                //     text: 'Salvar usuário?',
                //     showLoaderOnConfirm: true,
                //     preConfirm: () => {
                //         return self.$http.post(urlBase + '/pedido-estoque/salvar', self.pedido).then((response) => {
                //             self.retorno = response.body;
                //             // return Swal({
                //             //     type: 'success',
                //             //     title: 'Salvo!',
                //             //     html: 'Usuário salvo com sucesso',
                //             // });                            
                //         }, response => {                          
                //             var form = response.body;
                //             self.formRequest = form;                           
                //             self.retorno = 0;

                //             self.form_errors = self.mountErrors(self.formRequest);
                //             var msg = self.formErros(self.formRequest);

                //             return Swal({
                //                 type: 'error',
                //                 title: 'Atenção!',
                //                 html: msg,
                //             });
                //         });
                //     }
                // }])
            },
            salvarItem : function() {
                self = this;
                return self.$http.post(urlBase + '/itens-pedido/salvar', self.item).then((response) => {
                    let produto = self.item;
                    if(response.body.status == 'erro'){
                        return Swal({
                            type: 'error',
                            title: 'Erro!',
                            html: 'Produto indisponível',
                        });                            
                    }
                    self.itensAdicionados.push({
                        item : response.body.itemPedido,
                        produto: produto.item
                    });

                    return Swal({
                        type: 'success',
                        title: 'Salvo!',
                        html: 'Item adicionado com sucesso',
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
            },
            confirmarPedido: function(){
                self = this;
                if (this.itensAdicionados.length > 0) {
                    return self.$http.put(urlBase + '/pedidos-estoque/confirmar-pedido/'+self.pedido.id).then((response) => {
                        let produto = self.item;

                        Swal({
                            type: 'success',
                            title: 'Salvo!',
                            // confirmButtonText: 'Salvar',
                            html: 'Pedido confirmado com sucesso!',
                        }).then((result) => {
                            console.log(self.url);
                            
                            if (result.value) {
                                console.log(self.url);
                                window.location.assign(self.url);
                            }
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

                return Swal({
                        type: 'error',
                        title: 'Atenção!',
                        html: "Adicione pelo menos um item!",
                    });            
            },
            excluirItem : function(id, key){
                self = this;
                return self.$http.delete(urlBase + '/itens-pedido/excluir/'+id).then((response) => {
                    self.itensAdicionados.splice(key, 1);

                    return Swal({
                        type: 'success',
                        title: 'Salvo!',
                        html: 'Pedido confirmado com sucesso!',
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
                });            },
            valorTotalPedido : function(){
                let valorTotal = 0;

                self = this;
                self.itensAdicionados.forEach(function(item){
                    valorTotal += (item.item.qtd * item.item.valor_unitario);
                });

                return valorTotal;
            },
            selecionarProduto : function (item_pesquisados){
                this.item.produto_id        = item_pesquisados.id;
                this.item.pedido_estoque_id = this.pedido.id;
                this.item.item              = item_pesquisados;
                this.string_pesquisa        = item_pesquisados.descricao;
                this.itens_pesquisados      = [];
            },
            buscarProduto : function(){               
                if (this.string_pesquisa.length >= 3 && this.pedido.filial_id != '') {
                    this.$http.get(urlBase + '/produtos/buscar-produto/'+this.string_pesquisa+'/'+this.pedido.filial_id).then((response) => {
                        this.itens_pesquisados = response.body.produtos;
                    }, response => {                          
                        return Swal({
                            type: 'error',
                            title: 'Atenção!',
                            html: 'Ocorreu um erro ao processar informação!s',
                        });
                    });
                }
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
            },
            recuperarStatusPedido : function(){
                self = this;
                this.$http.get(urlBase + '/status-pedido').then((response) => {
                    self.statusPedido = response.body.dataStatus;                    
                }, response => {                          
                    return Swal({
                        type: 'error',
                        title: 'Atenção!',
                        html: 'Ocorreu um erro ao processar informação!s',
                    });
                });
            },
            recuperarUsuario : function(){              
                self = this;
                this.$http.get(urlBase + '/usuarios').then((response) => {
                    self.usuarios = response.body.usuarios;
                }, response => {                          
                    return Swal({
                        type: 'error',
                        title: 'Atenção!',
                        html: 'Ocorreu um erro ao processar informação!s',
                    });
                });
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
            this.recuperarFiliais();
            this.recuperarStatusPedido();
            this.recuperarUsuario();
            this.recuperarClientes();
            this.recuperarFormasPagamento();
        },

    };
</script>

<style scoped>
         .pos-rel{
         position:relative;
         }
         .pos-rel .nav-item{
         margin:0 1em;
         }
         .connected-line{
         border-bottom: 1px solid #007bff;
         position: relative;
         top: -20px;
         z-index: -1;
         }
         .seminor-login-modal-body .close{
 position: relative;
 top: -45px;
 left: 10px;
color: #1cd8ad;
}
.seminor-login-modal-body .close{
    opacity:0.75;
}

.seminor-login-modal-body .close:focus, .seminor-login-modal-body .close:hover {
    color: #39e8b0;
 opacity: 1;
 text-decoration: none;
 outline:0;
}

.seminor-login-modal .modal-dialog .modal-content{
    border-radius:0px;
}

/* form animation */
.seminor-login-form .form-group {
  position: relative;
  margin-bottom: 1.5em !important;
}
.seminor-login-form .form-control{
 border: 0px solid #ced4da !important;
 border-bottom:1px solid #adadad !important;
 border-radius:0 !important;
}
.seminor-login-form .form-control:focus, .seminor-login-form .form-control:active{
 outline:none !important;
 outline-width: 0;
 border-color: #adadad !important;
 box-shadow: 0 0 0 0.2rem transparent;
}
*:focus {
 outline: none;
}
.seminor-login-form{
 padding: 2em 0 0;
}

.form-control-placeholder {
position: absolute;
top: 0;
padding: 7px 0 0 13px;
transition: all 200ms;
opacity: 0.5;
border-top: 0px;
border-left: 0;
border-right: 0;
}

.form-control:focus + .form-control-placeholder,
.form-control:valid + .form-control-placeholder {
font-size: 75%;
-webkit-transform: translate3d(0, -100%, 0);
       transform: translate3d(0, -100%, 0);
opacity: 1;
}

.container-checkbox input {
 position: absolute;
 opacity: 0;
 cursor: pointer;
}
.checkmark-box {
 position: absolute;
 top: -5px;
 left: 0;
 height: 25px;
 width: 25px;
 background-color: #adadad;
}
.container-checkbox {
 display: block;
 position: relative;
 padding-left: 40px;
 margin-bottom: 20px;
 cursor: pointer;
 font-size: 14px;
 font-weight: bold;
 -webkit-user-select: none;
 -moz-user-select: none;
 -ms-user-select: none;
 user-select: none;
 line-height: 1.1;
}
.container-checkbox input:checked ~ .checkmark-box:after {
 color: #fff;
}
.container-checkbox input:checked ~ .checkmark-box:after {
 display: block;
}
.container-checkbox .checkmark-box:after {
 left: 10px;
 top: 4px;
 width: 7px;
 height: 15px;
 border: solid white;
 border-width: 0 3px 3px 0;
 -webkit-transform: rotate(45deg);
 -ms-transform: rotate(45deg);
 transform: rotate(45deg);
}
.checkmark:after, .checkmark-box:after {
 content: "";
 position: absolute;
 display: none;
}
.container-checkbox input:checked ~ .checkmark-box {
 background-color: #f58220;
 border: 0px solid transparent;
}
.btn-check-log .btn-check-login {
 font-size: 16px;
 padding: 10px 0;
}
button.btn-check-login:hover {
    color: #fff;
    background-color: #f58220;
    border: 2px solid #f58220;
}
.btn-check-login {
 color: #f58220;
 background-color: transparent;
 border: 2px solid #f58220;
 transition: all ease-in-out .3s;
}
.btn-check-login {
 display: inline-block;
 padding: 12px 0;
 margin-bottom: 0;
 line-height: 1.42857143;
 text-align: center;
 white-space: nowrap;
 vertical-align: middle;
 -ms-touch-action: manipulation;
 touch-action: manipulation;
 cursor: pointer;
 -webkit-user-select: none;
 -moz-user-select: none;
 -ms-user-select: none;
 user-select: none;
 background-image: none;
 border-radius: 0;
 width: 100%;
}
.forgot-pass-fau a {
    text-decoration: none !important;
    font-size: 14px;
}
.text-primary-fau {
    color: #1959a2;
}

.select-form-control-placeholder{
  font-size: 100%;
    padding: 7px 0 0 13px;
    margin: 0;
}

</style>
