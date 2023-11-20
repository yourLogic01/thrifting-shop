<div>
  <div class="card border-0 shadow-sm">
    <div class="card-body">
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

        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr class="text-center">
                <th class="align-middle">Product</th>
                <th class="align-middle">Price</th>
                <th class="align-middle">Quantity</th>
                <th class="align-middle">Action</th>
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
                      @include('livewire.includes.product-cart-modal')
                    </td>

                    <td class="align-middle">
                      {{ $cart_item->price }}
                    </td>

                    <td class="align-middle">
                      @include('livewire.includes.product-cart-quantity')
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

      <div class="row">
        <div class="col-md-12">
          <div class="table-responsive">
            <table class="table table-striped">
              <tr>
                <th>Discount ({{ $global_discount }}%)</th>
                <td>(-) {{ Cart::instance($cart_instance)->discount() }}</td>
              </tr>
              <tr class="text-primary">
                <th>Total Amount</th>
                {{-- @php
                  $total_amount = Cart::instance($cart_instance)->total() + (float) $shipping;
                @endphp --}}
                <th>
                  (=) {{ $total_amount }}
                </th>
              </tr>
            </table>
          </div>
        </div>
      </div>

      <div class="form-group d-flex justify-content-center flex-wrap mb-0">
        <button wire:click="resetCart" type="button" class="btn btn-pill btn-danger mr-3"><i class="bi bi-x"></i>
          Reset</button>
        <button wire:loading.attr="disabled" wire:click="proceed" type="button" class="btn btn-pill btn-primary"
          {{ $total_amount == 0 ? 'disabled' : '' }}><i class="bi bi-check"></i> Proceed</button>
      </div>
    </div>
  </div>

  {{-- Checkout Modal --}}
  @include('livewire.includes.checkout-modal')

</div>
