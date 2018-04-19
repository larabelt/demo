import BaseForm from 'belt/core/js/helpers/form';
import BaseService from 'belt/core/js/helpers/service';

class ProjectForm extends BaseForm {

    constructor(options = {}) {
        super(options);
        this.service = new BaseService({baseUrl: '/api/v1/projects/'});
        this.routeEditName = 'projects.edit';
        this.setData({
            id: '',
            is_active: '',
            team_id: '',
            first_name: '',
            last_name: '',
            email: '',
            phone: '',
            postcode: '',
            comment: '',
            source: '',
            submitted_at: '',
            submitted_after: '',
            submitted_before: '',
            created_at: '',
            updated_at: '',
        })
    }

}

export default ProjectForm;