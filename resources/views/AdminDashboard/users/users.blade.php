@extends('layouts.AdminDashboardFunction')

@section('content')
    <section class="content-of-vue">
        <div class="app" id="app">
            <div class="container">
                <div class="row">
                    @if ((Request::path() == 'admin-dashboard/users'))
                        <user-component></user-component>
                    @elseif (Request::path() == 'admin-dashboard/posts')
                        <Post></Post>
                    @endif
                </div>
            </div>
        </div>
    </section>
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
