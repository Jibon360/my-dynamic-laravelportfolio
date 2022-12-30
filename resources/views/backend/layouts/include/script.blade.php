<!-- build:js assets/vendor/js/core.js -->
{{-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> --}}
<script src="{{ asset('backend') }}/assets/vendor/libs/jquery/jquery.js"></script>
<script src="{{ asset('backend') }}/assets/vendor/libs/popper/popper.js"></script>
<script src="{{ asset('backend') }}/assets/vendor/js/bootstrap.js"></script>
<script src="{{ asset('backend') }}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="{{ asset('backend') }}/assets/js/dropify.min.js"></script>

<script src="{{ asset('backend') }}/assets/vendor/js/menu.js"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{ asset('backend') }}/assets/vendor/libs/apex-charts/apexcharts.js"></script>

<!-- Main JS -->
<script src="{{ asset('backend') }}/assets/js/main.js"></script>

<!-- Page JS -->
<script src="{{ asset('backend') }}/assets/js/dashboards-analytics.js"></script>
<script src="{{ asset('backend') }}/assets/js/toastr.min.js"></script>
<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            //  pagingType: 'full_numbers'
        });


    });

    var drEvent = $('.dropify').dropify();

    drEvent.on('dropify.beforeClear', function(event, element) {
        return confirm("Do you really want to delete \"" + element.filename + "\" ?");
    });
</script>
