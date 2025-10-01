@if (session('success'))
    <script>
        document.addEventListener('DOMContentLoaded',()=>{

                    Swal.fire({
            icon: 'success',
            title: 'Sucesso!',
            text: '{{ session('success') }}',
            confirmButtonText: 'OK'
        });
    });
@endif
    </script>
@if(session('error'))
    <script>
        document.addEventListener('DOMContentLoaded',()=>{

                    Swal.fire({
            icon: 'error',
            title: 'Erro!',
            text: '{{ session('error') }}',
            confirmButtonText: 'OK'
        });
    });
    </script>
@endif
