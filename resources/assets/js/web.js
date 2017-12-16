import 'belt/core/js/belt-bootstrap';

Vue.config.devtools = process.env.MIX_VUEJS_DEBUG;

import AlertDismissal from 'belt/core/js/alerts/ctlr/dismissal';
import ContactForm from 'belt/core/js/contact/contact';

/**
 * @belt
 *
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('alert-dismissal', AlertDismissal);
Vue.component('contact-form', ContactForm);

new Vue({el: '#app'});