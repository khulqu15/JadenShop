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
                <a href="{{ url('product-create') }}" role="button" class="btn btn-light shadow-sm w-100">Create new Product</a>
            </div>
        </div>
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Add Category</h4>
            <p class="card-category">Add category activity</p>
          </div>
          <div class="card-body pt-5">
            <form action='{{ url("category-update/$category->id") }}' method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" value="{{ $category->name }}" name="name" id="name" class="form-control" placeholder="Enter Product Name...">
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
@endsection
