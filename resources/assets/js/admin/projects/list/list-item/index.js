import Service from 'assets/js/admin/projects/list/list-item/service';
import html from 'assets/js/admin/projects/list/list-item/template.html';

export default {
    props: {
        owner: '',
        packageKey: '',
        package: {},
    },
    data() {
        return {
            capture: '',
            loading: false,
            projectKey: this.$parent.projectKey,
            project: this.$parent.project,
            service: new Service({
                projectKey: this.$parent.projectKey,
                owner: this.owner,
                packageKey: this.packageKey,
            }),
        }
    },
    created() {
        this.submit();
    },
    methods: {
        submit() {
            this.capture = '';
            this.loading = true;
            this.service.put('', {recipe: 'git-status'})
                .then((response) => {
                    this.loading = false;
                    this.capture = response.data;
                    this.$emit('capture', this.capture);
                });
        }
    },
    components: {},
    template: html,
}