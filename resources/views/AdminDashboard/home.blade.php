@extends('layouts.AdminPanelMaster')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <!-- content of vue -->
                        <section class="content">
                            <div class="app" id="app">
                                <div class="container">
                                    @if ((Request::path() == 'admin-dashboard/users') || (Request::path() == 'admin-dashboard/user'))
                                        <user-component></user-component>
                                    @elseif (Request::path() == 'admin-dashboard/posts')
                                        <Post></Post>
                                    @endif
                                </div>
                            </div>
                        </section>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
