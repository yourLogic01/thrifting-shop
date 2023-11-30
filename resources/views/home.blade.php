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
            <div class="bg-gradient-primary bg_primary p-4 mfe-3 rounded-left">
              <i class="bi bi-wallet font-2xl"></i>
            </div>
            <div>
              <div class="text-value text-primary">{{ format_currency($revenue) }}</div>
              <div class="text-muted text-uppercase font-weight-bold small">Revenue</div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-4">
        <div class="card border-0">
          <div class="card-body p-0 d-flex align-items-center shadow-sm">
            <div class="bg-gradient-warning bg_yellow p-4 mfe-3 rounded-left">
              <i class="bi bi-basket font-2xl"></i>
            </div>
            <div>
              <div class="text-value text-warning">{{ $products }}</div>
              <div class="text-muted text-uppercase font-weight-bold small">All Products</div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-4">
        <div class="card border-0">
          <div class="card-body p-0 d-flex align-items-center shadow-sm">
            <div class="bg-gradient-info bg_green p-4 mfe-3 rounded-left">
              <i class="bi bi-graph-up font-2xl"></i>
            </div>
            <div>
              <div class="text-value text-info">{{ format_currency($profit) }}</div>
              <div class="text-muted text-uppercase font-weight-bold small">Profit</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row mb-5">
      <div class="col-lg-7">
        <div class="card border-0 shadow-sm h-100">
          <div class="card-header">
            Sales & Purchases of Last 7 Days
          </div>
          <div class="card-body">
            <canvas id="salesPurchasesChart"></canvas>
          </div>
        </div>
      </div>
      <div class="col-lg-5">
        <div class="card border-0 shadow-sm h-100">
          <div class="card-header">
            Overview of {{ now()->format('F, Y') }}
          </div>
          <div class="card-body d-flex justify-content-center">
            <div class="chart-container" style="position: relative; height:auto; width:280px">
              <canvas id="currentMonthChart"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endsection

  @section('third_party_scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.0/chart.min.js"
      integrity="sha512-asxKqQghC1oBShyhiBwA+YgotaSYKxGP1rcSYTDrB0U6DxwlJjU59B67U8+5/++uFjcuVM8Hh5cokLjZlhm3Vg=="
      crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  @endsection

  @push('scripts')
    @vite('resources/js/chart.js')
  @endpush
