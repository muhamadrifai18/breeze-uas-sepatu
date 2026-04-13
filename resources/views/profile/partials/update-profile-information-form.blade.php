<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">{{ __('Profile Information') }}</h5>
        <small class="text-muted float-end">{{ __("Update your account's profile information and email address.") }}</small>
    </div>
    <div class="card-body">
        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>

        <form method="post" action="{{ route('profile.update') }}">
            @csrf
            @method('patch')

            <div class="mb-3">
                <label class="form-label" for="profile-name">{{ __('Name') }}</label>
                <input type="text" class="form-control @error('name', 'updateProfileInformation') is-invalid @enderror" id="profile-name" name="name" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
                @error('name', 'updateProfileInformation')
                    <div class="invalid-feedback text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="profile-email">{{ __('Email') }}</label>
                <input type="email" class="form-control @error('email', 'updateProfileInformation') is-invalid @enderror" id="profile-email" name="email" value="{{ old('email', $user->email) }}" required autocomplete="username" />
                @error('email', 'updateProfileInformation')
                    <div class="invalid-feedback text-danger mt-1">{{ $message }}</div>
                @enderror

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div class="mt-2">
                        <p class="text-sm text-gray-800">
                            {{ __('Your email address is unverified.') }}

                            <button form="send-verification" class="btn btn-link p-0 align-baseline text-sm">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                            <div class="alert alert-success mt-2 mb-0 py-2">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </div>
                        @endif
                    </div>
                @endif
            </div>

            <div class="d-flex align-items-center gap-3">
                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>

                @if (session('status') === 'profile-updated')
                    <span class="text-success small animate__animated animate__fadeOut animate__delay-2s">
                        {{ __('Saved.') }}
                    </span>
                @endif
            </div>
        </form>
    </div>
</div>
