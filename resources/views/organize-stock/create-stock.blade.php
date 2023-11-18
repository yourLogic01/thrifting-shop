@extends('layouts.app')

@section('title', 'Set Stock')

@section('breadcrumb')
  <ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('organize-stock.index') }}">Organize-stock</a></li>
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
            <form action="/" method="POST">
              @csrf
              <div class="form-row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="reference">Reference <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="reference" required readonly value="STC">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="from-group">
                    <div class="form-group">
                      <label for="date">Date <span class="text-danger">*</span></label>
                      <input type="date" class="form-control" name="date" required
                        value="{{ now()->format('Y-m-d') }}">
                    </div>
                  </div>
                </div>
              </div>

              <livewire:product-stock />

              <div class="form-group">
                <label for="note">Note (Optional)</label>
                <textarea name="note" id="note" rows="5" class="form-control"></textarea>
              </div>
              <div class="mt-3">
                <button type="submit" class="btn btn-primary">
                  Set Stock <i class="bi bi-check"></i>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
