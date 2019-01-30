@php
    $page = $page ?? new \Belt\Content\Page();
@endphp

<div class="container">
    <div class="page">

        {{--@include('params.hero', [--}}
        {{--'item' => $page,--}}
        {{--'text_align_bottom' => true,--}}
        {{--])--}}

        {{--@include('params.body-bg-image', ['item' => $page])--}}

        @if( $body = trim($page->param('body')) )
            <div class="general-content-wrap">
                <div class="general-content">
                    {!! $body !!}
                </div>
            </div>
        @endif

    </div>
</div>