@extends('layouts.top_menu')

@section('content')
    <input id="url_home" type="hidden" value="{{ url("/") }}">
    <h1 id="status_update" class="text-danger">@lang("works.failed_status_update")</h1>
@endsection