import Form from 'assets/js/admin/projects/form';
import priorityDropdown from 'belt/core/js/inputs/priority/form';
import heading_html from 'belt/core/js/templates/heading.html';
import form_html from 'assets/js/admin/projects/create/form.html';
import create_html from 'assets/js/admin/projects/create/template.html';

export default {
    components: {
        heading: {template: heading_html},
        create: {
            data() {
                return {
                    form: new Form({router: this.$router}),
                }
            },
            components: {
                priorityDropdown,
            },
            template: form_html,
        },
    },
    template: create_html
}