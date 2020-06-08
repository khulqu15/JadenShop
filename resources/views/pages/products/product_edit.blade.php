@extends('layouts.app', ['activePage' => 'products', 'titlePage' => __('Products List')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="row">
            <div class="col-md-3">
                <a href="{{ URL::previous() }}" role="button" class="btn btn-primary w-100">Back</a>
            </div>
            <div class="col-md-3">
                <a href="{{ url('category-list') }}" role="button" class="btn btn-light shadow-sm w-100">Categories</a>
            </div>
        </div>
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Change Product</h4>
            <p class="card-category">Change products activity</p>
          </div>
          <div class="card-body pt-5">
            <form action='{{ url("product-update/$product->id") }}' method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" value="{{ $product->name }}" name="name" id="name" class="form-control" placeholder="Enter Product Name...">
                </div>
                <div class="form-group">
                  <label for="stock">Category</label>
                  <select name="category" id="category" class="form-control">
                    <option value="{{ $product->category_id }}">{{ $product->category->name }}</option>
                    @foreach ($categories as $category)
                      @if ($product->category_id == $category->id)
                      <option disabled style="display: none" value="{{ $category->id }}">{{ $category->name }}</option>
                      @else
                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                      @endif
                    @endforeach
                  </select>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="price">Price</label>
                      <input type="number" value="{{ $product->price }}" name="price" id="price" class="form-control" placeholder="Enter Product Price...">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="stock">Stock</label>
                      <input type="number" value="{{ $product->stock }}" name="stock" id="stock" class="form-control" placeholder="Enter Product Name...">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="picture">Picture</label>
                        <button class="btn btn-warning">
                          <input type="file" onchange="loadFile(event)" name="picture" id="picture" class="form-control">
                        </button>
                        <small>Recomended ( square size: 500px )</small>
                    </div>
                  </div>
                  <div class="col-sm-6 text-center">
                    <img src='{{ asset("img/products/$product->picture") }}' alt="your image here" class="w-25 preview" id="preview">
                  </div>
                </div>
                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea name="description" id="description" cols="6" rows="6" class="form-control">{{ $product->description }}</textarea>
                </div>
                <div class="text-right">
                    <button class="btn btn-primary px-5">Save</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
    function loadFile(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var preview = document.getElementById('preview');
            preview.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

@endsection
