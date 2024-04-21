@extends('chpirepss::layouts.frontend')

@section('title', 'CHPirepSS')

@section('content')
    <h1>Hello World</h1>

    <p>
        This view is loaded from module: {{ config('chpirepss.name') }}
    </p>
@endsection
