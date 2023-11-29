@extends('layouts.app')

@section('title', 'Sales Detail')

@section('breadcrumb')
  <ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('sale.index') }}">Sales</a></li>
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
              Reference: <strong>{{ $sale->reference }}</strong>
            </div>
          </div>
          <div class="card-body">
            <div class="row mb-4">
              <div class="col-sm-6 mb-3 mb-md-0">
                <h5 class="mb-2 border-bottom pb-2">Company Info:</h5>
                <div><strong>Thrifting Shop</strong></div>
                <div>Email: thriftingshop99@gmail.com</div>
                <div>Phone: 085717028487</div>
              </div>

              <div class="col-sm-6 mb-3 mb-md-0">
                <h5 class="mb-2 border-bottom pb-2">Invoice Info:</h5>
                <div>Invoice: <strong>INV/{{ $sale->reference }}</strong></div>
                <div>Date: {{ \Carbon\Carbon::parse($sale->date)->format('d M, Y') }}</div>
                <div>
                  Status: <strong>{{ $sale->status }}</strong>
                </div>
                <div>
                  Payment Status: <strong>{{ $sale->payment_status }}</strong>
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
                  @foreach ($sale->saleDetails as $item)
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
              <div class="col-lg-8 col-md-6 col-sm-6 d-flex flex-row justify-content-start p-4">
                <div>
                  <h5>Note : </h5>
                </div>
                <div class="px-2">
                  <p>{{ $sale->note ? $sale->note : 'No description or note.' }}</p>
                </div>
              </div>

              <div class="col-lg-4 col-md-6 col-sm-6 ml-md-auto" style="overflow-x:auto;">
                <table class="table">
                  <tbody>
                    <tr>
                      <td class="left"><strong>Total Amount</strong></td>
                      <td class="right"><strong>{{ format_currency($sale->total_amount) }}</strong></td>
                    </tr>
                    <tr>
                      <td class="left"><strong>Paid Amount</strong></td>
                      <td class="right"><strong>{{ format_currency($sale->paid_amount) }}</strong></td>
                    </tr>
                    <tr>
                      <td class="left"><strong>Due Amount</strong></td>
                      <td class="right"><strong>{{ format_currency($sale->due_amount) }}</strong></td>
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
