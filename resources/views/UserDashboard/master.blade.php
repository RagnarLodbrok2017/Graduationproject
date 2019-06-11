@extends('layouts.UserDashboardFunctionLayout')

@section('content')
    <div class="app" id="app">
        @if (Request::path() == 'dashboard')
            <home-user-component :auth_user_id="{{Auth::user()->id}}"></home-user-component>
            @elseif(Request::path() == 'dashboard/favourites')
            <favourite-user-component :auth_user_id="{{Auth::user()->id}}"></favourite-user-component>
        @elseif (Request::is ('dashboard/profile'))
            <user-profile-component :User="{{ $user }}" :Posts="{{ $posts }}"></user-profile-component>
        @endif
    </div>

@endsection
<script>
    // import AnyUserProfile from "../../../js/components/AdminDashboard/Users/AnyUserProfile";
    // export default {
    //     components: {AnyUserProfile}
    // }
</script>
<script>

</script>
