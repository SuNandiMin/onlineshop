@extends('layouts.master')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Products</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Id</th>
                <th>Name</th>
                <th>Brand</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Description</th>
                <th>Image</th>
                <th>Margin</th>
                <th>Vat</th>
                <th>Discount</th>
                <th>Enable</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $key=>$product)
            <tr>
                <td>{{++$key}}</td>
                <td>{{$product->id}}</td>
                <td>{{ $product->name }}</td>
                <td>{{$product->brand->name ?? 'Plz choose category' }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->description }}</td>
                <td> <img src="images/{{ $product->image}}" alt="" width="50"></td>
                <td>{{ $product->margin }}</td>
                <td>{{ $product->vat }}</td>
                <td>{{ $product->discount }}</td>
                <td>{{ $product->enable }}</td>
                <td>
                    <form action="{{ route('products.destroy',$product->id) }}" method="POST">

                        <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>

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
        {{-- {!! $products->links() !!} --}}
    </div>
  </div>
  <!-- /.card -->

@endsection
