@extends('layouts.master')
@section('content')

    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Create User</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('users.store') }}" method="POST">
        @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter user name">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control" id="email" placeholder="Enter email">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" name="password" class="form-control" id="password" placeholder="Enter password">
                </div>

            </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
      <!-- /.card -->

@endsection
