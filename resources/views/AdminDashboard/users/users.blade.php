@extends('layouts.AdminDashboardFunctionLayout')

@section('content')
    <div class="app" id="app">
        @if ((Request::path() == 'admin-dashboard/users'))
            <user-component></user-component>
        @elseif (Request::path() == 'admin-dashboard/posts')
            <post-component></post-component>
        @elseif (Request::is ('admin-dashboard/profile'))
            <user-profile :auth_user_id="{{Auth::user()->id}}"></user-profile>
        @elseif (Request::path() == 'admin-dashboard/categories')
            <category-component></category-component>
        @endif
    </div>

    {{--        <example-component></example-component>--}}
    {{--    <user-component></user-component>--}}
    {{--    <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>--}}
    {{--    @if(isset($users))--}}
    {{--        <ul>--}}
    {{--            @foreach($users as $user)--}}
    {{--                <li>{{$user->name}}</li>--}}
    {{--            @endforeach--}}
    {{--        </ul>--}}
    {{--    @endif--}}

@endsection
