@extends('sneat.layouts.blank')

@section('title', 'Forgot Password')

@section('content')
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner py-4">
      <!-- Forgot Password -->
      <div class="card">
        <div class="card-body">
          <!-- Logo -->
          <div class="app-brand justify-content-center">
            <a href="{{ url('/') }}" class="app-brand-link gap-2">
              <span class="app-brand-logo demo">
                <svg
                  width="25"
                  viewBox="0 0 25 42"
                  version="1.1"
                  xmlns="http://www.w3.org/2000/svg"
                  xmlns:xlink="http://www.w3.org/1999/xlink">
                  <defs>
                    <path
                      d="M13.7918663,0.358365126 L3.39788167,7.44174259 C0.566865006,9.69408886 -0.379795268,12.4788597 0.557900856,15.7960551 C0.689933952,16.2305145 1.09562888,17.7872135 3.12357076,19.2293357 C3.8146334,19.7207684 5.32369333,20.3834223 7.65075054,21.2172976 L7.59773219,21.2525164 L2.63468769,24.5493413 C0.445452254,26.3002124 0.0884951797,28.5083815 1.56381646,31.1738486 C2.83770406,32.8170431 5.20850219,33.2640127 7.09180128,32.5391584 C8.347334,32.0559211 11.4559176,30.0011079 16.4175519,26.3747182 C18.0338572,24.4997857 18.6973423,22.4544883 18.4080071,20.2388483 C18.233562,19.0010076 17.5031541,18.018501 16.3217155,17.2842183 C15.7567114,16.9295493 14.4377744,16.4420722 12.3646001,15.8202513 L12.5779532,15.7386617 C16.2361245,14.2341492 18.5283435,12.7040409 19.4346543,11.1408835 C19.9451613,10.2709214 20.3642456,8.7181373 20.3642456,6.4678129 C20.3642456,4.32289458 20.030611,2.8353112 19.33324,2.00557406 C18.1746781,0.618685084 15.9090684,-0.121404112 13.7918663,0.358365126 Z"
                      id="path-1"></path>
                    <!-- ... paths remain same ... -->
                  </defs>
                  <!-- SVG content ... -->
                  <g id="g-app-brand" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="Brand-Logo" transform="translate(-27.000000, -15.000000)">
                      <g id="Icon" transform="translate(27.000000, 15.000000)">
                        <g id="Mask" transform="translate(0.000000, 8.000000)">
                          <mask id="mask-2" fill="white">
                            <use xlink:href="#path-1"></use>
                          </mask>
                          <use fill="#696cff" xlink:href="#path-1"></use>
                        </g>
                      </g>
                    </g>
                  </g>
                  <text x="5" y="40" font-family="Arial" font-size="24" font-weight="bold" fill="#696cff">Sneat</text>
                </svg>
              </span>
            </a>
          </div>
          <!-- /Logo -->
          <h4 class="mb-2">Forgot Password? 🔒</h4>
          <p class="mb-4">Enter your email and we'll send you instructions to reset your password</p>

          <!-- Session Status -->
          @if (session('status'))
            <div class="alert alert-success mt-4" role="alert">
                {{ session('status') }}
            </div>
          @endif

          <form id="formAuthentication" class="mb-3" action="{{ route('password.email') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input
                type="email"
                class="form-control @error('email') is-invalid @enderror"
                id="email"
                name="email"
                placeholder="Enter your email"
                value="{{ old('email') }}"
                required
                autofocus />
              @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <button class="btn btn-primary d-grid w-100">Send Reset Link</button>
          </form>
          <div class="text-center">
            <a href="{{ route('login') }}" class="d-flex align-items-center justify-content-center">
              <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
              Back to login
            </a>
          </div>
        </div>
      </div>
      <!-- /Forgot Password -->
    </div>
  </div>
</div>
@endsection
