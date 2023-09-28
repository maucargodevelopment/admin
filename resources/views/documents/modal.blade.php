{{-- <!-- Modal Popup untuk Delete -->
<div class="modal fade" id="del{{ $container->id_user }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="container-fluid">
                    <h5>
                        <center>Yakin Hapus Data dengan Nama : <strong> {{ $container->nama_user }} ?</strong></center>
                    </h5>
                </div>
            </div>
            <div class="modal-footer">

                <form action="{{ route('containers.destroy', $container->id_user) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger ml-3">Delete</button>
                </form>

                <button type="button" class="btn btn-default" data-dismiss="modal"><span
                        class="glyphicon glyphicon-remove"></span> Cancel</button>
            </div>

        </div>
    </div>
</div>
<!-- /.modal --> --}}

<!-- Modal Popup untuk Edit -->
<div class="modal fade" id="edit{{ $container->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content text-dark">
            <div class="modal-header">
                <h5 class="modal-title">Edit Containers</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{ route('containers.update', ['container' => $container->id]) }}" method="POST">

                    @method('PATCH')
                    @csrf

                    <div class="form-group col-md-12">
                        <label>No Container</label>
                        <input type="text" class="form-control" placeholder="No Container" name="no_container"
                            value="{{ $container->no_container }}" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label>No Seal</label>
                        <input type="text" class="form-control" placeholder="No Seal" name="no_seal"
                            value="{{ $container->no_seal }}" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Volume <strong>(Harus dicek lagi)</strong></label>
                        <select class="form-control select2bs4 select2-hidden-accessible" style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true" id="volume" name="volume" required>
                                <option value="20 Feet" {{ $container->volume == '20 Feet' ? 'selected': ''}}>20 Feet</option>
                                <option value="40 Std" {{ $container->volume == '40 Std' ? 'selected': ''}}>40 Std</option>
                                <option value="40 HC" {{ $container->volume == '40 HC' ? 'selected': ''}}>40 HC</option>
                                <option value="45 HC" {{ $container->volume == '45 HC' ? 'selected': ''}}>45 HC</option>
                                <option value="Air Freight" {{ $container->volume == 'Air Freight' ? 'selected': ''}}>Air Freight</option>
                                <option value="LCL" {{ $container->volume == 'LCL' ? 'selected': ''}}>LCL</option>
                                <option value="Courier" {{ $container->volume == 'Courier' ? 'selected': ''}}>Courier</option>
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Vessel</label>
                        <input type="text" class="form-control" placeholder="Vessel" name="vessel"
                            value="{{ $container->vessel }}" required>
                    </div>
                    <input type="hidden" name="document_id" value="{{ $container->document_id }}" required>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span>
                            Simpan</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><span
                                class="glyphicon glyphicon-remove"></span> Batal</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
<!-- /.modal -->
