import BaseService from 'belt/core/js/helpers/service';

class PackageService extends BaseService {

    constructor(opts = {}) {
        super(opts);
        this.baseUrl = `/api/v1/projects/${opts.projectKey}/packages/${opts.owner}/${opts.packageKey}`;
    }

}

export default PackageService;