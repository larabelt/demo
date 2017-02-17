@php
    $key = $section->param('menu');
    $menu = Menu::get($key);
    if ($active = $section->param('active')) {
        $menu->active($active);
    } else {
        //$menu->setActiveFromRequest();
    }
@endphp

<div class="section section-block {{ $section->param('class') }}">
    @include('sections.sections._header')
    @include('sections.sections._body')
    @include('menus.web.breadcrumbs')
    @include('sections.sections._footer')
</div>