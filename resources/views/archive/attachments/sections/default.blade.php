@php
    $attachment = $section->sectionable;
@endphp

<div class="section section-attachment {{ $section->param('class') }}">
    @include('sections.sections._heading')
    @include('sections.sections._before')
    @include('attachments.web.show')
    @include('sections.sections._after')
</div>