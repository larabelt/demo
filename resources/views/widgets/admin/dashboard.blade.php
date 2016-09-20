@extends('ohio-core::layouts.admin.main')

@section('heading-title', 'Widgets')
@section('heading-subtitle', "'cause they're cool")
@section('heading-active', '')

@section('scripts-body-close')
    @parent
    <script src="/client/widget/admin/compiled.js"></script>
@endsection

@section('main')
    <div ng-app="widgetsApp" style="min-height: 500px;">
        @include('ohio-core::layouts.admin.partials.loading')
        <div ng-view></div>
    </div>
@stop