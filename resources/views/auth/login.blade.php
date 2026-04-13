@extends('sneat.layouts.blank')

@section('title', 'Login')

@section('content')
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">
      <!-- Register -->
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
                    <path
                      d="M5.47320593,6.00457225 C4.05321814,8.216144 4.36334763,10.0722806 6.40359441,11.5729822 C8.61520715,12.571656 10.0999176,13.2171421 10.8577257,13.5094407 L15.5088241,14.433041 L18.6192054,16.1918663 C20.3421226,17.379031 21.4116557,19.2096181 21.8213791,21.6834165 C22.8277252,27.1121004 18.570776,33.8055663 12.3444065,36.5644781 C10.9599554,37.2057077 8.52187053,38.2325513 5.02980539,39.6450047 L4.50914856,39.8519522 C1.90733575,40.8993202 0.35017135,39.4671429 1.17183307,35.5670122 C1.60353123,33.5186985 2.11222046,31.4925708 2.69788019,29.4891129 C3.64917524,25.9613132 4.0208453,23.1098544 3.81313658,20.9347856 C3.7126131,19.863772 3.39322238,18.8924151 2.85483242,18.018501 L2.85483242,18.018501 C1.61330366,16.0232491 0.356262441,14.3619522 0.941913959,13.0456108 C1.45422847,11.8927025 2.50299862,11.0858169 4.08864705,10.6247941 C4.35249591,10.5479634 4.8143288,10.4267277 5.47320593,6.00457225 Z"
                      id="path-3"></path>
                    <path
                      d="M7.50063644,21.2294429 L12.3234468,23.3159332 C14.1688022,24.7579751 14.397098,26.4880487 13.008334,28.506154 C11.6195701,30.5242593 10.3099883,31.790241 9.07958868,32.3040991 C5.78142938,33.4346997 4.13234973,34 4.13234973,34 C4.13234973,34 2.75489982,33.0538207 2.37032616,32.4749115 C1.98575249,31.8960022 1.9567406,30.8357731 2.22129532,29.8091879 C2.51123447,28.7001407 3.00063644,27.0097103 3.69051905,24.7378772 L7.50063644,21.2294429 Z"
                      id="path-4"></path>
                    <path
                      d="M20.694609,10.4600273 L16.0101498,11.5699367 C16.0101498,11.5699367 15.013747,9.12261943 14.358572,7.75622104 C13.703397,6.38982266 12.0101498,4.60648932 10.6654714,3.20814989 C9.32079294,1.80981047 7.50063644,0.333333333 7.50063644,0.333333333 C7.50063644,0.333333333 10.2330441,0.540105341 12.3101447,1.2931929 C14.3872453,2.04628045 16.048903,3.74317926 17.3063806,6.39865626 C18.5638582,9.05413326 20.694609,10.4600273 20.694609,10.4600273 Z"
                      id="path-5"></path>
                  </defs>
                  <g id="g-app-brand" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="Brand-Logo" transform="translate(-27.000000, -15.000000)">
                      <g id="Icon" transform="translate(27.000000, 15.000000)">
                        <g id="Mask" transform="translate(0.000000, 8.000000)">
                          <mask id="mask-2" fill="white">
                            <use xlink:href="#path-1"></use>
                          </mask>
                          <use fill="#696cff" xlink:href="#path-1"></use>
                          <g mask="url(#mask-2)">
                            <use fill="#696cff" xlink:href="#path-1"></use>
                            <path
                              d="M-1.14910587,0.542236145 L0.474013203,1.90514106 L0.301550478,7.03461538 L0.0524513812,12.3276121 L-1.14910587,0.542236145 Z"
                              id="Path"
                              fill="#000000"
                              fill-opacity="0.1"></path>
                            <path
                              d="M-11.6411403,0.542236145 L-9.04322471,1.90514106 L-9.21568743,7.03461538 L-9.46478653,12.3276121 L-11.6411403,0.542236145 Z"
                              id="Path"
                              fill="#000000"
                              fill-opacity="0.1"></path>
                          </g>
                        </g>
                        <g id="Path-3" mask="url(#mask-2)">
                          <use fill="#696cff" xlink:href="#path-3"></use>
                          <path
                            d="M-3.0480355,5.19794025 L0.93781284,5.08117765 L1.73715107,11.2307692 L2.45422847,21.319522 L-3.0480355,5.19794025 Z"
                            id="Path"
                            fill="#000000"
                            fill-opacity="0.1"></path>
                          <path
                            d="M-13.5385611,5.19794025 L-9.5527127,5.08117765 L-8.75337447,11.2307692 L-8.03629707,21.319522 L-13.5385611,5.19794025 Z"
                            id="Path"
                            fill="#000000"
                            fill-opacity="0.1"></path>
                        </g>
                        <g id="Path-4" mask="url(#mask-2)">
                          <use fill="#696cff" xlink:href="#path-4"></use>
                          <path
                            d="M2.06033923,29.0544155 L6.04618758,28.9376529 L6.84552581,35.0872345 L7.56260321,45.1759873 L2.06033923,29.0544155 Z"
                            id="Path"
                            fill="#000000"
                            fill-opacity="0.1"></path>
                          <path
                            d="M-8.4301863,29.0544155 L-4.44433795,28.9376529 L-3.64500003,35.0872345 L-2.92792234,45.1759873 L-8.4301863,29.0544155 Z"
                            id="Path"
                            fill="#000000"
                            fill-opacity="0.1"></path>
                        </g>
                      </g>
                    </g>
                  </g>
                </svg>
              </span>
              <span class="app-brand-text demo text-body fw-bolder">Sneat</span>
            </a>
          </div>
          <!-- /Logo -->
          <h4 class="mb-2">Welcome to Sneat! 👋</h4>
          <p class="mb-4">Please sign-in to your account and start the adventure</p>

          <!-- Session Status -->
          @if (session('status'))
            <div class="alert alert-success mb-4" role="alert">
              {{ session('status') }}
            </div>
          @endif

          <form id="formAuthentication" class="mb-3" action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="email" class="form-label">Email or Username</label>
              <input
                type="text"
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
            <div class="mb-3 form-password-toggle">
              <div class="d-flex justify-content-between">
                <label class="form-label" for="password">Password</label>
                @if (Route::has('password.request'))
                  <a href="{{ route('password.request') }}">
                    <small>Forgot Password?</small>
                  </a>
                @endif
              </div>
              <div class="input-group input-group-merge">
                <input
                  type="password"
                  id="password"
                  class="form-control @error('password') is-invalid @enderror"
                  name="password"
                  placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                  aria-describedby="password"
                  required />
                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                @error('password')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="mb-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="remember-me" name="remember" />
                <label class="form-check-label" for="remember-me"> Remember Me </label>
              </div>
            </div>
            <div class="mb-3">
              <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
            </div>
          </form>

          <p class="text-center">
            <span>New on our platform?</span>
            <a href="{{ route('register') }}">
              <span>Create an account</span>
            </a>
          </p>
        </div>
      </div>
      <!-- /Register -->
    </div>
  </div>
</div>
@endsection
