{{-- CDN Jquery --}}
<script src="https://code.jquery.com/jquery-3.7.0.min.js"
  integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
{{-- CoreUi JS --}}
@vite('resources/js/app.js')
{{-- CDN Datatables --}}
<script defer
  src="https://cdn.datatables.net/v/bs4/jszip-3.10.1/dt-1.13.5/b-2.4.1/b-html5-2.4.1/b-print-2.4.1/sl-1.7.0/datatables.min.js">
</script>
{{-- CDN perfect scrollbar --}}
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.4.0/perfect-scrollbar.js"></script>
{{-- TODO:Set sweet alert --}}
{{-- @include('sweetalert::alert') --}}

@yield('third_party_scripts')

@stack('scripts')

@livewireScripts
