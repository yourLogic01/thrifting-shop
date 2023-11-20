@extends('layouts.app')

{{-- Title section --}}
@section('title', 'Home')

{{-- breadcrumb section --}}
@section('breadcrumb')
  <ol class="breadcrumb border-0 m-0">
    <li class="breadcrumb-item active">Home</li>
  </ol>
@endsection

{{-- Content section --}}
@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6 col-lg-4">
        <div class="card border-0">
          <div class="card-body p-0 d-flex align-items-center shadow-sm">
            <div class="bg-gradient-primary p-4 mfe-3 rounded-left">
              <i class="bi bi-wallet font-2xl"></i>
            </div>
            <div>
              <div class="text-value text-primary">Rp. 10.000,00</div>
              <div class="text-muted text-uppercase font-weight-bold small">Revenue</div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-4">
        <div class="card border-0">
          <div class="card-body p-0 d-flex align-items-center shadow-sm">
            <div class="bg-gradient-warning p-4 mfe-3 rounded-left">
              <i class="bi bi-basket font-2xl"></i>
            </div>
            <div>
              <div class="text-value text-warning">10</div>
              <div class="text-muted text-uppercase font-weight-bold small">All Products</div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-4">
        <div class="card border-0">
          <div class="card-body p-0 d-flex align-items-center shadow-sm">
            <div class="bg-gradient-info p-4 mfe-3 rounded-left">
              <i class="bi bi-graph-up font-2xl"></i>
            </div>
            <div>
              <div class="text-value text-info">Rp. 2.000,00</div>
              <div class="text-muted text-uppercase font-weight-bold small">Profit</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row mb-5">
      <div class="col-lg-12">
        <div class="card border-0 shadow-sm h-100">
          <div class="card-header">
            Sales & Purchases of Last 7 Days
          </div>
          <div class="card-body">
            <canvas id="salesPurchasesChart"></canvas>
          </div>
        </div>
      </div>
    </div>
  @endsection

  @section('third_party_scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.0/chart.min.js"
      integrity="sha512-7U4rRB8aGAHGVad3u2jiC7GA5/1YhQcQjxKeaVms/bT66i3LVBMRcBI9KwABNWnxOSwulkuSXxZLGuyfvo7V1A=="
      crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  @endsection

  {{-- TODO:Chart js third party configuration --}}
  {{-- @push('page_scripts')
  @vite('resources/js/chart-config.js')
@endpush --}}
