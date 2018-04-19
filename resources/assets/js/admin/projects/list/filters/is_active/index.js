import filter from 'belt/core/js/inputs/filter-base';
import html from 'assets/js/admin/projects/list/filters/is_active/template.html';

export default {
    mixins: [filter],
    data() {
        return {
            is_active: null,
            options: {
                '': null,
                'Yes': 1,
                'No': 0,
            },
        }
    },
    mounted() {
        this.table.updateQueryFromRouter();
        this.is_active = this.table.query.is_active;
    },
    methods: {
        change() {
            //delete this.table.query.is_active;
            //if (this.is_active === 1 || this.is_active === 0) {
                this.table.updateQuery({is_active: this.is_active});
            //}
            this.$emit('filter-is_active-update');
        },
    },
    template: html
}