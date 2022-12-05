@extends('layouts.index')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Detail Pohon</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first d-flex justify-content-end ">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start mt-auto">
                        <a href="#" class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#tambah"><i
                                class="bi bi-pencil"></i> Tambah Pohon</a>
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
                                <th class="d-none">Cluster ID</th>
                                <th>Cluster Name</th>
                                <th>Tinggi</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($tree_details as $tree)
                                <tr>
                                    <td style="width: 50px">{{ $loop->index + 1 }}</td>
                                    <td class="d-none" id="c{{ $tree->id }}">{{ $tree->cluster_id }}</td>
                                    <td id="cn{{ $tree->id }}">{{ $tree->cluster->name }}</td>
                                    <td id="t{{ $tree->id }}">{{ $tree->tall }} cm</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-success me-2"
                                            onclick="edit({{ $tree->id }})" data-bs-toggle="modal"
                                            data-bs-target="#edit"><i class="bi bi-pencil"></i></a>
                                        <a href="#" class="btn btn-sm btn-danger" onclick="hapus({{ $tree->id }})"
                                            data-bs-toggle="modal" data-bs-target="#hapus"><i class="bi bi-x"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
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
                    <form class="forms-sample" method="post" action="{{ route('tree.store') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-7">
                                <label for="cluster_id">Cluster</label>
                                <select class="form-select text-center" name="cluster_id" required>
                                    <option value="">-- Pilih Cluster --</option>
                                    @foreach ($clusters as $cluster)
                                        <option value="{{ $cluster->id }}">{{ $cluster->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-5">
                                <label for="username">Tinggi</label>
                                <input type="number" class="form-control" name="tall" required>
                            </div>
                        </div>
                        <div class="modal-footer px-0 py-2">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success" name="submit" value="store"><i
                                    class="fa fa-save"></i><span> Submit</span></button>
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
                    <form class="forms-sample" method="post" id="editDetail">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <div class="col-7">
                                <label for="cluster_id">Cluster</label>
                                <select class="form-select text-center" id="ec" name="cluster_id" required>
                                    <option value="">-- Pilih Cluster --</option>
                                    @foreach ($clusters as $cluster)
                                        <option id="pc" value="{{ $cluster->id }}">{{ $cluster->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-5">
                                <label for="username">Tinggi</label>
                                <input type="number" class="form-control" id="et" name="tall" required>
                            </div>
                            <div class="col-12">
                                <input type="text" class="form-control visually-hidden" id="ID" name="id" required>
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
                    <form class="forms-sample" method="post" id="hapusDetail">
                        @csrf
                        @method('DELETE')

                        <p>Apakah anda yakin ingin menghapus pohon ini?</p>
                        <div class="modal-footer px-0 py-2">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-danger" name="submit" value="delete">
                                <i class="bi bi-x"></i><span> Delete</span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @if (count($errors) > 0)
    <script type="text/javascript">
        $(document).ready(function() {
            
            $('#edit').modal('show');
            const clusterId = <?php echo json_encode(old('cluster_id')) ?>
            document.querySelectorAll("#pc").forEach(e => {
                if(clusterId == e.value){
                  e.setAttribute('selected', true);
                }
            });
            $("#et").val(<?php echo json_encode(old('tall')) ?>);
            $("#ID").val(<?php echo json_encode(old('id')) ?>);
            $('#editDetail').attr('action', `/admin/tree/${$("#ID").val()}`);
        });
    </script>
    @endif
    <script>
        function edit(id) {
            const clusterId = $("#c" + id).text()
            document.querySelectorAll("#pc").forEach(e => {
                if(clusterId == e.value){
                  e.setAttribute('selected', true);
                }
            });
            $('#editDetail').attr('action', `/admin/tree/${id}`);
            $("#ec").val($("#c" + id).text());
            $("#et").val($("#t" + id).text().replace(" cm", ""));
            $("#ID").val(id);
        }

        function hapus(id) {
            $('#hapusDetail').attr('action', `/admin/tree/${id}`);
        }
    </script>
@endsection
