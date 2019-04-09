@extends('layouts.AdminPanelMaster')

@section('content')

    <h1>User Blade</h1>'
{{--        <example-component></example-component>--}}
{{--    <user-component></user-component>--}}
{{--    <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>--}}

    @if(isset($users))
    <ul>
        @foreach($users as $user)
        <li>{{$user->name}}</li>
            @endforeach
    </ul>
    @endif
@endsection
