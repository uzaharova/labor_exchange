@extends('layouts.top_menu')

@section('content')
<div class="home" id="home">
    <div class="container">
        <br>
        @if(!empty($works))
            @foreach($works as $work)
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $work->title }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted text-right">{{ $work->email }}</h6>
                        <div class="row">
                            <div class="col-md-12 col-sm-3">
                                {{ $work->description }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p class="text-right text-muted">{{ $work->created_at }}</p>
                            </div>
                        </div>
                        @if(isset($show) && ($work->status == 'D'))<a href="{{ url('/approve/' . sha1($work->id)) }}" class="card-link">@lang("works.activate")</a>@endif
                    </div>
                </div>
                <br>
            @endforeach
            {{ $works->links() }}
        @else
            @lang('works.not_works')
        @endif
    </div>
</div>
@endsection
