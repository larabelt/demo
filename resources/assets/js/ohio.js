window.$ = window.jQuery = require('jquery');
window._ = require('lodash');
window.Vue = require('vue');
window.VueRouter = require('vue-router');

import  OhioCore  from '../../ohio/core/js/app';

Vue.use(require('vue-resource'));
Vue.use(VueRouter);
Vue.config.devtools = true;
//import  Content  from '../../../ohio/content/js/component';

$(document).ready(function() {

    let core = new OhioCore([
        //Content
    ]);
});