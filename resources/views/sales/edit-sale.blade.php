@extends('layouts.app')

@section('title', 'Edit Sale')

@section('breadcrumb')
  <ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('sale.index') }}">Sales</a></li>
    <li class="breadcrumb-item active">Edit</li>
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
            <form id="sale-form" action="{{ route('sale.update', $sale) }}" method="POST">
              @csrf
              @method('patch')
              <div class="form-row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="reference">Reference <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="reference" required value="{{ $sale->reference }}"
                      readonly>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="from-group">
                    <div class="form-group">
                      <label for="date">Date <span class="text-danger">*</span></label>
                      <input type="date" class="form-control" name="date" required value="{{ $sale->date }}">
                    </div>
                  </div>
                </div>
              </div>

              <livewire:product-cart :cartInstance="'sale'" :data="$sale" />

              <div class="form-row">
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="status">Status <span class="text-danger">*</span></label>
                    <select class="form-control" name="status" id="status" required>
                      <option {{ $sale->status == 'Pending' ? 'selected' : '' }} value="Pending">Pending</option>
                      <option {{ $sale->status == 'Completed' ? 'selected' : '' }} value="Completed">Completed</option>
                    </select>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="from-group">
                    <div class="form-group">
                      <label for="payment_method">Payment Method <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" name="payment_method" required
                        value="{{ $sale->payment_method }}" readonly>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label for="paid_amount">Amount Paid <span class="text-danger">*</span></label>
                    <input id="paid_amount" type="text" class="form-control" name="paid_amount" required
                      value="{{ $sale->paid_amount }}">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="note">Note (Optional)</label>
                <textarea name="note" id="note" rows="5" class="form-control">{{ $sale->note }}</textarea>
              </div>

              <div class="mt-3">
                <button type="submit" class="btn btn_color">
                  Update Sale <i class="bi bi-check"></i>
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
        prefix: 'Rp. ',
        thousands: '.',
        decimal: ',',
        allowZero: true,
      });

      $('#paid_amount').maskMoney('mask');

      $('#sale-form').submit(function() {
        var paid_amount = $('#paid_amount').maskMoney('unmasked')[0];
        $('#paid_amount').val(paid_amount);
      });
    });
  </script>
@endpush
