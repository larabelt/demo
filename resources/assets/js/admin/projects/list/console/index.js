import project from 'assets/js/admin/projects/store/mixin';
import Service from 'assets/js/admin/projects/service';
import html from 'assets/js/admin/projects/list/console/template.html';

export default {
    mixins: [project],
    props: {
        package: {
            default: 'core',
        },
    },
    data() {
        return {
            screen: '',
            service: new Service(),
        }
    },
    created() {
        this.submit();
    },
    methods: {
        submit() {
            this.screen = '';
            this.service.get('', {package: this.package})
                .then((response) => {
                    this.screen = response.data;
                });
        }
    },
    template: html,
}