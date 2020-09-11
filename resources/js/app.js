require('./bootstrap');

window.Vue = require('vue');

import router from './router';

Vue.component('page-home', require('./components/pageHome.vue').default);

const app = new Vue({
    el: '#app',
    router
});

require('./mapa');
require('./dropzone');