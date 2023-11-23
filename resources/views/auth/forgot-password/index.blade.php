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
  <style>
    .row {
      max-width: 500px;
      max-height: 450px;
    }

    .input-box header {
      margin-top: -50px;
    }

    .input-box p {
      font-size: 15px;
      margin-top: -20px;
      padding-bottom: 15px;
      opacity: 90%;
    }

    .input-field {
      padding: 10px 0;
    }

    .back-btn {
      text-align: center;
      margin-top: 20px;
    }

    .back-btn a {
      text-decoration: none;
      color: #1368e8;
      transition: all .3s ease-in-out;
    }

    .back-btn a:hover {
      color: #1e40af;
    }

    @media only screen and (max-width: 767px) {
      .row {
        width: 400px;
        height: 400px;
      }

      .input-box header {
        margin-top: 0;
      }

      .input-box p {
        margin-top: 23px;
        font-size: 14px;

      }
    }

    @media only screen and (max-width: 375px) {
      .row {
        width: 300px;
        height: 400px;
      }

      .input-box p {
        padding-left: 35px;
      }
    }
  </style>
</head>

<body>
  <div class="wrapper">
    <div class="container main">
      <div class="row">
        <div class="col-md-12 right">
          <div class="has-error">
            @if ($errors->any())
              @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  {{ $error }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endforeach
            @endif

            @if (session()->has('error'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif

            @if (session()->has('success'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
          </div>

          <div class="input-box">
            <form action="{{ route('forgot-password-post') }}" method="POST">
              @csrf
              <header>Reset your password</header>
              <p>Enter your email below to receive password reset link.</p>
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
                <input type="submit" class="submit" value="Submit">
              </div>
            </form>
            <div class="back-btn">
              <a href="{{ route('login') }}">Back to login</a>
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
