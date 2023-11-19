{{-- Logo Sidebar --}}
<div
  class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show {{ request()->routeIs('app.pos.*') ? 'c-sidebar-minimized' : '' }}"
  id="sidebar">
  <div class="c-sidebar-brand d-md-down-none">
    <a href="/" class="c-sidebar-brand-full header_text text-uppercase">
      Thrifting Shop
    </a>
    <a href="/" class="c-sidebar-brand-minimized header_minimized">Thrifting <br> Shop</a>
  </div>
  <ul class="c-sidebar-nav">
    {{-- Menu sidebar --}}
    @include('layouts.menu')

    {{-- Scrollthumb --}}
    <div class="ps__rail-y" style="top: 0px; height: 692px; right: 0px;">
      <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 369px;"></div>
    </div>
  </ul>

  {{-- Button minimized --}}
  <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent"
    data-class="c-sidebar-minimized"></button>
</div>
