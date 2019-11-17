@extends('layouts.app')

@section('content')

<script>
    var url = "{!! url('/') !!}";
</script>

<div class="container">
    <div class="row justify-content-center">
        <div class='col-3'>Name</div>
        <div class='col'>Email</div>
        <div class='col-2'>Blocked</div>
    </div>
    @foreach($users as $user)
        <div class="row justify-content-center">
            <div class='col-3'>{{ $user->name }}</div>
            <div class='col'>{{ $user->email }}</div>
            <div class='col-2'>
                <div class="custom-control custom-radio">
                    <input type="radio" id="blockUserYes{{$user->id}}" name="blockUser{{$user->id}}" class="custom-control-input" value="yes" data="{{$user->id}}" {{ ($user->blocked) ? "checked" : "" }}>
                    <label class="custom-control-label" for="blockUserYes{{$user->id}}">Yes</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" id="blockUserNo{{$user->id}}" name="blockUser{{$user->id}}" class="custom-control-input" value="no" data="{{$user->id}}" {{ (!$user->blocked) ? "checked" : "" }}>
                    <label class="custom-control-label" for="blockUserNo{{$user->id}}">No</label>
                </div>
            </div>
        </div>
    @endforeach
</div>    

@push('scripts')
    <script src="{{asset('js/admin.js')}}?<?php echo filemtime("js/admin.js")?>"></script>
@endpush

@endsection
