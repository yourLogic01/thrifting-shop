<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  {{-- CDN BOOTSTRAP 5 --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  {{-- Style CSS --}}
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <title>{{ config('app.name') }} - {{ $title }}</title>
</head>

<body>
  <div class="wrapper">
    <div class="container main">
      <div class="row">
        <div class="col-md-6 side-image">
          <img src="{{ asset('images/login-image.jpg') }}" alt="Login Image">
        </div>

        <div class="col-md-6 right">
          <div class="has-error">
            @if (session()->has('loginError'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('loginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
          </div>

          <div class="input-box">
            <form action="{{ route('authenticate') }}" method="POST">
              @csrf
              <header>Login</header>
              <div class="input-field">
                <input type="text" class="input @error('email') is-invalid @enderror" id="email" name="email"
                  value="{{ old('email') }}" required autocomplete="off">
                <label for="email">Email</label>
                @error('email')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="input-field">
                <input type="password" name="password" class="input" id="pass" required>
                <label for="pass">Password</label>
              </div>
              <div class="input-field">
                <input type="submit" class="submit" value="Sign In">
              </div>
            </form>
            <div class="forgot-pass">
              <span><a href="{{ route('login') }}">Forgot password?</a></span>
            </div>
            <div class="signin">
              <span>Don't have an account? <a href="{{ route('register') }}">Sign Up</a></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
