import BaseTable from 'belt/core/js/helpers/table';
import BaseService from 'belt/core/js/helpers/service';

class ProjectTable extends BaseTable {

    constructor(options = {}) {
        super(options);
        this.service = new BaseService({baseUrl: '/api/v1/projects/'});
        this.name = 'admin.projects';
        this.updateQuery({});
    }

}

export default ProjectTable;