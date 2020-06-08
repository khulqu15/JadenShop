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
                <a href="{{ url('category-create') }}" role="button" class="btn btn-primary w-100">Add new Categoy</a>
            </div>
            <div class="col-md-3">
                <a href="{{ url('/product-list') }}" role="button" class="btn btn-light shadow-sm w-100">Products</a>
            </div>
        </div>
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Category Table</h4>
            <p class="card-category">Manage category activity</p>
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
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
