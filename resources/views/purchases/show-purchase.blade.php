@extends('layouts.app')

@section('title', 'Purchases Detail')

@section('breadcrumb')
  <ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('purchases.index') }}">Purchases</a></li>
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
          </div>
          <div class="card-body">
            <div class="row mb-4">
              <div class="col-sm-4 mb-3 mb-md-0">
                <h5 class="mb-2 border-bottom pb-2">Company Info:</h5>
                <div><strong>Thrifting Shop</strong></div>
                <div>Email: thriftingshop99@gmail.com</div>
                <div>Phone: 085717028487</div>
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
                    <th class="align-middle">Unit Price</th>
                    <th class="align-middle">Quantity</th>
                    <th class="align-middle">Total Amount</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($purchase->purchaseDetails as $item)
                    <tr>
                      <td class="align-middle">
                        {{ $item->product_name }} <br>
                        <span class="badge badge-success">
                          {{ $item->product_code }}
                        </span>
                      </td>

                      <td class="align-middle">
                        {{ format_currency($item->unit_price) }}
                      </td>

                      <td class="align-middle">
                        {{ $item->quantity }}
                      </td>

                      <td class="align-middle">
                        {{ format_currency($item->sub_total) }}
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="row">
              <div class="col-lg-4 col-sm-5 ml-md-auto">
                <table class="table">
                  <tbody>
                    <tr>
                      <td class="left"><strong>Total Amount</strong></td>
                      <td class="right"><strong>{{ format_currency($purchase->total_amount) }}</strong></td>
                    </tr>
                    <tr>
                      <td class="left"><strong>Paid Amount</strong></td>
                      <td class="right"><strong>{{ format_currency($purchase->paid_amount) }}</strong></td>
                    </tr>
                    <tr>
                      <td class="left"><strong>Due Amount</strong></td>
                      <td class="right"><strong>{{ format_currency($purchase->due_amount) }}</strong></td>
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
