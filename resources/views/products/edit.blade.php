@extends('layouts.master')
@section('content')

    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Edit Your Product</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("PATCH")
            <div class="card-body col-md-11">
                <div class="form-group">
                    <label class="titletext" for="name">Name</label>
                    <input type="text" name="name" value="{{ $product->name }}" class="form-control" id="name" placeholder="Enter product name">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" name="description" value="{{ $product->description }}" class="form-control" id="description" placeholder="Enter Description">
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" name="price" value="{{ $product->price }}" class="form-control" id="price" placeholder="Enter price">
                </div>
                <div class="from-group col-md-7">
                    <label for="brand">Brand</label>
                    <select class="form-select" aria-label="Disabled select example" name="brand">
                        <option disabled="true"  selected>Choose Brand</option>
                        @foreach($brands as $brand)
                            <option value="{{$brand->id}}" {{ $brand->id == $product->brand->id? 'selected' : ' '}}>
                                {{$brand->name}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-2 mt-3">
                    <label for="quantity">Quantity</label>
                    <input type="number" class="input-text qty text form-control" name="quantity" value="{{ $product->quantity }}" id="quantity" step="1" min="0" max="" size="4" inputmode="numeric" placeholder="">
                </div>
                <div class="form-group">
                    <label for="margin">Margin</label>
                    <input type="text" name="margin" value="{{ $product->margin }}" class="form-control" id="margin" placeholder="Enter margin">
                </div>
                <div class="form-group">
                    <label for="vat">Vat</label>
                    <input type="text" name="vat" value="{{ $product->vat }}" class="form-control" id="vat" placeholder="Enter vat">
                </div>
                <div class="form-group">
                    <label for="discount">Discount</label>
                    <input type="text" name="discount" value="{{ $product->discount }}" class="form-control" id="discount" placeholder="Enter discount">
                </div>
                <div class="form-group">
                    <label for="image">image</label>
                    <div class="col-md-9">
                                    <input type="file" name="image" class="form-control p-1">
                            @error('image')
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
