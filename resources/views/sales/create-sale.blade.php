@extends('layouts.app')

@section('title', 'Create Sale')

@section('breadcrumb')
  <ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('sale.index') }}">Sales</a></li>
    <li class="breadcrumb-item active">Add</li>
  </ol>
@endsection

@section('content')
  <div class="container-fluid">
    <div class="row">
      @include('utils.alerts')

      <div class="col-lg-7">
        <livewire:search-product />

        <livewire:product-list :categories="$product_categories" />
      </div>
      <div class="col-lg-5">
        <livewire:checkout :cart-instance="'sale'" />
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script src="{{ asset('js/jquery-mask-money.js') }}"></script>
  <script>
    $(document).ready(function() {
      window.addEventListener('showCheckoutModal', event => {
        $('#checkoutModal').modal('show');

        $('#paid_amount').maskMoney({
          prefix: 'Rp. ',
          thousands: '.',
          decimal: ',',
          allowZero: false,
        });

        $('#total_amount').maskMoney({
          prefix: 'Rp. ',
          thousands: '.',
          decimal: ',',
          allowZero: true,
        });

        $('#paid_amount').maskMoney('mask');
        $('#total_amount').maskMoney('mask');

        $('#checkout-form').submit(function() {
          var paid_amount = $('#paid_amount').maskMoney('unmasked')[0];
          $('#paid_amount').val(paid_amount);
          var total_amount = $('#total_amount').maskMoney('unmasked')[0];
          $('#total_amount').val(total_amount);
        });
      });
    });
  </script>
@endpush
