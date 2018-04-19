import store from 'assets/js/admin/projects/store';
import project from 'assets/js/admin/projects/store/mixin';
import datetime from 'belt/core/js/mixins/datetime';
import inputTeam from 'belt/core/js/teams/inputs/dropdown';
import html from 'assets/js/admin/projects/list/list-item/template.html';

export default {
    mixins: [project, datetime],
    props: {
        project_data_id: '',
        project_data: {},
    },
    data() {
        return {
            table: this.$parent.table,
        }
    },
    created() {
        this.project_id = this.project_data_id;
        if (!this.$store.state[this.storeKey]) {
            this.$store.registerModule(this.storeKey, store);
            this.project.setData(this.project_data);
        }
    },
    methods: {
        toggleActive() {
            this.project.is_active = !this.project.is_active;
            this.project.submit();
        },
        update() {
            this.project.submit();
        }
    },
    components: {
        inputTeam,
    },
    template: html,
}