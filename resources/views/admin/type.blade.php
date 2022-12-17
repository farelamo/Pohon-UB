@extends('layouts.index')

@push('head')
    <style>
        .error {
            color: red;
            font-weight: bold;
        }
    </style>
@endpush

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Tipe Pohon</h3>
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
                <div class="card-body table-responsive">
                    <table class="table table-striped table-bordered pe-4 pe-md-0" id="myTable" style="min-width: 500px">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($tree_types as $type)
                                <tr>
                                    <td style="width: 50px">{{ $loop->iteration }}</td>
                                    <td>
                                        <span><img src="{{ Storage::url('public/tree_type/ori_icon/' . $type->ori_icon) }}"
                                                alt="" style="width: 25px"></span>
                                        <span id="n{{ $type->id }}">{{ $type->name }}</span>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-success me-2"
                                            onclick="edit({{ $type->id }})" data-bs-toggle="modal"
                                            data-bs-target="#edit"><i class="bi bi-pencil"></i></a>
                                        <a href="#" class="btn btn-sm btn-success me-2"
                                            onclick="updateImage({{ $type->id }})" data-bs-toggle="modal"
                                            data-bs-target="#image"><i class="bi bi-card-image"></i></a>
                                        <a href="#" class="btn btn-sm btn-danger" onclick="hapus({{ $type->id }})"
                                            data-bs-toggle="modal" data-bs-target="#hapus"><i class="bi bi-x"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
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
                    <h5 class="modal-title">Tambah Tipe Pohon</h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" method="post" action="{{ route('type.store') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-12">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="name" required>
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
                    <h5 class="modal-title" id="et">Edit Tipe Pohon</h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="forms-sample" method="post" id="editType">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <div class="col-12">
                                <label for="en">Nama</label>
                                <input type="text" class="form-control" id="en" name="name" required>
                                @error('name')
                                    <div class="error">*{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <input type="text" class="form-control visually-hidden" id="ID" name="id"
                                    required>
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
                            <button type="submit" class="btn btn-danger" name="submit" value="delete"><i
                                    class="bi bi-x"></i><span> Delete</span></button>
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

                        <div class="form-group">
                            <h6>Upload image : </h6>
                            <input type="file" class="form-control" id="ii" name="image">
                            @error('image')
                                <div class="error">*{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control visually-hidden" id="IDG" name="idg"
                                required>
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
@endsection

@section('script')
    @if (count($errors) > 0)
      @php $bag = $errors->getBag($__errorArgs[1] ?? 'default'); @endphp
        @if ($bag->has('image'))
          <script type="text/javascript">
            $(document).ready(function() {

              $('#image').modal('show');
              $("#IDG").val(<?php echo json_encode(old('idg')) ?>);
              $('#editImage').attr('action', `/admin/type/${$("#IDG").val()}/update/image`);
            });
          </script>
        @endif
        <script type="text/javascript">
            $(document).ready(function() {

                $('#edit').modal('show');
                $("#en").val(<?php echo json_encode(old('name')); ?>);
                $("#ID").val(<?php echo json_encode(old('id')); ?>);
                $('#editType').attr('action', `/admin/type/${$("#ID").val()}`);
            });
        </script>
    @endif
    <script>
        function edit(id) {
            $('#editType').attr('action', `/admin/type/${id}`);
            $("#en").val($("#n" + id).text());
            $("#ID").val(id);
            $("#et").text("Edit " + $("#n" + id).text());
        }

        function hapus(id) {
            $('#hapusType').attr('action', `/admin/type/${id}`);
            $("#ht").text("Hapus " + $("#n" + id).text());
            $("#hd").text("Apakah anda yakin ingin menghapus " + $("#n" + id).text() + "?");
        }

        function updateImage(id) {
            $('#editImage').attr('action', `/admin/type/${id}/update/image`)
            $('#IDG').val(id)
        }
    </script>
@endsection
