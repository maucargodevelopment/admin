@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Detail Invoices</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Detail Invoices</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.detail-fluid -->
        </section>




        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-ban"></i> Error!</h4>
                        There's some errors processing your request.
                        {{ $errors }}
                    </div>
                @endif

                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-info"></i> Success!</h4>
                        {{ session('success') }}
                    </div>
                @endif

                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Detail Invoices</h3>
                            </div>
                            <!-- /.card-header -->

                            <form role="form" method="post" action="{{ route('invoices.update', $invoice->invoice) }}">
                                @method('PUT')
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">

                                            <div class="form-group @if ($errors->has('invoice')) has-error @endif">
                                                <label for="invoice">Invoice</label>
                                                <input type="text" readonly class="form-control" id="invoice"
                                                    name="invoice" placeholder="Enter invoice"
                                                    value="{{ old('invoice') ?? $invoice->invoice }}">
                                                @if ($errors->has('invoice'))
                                                    <span class="help-block">{{ $errors->first('invoice') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group @if ($errors->has('consignee')) has-error @endif">
                                                <label for="consignee">Consignee</label>
                                                <input type="text" class="form-control" id="consignee" name="consignee"
                                                    placeholder="Enter consignee"
                                                    value="{{ old('consignee') ?? $invoice->consignee }}">
                                                @if ($errors->has('consignee'))
                                                    <span class="help-block">{{ $errors->first('consignee') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group @if ($errors->has('address')) has-error @endif">
                                                <label for="address">Address</label>
                                                <input type="text" class="form-control" id="address" name="address"
                                                    placeholder="Enter address"
                                                    value="{{ old('address') ?? $invoice->address }}">
                                                @if ($errors->has('address'))
                                                    <span class="help-block">{{ $errors->first('address') }}</span>
                                                @endif
                                            </div>


                                            <div class="form-group @if ($errors->has('issued_date')) has-error @endif">
                                                <label for="issued_date">Issued Date</label>
                                                <input type="date" class="form-control" id="issued_date"
                                                    name="issued_date" placeholder="Enter issued_date"
                                                    value="{{ old('issued_date') ?? $invoice->issued_date }}">
                                                @if ($errors->has('issued_date'))
                                                    <span class="help-block">{{ $errors->first('issued_date') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group @if ($errors->has('to')) has-error @endif">
                                                <label for="to">To</label>
                                                <input type="text" class="form-control" id="to" name="to"
                                                    placeholder="Enter to" value="{{ old('to') ?? $invoice->to }}">
                                                @if ($errors->has('to'))
                                                    <span class="help-block">{{ $errors->first('to') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group @if ($errors->has('mawb')) has-error @endif">
                                                <label for="mawb">MAWB</label>
                                                <input type="text" class="form-control" id="mawb" name="mawb"
                                                    placeholder="Enter mawb" value="{{ old('mawb') ?? $invoice->mawb }}">
                                                @if ($errors->has('mawb'))
                                                    <span class="help-block">{{ $errors->first('mawb') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group @if ($errors->has('no')) has-error @endif">
                                                <label for="no">No</label>
                                                <input type="text" class="form-control" id="no" name="no"
                                                    placeholder="Enter no" value="{{ old('no') ?? $invoice->no }}">
                                                @if ($errors->has('no'))
                                                    <span class="help-block">{{ $errors->first('no') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-6">

                                            <div class="form-group @if ($errors->has('mode')) has-error @endif">
                                                <label for="mode">Mode</label>
                                                <input type="text" class="form-control" id="mode" name="mode"
                                                    placeholder="Enter mode" value="{{ old('mode') ?? $invoice->mode }}">
                                                @if ($errors->has('mode'))
                                                    <span class="help-block">{{ $errors->first('mode') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group @if ($errors->has('vessel')) has-error @endif">
                                                <label for="vessel">Vessel</label>
                                                <input type="text" class="form-control" id="vessel" name="vessel"
                                                    placeholder="Enter vessel"
                                                    value="{{ old('vessel') ?? $invoice->vessel }}">
                                                @if ($errors->has('vessel'))
                                                    <span class="help-block">{{ $errors->first('vessel') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group @if ($errors->has('hbl')) has-error @endif">
                                                <label for="hbl">HBL</label>
                                                <input type="text" class="form-control" id="hbl" name="hbl"
                                                    placeholder="Enter hbl" value="{{ old('hbl') ?? $invoice->hbl }}">
                                                @if ($errors->has('hbl'))
                                                    <span class="help-block">{{ $errors->first('hbl') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group @if ($errors->has('gw')) has-error @endif">
                                                <label for="gw">GW</label>
                                                <input type="text" class="form-control" id="gw" name="gw"
                                                    placeholder="Enter gw" value="{{ old('gw') ?? $invoice->gw }}">
                                                @if ($errors->has('gw'))
                                                    <span class="help-block">{{ $errors->first('gw') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group @if ($errors->has('etd_pol')) has-error @endif">
                                                <label for="etd_pol">ETD Pool</label>
                                                <input type="date" class="form-control" id="etd_pol" name="etd_pol"
                                                    placeholder="Enter etd_pol"
                                                    value="{{ old('etd_pol') ?? $invoice->etd_pol }}">
                                                @if ($errors->has('etd_pol'))
                                                    <span class="help-block">{{ $errors->first('etd_pol') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group @if ($errors->has('note')) has-error @endif">
                                                <label for="note">Note</label>
                                                <input type="text" class="form-control" id="note" name="note"
                                                    placeholder="Enter note" value="{{ old('note') ?? $invoice->note }}">
                                                @if ($errors->has('note'))
                                                    <span class="help-block">{{ $errors->first('note') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group @if ($errors->has('validity')) has-error @endif">
                                                <label for="validity">Validity</label>
                                                <input type="text" class="form-control" id="validity"
                                                    name="validity" placeholder="Enter validity"
                                                    value="{{ old('validity') ?? $invoice->validity }}">
                                                @if ($errors->has('validity'))
                                                    <span class="help-block">{{ $errors->first('validity') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="invoice" value="{{ $invoice->invoice }}">

                                    <div class="box-footer">
                                        <a href="{{ route('invoices.index') }}" class="btn btn-danger">Back</a>
                                        <button type="submit" class="btn btn-primary">Update Invoice</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Data Orders</h3>
                                <div class="float-right">
                                    <div class="section-header-button">
                                        <a href="javascript.void(0)" class="btn btn-primary" data-target="#ModalAdd"
                                            data-toggle="modal"><i class="fas fa-plus"></i> Add Orders</a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered table-striped">

                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Item</th>
                                            <th>Price</th>
                                            <th>Curs</th>
                                            <th>Subtotal</th>
                                            <th>Remarks</th>
                                            <th>Created Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($orders)
                                            @foreach ($orders as $index => $order)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $order->item }}</td>
                                                    <td align="right">$ {{ number_format($order->price) }}</td>
                                                    <td align="right">$ {{ number_format($order->curs) }}</td>
                                                    <td align="right">IDR {{ number_format($order->subtotal) }}</td>
                                                    <td>{{ $order->remarks }}</td>
                                                    <td>{{ $order->created_at->format('d F Y') }}</td>
                                                    <td align="center">

                                                        <a href="#edit{{ $order->id }}" data-toggle="modal"
                                                            class="btn btn-primary btn-sm"><i class="fas fa-edit"></i>
                                                            Edit</a>
                                                        <a class="btn btn-danger btn-sm x-delete"
                                                            data-id="{{ $order->id }}">
                                                            <i class="fas fa-trash"></i>
                                                            Delete</a>
                                                    </td>
                                                </tr>

                                                @include('invoices.modal')
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                                <div class="row">
                                    <!-- accepted payments column -->
                                    <div class="col-8">

                                    </div>
                                    <!-- /.col -->
                                    <div class="col-4">

                                        <div class="table-responsive">
                                            <table class="table">
                                                <tr>
                                                    <th style="width:50%">Grand Total :</th>
                                                    <td align="right">IDR {{ number_format($invoice->grand_total) }}</td>
                                                </tr>

                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <hr>

                                <!-- this row will not appear when printing -->
                                <div class="row no-print">
                                    <div class="col-12">
                                        <a href="{{ route('invoices.download', $invoice->invoice) }}" rel="noopener"
                                            target="_blank" class="btn btn-primary"><i class="fas fa-download"></i>
                                            Download
                                            PDF</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


    <!-- Modal Popup untuk Add-->
    <div id="ModalAdd" class="modal  fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog  modal-lg">
            <div class="modal-content text-dark">
                <div class="modal-header">
                    <h5 class="modal-title">Add Orders</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-dark">
                    <form action="{{ route('orders.store') }}" method="POST">
                        @csrf

                        <div class="form-group col-md-12">
                            <label>Item</label>
                            <input type="text" class="form-control" placeholder="Item" name="item" value=""
                                required>
                        </div>
                        <div class="form-group col-md-12">
                             <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="currencySwitch" value="USD" name="currency">
                                <label class="custom-control-label" for="currencySwitch">USD / IDR</label>
                            </div>        
                            <div id="selectedCurrency" class="mt-3">
                            <p>You have selected: <span id="currencyLabel">USD</span></p>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Price</label>
                            <input type="text" class="form-control" placeholder="Price" name="price"
                                value="" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Curs</label>
                            <input type="text" class="form-control" placeholder="Curs" name="curs" value="" id="curs"
                                required>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Remarks</label>
                            <input type="text" class="form-control" id="remarks" placeholder="Remarks"
                                name="remarks" required>
                        </div>


                        <input type="hidden" name="invoice" value="{{ $invoice->invoice }}">
                        <div class="modal-footer">
                            <button class="btn btn-primary " type="submit">
                                Save
                            </button>

                            <button type="reset" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">
                                Cancel
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- /.modal -->
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/js/bootstrap-switch.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.2/sweetalert2.all.min.js"></script>
    <script>
        $(document).ready(function() {


            $('.x-delete').click(function() {
                let id = $(this).data('id');

                swal({
                    title: 'Are you sure?',
                    text: 'You won\'t be able to revert this!',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: '{{ route('orders.index') }}/' + id,
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                    'content'),
                            },
                            method: 'DELETE',
                            success: function(data) {
                                $('#row-id-' + id).remove();
                                swal(
                                    'Deleted!',
                                    'Your data has been deleted.',
                                    'success',
                                );
                                location.reload();
                            },
                        });
                    }
                });
            });

            const currencySwitch = document.getElementById('currencySwitch');
            const currencyLabel = document.getElementById('currencyLabel');
            const curs = document.getElementById('curs');

            currencySwitch.addEventListener('change', function() {
                if (currencySwitch.checked) {
                    currencyLabel.textContent = 'IDR';
                    currencySwitch.value = "IDR";
                    curs.value = 1;
                    curs.setAttribute("readonly", true);
                } else {
                    currencyLabel.textContent = 'USD';
                    currencySwitch.value = "USD";
                    curs.setAttribute("readonly", false);
                }
            });
        });
    </script>
@endsection
