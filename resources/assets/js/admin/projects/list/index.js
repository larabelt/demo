import project from 'assets/js/admin/projects/store/project';
import subPackage from 'assets/js/admin/projects/list/sub-package';
import Service from 'assets/js/admin/projects/service';
import heading_html from 'belt/core/js/templates/heading.html';
import html from 'assets/js/admin/projects/list/template.html';

export default {

    components: {
        heading: {template: heading_html},
        index: {
            mixins: [project],
            data() {
                return {
                    screen: '',
                    projectKey: '',
                    projectUrl: '',
                    project: {},
                    projects: {},
                    service: new Service(),
                }
            },
            mounted() {
                this.service.get()
                    .then((response) => {
                        this.projects = response.data;
                    });
                this.projectKey = _.get(this.$router, 'currentRoute.query.projectKey');
                this.changeProject();
            },
            computed: {
                packages() {
                    return _.get(this.project, 'packages', []);
                },
                defaultPackages() {
                    let packages = {};
                    _.forEach(this.packages, (item, key) => {
                        if (item.default) {
                            packages[key] = item;
                        }
                    });
                    return packages;
                },
                subPackages() {
                    let packages = {};
                    _.forEach(this.packages, (item, key) => {
                        if (!item.default) {
                            packages[key] = item;
                        }
                    });
                    return packages;
                },
                projectOptions() {
                    let options = [];
                    _.forEach(this.projects, (project, key) => {
                        options.push({
                            key: key,
                            label: _.get(project, 'label', key),
                        });
                    });
                    options = _.sortBy(options, [function (option) {
                        return option.label;
                    }]);
                    return options;
                },
                projectUrls() {
                    let urls = _.get(this.project, 'urls', []);
                    let options = [];
                    _.forEach(urls, (url, environment) => {
                        if (url) {
                            if (!this.projectUrl) {
                                this.projectUrl = url;
                            }
                            options.push({
                                key: url,
                                label: `${environment}: ${url}`,
                            });
                        }
                    });
                    options = _.sortBy(options, [function (option) {
                        return option.label;
                    }]);
                    return options;
                },
            },
            methods: {
                changeProject() {
                    this.$router.push({query: {projectKey: this.projectKey}});
                    this.service.get(this.projectKey)
                        .then((response) => {
                            this.project = response.data;
                        });
                },
                setScreen(screen) {
                    this.screen = screen;
                }
            },
            components: {
                subPackage,
            },
            template: html,
        },
    },

    template: `
        <div>
            <heading>
                <span slot="title">Projects</span>
            </heading>
            <section class="content">
                <index></index>
            </section>
        </div>
        `
}