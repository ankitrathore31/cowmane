@extends('admin.layout.AdminLayout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header -->
    <section class="content-header">
        <h1>
            <i class="fa fa-user-circle"></i> User Details
            <small>Profile of {{ $user->name }}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="{{ route('user-list') }}">User List</a></li>
            <li class="active">User View</li>
        </ol>
    </section>

    <!-- Main Content -->
    <section class="content">
        <div class="row justify-content-center">
            <div class="col-md-6 col-md-offset-3">
                <div class="box box-primary">
                    <div class="box-header with-border text-center">
                        <h3 class="box-title"><i class="fa fa-info-circle"></i> Detailed Information</h3>
                    </div>

                    <div class="box-body">
                        <div class="profile-user-info">
                            <div class="form-group">
                                <label><strong><i class="fa fa-user text-primary"></i> Name:</strong></label>
                                <p>{{ $user->name }}</p>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label><strong><i class="fa fa-envelope text-primary"></i> Email:</strong></label>
                                <p>{{ $user->email }}</p>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label><strong><i class="fa fa-phone text-primary"></i> Mobile No.:</strong></label>
                                <p>{{ $user->number }}</p>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label><strong><i class="fa fa-user-tag text-primary"></i> Role:</strong></label>
                                <p>{{ ucfirst($user->user_type) }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="box-footer text-center">
                        <a href="{{ route('user-list') }}" class="btn btn-default">
                            <i class="fa fa-arrow-left"></i> Back to User List
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
