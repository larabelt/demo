@php
    $attachment = $section->sectionable;
@endphp

<div class="section section-attachment {{ $section->param('class') }}">
    @include('sections.sections._header')
    @include('sections.sections._body')
    @include('attachments.web.show')
    @include('sections.sections._footer')
</div>