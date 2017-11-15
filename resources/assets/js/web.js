import './belt-bootstrap';

import AlertDismissal from 'belt/core/js/alerts/ctlr/dismissal';
import ContactForm from 'belt/core/js/contact/contact';
import UserSignup from 'belt/core/js/users/signup';
import TeamSignup from 'belt/core/js/teams/signup';

/**
 * @belt
 *
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

function addComponent(id, app) {
    let target = $(id);
    if (target.length > 0) {
        Vue.component(id, app);
    }
}

$(document).ready(function () {

    let components = {
        'alert-dismissal': AlertDismissal,
        'contact-form': ContactForm,
        'user-signup': UserSignup,
        'team-signup': TeamSignup,
    };

    _(components).forEach((app, id) => {
        addComponent(id, app);
    });

    new Vue({el: '#app'});

});