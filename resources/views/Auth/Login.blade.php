<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>PolluxUI Admin</title>
    @include('Partials.css_LR')
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="{{ asset('Template/images/logo-dark.svg') }}" alt="logo">
              </div>
              <h4>Hello! Let's get started</h4>
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <form class="pt-3" method="POST" action="{{ route('login.process') }}">
                @csrf <!-- Token CSRF Laravel -->
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" name="email" placeholder="Email" required autofocus>
                  @error('email')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" name="password" placeholder="Password" required>
                  @error('password')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input" name="remember">
                      Keep me signed in
                    </label>
                  </div>
                  <a href="{{ route('password.request') }}" class="auth-link text-black">Forgot password?</a>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Don't have an account? <a href="{{ route('register.index') }}" class="text-primary">Create</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
@include('Partials.script_LR')
</body>

</html>
