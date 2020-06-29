import Vue from 'vue'
import VueResource from 'vue-resource'
import moment from 'moment'
import localization from 'moment/locale/pt-br'
import Mixins from './Mixin.js'
import money from 'v-money'
import VueTheMask from 'vue-the-mask'
import Pagination from 'laravel-vue-pagination'
import swal from 'sweetalert2';

Vue.use(Pagination)
Vue.use(money, {precision: 4})
Vue.use(VueTheMask)
Vue.use(VueResource)
Vue.mixin(Mixins)
Vue.use(VueTheMask)

window.moment = moment;
window.Swal = swal;


//Componentes de clientes
import FormCliente from './components/clientes/FormCliente.vue'
import FormEditCliente from './components/clientes/FormEditCliente.vue'
import ListaCliente from './components/clientes/ListaCliente.vue'

//Componentes de filiais
import FormFilial from './components/filiais/FormFilial.vue'
import FormEditFilial from './components/filiais/FormEditFilial.vue'
import ListaFilial from './components/filiais/ListaFilial.vue'

//Componentes de formas de pagamento
import FormFormaPagamento from './components/formas_pagamento/FormFormaPagamento.vue'
import FormEditFormaPagamento from './components/formas_pagamento/FormEditFormaPagamento.vue'
import ListaFormaPagamento from './components/formas_pagamento/ListaFormaPagamento.vue'

//Componentes de usuarios
import FormUsuario from './components/usuarios/FormUsuario.vue'
import FormEditUsuario from './components/usuarios/FormEditUsuario.vue'
import ListaUsuario from './components/usuarios/ListaUsuario.vue'

//Componentes de produto
import FormProduto from './components/produtos/FormProduto.vue'
import FormEditProduto from './components/produtos/FormEditProduto.vue'
import ListaProduto from './components/produtos/ListaProduto.vue'

//Componentes de pedidos
// import FormProduto from './components/produtos/FormProduto.vue'
// import FormEditProduto from './components/produtos/FormEditProduto.vue'
import ListaPedido from './components/pedidos/ListaPedido.vue'


Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#csrf-token').getAttribute('content');

window.onload = function () {
    var main = new Vue({ // eslint-disable-line no-new
        el: '#app',
        components: {
            FormCliente,
            FormEditCliente,
            ListaCliente,
            FormFilial,
            FormEditFilial,
            ListaFilial,
            FormFormaPagamento,
            FormEditFormaPagamento,
            ListaFormaPagamento,
            FormUsuario,
            FormEditUsuario,
            ListaUsuario,
            FormProduto,
            FormEditProduto,
            ListaProduto,
            ListaPedido
        },
    });
}
