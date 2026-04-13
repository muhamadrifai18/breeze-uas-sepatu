<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">{{ __('Update Password') }}</h5>
        <small class="text-muted float-end">{{ __('Ensure your account is using a long, random password to stay secure.') }}</small>
    </div>
    <div class="card-body">
        <form method="post" action="{{ route('password.update') }}">
            @csrf
            @method('put')

            <div class="mb-3">
                <label class="form-label" for="update_password_current_password">{{ __('Current Password') }}</label>
                <input type="password" class="form-control @error('current_password', 'updatePassword') is-invalid @enderror" id="update_password_current_password" name="current_password" autocomplete="current-password" />
                @error('current_password', 'updatePassword')
                    <div class="invalid-feedback text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="update_password_password">{{ __('New Password') }}</label>
                <input type="password" class="form-control @error('password', 'updatePassword') is-invalid @enderror" id="update_password_password" name="password" autocomplete="new-password" />
                @error('password', 'updatePassword')
                    <div class="invalid-feedback text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="update_password_password_confirmation">{{ __('Confirm Password') }}</label>
                <input type="password" class="form-control @error('password_confirmation', 'updatePassword') is-invalid @enderror" id="update_password_password_confirmation" name="password_confirmation" autocomplete="new-password" />
                @error('password_confirmation', 'updatePassword')
                    <div class="invalid-feedback text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex align-items-center gap-3">
                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>

                @if (session('status') === 'password-updated')
                    <span class="text-success small animate__animated animate__fadeOut animate__delay-2s">
                        {{ __('Saved.') }}
                    </span>
                @endif
            </div>
        </form>
    </div>
</div>
