<div>
  <div>
    @if (session()->has('message'))
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <div class="alert-body">
          <span>{{ session('message') }}</span>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
      </div>
    @endif

    <div class="table-responsive position-relative">
      <div wire:loading.flex class="col-12 position-absolute justify-content-center align-items-center"
        style="top:0;right:0;left:0;bottom:0;background-color: rgba(255,255,255,0.5);z-index: 99;">
        <div class="spinner-border text-primary" role="status">
          <span class="sr-only">Loading...</span>
        </div>
      </div>
      <table class="table table-bordered">
        <thead class="thead-dark">
          <tr>
            <th class="align-middle">Product</th>
            <th class="align-middle text-center">Net Price</th>
            <th class="align-middle text-center">Stock</th>
            <th class="align-middle text-center">Quantity</th>
            <th class="align-middle text-center">Total Amount</th>
            <th class="align-middle text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          @if ($cart_items->isNotEmpty())
            @foreach ($cart_items as $cart_item)
              <tr>
                <td class="align-middle">
                  {{ $cart_item->name }} <br>
                  <span class="badge badge-success">
                    {{ $cart_item->options->code }}
                  </span>
                </td>

                <td class="align-middle text-center text-center">
                  {{ $cart_item->price }}
                </td>

                <td class="align-middle text-center text-center">
                  <span
                    class="badge badge-info">{{ $cart_item->options->stock . ' ' . $cart_item->options->unit }}</span>
                </td>

                <td class="align-middle text-center">
                  @include('livewire.includes.product-cart-quantity')
                </td>

                <td class="align-middle text-center">
                  {{ format_currency($cart_item->options->sub_total) }}
                </td>

                <td class="align-middle text-center">
                  <a href="#" wire:click.prevent="removeItem('{{ $cart_item->rowId }}')">
                    <i class="bi bi-x-circle font-2xl text-danger"></i>
                  </a>
                </td>
              </tr>
            @endforeach
          @else
            <tr>
              <td colspan="8" class="text-center">
                <span class="text-danger">
                  Please search & select products!
                </span>
              </td>
            </tr>
          @endif
        </tbody>
      </table>
    </div>
  </div>

  <div class="row justify-content-md-end">
    <div class="col-md-4">
      <div class="table-responsive">
        <table class="table table-striped">
          <tr>
            <th>Discount ({{ $global_discount }}%)</th>
            <td>(-) {{ format_currency(Cart::instance($cart_instance)->discount()) }}</td>
          </tr>
          <tr>
            <th>Total Amount</th>
            @php
              $totalPrice = Cart::instance($cart_instance)->total();
            @endphp
            <th>
              (=) {{ format_currency($totalPrice) }}
            </th>
          </tr>
        </table>
      </div>
    </div>
  </div>

  <input type="hidden" name="sub_total" value="{{ $totalPrice }}">

  <div class="form-row">
    <div class="col-lg-4">
      <div class="form-group">
        <label for="discount">Discount (%)</label>
        <input wire:model.blur="global_discount" type="number" class="form-control" name="discount" min="0"
          max="100" value="{{ $global_discount }}" required>
      </div>
    </div>
  </div>
</div>
