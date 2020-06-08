@extends('layouts.app', ['activePage' => 'products', 'titlePage' => __('Products List')])

@section('content')
<div class="content">
  <div class="container-fluid">
      @if (session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <strong>{{ session('success') }}</strong>
      </div>
      @endif
      <script>
        $(".alert").alert();
      </script>
    <div class="row">
      <div class="col-md-12">
        <div class="row">
            <div class="col-md-3 offset-md-3">
                <a href="{{ url('product-create') }}" role="button" class="btn btn-primary w-100">Add new Product</a>
            </div>
            <div class="col-md-3">
                <a href="{{ url('category-list') }}" role="button" class="btn btn-light shadow-sm w-100">Categories</a>
            </div>
        </div>
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Product Table</h4>
            <p class="card-category">Manage products activity</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>Picture</th>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Stock</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  @foreach ($products as $product)
                  <tr>
                    <td><img src='{{ asset("img/products/$product->picture") }}' alt="product" width="60px"></td>
                    <td>{{ $product->name }}</td>
                    <td class="text-primary">Rp {{ $product->price }}</td>
                    <td class="text-info">{{ $product->stock }}</td>
                    <td>
                        <a href='{{ url("product-edit/$product->id") }}' role="button" class="btn btn-sm btn-success">Edit</a>
                        <a onclick="return confirm('Yakin dihapus ?')" href='{{ url("product-destroy/$product->id") }}' role="button" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
