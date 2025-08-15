@if(session()->has('success'))
    <script>
        swal({
            type: 'success',
            title: '{{ session()->get('success') }}',
            showConfirmButton: false,
            timer: 3000
        })
    </script>
@endif