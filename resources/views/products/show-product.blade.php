@extends('layouts.app')

@section('title', 'Product Details')

@section('breadcrumb')
  <ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="/">Products</a></li>
    <li class="breadcrumb-item active">Details</li>
  </ol>
@endsection

@section('content')
  <div class="container-fluid mb-4">
    <div class="row">
      <div class="col-lg-9">
        <div class="card h-100">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped mb-0">
                <tr>
                  <th>Product Code</th>
                  <td>tes</td>
                </tr>
                <tr>
                  <th>Barcode Symbology</th>
                  <td>tes</td>
                </tr>
                <tr>
                  <th>Name</th>
                  <td>tes</td>
                </tr>
                <tr>
                  <th>Category</th>
                  <td>tes</td>
                </tr>
                <tr>
                  <th>Cost</th>
                  <td>tes</td>
                </tr>
                <tr>
                  <th>Price</th>
                  <td>tes</td>
                </tr>
                <tr>
                  <th>Quantity</th>
                  <td>tes</td>
                </tr>
                <tr>
                  <th>Stock Worth</th>
                  <td>
                    1
                  </td>
                </tr>
                <tr>
                  <th>Alert Quantity</th>
                  <td>tes</td>
                </tr>
                <tr>
                  <th>Tax (%)</th>
                  <td>tes</td>
                </tr>
                <tr>
                  <th>Tax Type</th>
                  <td>
                    Exclusive
                  </td>
                </tr>
                <tr>
                  <th>Note</th>
                  <td>tes</td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3">
        <div class="card h-100">
          <div class="card-body">
            tes
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
