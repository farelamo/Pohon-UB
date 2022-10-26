@extends('layouts.index')

@section('content')
<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Detail Pohon</h3>
        <p class="text-subtitle text-muted">A sortable, searchable, paginated table without dependencies thanks to simple-datatables</p>
      </div>
      <div class="col-12 col-md-6 order-md-2 order-first d-flex justify-content-end ">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start mt-auto">
          <a href="#" class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#tambah"><i class="bi bi-pencil"></i> Tambah Pohon</a>
        </nav>
      </div>
    </div>
  </div>
</div>
<div class="page-content">
  <section class="section">
    <div class="card">
      <div class="card-body">
        @php
         $trees = [
           ["id"=>1,"cluster_id"=>1,"tall"=>120],
           ["id"=>2,"cluster_id"=>2,"tall"=>330],
           ["id"=>3,"cluster_id"=>3,"tall"=>240],
           ["id"=>4,"cluster_id"=>1,"tall"=>450],
           ["id"=>5,"cluster_id"=>2,"tall"=>360],
           ["id"=>6,"cluster_id"=>3,"tall"=>170],
           ["id"=>7,"cluster_id"=>1,"tall"=>480]
         ];   
        @endphp
        <table class="table table-striped table-bordered" id="myTable">
          <thead>
            <tr>
              <th>No</th>
              <th>Cluster ID</th>
              <th>Tinggi</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($trees as $tree)
            <tr>
              <td style="width: 50px">{{ $loop->index+1 }}</td>
              <td id="c{{ $tree['id'] }}">{{ $tree['cluster_id'] }}</td>
              <td id="t{{ $tree['id'] }}">{{ $tree['tall'] }} cm</td>
              <td>
                <a href="#" class="btn btn-sm btn-success me-2" onclick="edit({{ $tree['id'] }})" data-bs-toggle="modal" data-bs-target="#edit"><i class="bi bi-pencil"></i></a>
                <a href="#" class="btn btn-sm btn-danger" onclick="hapus({{ $tree['id'] }})" data-bs-toggle="modal" data-bs-target="#hapus"><i class="bi bi-x"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>

<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Pohon</h5>
        <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
          <i data-feather="x"></i>
        </button>
      </div>
      <div class="modal-body">
        <form class="forms-sample" method="post">
          @csrf
          <div class="form-group row">
            <div class="col-7">
              <label for="cluster_id">Cluster</label>
              <select class="form-select" name="cluster_id" required>
                <option value="1">Cluster 1</option>
                <option value="2">Cluster 2</option>
                <option value="3">Cluster 3</option>
              </select>
            </div>
            <div class="col-5">
              <label for="username">Tinggi</label>
              <input type="number" class="form-control" name="tall" required>
            </div>
          </div>
          <div class="modal-footer px-0 py-2">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-success" name="submit" value="store"><i class="fa fa-save"></i><span> Submit</span></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Detail Pohon</h5>
        <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
          <i data-feather="x"></i>
        </button>
      </div>
      <div class="modal-body">
        <form class="forms-sample" method="post">
          @csrf
          <input type="hidden" id="ei" name="id">
          <div class="form-group row">
            <div class="col-7">
              <label for="cluster_id">Cluster</label>
              <select class="form-select" id="ec" name="cluster_id" required>
                <option value="1">Cluster 1</option>
                <option value="2">Cluster 2</option>
                <option value="3">Cluster 3</option>
              </select>
            </div>
            <div class="col-5">
              <label for="username">Tinggi</label>
              <input type="number" class="form-control" id="et" name="tall" required>
            </div>
          </div>
          <div class="modal-footer px-0 py-2">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-success" name="submit" value="update"><i class="fa fa-save"></i><span> Save</span></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Hapus Pohon</h5>
        <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
          <i data-feather="x"></i>
        </button>
      </div>
      <div class="modal-body">
        <form class="forms-sample" method="post">
          @csrf
          <input type="hidden" id="hi" name="id">
          <p>Apakah anda yakin ingin menghapus pohon ini?</p>
          <div class="modal-footer px-0 py-2">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-danger" name="submit" value="delete"><i class="bi bi-x"></i><span> Delete</span></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
  <script>
    function edit(id){
      $("#ei").val(id);
      $("#ec").val($("#c"+id).text());
      $("#et").val($("#t"+id).text().replace(" cm", ""));
    }
    function hapus(id){
      $("#hi").val(id);
    }
  </script>
@endsection