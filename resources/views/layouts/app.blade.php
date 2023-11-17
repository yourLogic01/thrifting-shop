<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ config('app.name') }} - @yield('title')</title>

  {{-- Main CSS --}}
  @include('includes._main-css')
</head>

<body class="c-app">
  {{-- Sidebar --}}
  @include('layouts.sidebar')

  <div class="c-wrapper">
    {{-- Header --}}
    <header class="c-header c-header-light c-header-fixed">
      @include('layouts.header')
      <div class="c-subheader justify-content-between px-3">
        @yield('breadcrumb')
      </div>
    </header>

    {{-- Main Body --}}
    <div class="c-body">
      <main class="c-main">
        @yield('content')
      </main>
    </div>

    {{-- Footer --}}
    @include('layouts.footer')
  </div>

  {{-- Main JS --}}
  @include('includes._main-js')

</body>

</html>
