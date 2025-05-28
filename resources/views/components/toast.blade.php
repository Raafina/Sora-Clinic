<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('success'))
    <script>
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'success',
            title: @json(session('success')),
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            background: '#22c55e',
            iconColor: '#ffffff',
            color: '#ffffff',
            customClass: {
                popup: 'shadow-lg rounded-md'
            }
        });
    </script>
@elseif (session('error'))
    <script>
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'error',
            title: @json(session('error')),
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            background: '#ef4444',
            iconColor: '#ffffff',
            color: '#ffffff',
            customClass: {
                popup: 'shadow-lg rounded-md'
            }
        });
    </script>
@endif
