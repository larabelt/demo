import list from 'assets/js/admin/projects/list';
import create from 'assets/js/admin/projects/create';
import edit from 'assets/js/admin/projects/edit';

export default [
    {path: '/projects', component: list, canReuse: false, name: 'projects'},
    {path: '/projects/create', component: create, name: 'projects.create'},
    {path: '/projects/edit/:id', component: edit, name: 'projects.edit'},
]