<li class="header">MAIN NAVIGATION</li>
@include('ohio-core::layouts.admin.partials.sidebar-left-nav')
@include('ohio-content::layouts.admin.partials.sidebar-left-nav')
@include('ohio-spot::layouts.admin.partials.sidebar-left-nav')
@include('ohio-storage::layouts.admin.partials.sidebar-left-nav')
<li class="treeview">
    <a href="#">
        <i class="fa fa-cog"></i> <span>Widget Admin</span> <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
        <li><a href="/admin/widgets"><i class="fa fa-cogs"></i> <span>Widgets</span></a></li>
    </ul>
</li>