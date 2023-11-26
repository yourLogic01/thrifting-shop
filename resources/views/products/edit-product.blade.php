@extends('layouts.app')

@section('title', 'Edit Product')

@section('breadcrumb')
  <ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Products</a></li>
    <li class="breadcrumb-item active">Edit</li>
  </ol>
@endsection

@section('content')
  <div class="container-fluid mb-4">
    <form id="product-form" action="{{ route('product.update', $product->id) }}" method="POST">
      @csrf
      @method('patch')
      <div class="row">
        <div class="col-lg-12">
          {{-- TODO:Integrate with sweetalert --}}
          {{-- @include('utils.alerts') --}}
        </div>
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="product_name">Product Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="product_name" required
                      value="{{ $product->product_name }}">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="product_code">Product Code <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="product_code" required
                      value="{{ $product->product_code }}">
                  </div>
                </div>
              </div>

              <div class="form-row">
                <div class="col-md-6">
                  <label for="category_id">Category <span class="text-danger">*</span></label>
                  <div class="input-group">
                    <select class="form-control" name="category_id" id="category_id" required>
                      <option value="" selected disabled>Select Category</option>
                      @foreach ($categories as $category)
                        <option {{ $category->id == $product->category->id ? 'selected' : '' }}
                          value="{{ $category->id }}">{{ $category->category_name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="product_price">Price <span class="text-danger">*</span></label>
                    <input id="product_price" type="text" class="form-control" name="product_price" min="0"
                      required value="{{ $product->product_price }}">
                  </div>
                </div>
              </div>

              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="product_quantity">Quantity <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" name="product_quantity" required
                      value="{{ $product->product_quantity }}">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="alert_quantity">Alert Quantity <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" name="alert_quantity" required
                      value="{{ $product->alert_quantity }}">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="product_note">Note (Optional)</label>
                <textarea name="product_note" id="product_note" rows="4" class="form-control">{{ $product->product_note }}</textarea>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Update Product <i class="bi bi-check"></i></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
@endsection

@push('scripts')
  <script src="{{ asset('js/jquery-mask-money.js') }}"></script>
  <script>
    $(document).ready(function() {
      $('#product_price').maskMoney({
        prefix: 'Rp.',
        thousands: '.',
        decimal: ',',
      });

      $('#product_price').maskMoney('mask');

      $('#product-form').submit(function() {
        var price = $('#product_price').maskMoney('unmasked')[0];
        $('#product_price').val(price);
      });
    });
  </script>
@endpush
