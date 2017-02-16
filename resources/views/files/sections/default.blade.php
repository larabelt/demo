@php
    $file = $section->sectionable;
@endphp

<div class="section section-file {{ $section->param('class') }}">
    @include('sections.sections._header')
    @include('sections.sections._body')
    @include('files.web._show')
    @include('sections.sections._footer')
</div>