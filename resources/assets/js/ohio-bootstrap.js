window.$ = window.jQuery = require('jquery');
global._ = require('lodash');
window.Vue = require('vue');
window.VueRouter = require('vue-router');

Vue.use(require('vue-resource'));
Vue.use(VueRouter);
Vue.config.devtools = true;