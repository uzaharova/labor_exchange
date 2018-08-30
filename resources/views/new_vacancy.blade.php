@extends('layouts.top_menu')

@section('content')
    <div class="container p-md-3">
        <form id="form" action="{{ url('/create_vacancy') }}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label for="email">@lang("works.email")</label>
                <input id="email"
                       type="email"
                       class="form-control"
                       name="email" value=""
                       placeholder="@lang("works.checker_email_placeholder")" required>
                <div class="text-danger" id="emailError"></div>
            </div>
            <div class="form-group">
                <label for="title">@lang("works.title")</label>
                <input id="title" type="text" class="form-control " name="title" value="" required>
            </div>
            <div class="form-group">
                <label for="description">@lang("works.description")</label>
                <textarea id="description" class="form-control" name="description" required></textarea>
            </div>
            <div class="button-container">
                <button class="button" onclick="return validateForm()">
                    @lang("works.add_vacancy")
                </button>
            </div>
        </form>
    </div>
@endsection
