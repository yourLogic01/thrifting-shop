@extends('layouts.app')

@section('title', 'Product Details')

@section('breadcrumb')
  <ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Products</a></li>
    <li class="breadcrumb-item active">Details</li>
  </ol>
@endsection

@section('content')
  <div class="container-fluid mb-4">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="card h-100">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped mb-0">
                <tr>
                  <th>Product Code</th>
                  <td>{{ $product->product_code }}</td>
                </tr>
                <tr>
                  <th>Product Name</th>
                  <td>{{ $product->product_name }}</td>
                </tr>
                <tr>
                  <th>Category</th>
                  <td>{{ $product->category->category_name }}</td>
                </tr>
                <tr>
                  <th>Product Price</th>
                  <td>{{ format_currency($product->price) }}</td>
                </tr>
                <tr>
                  <th>Quantity</th>
                  <td>{{ $product->qty }} Pcs</td>
                </tr>
                <tr>
                  <th>Alert Quantity</th>
                  <td>{{ $product->alert_qty }}</td>
                </tr>
                <tr>
                  <th>Note</th>
                  <td>{{ $product->note }}</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
