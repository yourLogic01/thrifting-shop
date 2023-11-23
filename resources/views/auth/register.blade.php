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
          <div class="input-box">
            <header>Create Account</header>
            <div class="input-field">
              <input type="text" class="input" id="email" required autocomplete="off">
              <label for="email">Email</label>
            </div>
            <div class="input-field">
              <input type="password" class="input" id="pass" required>
              <label for="pass">Password</label>
            </div>
            <div class="input-field">
              <input type="password" class="input" id="confirm_pass" required>
              <label for="confirm_pass">Confirm Password</label>
            </div>
            <div class="input-field">
              <input type="submit" class="submit" value="Sign Up">
            </div>
            <div class="signin">
              <span>Already have an account? <a href="{{ route('login') }}">Sign In</a></span>
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
