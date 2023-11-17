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
    <form id="product-form" action="/" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col-lg-12">
          {{-- TODO:Integrate with sweetalert --}}
          {{-- @include('utils.alerts') --}}
          <div class="form-group">
            <button class="btn btn-primary">Create Product <i class="bi bi-check"></i></button>
          </div>
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
                    <label for="product_code">Code <span class="text-danger">*</span></label>
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
                    <label for="barcode_symbology">Barcode Symbology <span class="text-danger">*</span></label>
                    <select class="form-control" name="product_barcode_symbology" id="barcode_symbology" required>
                      <option value="" selected disabled>Select Symbology</option>
                      <option value="C128">Code 128</option>
                      <option value="C39">Code 39</option>
                      <option value="UPCA">UPC-A</option>
                      <option value="UPCE">UPC-E</option>
                      <option selected value="EAN13">EAN-13</option>
                      <option value="EAN8">EAN-8</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="product_cost">Cost <span class="text-danger">*</span></label>
                    <input id="product_cost" type="text" class="form-control" name="product_cost" required
                      value="{{ old('product_cost') }}">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="product_price">Price <span class="text-danger">*</span></label>
                    <input id="product_price" type="text" class="form-control" name="product_price" required
                      value="{{ old('product_price') }}">
                  </div>
                </div>
              </div>

              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="product_quantity">Quantity <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" name="product_quantity" required
                      value="{{ old('product_quantity') }}" min="1">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="product_stock_alert">Alert Quantity <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" name="product_stock_alert" required
                      value="{{ old('product_stock_alert', 0) }}" min="0" max="100">
                  </div>
                </div>
              </div>

              <div class="form-row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="product_order_tax">Tax (%)</label>
                    <input type="number" class="form-control" name="product_order_tax"
                      value="{{ old('product_order_tax') }}" min="1">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="product_tax_type">Tax type</label>
                    <select class="form-control" name="product_tax_type" id="product_tax_type">
                      <option value="" selected>Select Tax Type</option>
                      <option value="1">Exclusive</option>
                      <option value="2">Inclusive</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="product_unit">Unit <i class="bi bi-question-circle-fill text-info"
                        data-toggle="tooltip" data-placement="top"
                        title="This short text will be placed after Product Quantity."></i> <span
                        class="text-danger">*</span></label>
                    <select class="form-control" name="product_unit" id="product_unit">
                      <option value="" selected>Select Unit</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="product_note">Note</label>
                <textarea name="product_note" id="product_note" rows="4 " class="form-control"></textarea>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <div class="form-group">
                <label for="image">Product Images <i class="bi bi-question-circle-fill text-info"
                    data-toggle="tooltip" data-placement="top"
                    title="Max Files: 3, Max File Size: 1MB, Image Size: 400x400"></i></label>
                <div class="dropzone d-flex flex-wrap align-items-center justify-content-center" id="document-dropzone">
                  <div class="dz-message" data-dz-message>
                    <i class="bi bi-cloud-arrow-up"></i>
                  </div>
                </div>
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

@section('third_party_scripts')
  <script src="{{ asset('js/dropzone.js') }}"></script>
@endsection
