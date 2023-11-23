@extends('layouts.app')

@section('title', 'Edit Supplier')

@section('breadcrumb')
  <ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('suppliers.index') }}">Suppliers</a></li>
    <li class="breadcrumb-item active">Edit</li>
  </ol>
@endsection

@section('content')
  <div class="container-fluid">
    <form action="/suppliers/{{$supplier->id}}" method="POST">
      @csrf
      @method('patch')
      <div class="row">
        <div class="col-lg-12">
          {{-- TODO:Integrate with sweetalert --}}
          {{-- @include('utils.alerts') --}}
          <div class="form-group">
            <label for="supplier_name">Supplier Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="supplier_name" value="{{ $supplier->supplier_name }}" required>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="form-group">
            <label for="supplier_email">Email <span class="text-danger">*</span></label>
            <input type="email" class="form-control" name="supplier_email" value="{{ $supplier->supplier_email }}" required>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="form-group">
            <label for="supplier_phone">Phone <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="supplier_phone" value="{{ $supplier->supplier_phone }}" required>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="form-group">
            <label for="address">Address <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="address" value="{{ $supplier->address }}" required>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-12">
          <div class="form-group">
            <button class="btn btn-primary">Update Supplier <i class="bi bi-check"></i></button>
          </div>
        </div>
      </div>
    </form>
  </div>
@endsection
