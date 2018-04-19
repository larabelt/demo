import filterIsActive from 'assets/js/admin/projects/list/filters/is_active';
//import filterTeam from 'assets/js/admin/projects/list/filters/team';
import filterTeam from 'belt/core/js/teams/inputs/filter';
import filterSearch from 'belt/core/js/inputs/filter-search';
import listItem from 'assets/js/admin/projects/list/list-item';
import Table from 'assets/js/admin/projects/table';
import heading_html from 'belt/core/js/templates/heading.html';
import datetime from 'belt/core/js/mixins/datetime';
import datetimeInput from 'belt/core/js/inputs/datetime';
import index_html from 'assets/js/admin/projects/list/template.html';

export default {

    components: {
        heading: {template: heading_html},
        index: {
            mixins: [datetime],
            data() {
                return {
                    exportFormat: 'xlsx',
                    table: new Table({router: this.$router}),
                }
            },
            mounted() {
                this.table.updateQueryFromHistory();
                this.table.updateQueryFromRouter();
                this.table.pushQueryToRouter();
                this.table.index();
            },
            computed: {
                exportUrl() {

                    let query = {
                        page: 1,
                        perPage: 0,
                        format: this.exportFormat,
                        is_active: this.table.query.is_active,
                        submitted_after: this.table.query.submitted_after,
                        submitted_before: this.table.query.submitted_before,
                        q: this.table.query.q,
                        team_id: this.table.query.team_id,
                    };

                    let url = '/api/v1/projects?';
                    if (query && Object.keys(query).length > 0) {
                        url += $.param(query);
                    }

                    return url;
                },
            },
            methods: {
                filter: _.debounce(function (query) {
                    if (query) {
                        query.page = 1;
                        this.table.updateQuery(query);
                    }
                    this.table.index()
                        .then(() => {
                            this.table.pushQueryToHistory();
                            this.table.pushQueryToRouter();
                        });
                }, 750),
            },
            components: {
                datetimeInput,
                filterSearch,
                filterIsActive,
                filterTeam,
                listItem,
            },
            template: index_html,
        },
    },

    template: `
        <div>
            <heading>
                <span slot="title">Project Manager</span>
            </heading>
            <section class="content">
                <index></index>
            </section>
        </div>
        `
}