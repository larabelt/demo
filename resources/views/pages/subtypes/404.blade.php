@php
    $page = $page ?? new \Belt\Content\Page();

    $config_path = null;
    if( config('results.' . $page->param('glm_search_preset') ) ) {
        $config_path = 'results.' . $page->param('glm_search_preset');
    }
@endphp

<div class="page">

    @include('params.hero', [
        'item' => $page,
        'show_full_mask' => true,
    ])

</div>