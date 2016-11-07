import  OhioCore  from 'ohio/core/js/core';
import  OhioContent  from 'ohio/content/js/components/admin/content';
import  HelloPlugin  from 'ohio/core/js/plugins/hello';

window.$ = window.jQuery = require('jquery');
global._ = require('lodash');
window.Vue = require('vue');
window.VueRouter = require('vue-router');

Vue.use(require('vue-resource'));
Vue.use(VueRouter);
Vue.use(HelloPlugin); //test...
Vue.config.devtools = true;

$(document).ready(function() {

    new OhioCore([
        OhioContent
    ]);

});