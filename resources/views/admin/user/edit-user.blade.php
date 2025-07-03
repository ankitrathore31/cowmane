@extends('admin.layout.AdminLayout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Edit User
                <small>User</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="{{-- --}}">User</a></li>
                <li class="active">Edit User</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit User</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form action="{{ route('update-user', $user->id) }}" method="post"  style="margin: 15px;">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" value="{{ $user->email }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Mobile No.</label>
                                <input type="number" name="number" value="{{ $user->number }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>User Role</label>
                                <select name="user_type" class="form-control">
                                    <option value="user" {{ $user->user_type == 'user' ? 'selected' : '' }}>User</option>
                                    <option value="retail" {{ $user->user_type == 'retail' ? 'selected' : '' }}>Retail
                                    </option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
