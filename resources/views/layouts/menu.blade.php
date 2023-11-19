{{-- Home sidebar navigation --}}
<li class="c-sidebar-nav-item {{ request()->routeIs('home') ? 'c-active' : '' }}">
  <a class="c-sidebar-nav-link" href="{{ route('home') }}">
    <i class="c-sidebar-nav-icon bi bi-house" style="line-height: 1;"></i> Home
  </a>
</li>

{{-- Products sidebar navigation --}}
<li
  class="c-sidebar-nav-item c-sidebar-nav-dropdown {{ request()->routeIs('products.*') || request()->routeIs('product-categories.*') ? 'c-show' : '' }}">
  <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
    <i class="c-sidebar-nav-icon bi bi-journal-bookmark" style="line-height: 1;"></i> Products
  </a>
  <ul class="c-sidebar-nav-dropdown-items">
    <li class="c-sidebar-nav-item">
      <a class="c-sidebar-nav-link {{ request()->routeIs('product-categories.*') ? 'c-active' : '' }}"
        href="{{ route('product-categories.index') }}">
        <i class="c-sidebar-nav-icon bi bi-collection" style="line-height: 1;"></i> Categories
      </a>
    </li>

    <li class="c-sidebar-nav-item">
      <a class="c-sidebar-nav-link {{ request()->routeIs('products.create') ? 'c-active' : '' }}"
        href="{{ route('product.create') }}">
        <i class="c-sidebar-nav-icon bi bi-journal-plus" style="line-height: 1;"></i> Create Product
      </a>
    </li>

    <li class="c-sidebar-nav-item">
      <a class="c-sidebar-nav-link {{ request()->routeIs('products.index') ? 'c-active' : '' }}"
        href="{{ route('product.index') }}">
        <i class="c-sidebar-nav-icon bi bi-journals" style="line-height: 1;"></i> All Products
      </a>
    </li>
  </ul>
</li>

{{-- Purchases sidebar navigation --}}
<li class="c-sidebar-nav-item c-sidebar-nav-dropdown {{ request()->routeIs('purchases.*') ? 'c-show' : '' }}">
  <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
    <i class="c-sidebar-nav-icon bi bi-bag" style="line-height: 1;"></i> Purchases
  </a>

  <ul class="c-sidebar-nav-dropdown-items">
    <li class="c-sidebar-nav-item">
      <a class="c-sidebar-nav-link {{ request()->routeIs('purchases.create') ? 'c-active' : '' }}"
        href="{{ route('purchase.create') }}">
        <i class="c-sidebar-nav-icon bi bi-journal-plus" style="line-height: 1;"></i> Create Purchase
      </a>
    </li>
  </ul>

  <ul class="c-sidebar-nav-dropdown-items">
    <li class="c-sidebar-nav-item">
      <a class="c-sidebar-nav-link {{ request()->routeIs('purchases.index') ? 'c-active' : '' }}"
        href="{{ route('purchase.index') }}">
        <i class="c-sidebar-nav-icon bi bi-journals" style="line-height: 1;"></i> All Purchases
      </a>
    </li>
  </ul>
</li>

{{-- Sales sidebar navigation --}}
<li class="c-sidebar-nav-item c-sidebar-nav-dropdown {{ request()->routeIs('sales.*') ? 'c-show' : '' }}">
  <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
    <i class="c-sidebar-nav-icon bi bi-receipt" style="line-height: 1;"></i> Sales
  </a>

  <ul class="c-sidebar-nav-dropdown-items">
    <li class="c-sidebar-nav-item">
      <a class="c-sidebar-nav-link {{ request()->routeIs('sale.create') ? 'c-active' : '' }}"
        href="{{ route('sale.create') }}">
        <i class="c-sidebar-nav-icon bi bi-journal-plus" style="line-height: 1;"></i> Create Sale
      </a>
    </li>
  </ul>

  <ul class="c-sidebar-nav-dropdown-items">
    <li class="c-sidebar-nav-item">
      <a class="c-sidebar-nav-link {{ request()->routeIs('sales.index') ? 'c-active' : '' }}"
        href="{{ route('sale.index') }}">
        <i class="c-sidebar-nav-icon bi bi-journals" style="line-height: 1;"></i> All Sales
      </a>
    </li>
  </ul>
</li>

{{-- Supplier sidebar navigation --}}
<li class="c-sidebar-nav-item {{ request()->routeIs('suppliers.*') ? 'c-active' : '' }}">
  <a class="c-sidebar-nav-link" href="{{ route('supplier.index') }}">
    <i class="c-sidebar-nav-icon bi bi-people-fill" style="line-height: 1;"></i> Supplier
  </a>
</li>

{{-- Reports sidebar navigation --}}
<li class="c-sidebar-nav-item {{ request()->routeIs('profit-loss-report') ? 'c-active' : '' }}">
  <a class="c-sidebar-nav-link" href="{{ route('profit-loss-report') }}">
    <i class="c-sidebar-nav-icon bi bi-graph-up" style="line-height: 1;"></i> Profit / Loss Report
  </a>
</li>

{{-- User managements sidebar navigation --}}
<li class="c-sidebar-nav-item c-sidebar-nav-dropdown {{ request()->routeIs('users*') ? 'c-show' : '' }}">
  <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
    <i class="c-sidebar-nav-icon bi bi-people" style="line-height: 1;"></i> User Management
  </a>
  <ul class="c-sidebar-nav-dropdown-items">
    <li class="c-sidebar-nav-item">
      <a class="c-sidebar-nav-link {{ request()->routeIs('user.create') ? 'c-active' : '' }}"
        href="{{ route('user.create') }}">
        <i class="c-sidebar-nav-icon bi bi-person-plus" style="line-height: 1;"></i> Create User
      </a>
    </li>
    <li class="c-sidebar-nav-item">
      <a class="c-sidebar-nav-link {{ request()->routeIs('user.index') ? 'c-active' : '' }}"
        href="{{ route('user.index') }}">
        <i class="c-sidebar-nav-icon bi bi-person-lines-fill" style="line-height: 1;"></i> All Users
      </a>
    </li>
  </ul>
</li>
