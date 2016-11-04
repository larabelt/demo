window.$ = window.jQuery = require('jquery');
window._ = require('lodash');
window.Vue = require('vue');
window.VueRouter = require('vue-router');

import  OhioCore  from '../../ohio/core/js/core';
import  OhioContent  from '../../ohio/content/js/content';
import  HelloPlugin  from '../../ohio/core/js/plugins/hello';

Vue.use(require('vue-resource'));
Vue.use(VueRouter);
Vue.use(HelloPlugin); //test...
Vue.config.devtools = true;

$(document).ready(function() {

    new OhioCore([
        OhioContent
    ]);

});