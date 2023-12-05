<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ $purchase->reference }} | Purchase Detail</title>
  <link rel="stylesheet" href="{{ public_path('bootstrap/bootstrap.min.css') }}">
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header d-flex flex-wrap align-items-center" style="margin-bottom: 15px;">
            <div>
              Reference: <strong>{{ $purchase->reference }}</strong>
            </div>
          </div>
          <div class="card-body">
            <div class="row mb-4" style="margin-bottom: 15px;">
              <div class="col-sm-4 mb-3 mb-md-0 d-flex">
                <h5 class="mb-2 border-bottom pb-2">Company Info:</h5>
                <div><strong>Captain Thrift</strong></div>
                <div>Email: captainthrift99@gmail.com</div>
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

            <div class="table-responsive-sm table-responsive-md table-responsive-lg" style="margin: 20px 0;">
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
                        <span class="badge badge-success" style="background: forestgreen;">
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
              <div class="col-lg-8 col-md-6 col-sm-6 d-flex flex-row justify-content-start p-4"
                style="margin-top: 15px;">
                <div>
                  <h5>Note : </h5>
                </div>
                <div class="px-2">
                  <p>{{ $purchase->note ? $purchase->note : 'No description or note.' }}</p>
                </div>
              </div>

              <div class="col-lg-4 col-md-6 col-sm-6 ml-md-auto" style="overflow-x:auto; margin-top: 15px;">
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
</body>

</html>
