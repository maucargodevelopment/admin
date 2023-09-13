{{-- <!-- Modal Popup untuk Delete -->
<div class="modal fade" id="del{{ $order->id_user }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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

                <div class="order-fluid">
                    <h5>
                        <center>Yakin Hapus Data dengan Nama : <strong> {{ $order->nama_user }} ?</strong></center>
                    </h5>
                </div>
            </div>
            <div class="modal-footer">

                <form action="{{ route('orders.destroy', $order->id_user) }}" method="POST">
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
<div class="modal fade" id="edit{{ $order->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content text-dark">
            <div class="modal-header">
                <h5 class="modal-title">Edit Orders</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="{{ route('orders.update', ['order' => $order->id]) }}" method="POST">

                    @method('PATCH')
                    @csrf

                    <div class="form-group col-md-12">
                        <label>Item</label>
                        <input type="text" class="form-control" placeholder="Item" name="item"
                            value="{{ $order->item }}" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Price</label>
                        <input type="text" class="form-control" placeholder="Price" name="price"
                            value="{{ $order->price }}" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Curs</label>
                        <input type="text" required="" class="form-control" placeholder="Curs" name="curs"
                            value="{{ $order->curs }}">
                    </div>

                    <div class="form-group col-md-12">
                        <label>Remarks</label>
                        <input type="text" class="form-control" placeholder="Remarks" name="remarks"
                            value="{{ $order->remarks }}" required>
                    </div>
                    <input type="hidden" name="invoice" value="{{ $order->invoice }}" required>

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
