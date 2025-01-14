<!-- Core JS -->
<script src="{{ asset('vendor/sneat/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('vendor/sneat/libs/popper/popper.js') }}"></script>
<script src="{{ asset('vendor/sneat/js/bootstrap.js') }}"></script>
<script src="{{ asset('vendor/sneat/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('vendor/sneat/js/menu.js') }}"></script>

<!-- Vendors JS -->
<script src="{{ asset('vendor/sneat/libs/apex-charts/apexcharts.js') }}"></script>

<!-- Main JS -->
<script src="{{ asset('vendor/sneat/js/main.js') }}"></script>

<!-- Page JS -->
<script src="{{ asset('vendor/sneat/js/dashboards-analytics.js') }}"></script>

<!-- Popover JS -->
<script src="{{ asset('vendor/sneat/js/ui-popover.js') }}"></script>


<!-- Toast JS -->
<script src="{{ asset('vendor/sneat/js/ui-toasts.js') }}"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.1.8/b-3.2.0/b-html5-3.2.0/r-3.0.3/datatables.min.js"></script>

@include('auth.scripts.datatables')
@include('auth.scripts.toasts')
@include('auth.scripts.modals')

<script>
    $('#importForm').on('submit', function() {
        $('#M_S_mahasiswa').modal('hide');
        $('#spinner').show();
        $('#importForm').on('submit', function(event) {
            event.preventDefault();
            var form = $(this)[0];
            var formData = new FormData(form);

            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $('#spinner').show();
                },
                success: function(response) {
                    $('#spinner').hide();
                    // handle success response
                },
                error: function(response) {
                    $('#spinner').hide();
                    // handle error response
                }
            });
        });
    });
</script>
<script>
    function checkInactivity() {
        fetch("{{ url('/afk') }}", {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => {
                if (response.status === 401) {
                    // Redirect ke halaman landing
                    window.location.href = "/";
                }
            })
            .catch(error => console.error('Error:', error));
    }

    // Periksa setiap 1 menit (60000 ms)
    setInterval(checkInactivity, 60000 * 10);
</script>
<script>
    $(document).ready(function() {
        $('#upload').change(function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#uploadedAvatar').attr('src', e.target.result);
                };
                reader.readAsDataURL(file);
            }
        });

        $('.account-image-reset').click(function() {
            $('#uploadedAvatar').attr('src', '');
            $('#upload').val('');
        });
    });
</script>
