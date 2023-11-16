{{-- Hamburger menu dekstop --}}
<button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar"
  data-class="c-sidebar-show">
  <i class="bi bi-list" style="font-size: 2rem;"></i>
</button>

{{-- Hamburger menu responsive --}}
<button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar"
  data-class="c-sidebar-lg-show" responsive="true">
  <i class="bi bi-list" style="font-size: 2rem;"></i>
</button>

{{-- <ul class="c-header-nav ml-auto">

</ul> --}}
<ul class="c-header-nav ml-auto mr-4">

  <li class="c-header-nav-item mr-3">
    <a class="btn btn-primary btn-pill {{ request()->routeIs('app.pos.index') ? 'disabled' : '' }}" href="/">
      <i class="bi bi-cart mr-1"></i> POS System
    </a>
  </li>

  {{-- Feature notification --}}
  <li class="c-header-nav-item dropdown d-md-down-none mr-2">
    <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
      aria-expanded="false">
      <i class="bi bi-bell" style="font-size: 20px;"></i>
      <span class="badge badge-pill badge-danger">
        {{-- @php
          $low_quantity_products = \Modules\Product\Entities\Product::select('id', 'product_quantity', 'product_stock_alert', 'product_code')
              ->whereColumn('product_quantity', '<=', 'product_stock_alert')
              ->get();
          echo $low_quantity_products->count();
        @endphp --}}
      </span>
    </a>
    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg pt-0">
      <div class="dropdown-header bg-light">
        <strong>Notifications</strong>
      </div>

      <a class="dropdown-item" href="/">
        <i class="bi bi-hash mr-1 text-primary"></i> Product: is low in quantity!
      </a>

      <a class="dropdown-item" href="#">
        <i class="bi bi-app-indicator mr-2 text-danger"></i> No notifications available.
      </a>

    </div>
  </li>

  {{-- Profile user --}}
  <li class="c-header-nav-item dropdown">
    <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
      aria-expanded="false">
      <div class="c-avatar mr-2">
        <img class="c-avatar rounded-circle" src="https://source.unsplash.com/random/50x50" alt="Profile Image">
      </div>
      <div class="d-flex flex-column">
        <span class="font-weight-bold">Admin</span>
        <span class="font-italic">Online <i class="bi bi-circle-fill text-success" style="font-size: 11px;"></i></span>
      </div>
    </a>
    <div class="dropdown-menu dropdown-menu-right pt-0">
      <div class="dropdown-header bg-light py-2"><strong>Account</strong></div>
      <a class="dropdown-item" href="/">
        <i class="mfe-2  bi bi-person" style="font-size: 1.2rem;"></i> Profile
      </a>
      <a class="dropdown-item" href="#"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="mfe-2  bi bi-box-arrow-left" style="font-size: 1.2rem;"></i> Logout
      </a>
      <form id="logout-form" action="/" method="POST" class="d-none">
        @csrf
      </form>
    </div>
  </li>
</ul>
