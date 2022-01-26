
require('./bootstrap');
window.Vue = require('vue').default;
import VueRouter from  'vue-router';
import routes from  './router/index';

Vue.component('dashboard', require('./Dashboard/Dashboard').default);
Vue.use(VueRouter);

const app2 = new Vue({
    el: '#dashboard',
    router: new VueRouter(routes)
});
