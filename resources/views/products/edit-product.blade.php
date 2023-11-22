@extends('layouts.app')

@section('title', 'Edit Product')

@section('breadcrumb')
<ol class="breadcrumb border-0 m-0">
  <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
  <li class="breadcrumb-item"><a href="/">Products</a></li>
  <li class="breadcrumb-item active">Edit</li>
</ol>
@endsection

@section('content')
<div class="container-fluid mb-4">
  <form id="product-form" action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('patch')
    <div class="row">
      <div class="col-lg-12">
        {{-- TODO:Integrate with sweetalert --}}
        {{-- @include('utils.alerts') --}}
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Update Product <i class="bi bi-check"></i></button>
        </div>
      </div>
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <div class="form-row">
              <div class="col-md-7">
                <div class="form-group">
                  <label for="product_name">Product Name <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="product_name" required value="{{ $product->product_name }}">
                </div>
              </div>
              <div class="col-md-5">
                <div class="form-group">
                  <label for="product_code">Code <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="product_code" required value="{{ $product->product_code }}">
                </div>
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="categories_id">Category <span class="text-danger">*</span></label>
                  <select class="form-control" name="categories_id" id="categories_id" required>
                  @foreach ($categories as $category)
                  <option {{ $product->categories_id == $category->id ? "selected" : "" }} value="{{ $category->id }}">{{ $category->category_name }}</option>
                  @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="price">Price <span class="text-danger">*</span></label>
                  <input id="price" type="text" class="form-control" min="0" name="price" required value="{{ $product->price }}">
                </div>
              </div>
              <!-- <div class="col-md-6">
                  <div class="form-group">
                    <label for="barcode_symbology">Barcode Symbology <span class="text-danger">*</span></label>
                    <select class="form-control" name="product_barcode_symbology" id="barcode_symbology" required>
                      <option {{ $product->product_barcode_symbology == 'C128' ? 'selected' : '' }} value="C128">Code
                        128</option>
                      <option {{ $product->product_barcode_symbology == 'C39' ? 'selected' : '' }} value="C39">Code 39
                      </option>
                      <option {{ $product->product_barcode_symbology == 'UPCA' ? 'selected' : '' }} value="UPCA">UPC-A
                      </option>
                      <option {{ $product->product_barcode_symbology == 'UPCE' ? 'selected' : '' }} value="UPCE">UPC-E
                      </option>
                      <option {{ $product->product_barcode_symbology == 'EAN13' ? 'selected' : '' }} value="EAN13">
                        EAN-13</option>
                      <option {{ $product->product_barcode_symbology == 'EAN8' ? 'selected' : '' }} value="EAN8">EAN-8
                      </option>
                    </select>
                  </div>
                </div> -->
            </div>

            <div class="form-row">
              <!-- <div class="col-md-6">
                  <div class="form-group">
                    <label for="product_cost">Cost <span class="text-danger">*</span></label>
                    <input id="product_cost" type="text" class="form-control" min="0" name="product_cost"
                      required value="{{ $product->product_cost }}">
                  </div>
                </div> -->
            </div>

            <div class="form-row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="qty">Quantity <span class="text-danger">*</span></label>
                  <input type="number" class="form-control" name="qty" required value="{{ $product->qty }}" min="1">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="alert_qty">Alert Quantity <span class="text-danger">*</span></label>
                  <input type="number" class="form-control" name="alert_qty" required value="{{ $product->alert_qty }}" min="0">
                </div>
              </div>
            </div>

            <!-- <div class="form-row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="product_order_tax">Tax (%)</label>
                  <input type="number" class="form-control" name="product_order_tax" value="{{ $product->product_order_tax }}" min="0" max="100">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="product_tax_type">Tax type</label>
                  <select class="form-control" name="product_tax_type" id="product_tax_type">
                    <option value="" selected>None</option>
                    <option {{ $product->product_tax_type == 1 ? 'selected' : '' }} value="1">Exclusive</option>
                    <option {{ $product->product_tax_type == 2 ? 'selected' : '' }} value="2">Inclusive</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="product_unit">Unit <i class="bi bi-question-circle-fill text-info" data-toggle="tooltip" data-placement="top" title="This short text will be placed after Product Quantity."></i> <span class="text-danger">*</span></label>
                  <select class="form-control" name="product_unit" id="product_unit" required>
                    <option value="" selected>Select Unit</option>
                  </select>
                </div>
              </div>
            </div> -->
            <div class="form-group">
              <label for="note">Note</label>
              <textarea name="note" id="note" rows="4 " class="form-control">{{ $product->note }}</textarea>
            </div>
          </div>
        </div>
      </div>

      <!-- <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <div class="form-group">
              <label for="image">Product Images <i class="bi bi-question-circle-fill text-info" data-toggle="tooltip" data-placement="top" title="Max Files: 3, Max File Size: 1MB, Image Size: 400x400"></i></label>
              <div class="dropzone d-flex flex-wrap align-items-center justify-content-center" id="document-dropzone">
                <div class="dz-message" data-dz-message>
                  <i class="bi bi-cloud-arrow-up"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> -->
    </div>
  </form>
</div>
@endsection

@section('third_party_scripts')
<script src="{{ asset('js/dropzone.js') }}"></script>
@endsection