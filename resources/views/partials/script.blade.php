<script src="{{ asset('/assets/js/bootstrap.js')}}"></script>
<script src="{{ asset('/assets/js/app.js')}}"></script>
<script src="{{ asset('/assets/extensions/jquery/jquery.min.js')}}"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
<script src="{{ asset('/assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
  $(document).ready(function () {
    $('#myTable').DataTable({
      "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All Pages"]],
      "pageLength": 10
    });
  });
</script>