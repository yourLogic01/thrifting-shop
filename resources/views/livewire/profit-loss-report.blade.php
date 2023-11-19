<div>
  <div class="row">
    <div class="col-12">
      <div class="card border-0 shadow-sm">
        <div class="card-body">
          <form wire:submit="generateReport">
            <div class="form-row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label>Start Date <span class="text-danger">*</span></label>
                  <input wire:model="start_date" type="date" class="form-control" name="start_date">
                  @error('start_date')
                    <span class="text-danger mt-1">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label>End Date <span class="text-danger">*</span></label>
                  <input wire:model="end_date" type="date" class="form-control" name="end_date">
                  @error('end_date')
                    <span class="text-danger mt-1">{{ $message }}</span>
                  @enderror
                </div>
              </div>
            </div>
            <div class="form-group mb-0">
              <button type="submit" class="btn btn-primary">
                <span wire:target="generateReport" wire:loading class="spinner-border spinner-border-sm" role="status"
                  aria-hidden="true"></span>
                <i wire:target="generateReport" wire:loading.remove class="bi bi-shuffle"></i>
                Filter Report
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    {{-- Sales --}}
    <div class="col-12 col-lg-6">
      <div class="card border-0 shadow-sm">
        <div class="card-body p-3 d-flex align-items-center">
          <div class="bg-primary p-3 mfe-3 rounded">
            <i class="bi bi-receipt font-2xl"></i>
          </div>
          <div>
            <div class="text-value text-primary">{{ $sales_amount }}</div>
            <div class="text-uppercase font-weight-bold small ">{{ $total_sales }} Sales</div>
          </div>
        </div>
      </div>
    </div>
    {{-- Purchases --}}
    <div class="col-12 col-lg-6">
      <div class="card border-0 shadow-sm">
        <div class="card-body p-3 d-flex align-items-center">
          <div class="bg-primary p-3 mfe-3 rounded">
            <i class="bi bi-bag font-2xl"></i>
          </div>
          <div>
            <div class="text-value text-primary">{{ $purchases_amount }}</div>
            <div class="text-uppercase font-weight-bold small">{{ $total_purchases }} Purchases</div>
          </div>
        </div>
      </div>
    </div>
    {{-- Profit --}}
    <div class="col-12 col-lg-6">
      <div class="card border-0 shadow-sm">
        <div class="card-body p-3 d-flex align-items-center">
          <div class="bg-primary p-3 mfe-3 rounded">
            <i class="bi bi-trophy font-2xl"></i>
          </div>
          <div>
            <div class="text-value text-primary">{{ $profit_amount }}</div>
            <div class="text-uppercase font-weight-bold small">Profit</div>
          </div>
        </div>
      </div>
    </div>
    {{-- Payments Received --}}
    <div class="col-12 col-lg-6">
      <div class="card border-0 shadow-sm">
        <div class="card-body p-3 d-flex align-items-center">
          <div class="bg-primary p-3 mfe-3 rounded">
            <i class="bi bi-cash-stack font-2xl"></i>
          </div>
          <div>
            <div class="text-value text-primary">{{ $payments_received_amount }}</div>
            <div class="text-uppercase font-weight-bold small">Payments Received</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
