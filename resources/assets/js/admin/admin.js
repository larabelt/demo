import projects from './projects/routes';
import store from 'belt/core/js/store/index';

export default class AppAdmin {

    constructor() {

        if ($('#app-admin').length > 0) {

            const router = new VueRouter({
                mode: 'history',
                base: '/admin/app',
                routes: []
            });

            router.addRoutes(projects);

            const app = new Vue({router, store}).$mount('#app-admin');
        }
    }

}