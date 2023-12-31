{{-- CoreUI CSS --}}
@vite('resources/sass/app.scss')
{{-- CDN Datatables --}}
<link
  href="https://cdn.datatables.net/v/bs4/jszip-3.10.1/dt-1.13.5/b-2.4.1/b-html5-2.4.1/b-print-2.4.1/sl-1.7.0/datatables.min.css"
  rel="stylesheet">

{{-- CDN Bootstrap Icons --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

{{-- Additional third party --}}
@yield('third_party_stylesheets')

@stack('page_css')

@livewireStyles

<style>
  div.dataTables_wrapper div.dataTables_length select {
    width: 65px;
    display: inline-block;
  }

  .select2-container--default .select2-selection--single {
    background-color: #fff;
    border: 1px solid #D8DBE0;
    border-radius: 4px;
  }

  .select2-container--default .select2-selection--multiple {
    background-color: #fff;
    border: 1px solid #D8DBE0;
    border-radius: 4px;
  }

  .select2-container .select2-selection--multiple {
    height: 35px;
  }

  .select2-container .select2-selection--single {
    height: 35px;
  }

  .select2-container--default .select2-selection--single .select2-selection__rendered {
    line-height: 33px;
  }

  .select2-container--default .select2-selection--single .select2-selection__arrow b {
    margin-top: 2px;
  }

  .header_text {
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    letter-spacing: .5px;
    font-weight: 700;
    font-size: 18px;
    color: #bfdbfe;
    transition: all .2s ease-in;
  }

  .header_minimized {
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    letter-spacing: .3px;
    font-size: 10px;
    font-weight: 500;
    text-align: center;
    color: #bfdbfe;
    transition: all .2s ease-in;
  }

  .header_text:hover,
  .header_minimized:hover {
    text-decoration: none;
    color: #7dd3fc;
  }

  .bg_sidebar_wrapper {
    background: #374151;
  }

  .bg_sidebar_header,
  .bg_sidebar_bottom {
    background: #1f2937;
  }

  .bg_sidebar_home,
  .bg_sidebar_products,
  .bg_sidebar_purchases,
  .bg_sidebar_sales,
  .bg_sidebar_supplier,
  .bg_sidebar_report,
  .bg_sidebar_users {
    font-weight: 600;
    color: #f9fafb;
  }

  .c-sidebar-nav-link:hover {
    background: rgba(234, 88, 12, 0.85) !important;
    color: #f9fafb;
  }

  .c-active,
  .dropdown-item:active {
    background: rgba(234, 88, 12, 0.9) !important;
    color: #f9fafb;
  }

  .btn_color {
    background: rgba(2, 132, 199, 1) !important;
    color: #f9fafb !important;
    transform: scale(1);
    transition: .2s ease-in-out;
  }

  .btn_color:hover {
    background: rgba(2, 132, 199, 0.85) !important;
    color: #f9fafb !important;
  }

  .btn_color:active {
    transform: scale(0.9);
  }

  .bg_primary {
    background: #1e40af !important;
  }

  .bg_yellow {
    background: #eab308 !important;
  }

  .bg_green {
    background: #22c55e !important;
  }

  .text_primary {
    color: rgba(234, 88, 12, 0.9) !important;
  }
</style>
