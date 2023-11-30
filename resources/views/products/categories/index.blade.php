@extends('layouts.app')

@section('title', 'Product Categories')

@section('third_party_stylesheets')
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

@section('breadcrumb')
  <ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Products</a></li>
    <li class="breadcrumb-item active">Categories</li>
  </ol>
@endsection

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        {{-- TODO:Integrate with sweetalert --}}
        {{-- @include('utils.alerts') --}}
        <div class="card">
          <div class="card-body">
            {{-- Button trigger modal --}}
            <button type="button" class="btn btn_color" data-toggle="modal" data-target="#categoryCreateModal">
              Add Category <i class="bi bi-plus"></i>
            </button>

            <hr>

            <div class="table-responsive">
              {!! $dataTable->table() !!}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- Create Modal --}}
  @include('products/categories/includes/category-modal')
@endsection

@push('scripts')
  {!! $dataTable->scripts() !!}
@endpush
