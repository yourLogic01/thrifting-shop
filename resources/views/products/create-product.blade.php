@extends('layouts.app')

@section('title', 'Create Product')

@section('breadcrumb')
  <ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Products</a></li>
    <li class="breadcrumb-item active">Add</li>
  </ol>
@endsection

@section('content')
  <div class="container-fluid">
    <form id="product-form" action="{{ route('product.store') }}" method="POST">
      @csrf
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
                      value="{{ old('product_name') }}">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="product_code">Product Code <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="product_code" required
                      value="{{ old('product_code') }}">
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
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                      @endforeach
                    </select>
                    <div class="input-group-append d-flex">
                      <button data-toggle="modal" data-target="#categoryCreateModal" class="btn btn-outline-primary"
                        type="button">
                        Add
                      </button>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="price">Price <span class="text-danger">*</span></label>
                    <input id="price" type="text" class="form-control" name="price" required
                      value="{{ old('price') }}">
                  </div>
                </div>
              </div>

              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="qty">Quantity <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" name="qty" required value="{{ old('qty') }}">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="alert_qty">Alert Quantity <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" name="alert_qty" required
                      value="{{ old('alert_qty', 0) }}">
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="note">Note (Optional)</label>
                <textarea name="note" id="note" rows="4" class="form-control"></textarea>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Create Product <i class="bi bi-plus"></i></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>

  {{-- Create Category Modal --}}
  @include('products/categories/includes/category-modal')
@endsection

@push('scripts')
  <script src="{{ asset('js/jquery-mask-money.js') }}"></script>
  <script>
    $(document).ready(function() {
      $('#price').maskMoney({
        prefix: 'Rp.',
        thousands: '.',
        decimal: ',',
      });

      $('#product-form').submit(function() {
        var price = $('#price').maskMoney('unmasked')[0];
        $('#price').val(price);
      });
    });
  </script>
@endpush
