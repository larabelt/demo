@php
    $can['users'] = $auth->can(['create','update','delete'], Belt\Core\User::class);
@endphp

<li id="core-admin-sidebar-left-dashboard">
    <a href="/admin"><i class="fa fa-tachometer"></i>
        <span>Dashboard</span></a>
</li>
<li id="core-admin-sidebar-left-users">
    <a href="/admin/belt/core/users"><i class="fa fa-user"></i>
        <span>Users</span></a>
</li>