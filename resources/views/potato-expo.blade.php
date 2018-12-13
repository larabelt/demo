<!DOCTYPE html>
<html lang="en">

    @include('partials.head')

    <body class="web">

        <noscript>
            <div class="alert alert-danger text-center" role="alert">
                {{ __('Site best viewed with JavaScript turned on') }}
            </div>
        </noscript>

    <div id="app">
        <potato-container></potato-container>
        @include('belt-notify::layouts.shared.partials.alerts')
    </div>

    <script src="{{ static_url(mix('/js/manifest.js')) }}"></script>
    <script src="{{ static_url(mix('/js/vendor.js')) }}"></script>
    <script src="{{ static_url(mix('/js/web.js')) }}"></script>

</body>
</html>