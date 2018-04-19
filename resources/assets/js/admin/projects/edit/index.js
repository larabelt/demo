import project from 'assets/js/admin/projects/store/mixin';
import edit from 'assets/js/admin/projects/edit/shared';
import html from 'assets/js/admin/projects/edit/form.html';
import inputTeam from 'belt/core/js/teams/inputs/dropdown';

export default {
    mixins: [edit],
    components: {
        edit: {
            mixins: [project],
            data() {
                return {
                    morphable_type: 'projects',
                    morphable_id: this.$parent.morphable_id,
                    project_id: this.$parent.morphable_id,
                }
            },
            computed: {
                form() {
                    return this.project;
                }
            },
            mounted() {
                this.$store.dispatch(this.storeKey + '/load', this.project_id);
            },
            components: {
                inputTeam,
            },
            template: html,
        },
    },
}