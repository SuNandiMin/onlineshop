@extends('layouts.master')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Brands</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Id</th>
                <th>Name</th>
                <th>Logo</th>
                <th>Enable</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($brands as $key=>$brand)
            <tr>
                <td>{{++$key}}</td>
                <td>{{$brand->id}}</td>
                <td>{{ $brand->name }}</td>
                <td> <img src="/images/logos/{{ $brand->logo}}" alt="" width="50"></td>
                <td>{{ $brand->enable }}</td>
                <td>
                    <form action="{{ route('brands.destroy',$brand->id) }}" method="POST">

                        <a class="btn btn-primary" href="{{ route('brands.edit',$brand->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
        {{-- {!! $brands->links() !!} --}}
    </div>
  </div>
  <!-- /.card -->

@endsection
