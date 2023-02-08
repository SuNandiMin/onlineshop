@extends('layouts.master')
@section('content')

    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Edit Your Brand</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('brands.update',$brand->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{ $brand->name }}" class="form-control" id="name" placeholder="Enter product name">
                </div>
                <div class="form-group">
                    <label for="logo">Logo</label>
                    <div class="col-md-6">
                            <input type="file" value="" name="logo" class="form-control p-1">
                            @error('logo')
                                <div class=" ">{{ $message }}</div>
                            @enderror
                    </div>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="checked" class="form-check-input" value=1 id="enable">
                    <label class="form-check-label" for="enable">Enable</label>
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
