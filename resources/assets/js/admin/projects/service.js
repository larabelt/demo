import BaseService from 'belt/core/js/helpers/service';

class ProjectService extends BaseService {

    constructor(options = {}) {
        super(options);
        this.baseUrl = '/api/v1/projects/';
    }

}

export default ProjectService;