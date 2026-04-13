<div class="card card-outline-danger">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0 text-danger">{{ __('Delete Account') }}</h5>
        <small class="text-danger float-end">{{ __('Critical Action') }}</small>
    </div>
    <div class="card-body">
        <p class="card-text text-muted">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
        
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmUserDeletionModal">
            {{ __('Delete Account') }}
        </button>

        <!-- Modal -->
        <div class="modal fade" id="confirmUserDeletionModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form method="post" action="{{ route('profile.destroy') }}">
                        @csrf
                        @method('delete')

                        <div class="modal-header">
                            <h5 class="modal-title" id="modalCenterTitle">{{ __('Are you sure you want to delete your account?') }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p class="text-muted">
                                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                            </p>
                            <div class="mb-3">
                                <label for="delete-password" class="form-label">{{ __('Password') }}</label>
                                <input type="password" id="delete-password" name="password" class="form-control @error('password', 'userDeletion') is-invalid @enderror" placeholder="{{ __('Password') }}" required />
                                @error('password', 'userDeletion')
                                    <div class="invalid-feedback text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                {{ __('Cancel') }}
                            </button>
                            <button type="submit" class="btn btn-danger">{{ __('Delete Account') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@if($errors->userDeletion->isNotEmpty())
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var myModal = new bootstrap.Modal(document.getElementById('confirmUserDeletionModal'));
        myModal.show();
    });
</script>
@endif
