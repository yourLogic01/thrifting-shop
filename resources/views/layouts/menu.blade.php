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

{{-- Stock adjustments sidebar navigation --}}
<li class="c-sidebar-nav-item c-sidebar-nav-dropdown {{ request()->routeIs('adjustments.*') ? 'c-show' : '' }}">
  <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
    <i class="c-sidebar-nav-icon bi bi-clipboard-check" style="line-height: 1;"></i> Stock Adjustments
  </a>
  <ul class="c-sidebar-nav-dropdown-items">

    <li class="c-sidebar-nav-item">
      <a class="c-sidebar-nav-link {{ request()->routeIs('adjustments.create') ? 'c-active' : '' }}" href="/">
        <i class="c-sidebar-nav-icon bi bi-journal-plus" style="line-height: 1;"></i> Create Adjustment
      </a>
    </li>

    <li class="c-sidebar-nav-item">
      <a class="c-sidebar-nav-link {{ request()->routeIs('adjustments.index') ? 'c-active' : '' }}" href="/">
        <i class="c-sidebar-nav-icon bi bi-journals" style="line-height: 1;"></i> All Adjustments
      </a>
    </li>
  </ul>
</li>

{{-- Purchases sidebar navigation --}}
<li
  class="c-sidebar-nav-item c-sidebar-nav-dropdown {{ request()->routeIs('purchases.*') || request()->routeIs('purchase-payments*') ? 'c-show' : '' }}">
  <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
    <i class="c-sidebar-nav-icon bi bi-bag" style="line-height: 1;"></i> Purchases
  </a>

  <ul class="c-sidebar-nav-dropdown-items">
    <li class="c-sidebar-nav-item">
      <a class="c-sidebar-nav-link {{ request()->routeIs('purchases.create') ? 'c-active' : '' }}" href="/">
        <i class="c-sidebar-nav-icon bi bi-journal-plus" style="line-height: 1;"></i> Create Purchase
      </a>
    </li>
  </ul>

  <ul class="c-sidebar-nav-dropdown-items">
    <li class="c-sidebar-nav-item">
      <a class="c-sidebar-nav-link {{ request()->routeIs('purchases.index') ? 'c-active' : '' }}" href="/">
        <i class="c-sidebar-nav-icon bi bi-journals" style="line-height: 1;"></i> All Purchases
      </a>
    </li>
  </ul>
</li>

{{-- Sales sidebar navigation --}}
<li
  class="c-sidebar-nav-item c-sidebar-nav-dropdown {{ request()->routeIs('sales.*') || request()->routeIs('sale-payments*') ? 'c-show' : '' }}">
  <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
    <i class="c-sidebar-nav-icon bi bi-receipt" style="line-height: 1;"></i> Sales
  </a>

  <ul class="c-sidebar-nav-dropdown-items">
    <li class="c-sidebar-nav-item">
      <a class="c-sidebar-nav-link {{ request()->routeIs('sales.create') ? 'c-active' : '' }}" href="/">
        <i class="c-sidebar-nav-icon bi bi-journal-plus" style="line-height: 1;"></i> Create Sale
      </a>
    </li>
  </ul>

  <ul class="c-sidebar-nav-dropdown-items">
    <li class="c-sidebar-nav-item">
      <a class="c-sidebar-nav-link {{ request()->routeIs('sales.index') ? 'c-active' : '' }}" href="/">
        <i class="c-sidebar-nav-icon bi bi-journals" style="line-height: 1;"></i> All Sales
      </a>
    </li>
  </ul>
</li>

{{-- Supplier sidebar navigation --}}
<li
  class="c-sidebar-nav-item c-sidebar-nav-dropdown {{ request()->routeIs('customers.*') || request()->routeIs('suppliers.*') ? 'c-show' : '' }}">
  <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
    <i class="c-sidebar-nav-icon bi bi-people" style="line-height: 1;"></i> Parties
  </a>
  <ul class="c-sidebar-nav-dropdown-items">

    <li class="c-sidebar-nav-item">
      <a class="c-sidebar-nav-link {{ request()->routeIs('customers.*') ? 'c-active' : '' }}" href="/">
        <i class="c-sidebar-nav-icon bi bi-people-fill" style="line-height: 1;"></i> Customers
      </a>
    </li>


    <li class="c-sidebar-nav-item">
      <a class="c-sidebar-nav-link {{ request()->routeIs('suppliers.*') ? 'c-active' : '' }}" href="/">
        <i class="c-sidebar-nav-icon bi bi-people-fill" style="line-height: 1;"></i> Suppliers
      </a>
    </li>

  </ul>
</li>

