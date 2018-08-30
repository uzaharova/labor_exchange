@extends('layouts.top_menu')

@section('content')
    <input id="url_home" type="hidden" value="{{ url("/") }}">
    <h1 id="status_update">@lang("works.status_update")</h1>
@endsection