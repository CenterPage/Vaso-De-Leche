require('./bootstrap');

window.Vue = require('vue');

Vue.component('page-home', require('./components/pageHome.vue').default);


const app = new Vue({
    el: '#app',
});

require('./mapa');
require('./dropzone');