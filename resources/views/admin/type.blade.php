@extends('layouts.index')

@section('content')
<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Tipe Pohon</h3>
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
         $types = [
           ["id"=>1,"name"=>"Sawit"],
           ["id"=>2,"name"=>"Mahoni"],
           ["id"=>3,"name"=>"Mangga"]
         ];   
        @endphp
        <table class="table table-striped table-bordered" id="myTable">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($types as $type)
            <tr>
              <td style="width: 50px">{{ $loop->index+1 }}</td>
              <td id="n{{ $type['id'] }}">{{ $type['name'] }}</td>
              <td>
                <a href="#" class="btn btn-sm btn-success me-2" onclick="edit({{ $type['id'] }})" data-bs-toggle="modal" data-bs-target="#edit"><i class="bi bi-pencil"></i></a>
                <a href="#" class="btn btn-sm btn-danger" onclick="hapus({{ $type['id'] }})" data-bs-toggle="modal" data-bs-target="#hapus"><i class="bi bi-x"></i></a>
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
        <h5 class="modal-title">Tambah Tipe Pohon</h5>
        <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
          <i data-feather="x"></i>
        </button>
      </div>
      <div class="modal-body">
        <form class="forms-sample" method="post">
          @csrf
          <div class="form-group row">
            <div class="col-12">
              <label for="username">Nama</label>
              <input type="text" class="form-control" name="name" required>
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
        <h5 class="modal-title" id="et" >Edit Tipe Pohon</h5>
        <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
          <i data-feather="x"></i>
        </button>
      </div>
      <div class="modal-body">
        <form class="forms-sample" method="post">
          @csrf
          <input type="hidden" id="ei" name="id">
          <div class="form-group row">
            <div class="col-12">
              <label for="en">Tinggi</label>
              <input type="text" class="form-control" id="en" name="name" required>
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
        <h5 class="modal-title" id="ht">Hapus Tipe Pohon</h5>
        <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
          <i data-feather="x"></i>
        </button>
      </div>
      <div class="modal-body">
        <form class="forms-sample" method="post">
          @csrf
          <input type="hidden" id="hi" name="id">
          <p id="hd">Apakah anda yakin ingin menghapus type pohon ini?</p>
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
      $("#en").val($("#n"+id).text());
      $("#et").text("Edit "+$("#n"+id).text());
    }
    function hapus(id){
      $("#hi").val(id);
      $("#ht").text("Hapus "+$("#n"+id).text());
      $("#hd").text("Apakah anda yakin ingin menghapus "+$("#n"+id).text()+"?");
    }
  </script>
@endsection