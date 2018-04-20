import listItem from 'assets/js/admin/projects/list/list-item';
import blaConsole from 'assets/js/admin/projects/list/console';
import Service from 'assets/js/admin/projects/service';
import Table from 'assets/js/admin/projects/table';
import heading_html from 'belt/core/js/templates/heading.html';
import html from 'assets/js/admin/projects/list/template.html';

export default {

    components: {
        heading: {template: heading_html},
        index: {
            data() {
                return {
                    capture: 'foo',
                    projectKey: '',
                    project: {},
                    projects: {},
                    service: new Service(),
                    table: new Table(),
                }
            },
            mounted() {
                this.service.get()
                    .then((response) => {
                        this.projects = response.data;
                    });
                this.projectKey = 'larabelt16';
                this.changeProject();
            },
            computed: {
                packages() {
                    return _.get(this.project, 'packages', []);
                },
                projectOptions() {
                    let options = [];
                    _.forEach(this.projects, (project, key) => {
                        options.push({
                            key: key,
                            label: _.get(project, 'meta.name', key),
                        });
                    });
                    options = _.sortBy(options, [function (option) {
                        return option.label;
                    }]);
                    return options;
                },
            },
            methods: {
                changeProject() {
                    this.service.get(this.projectKey)
                        .then((response) => {
                            this.project = response.data;
                        });
                },
                setCapture(capture) {
                    this.capture = capture;
                }
            },
            components: {
                listItem,
                blaConsole,
            },
            template: html,
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