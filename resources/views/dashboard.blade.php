@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">shopping_bag</i>
              </div>
              <p class="card-category">Total</p>
              <h3 class="card-title">{{ $products->total() }} Product</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">date_range</i> Last {{ $latest_product->created_at }}
            </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">list</i>
              </div>
              <p class="card-category">Total</p>
              <h3 class="card-title">{{ $categories->total() }} Category</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">date_range</i> Last {{ $latest_category->created_at }}
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8 col-md-12">
          <div class="card">
            <div class="card-header card-header-tabs card-header-primary">
              <h4 class="card-title">Product List</h4>
              <p class="card-category">New product on {{ $latest_product->created_at }}</p>
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
                  @if ($products->hasPages())
                  <div class="text-right">
                    <a href="{{ url('product-list') }}" class="btn btn-primary btn-sm">Lebih banyak</a>
                  </div>
                  @endif
                </div>
              </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-12">
          <div class="card">
            <div class="card-header card-header-warning">
              <h4 class="card-title">Category Products</h4>
              <p class="card-category">New category on {{ $latest_category->created_at }}</p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>Name</th>
                      <th>Action</th>
                    </thead>
                    <tbody>
                      @foreach ($categories as $category)
                      <tr>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a href='{{ url("category-edit/$category->id") }}' role="button" class="btn btn-sm btn-success">Edit</a>
                            <a onclick="return confirm('Yakin dihapus ?')" href='{{ url("category-destroy/$category->id") }}' role="button" class="btn btn-sm btn-danger">Hapus</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  @if ($categories->hasPages())
                  <div class="text-right">
                    <a href="{{ url('category-list') }}" class="btn btn-warning btn-sm">Lebih banyak</a>
                  </div>
                  @endif
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
@endpush