{{-- Reports sidebar navigation --}}
<li class="c-sidebar-nav-item c-sidebar-nav-dropdown {{ request()->routeIs('*-report.index') ? 'c-show' : '' }}">
  <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
    <i class="c-sidebar-nav-icon bi bi-graph-up" style="line-height: 1;"></i> Reports
  </a>
  <ul class="c-sidebar-nav-dropdown-items">
    <li class="c-sidebar-nav-item">
      <a class="c-sidebar-nav-link {{ request()->routeIs('profit-loss-report.index') ? 'c-active' : '' }}"
        href="/">
        <i class="c-sidebar-nav-icon bi bi-clipboard-data" style="line-height: 1;"></i> Profit / Loss Report
      </a>
    </li>
    <li class="c-sidebar-nav-item">
      <a class="c-sidebar-nav-link {{ request()->routeIs('payments-report.index') ? 'c-active' : '' }}"
        href="/">
        <i class="c-sidebar-nav-icon bi bi-clipboard-data" style="line-height: 1;"></i> Payments Report
      </a>
    </li>
    <li class="c-sidebar-nav-item">
      <a class="c-sidebar-nav-link {{ request()->routeIs('sales-report.index') ? 'c-active' : '' }}" href="/">
        <i class="c-sidebar-nav-icon bi bi-clipboard-data" style="line-height: 1;"></i> Sales Report
      </a>
    </li>
    <li class="c-sidebar-nav-item">
      <a class="c-sidebar-nav-link {{ request()->routeIs('purchases-report.index') ? 'c-active' : '' }}"
        href="/">
        <i class="c-sidebar-nav-icon bi bi-clipboard-data" style="line-height: 1;"></i> Purchases Report
      </a>
    </li>
    <li class="c-sidebar-nav-item">
      <a class="c-sidebar-nav-link {{ request()->routeIs('sales-return-report.index') ? 'c-active' : '' }}"
        href="/">
        <i class="c-sidebar-nav-icon bi bi-clipboard-data" style="line-height: 1;"></i> Sales Return Report
      </a>
    </li>
    <li class="c-sidebar-nav-item">
      <a class="c-sidebar-nav-link {{ request()->routeIs('purchases-return-report.index') ? 'c-active' : '' }}"
        href="/">
        <i class="c-sidebar-nav-icon bi bi-clipboard-data" style="line-height: 1;"></i> Purchases Return Report
      </a>
    </li>
  </ul>
</li>

{{-- User managements sidebar navigation --}}
<li class="c-sidebar-nav-item c-sidebar-nav-dropdown {{ request()->routeIs('roles*') ? 'c-show' : '' }}">
  <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
    <i class="c-sidebar-nav-icon bi bi-people" style="line-height: 1;"></i> User Management
  </a>
  <ul class="c-sidebar-nav-dropdown-items">
    <li class="c-sidebar-nav-item">
      <a class="c-sidebar-nav-link {{ request()->routeIs('users.create') ? 'c-active' : '' }}" href="/">
        <i class="c-sidebar-nav-icon bi bi-person-plus" style="line-height: 1;"></i> Create User
      </a>
    </li>
    <li class="c-sidebar-nav-item">
      <a class="c-sidebar-nav-link {{ request()->routeIs('users*') ? 'c-active' : '' }}" href="/">
        <i class="c-sidebar-nav-icon bi bi-person-lines-fill" style="line-height: 1;"></i> All Users
      </a>
    </li>
    <li class="c-sidebar-nav-item">
      <a class="c-sidebar-nav-link {{ request()->routeIs('roles*') ? 'c-active' : '' }}" href="/">
        <i class="c-sidebar-nav-icon bi bi-key" style="line-height: 1;"></i> Roles & Permissions
      </a>
    </li>
  </ul>
</li>

{{-- Settings sidebar navigation --}}
<li
  class="c-sidebar-nav-item c-sidebar-nav-dropdown {{ request()->routeIs('currencies*') || request()->routeIs('units*') ? 'c-show' : '' }}">
  <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
    <i class="c-sidebar-nav-icon bi bi-gear" style="line-height: 1;"></i> Settings
  </a>

  <ul class="c-sidebar-nav-dropdown-items">
    <li class="c-sidebar-nav-item">
      <a class="c-sidebar-nav-link {{ request()->routeIs('units*') ? 'c-active' : '' }}" href="/">
        <i class="c-sidebar-nav-icon bi bi-calculator" style="line-height: 1;"></i> Units
      </a>
    </li>
  </ul>

  <ul class="c-sidebar-nav-dropdown-items">
    <li class="c-sidebar-nav-item">
      <a class="c-sidebar-nav-link {{ request()->routeIs('currencies*') ? 'c-active' : '' }}" href="/">
        <i class="c-sidebar-nav-icon bi bi-cash-stack" style="line-height: 1;"></i> Currencies
      </a>
    </li>
  </ul>

  <ul class="c-sidebar-nav-dropdown-items">
    <li class="c-sidebar-nav-item">
      <a class="c-sidebar-nav-link {{ request()->routeIs('settings*') ? 'c-active' : '' }}" href="/">
        <i class="c-sidebar-nav-icon bi bi-sliders" style="line-height: 1;"></i> System Settings
      </a>
    </li>
  </ul>

</li>
