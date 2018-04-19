import BaseTable from 'belt/core/js/helpers/table';
import BaseService from 'belt/core/js/helpers/service';

class ProjectTable extends BaseTable {

    constructor(options = {}) {
        super(options);
        this.service = new BaseService({baseUrl: '/api/v1/projects/'});
        this.name = 'admin.projects';
        this.updateQuery({
            q: '',
            is_active: '',
            team_id: '',
            submitted_after: '',
            submitted_before: '',
        });
    }

}

export default ProjectTable;