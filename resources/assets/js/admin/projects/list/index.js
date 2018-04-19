import filterSearch from 'belt/core/js/inputs/filter-search';
import listItem from 'assets/js/admin/projects/list/list-item';
import console from 'assets/js/admin/projects/list/console';
import Service from 'assets/js/admin/projects/service';
import Table from 'assets/js/admin/projects/table';
import heading_html from 'belt/core/js/templates/heading.html';
import index_html from 'assets/js/admin/projects/list/template.html';

export default {

    components: {
        heading: {template: heading_html},
        index: {
            data() {
                return {
                    service: new Service(),
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
                filterSearch,
                listItem,
                console,
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