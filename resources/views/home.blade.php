@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        
        @if (Auth::check())
            <div class="col-md-8">
                @include('commentAddForm')
            </div>
        @endif

        <div class="col-md-8">
            <ul class="media-list">
                @foreach($comments as $comment)
                    <li class="media">
                        <div class="media-body">
                            <strong class="text-success">{{ $comment->user->name }}</strong>
                            <span class="text-muted pull-right">
                                <small class="text-muted">{{ $comment->created_at }}</small>
                            </span>
                            <p> {{ $comment->comment }} </p>
                            @if(Auth::user() && Auth::user()->admin)
                                <button onclick='window.location="{{ route("delComment",["id"=>$comment->id]) }}"' type="button" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                </button>
                            @endif
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="col-md-8">
            {{ $comments->links() }}
        </div>
    </div>
</div>

@endsection
