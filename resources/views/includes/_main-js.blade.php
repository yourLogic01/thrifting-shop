{{-- CDN Jquery --}}
<script src="https://code.jquery.com/jquery-3.7.0.min.js"
  integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
{{-- CoreUi JS --}}
@vite('resources/js/app.js')
{{-- pdfmake for convert to pdf --}}
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
{{-- pdfmake fonts --}}
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
{{-- CDN Datatables --}}
{{-- <script defer
  src="https://cdn.datatables.net/v/bs4/jszip-3.10.1/dt-1.13.5/b-2.4.1/b-html5-2.4.1/b-print-2.4.1/sl-1.7.0/datatables.min.js">
</script> --}}
<script defer src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
{{-- CDN perfect scrollbar --}}
{{-- <script defer src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.4.0/perfect-scrollbar.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.5/perfect-scrollbar.js"
  integrity="sha512-EXRb/1mTZs4VEgPqlabQWHw2hnGn269OM3QvLfLeEeEp7GznVGkbYdu+bU9bb/XLYda6drPfWCyoMm6RYwSZMg=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{{-- TODO:custom datatables --}}
{{-- <script defer src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script> --}}

{{-- TODO:Set sweet alert --}}
{{-- @include('sweetalert::alert') --}}

@yield('third_party_scripts')

@stack('page_scripts')

@livewireScripts
