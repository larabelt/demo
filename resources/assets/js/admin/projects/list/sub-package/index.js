import project from 'assets/js/admin/projects/store/project';
import Service from 'assets/js/admin/projects/list/sub-package/service';
import html from 'assets/js/admin/projects/list/sub-package/template.html';

export default {
    mixins: [project],
    props: {
        owner: '',
        packageKey: '',
        package: {},
    },
    data() {
        return {
            screen: '',
            loading: false,
            projectKey: this.$parent.projectKey,
            project: this.$parent.project,
            service: new Service({
                projectKey: this.$parent.projectKey,
                packageKey: this.packageKey,
            }),
        }
    },
    created() {
        this.submit();
    },
    computed: {
        isSelected() {
            return _.get(this.selectedPackages, this.packageKey) ? true : false;
        },
    },
    methods: {
        submit() {
            this.screen = '';
            this.loading = true;
            this.service.put('', {recipe: 'git-status'})
                .then((response) => {
                    this.loading = false;
                    this.screen = response.data;
                    this.emitScreen();
                });
        },
        emitScreen() {
            this.$emit('screen', this.screen);
        },
        toggleState() {
            this.togglePackage(this.packageKey);
        }
    },
    components: {},
    template: html,
}