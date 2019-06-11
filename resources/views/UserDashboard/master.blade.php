@extends('layouts.UserDashboardFunctionLayout')

@section('content')
    <div class="app" id="app">
        @if (Request::path() == 'dashboard')
            <home-user-component :auth_user_id="{{Auth::user()->id}}"></home-user-component>
            @elseif(Request::path() == 'dashboard/favourites')
            <favourite-user-component :auth_user_id="{{Auth::user()->id}}"></favourite-user-component>
        @elseif (Request::is ('dashboard/profile'))
            <user-profile-component :User="{{ $user }}" :Posts="{{ $posts }}"></user-profile-component>
        @elseif (Request::is ('dashboard/post_profile/*'))
            <post-userpanel-profile :Post_id="{{ $post_id }}"></post-userpanel-profile>
        @endif
    </div>

@endsection
<script>
</script>
<script>

</script>
