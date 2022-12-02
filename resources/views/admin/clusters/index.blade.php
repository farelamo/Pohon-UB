@extends('layouts.index')

@section('content')
<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Cluster</h3>
      </div>
      <div class="col-12 col-md-6 order-md-2 order-first d-flex justify-content-end ">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start mt-auto">
          <a href="/admin/cluster/create" class="btn btn-success me-2"><i class="bi bi-pencil"></i> Tambah Pohon</a>
        </nav>
      </div>
    </div>
  </div>
</div>
<div class="page-content">
  <section class="section">
    <div class="card">
      <div class="card-body">
        <table class="table table-striped table-bordered" id="myTable">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Cluster</th>
              <th>Tipe Pohon</th>
              <th>Lokasi</th>
              <th>Tinggi (Rata2)</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse($clusters as $cluster)
              <tr>
                <td style="width: 50px">{{ $loop->iteration }}</td>
                <td id="n{{ $cluster->id }}">
                  <span><img src="/assets/images/cluster/{{ $cluster->id }}.png" alt="" style="width: 25px"></span>
                  {{ $cluster->name }}
                </td>
                <td id="t{{ $cluster->id }}">{{ $cluster->tree_type->name }}</td>
                <td id="l{{ $cluster->id }}">{{ $cluster->location->name }}</td>
                <td id="a{{ $cluster->id }}">{{ $cluster->avg_tall }} m</td>
                <td>
                  <a href="#" class="btn btn-sm btn-success me-2" onclick="edit({{ $cluster->id }})" data-bs-toggle="modal" data-bs-target="#edit"><i class="bi bi-pencil"></i></a>
                  <a href="#" class="btn btn-sm btn-success me-2" onclick="image({{ $cluster->id }})" data-bs-toggle="modal" data-bs-target="#image"><i class="bi bi-card-image"></i></a>
                  <a href="#" class="btn btn-sm btn-danger" onclick="hapus({{ $cluster->id }})" data-bs-toggle="modal" data-bs-target="#hapus"><i class="bi bi-x"></i></a>
                </td>
              </tr>
            @empty
                <tr>
                  <td>No Data</td>
                  <td>No Data</td>
                  <td>No Data</td>
                  <td>No Data</td>
                  <td>No Data</td>
                </tr>
            @endforelse 
          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>

<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="etitle">Edit Cluster</h5>
              <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                  <i data-feather="x"></i>
              </button>
          </div>
          <div class="modal-body">
              <form class="forms-sample" method="post" id="editDetail">
                  @csrf
                  @method('PUT')
                  <input type="hidden" id="ei" name="id">
                  <div class="form-group">
                    <h6>Nama cluster</h6>
                    <input type="text" class="form-control" id="en" name="name">
                  </div>
                  <div class="form-group row">
                      <div class="col-12 col-md-4">
                          <h6>Tipe pohon</h6>
                          <select class="choices form-select mb-3" id="et" name="tree_type_id">
                            @forelse ($tree_types as $tree_type)
                                <option value="{{ $tree_type['id'] }}">{{ $tree_type['name'] }}</option>
                            @empty
                                <option value="">No Data</option>
                            @endforelse
                          </select>
                      </div>
                      <div class="col-8 col-md-5">
                        <h6>Lokasi</h6>
                        <select class="choices form-select" id="el" name="location_id">
                          @forelse ($locations as $location)
                              <option value="{{ $location['id'] }}">{{ $location['name'] }}</option>
                          @empty
                              <option value="">No Data</option>
                          @endforelse
                        </select>
                      </div>
                      <div class="col-4 col-md-3">
                        <h6>Jumlah</h6>
                        <input type="number" class="form-control" id="ec" name="tree_count">
                      </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-8">
                      <h6>Donatur</h6>
                      <input type="text" class="form-control" id="ed" name="donatures">
                    </div>
                    <div class="col-4">
                      <h6>Tinggi Rata2</h6>
                      <input type="number" class="form-control" id="ea" name="avg_tall">
                    </div>
                  </div>
                  <div class="modal-footer px-0 py-2">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                      <button type="submit" class="btn btn-success" name="submit" value="update"><i
                              class="fa fa-save"></i><span> Save</span></button>
                  </div>
              </form>
          </div>
      </div>
  </div>
</div>

<div class="modal fade" id="image" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">Edit Image</h5>
              <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                  <i data-feather="x"></i>
              </button>
          </div>
          <div class="modal-body">
              <form class="forms-sample" method="post" id="editImage" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <input type="hidden" id="ii" name="id">
                  <div class="form-group">
                    <h6>Upload image : </h6>
                    <input type="file" class="form-control" id="ii" name="image">
                  </div>
                  <div class="modal-footer px-0 py-2">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                      <button type="submit" class="btn btn-success" name="submit" value="update"><i
                              class="fa fa-save"></i><span> Save</span></button>
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
        <form class="forms-sample" method="post" id="hapusType">
          @csrf
          @method('DELETE')

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

    function hapus(id){
      $('#hapusType').attr('action', `/admin/cluster/${id}`);
      $("#ht").text("Hapus "+$("#t"+id).text());
      $("#hd").text("Apakah anda yakin ingin menghapus cluster "+$("#t"+id).text()+"?");
    }
    function edit(id){
    $.ajax({
      url: "/api/cluster/"+id,
      type: 'GET',
      dataType: 'json', // added data type
      success: function(mydata) {
        //alert(JSON.stringify(mydata));
        $("#ei").val(id);
        $("#en").val(mydata.name);
        $("#et").val(mydata.tree_type_id);
        $("#el").val(mydata.location_id);
        $("#ec").val(mydata.tree_count);
        $("#ea").val(mydata.avg_tall);
        $("#ed").val(mydata.donatures);
        $("#etitle").text("Edit "+mydata.name);
      }
    });
  }
  </script>
@endsection