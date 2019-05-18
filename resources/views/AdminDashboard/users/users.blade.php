@extends('layouts.AdminDashboardFunctionLayout')

@section('content')
    <div class="app" id="app">
<!--        --><?php
//        dd($user->id);
//        ?>
        @if ((Request::path() == 'admin-dashboard/users'))
            <user-component></user-component>
        @elseif (Request::path() == 'admin-dashboard/posts')
            <post-component :auth_user_id="{{Auth::user()->id}}" ></post-component>
        @elseif (Request::is ('admin-dashboard/profile'))
            <user-profile :auth_user_id="{{Auth::user()->id}}"></user-profile>
        @elseif (Request::is ('admin-dashboard/user-profile/*'))
            <any-user-profile :User="{{ $user }}" :Posts="{{ $posts }}"></any-user-profile>
        @elseif (Request::path() == 'admin-dashboard/categories')
            <category-component :auth_user_id="{{Auth::user()->id}}"></category-component>
        @endif
    </div>

@endsection
<script>
    // import AnyUserProfile from "../../../js/components/AdminDashboard/Users/AnyUserProfile";
    // export default {
    //     components: {AnyUserProfile}
    // }
</script>
