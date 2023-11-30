@extends('layouts.app')

@section('title', 'Create Purchase')

@section('breadcrumb')
  <ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('purchases.index') }}">Purchases</a></li>
    <li class="breadcrumb-item active">Add</li>
  </ol>
@endsection

@section('content')
  <div class="container-fluid mb-4">
    <div class="row">
      <div class="col-12">
        <livewire:search-product />
      </div>
    </div>

    <div class="row mt-4">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            {{-- TODO:Integrate with sweetalert --}}
            {{-- @include('utils.alerts') --}}
            <form id="purchase-form" action="{{ route('purchases.store') }}" method="POST">
              @csrf
              <div class="form-row">
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="reference">Reference <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="reference" required readonly value="PR">
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="from-group">
                    <div class="form-group">
                      <label for="supplier_id">Supplier <span class="text-danger">*</span></label>
                      <select class="form-control" name="supplier_id" id="supplier_id" required>
                        <option value="">--Select Supplier--</option>
                        @foreach ($suppliers as $supplier)
                          <option value="{{ $supplier->id }}">{{ $supplier->supplier_name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="from-group">
                    <div class="form-group">
                      <label for="date">Date <span class="text-danger">*</span></label>
                      <input type="date" class="form-control" name="date" required
                        value="{{ now()->format('Y-m-d') }}">
                    </div>
                  </div>
                </div>
              </div>

              <livewire:product-cart :cartInstance="'purchase'" />

              <div class="form-row">
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="status">Status <span class="text-danger">*</span></label>
                    <select class="form-control" name="status" id="status" required>
                      <option value="">--Select Status--</option>
                      <option value="Pending">Pending</option>
                      <option value="Completed">Completed</option>
                    </select>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="from-group">
                    <div class="form-group">
                      <label for="payment_method">Payment Method <span class="text-danger">*</span></label>
                      <select class="form-control" name="payment_method" id="payment_method" required>
                        <option value="">--Select Payment Method--</option>
                        <option value="Cash">Cash</option>
                        <option value="Transfer">Bank Transfer</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="paid_amount">Amount Paid <span class="text-danger">*</span></label>
                    <div class="input-group">
                      <input id="paid_amount" type="text" class="form-control" name="paid_amount" required>
                      <div class="input-group-append">
                        <button id="getTotalAmount" class="btn btn_color" type="button">
                          <i class="bi bi-check-square"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="note">Note (Optional)</label>
                <textarea name="note" id="note" rows="5" class="form-control"></textarea>
              </div>

              <div class="mt-5">
                <button type="submit" class="btn btn_color">
                  Create Purchase <i class="bi bi-plus"></i>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script src="{{ asset('js/jquery-mask-money.js') }}"></script>
  <script>
    $(document).ready(function() {
      $('#paid_amount').maskMoney({
        prefix: 'Rp.',
        thousands: '.',
        decimal: ',',
        allowZero: true,
      });

      $('#getTotalAmount').click(function() {
        $('#paid_amount').maskMoney('mask', {{ Cart::instance('purchase')->total() }});
      });

      $('#purchase-form').submit(function() {
        var paid_amount = $('#paid_amount').maskMoney('unmasked')[0];
        $('#paid_amount').val(paid_amount);
      });
    });
  </script>
@endpush
