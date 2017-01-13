window.$ = window.jQuery = require('jquery');
global._ = require('lodash');
window.Vue = require('vue');
window.Vuex = require('vuex');
window.VueRouter = require('vue-router');
import columnSorter from 'ohio/core/js/components/base/column-sorter';
import pagination from 'ohio/core/js/components/base/pagination';

Vue.use(require('vue-resource'));
Vue.use(VueRouter);
Vue.config.devtools = true;

Vue.component('column-sorter', columnSorter);
Vue.component('pagination', pagination);