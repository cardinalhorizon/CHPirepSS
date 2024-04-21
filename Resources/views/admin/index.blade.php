@extends('chpirepss::layouts.admin')

@section('title', 'CHPirepSS')
@section('actions')
    <li>
        <a href="{{ url('/chpirepss/admin/create') }}">
            <i class="ti-plus"></i>
            Add New</a>
    </li>
@endsection
@section('content')
    <div class="card border-blue-bottom">
        <div class="header"><h4 class="title">Admin Scaffold!</h4></div>
        <div class="content">
            <p>This view is loaded from module: {{ config('chpirepss.name') }}</p>
        </div>
    </div>
@endsection
