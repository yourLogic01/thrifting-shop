@extends('layouts.app')

@section('title', 'Purchases Detail')

@section('breadcrumb')
  <ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('purchase.index') }}">Purchases</a></li>
    <li class="breadcrumb-item active">Details</li>
  </ol>
@endsection

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header d-flex flex-wrap align-items-center">
            <div>
              Reference: <strong>{{ $purchase->reference }}</strong>
            </div>
            <a target="_blank" class="btn btn-sm btn-secondary mfs-auto mfe-1 d-print-none" href="{{ route('home') }}">
              <i class="bi bi-printer"></i> Print
            </a>
            <a target="_blank" class="btn btn-sm btn-info mfe-1 d-print-none" href="{{ route('home') }}">
              <i class="bi bi-save"></i> Save
            </a>
          </div>
          <div class="card-body">
            <div class="row mb-4">
              <div class="col-sm-4 mb-3 mb-md-0">
                <h5 class="mb-2 border-bottom pb-2">Company Info:</h5>
                <div><strong>company name</strong></div>
                <div>company address</div>
                <div>Email: company email</div>
                <div>Phone: company phone</div>
              </div>

              <div class="col-sm-4 mb-3 mb-md-0">
                <h5 class="mb-2 border-bottom pb-2">Supplier Info:</h5>
                <div><strong>{{ $supplier->supplier_name }}</strong></div>
                <div>{{ $supplier->address }}</div>
                <div>Email: {{ $supplier->supplier_email }}</div>
                <div>Phone: {{ $supplier->supplier_phone }}</div>
              </div>

              <div class="col-sm-4 mb-3 mb-md-0">
                <h5 class="mb-2 border-bottom pb-2">Invoice Info:</h5>
                <div>Invoice: <strong>INV/{{ $purchase->reference }}</strong></div>
                <div>Date: {{ \Carbon\Carbon::parse($purchase->date)->format('d M, Y') }}</div>
                <div>
                  Status: <strong>{{ $purchase->status }}</strong>
                </div>
                <div>
                  Payment Status: <strong>{{ $purchase->payment_status }}</strong>
                </div>
              </div>

            </div>

            <div class="table-responsive-sm">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th class="align-middle">Product</th>
                    <th class="align-middle">Net Unit Price</th>
                    <th class="align-middle">Quantity</th>
                    <th class="align-middle">Discount</th>
                    <th class="align-middle">Tax</th>
                    <th class="align-middle">Sub Total</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="align-middle">
                      {{ $item->product_name }} <br>
                      <span class="badge badge-success">
                        {{ $item->product_code }}
                      </span>
                    </td>

                    <td class="align-middle">unit price</td>

                    <td class="align-middle">
                      {{ $item->quantity }}
                    </td>

                    <td class="align-middle">
                      discount amount
                    </td>

                    <td class="align-middle">
                      product tax amount
                    </td>

                    <td class="align-middle">
                      sub total
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="row">
              <div class="col-lg-4 col-sm-5 ml-md-auto">
                <table class="table">
                  <tbody>
                    <tr>
                      <td class="left"><strong>Discount (10%)</strong></td>
                      <td class="right">discount amount</td>
                    </tr>
                    <tr>
                      <td class="left"><strong>Tax (10%)</strong></td>
                      <td class="right">tax amount</td>
                    </tr>
                    <tr>
                      <td class="left"><strong>Shipping</strong></td>
                      <td class="right">shipping amount</td>
                    </tr>
                    <tr>
                      <td class="left"><strong>Total Amount</strong></td>
                      <td class="right"><strong>total amount</strong></td>
                    </tr>
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
