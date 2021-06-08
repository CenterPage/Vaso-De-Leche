require('./bootstrap');

window.Vue = require('vue');

import store from './store';
import router from './router';

Vue.component('page-home', require('./components/pageHome.vue').default);
Vue.component('mapa-location', require('./components/mapaLocation.vue').default);
Vue.component('mapa-location-show', require('./components/mapaLocationShow.vue').default);
Vue.component('photo-stablishment-show', require('./components/photoStablishmentShow.vue').default);

const app = new Vue({
    el: '#app',
    store,
    router
});

require('./mapa');
require('./dropzone');
