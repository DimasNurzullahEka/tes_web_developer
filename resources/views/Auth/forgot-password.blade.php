<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Reset Password</title>
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
              <h4>Reset Password</h4>
              <h6 class="font-weight-light">Enter your email and new password.</h6>

              <!-- Flash Message for Success -->
              @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
              @endif

              <form class="pt-3" method="POST" action="{{ route('password.update') }}">
                @csrf

                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" name="email" placeholder="Email Address" value="{{ old('email') }}" required autofocus>
                  @error('email')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" name="password" placeholder="New Password" required>
                  @error('password')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" name="password_confirmation" placeholder="Confirm New Password" required>
                  @error('password_confirmation')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">RESET PASSWORD</button>
                </div>

                <div class="text-center mt-4 font-weight-light">
                  Remember your password? <a href="{{ route('login.index') }}" class="text-primary">Sign in</a>
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
