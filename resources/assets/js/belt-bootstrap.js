import lodash from 'lodash';
import jQuery from 'jquery';
import vue from 'vue';
import axios from 'axios';
import VueRouter from 'vue-router';
import VueResource from 'vue-resource';
import Vuex from 'vuex';

import columnSorter from 'belt/core/js/components/base/column-sorter';
import pagination from 'belt/core/js/components/base/pagination';

import 'admin-lte';

window._ = lodash;

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */
//
window.$ = jQuery;
window.jQuery = window.$;

require('bootstrap-sass');

/**
 * Vue is a modern JavaScript library for building interactive web interfaces
 * using reactive data binding and reusable components. Vue's API is clean
 * and simple, leaving you to focus on building your next great project.
 */

window.Vue = vue;
window.VueRouter = VueRouter;
window.Vuex = Vuex;

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = axios;

window.axios.defaults.headers.common = {
    'X-Requested-With': 'XMLHttpRequest'
};

Vue.use(Vuex);
Vue.use(VueResource);
Vue.use(VueRouter);
Vue.config.devtools = true;

Vue.component('column-sorter', columnSorter);
Vue.component('pagination', pagination);