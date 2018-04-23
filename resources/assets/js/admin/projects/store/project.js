import store from 'assets/js/admin/projects/store';

export default {
    data() {
        return {}
    },
    created() {
        if (!this.$store.state['project']) {
            this.$store.registerModule('project', store);
        }
    },
    computed: {
        selectedPackages() {
            return this.$store.getters['project/selectedPackages'];
        },
    },
    methods: {
        togglePackage(packageKey) {
            this.$store.dispatch('project/togglePackage', packageKey);
        }
    },
}