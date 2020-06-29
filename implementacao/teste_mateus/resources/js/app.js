import Vue from 'vue'
import VueResource from 'vue-resource'
import moment from 'moment'
import localization from 'moment/locale/pt-br'
import Mixins from './Mixin.js'
import money from 'v-money'
import VueTheMask from 'vue-the-mask'
import Pagination from 'laravel-vue-pagination'

Vue.use(Pagination)
Vue.use(money, {precision: 4})
Vue.use(VueTheMask)
Vue.use(VueResource)
Vue.mixin(Mixins)
Vue.use(VueTheMask)

window.moment = moment;


//Componentes de Fornecedor
// import FormFornecedor from './components/fornecedor/FormFornecedor.vue'
// import ListaFornecedores from './components/fornecedor/ListaFornecedores.vue'
// import EditFornecedor from './components/fornecedor/EditFornecedor.vue'

Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#csrf-token').getAttribute('content');

window.onload = function () {
    var main = new Vue({ // eslint-disable-line no-new
        el: '#app',
        components: {

        },
    });
}
