@extends('layouts.UserDashboardFunctionLayout')

@section('content')
    <div class="app" id="app">
        @if (Request::path() == 'dashboard')
            <home-user-component :auth_user_id="{{Auth::user()->id}}"></home-user-component>
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
