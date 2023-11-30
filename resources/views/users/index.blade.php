@extends('layouts.app')

@section('title', 'All Users')

@section('third_party_stylesheets')
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

@section('breadcrumb')
  <ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item active">Users</li>
  </ol>
@endsection

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <!-- Button trigger modal -->
            <a href="{{ route('user.create') }}" class="btn btn_color">
              Add User <i class="bi bi-plus"></i>
            </a>

            <hr>

            <div class="table-responsive">
              {!! $dataTable->table() !!}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  {!! $dataTable->scripts() !!}
@endpush
