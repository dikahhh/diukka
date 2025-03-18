<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('success') || session('error') || $errors->any())
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                title: "{{ session('success') ? 'Success' : 'Error' }}",
                html: `
                    @if(session('success'))
                        <p class="text-green-500">{{ session('success') }}</p>
                    @elseif(session('error'))
                        <p class="text-red-500">{{ session('error') }}</p>
                    @elseif($errors->any())
                        <ul class="text-red-500 text-left">
                            @foreach($errors->all() as $error)
                                <li>• {{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                `,
                icon: "{{ session('success') ? 'success' : 'error' }}",
                confirmButtonText: "OK",
                background: "#222",
                color: "#fff",
                confirmButtonColor: "{{ session('success') ? '#4CAF50' : '#d33' }}",
                timer: 5000,
                timerProgressBar: true
            });
        });
    </script>
@endif
