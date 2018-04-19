import html from 'assets/js/admin/projects/edit/template.html';

export default {
    data() {
        return {
            morphable_type: 'projects',
            morphable_id: this.$route.params.id,
        }
    },
    computed: {
        config() {
            return this.$store.getters[this.storeKey + '/config/data'];
        },
        storeKey() {
            return 'projects' + this.morphable_id;
        },
    },
    components: {
        edit: {},
    },
    template: html,
}