<script src="{{ asset('/assets/js/bootstrap.js')}}"></script>
<script src="{{ asset('/assets/js/app.js')}}"></script>
<script src="{{ asset('/assets/extensions/jquery/jquery.min.js')}}"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
<script src="{{ asset('/assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js')}}"></script>
<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/fontawesome.js" integrity="sha384-dPBGbj4Uoy1OOpM4+aRGfAOc0W37JkROT+3uynUgTHZCHZNMHfGXsmmvYTffZjYO" crossorigin="anonymous"></script>

<script>
  $(document).ready(function () {
    $('#myTable').DataTable({
      "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All Pages"]],
      "pageLength": 10
    });
  });
</script>