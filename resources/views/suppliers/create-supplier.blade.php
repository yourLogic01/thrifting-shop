@extends('layouts.app')

@section('title', 'Create Supplier')

@section('breadcrumb')
  <ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('suppliers.index') }}">Suppliers</a></li>
    <li class="breadcrumb-item active">Add</li>
  </ol>
@endsection

@section('content')
  <div class="container-fluid">
    <form action="{{ route('suppliers.store') }}" method="POST">
      @csrf
      <div class="row">
        <div class="col-lg-12">
          {{-- TODO:Integrate with sweetalert --}}
          {{-- @include('utils.alerts') --}}
          <div class="form-group">
            <label for="supplier_name">Supplier Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="supplier_name" required>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="form-group">
            <label for="supplier_email">Email <span class="text-danger">*</span></label>
            <input type="email" class="form-control" name="supplier_email" required>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="form-group">
            <label for="supplier_phone">Phone <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="supplier_phone" required>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="form-group">
            <label for="address">Address <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="address" required>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-12">
          <div class="form-group">
            <button class="btn btn-primary">Create Supplier <i class="bi bi-plus"></i></button>
          </div>
        </div>
      </div>
    </form>
  </div>
@endsection
