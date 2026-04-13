<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="{{ asset('sneat/assets/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('sneat/assets/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('sneat/assets/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('sneat/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('sneat/assets/vendor/js/menu.js') }}"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{ asset('sneat/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Main JS -->
<script src="{{ asset('sneat/assets/js/main.js') }}"></script>

<script>
    window.confirmDelete = function(form, message = 'Are you sure you want to delete this item?') {
        Swal.fire({
            title: 'Confirmation',
            text: message,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#696cff',
            cancelButtonColor: '#8592a3',
            confirmButtonText: 'Yes, delete it!',
            customClass: {
                confirmButton: 'btn btn-primary me-3',
                cancelButton: 'btn btn-outline-secondary'
            },
            buttonsStyling: false
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
        return false;
    }
</script>

<!-- Page JS -->
@stack('scripts')

<!-- Place this tag before closing body tag for github widget button. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
