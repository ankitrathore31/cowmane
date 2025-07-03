@extends('admin.layout.AdminLayout')
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <h1>Change Password</h1>
    </section>

    <section class="content">
        <form action="{{ route('update-password', $user->id) }}" method="POST">
            @csrf

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                </div>
            @endif

            <div class="form-group">
                <label>New Password</label>
                <input type="password" name="password" class="form-control" placeholder="New Password">
            </div>

            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
            </div>

            <button type="submit" class="btn btn-primary">Update Password</button>
        </form>
    </section>
</div>
@endsection
