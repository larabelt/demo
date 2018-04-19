import store from 'assets/js/admin/projects/store';

export default {
    created() {
        if (!this.$store.state[this.storeKey]) {
            this.$store.registerModule(this.storeKey, store);
        }
    },
    computed: {
        project() {
            return this.$store.getters[this.storeKey + '/form'];
        },
        storeKey() {
            return 'projects' + this.project_id;
        },
    },
    data() {
        return {
            project_id: null,
        }
    },
}