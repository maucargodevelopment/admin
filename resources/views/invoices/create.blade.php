@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create Invoices</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Create Invoices</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>




        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-ban"></i> Error!</h4>
                        There's some errors processing your request.
                        <br> {{ $errors }}

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
                                <h3 class="card-title">Create Invoices</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <!-- form start -->
                                <form role="form" method="post" action="{{ route('invoices.store') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-6">

                                            <div class="form-group @if ($errors->has('invoice')) has-error @endif">
                                                <label for="invoice">Invoice</label>
                                                <input type="text" readonly class="form-control" id="invoice"
                                                    name="invoice" placeholder="Enter invoice"
                                                    value="{{ old('invoice') ?? $invoice }}">
                                                @if ($errors->has('invoice'))
                                                    <span class="help-block">{{ $errors->first('invoice') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group @if ($errors->has('consignee')) has-error @endif">
                                                <label for="consignee">Consignee</label>
                                                <input type="text" class="form-control" id="consignee" name="consignee"
                                                    placeholder="Enter consignee" value="{{ old('consignee') }}">
                                                @if ($errors->has('consignee'))
                                                    <span class="help-block">{{ $errors->first('consignee') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group @if ($errors->has('address')) has-error @endif">
                                                <label for="address">Address</label>
                                                <input type="text" class="form-control" id="address" name="address"
                                                    placeholder="Enter address" value="{{ old('address') }}">
                                                @if ($errors->has('address'))
                                                    <span class="help-block">{{ $errors->first('address') }}</span>
                                                @endif
                                            </div>


                                            <div class="form-group @if ($errors->has('issued_date')) has-error @endif">
                                                <label for="issued_date">Issued Date</label>
                                                <input type="date" class="form-control" id="issued_date"
                                                    name="issued_date" placeholder="Enter issued_date"
                                                    value="{{ old('issued_date') }}">
                                                @if ($errors->has('issued_date'))
                                                    <span class="help-block">{{ $errors->first('issued_date') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group @if ($errors->has('to')) has-error @endif">
                                                <label for="to">To</label>
                                                <input type="text" class="form-control" id="to" name="to"
                                                    placeholder="Enter to" value="{{ old('to') }}">
                                                @if ($errors->has('to'))
                                                    <span class="help-block">{{ $errors->first('to') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group @if ($errors->has('mawb')) has-error @endif">
                                                <label for="mawb">MAWB</label>
                                                <input type="text" class="form-control" id="mawb" name="mawb"
                                                    placeholder="Enter mawb" value="{{ old('mawb') }}">
                                                @if ($errors->has('mawb'))
                                                    <span class="help-block">{{ $errors->first('mawb') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group @if ($errors->has('no')) has-error @endif">
                                                <label for="no">No</label>
                                                <input type="text" class="form-control" id="no" name="no"
                                                    placeholder="Enter no" value="{{ old('no') }}">
                                                @if ($errors->has('no'))
                                                    <span class="help-block">{{ $errors->first('no') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-6">

                                            <div class="form-group @if ($errors->has('mode')) has-error @endif">
                                                <label for="mode">Mode</label>
                                                <input type="text" class="form-control" id="mode" name="mode"
                                                    placeholder="Enter mode" value="{{ old('mode') }}">
                                                @if ($errors->has('mode'))
                                                    <span class="help-block">{{ $errors->first('mode') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group @if ($errors->has('vessel')) has-error @endif">
                                                <label for="vessel">Vessel</label>
                                                <input type="text" class="form-control" id="vessel" name="vessel"
                                                    placeholder="Enter vessel" value="{{ old('vessel') }}">
                                                @if ($errors->has('vessel'))
                                                    <span class="help-block">{{ $errors->first('vessel') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group @if ($errors->has('hbl')) has-error @endif">
                                                <label for="hbl">HBL</label>
                                                <input type="text" class="form-control" id="hbl" name="hbl"
                                                    placeholder="Enter hbl" value="{{ old('hbl') }}">
                                                @if ($errors->has('hbl'))
                                                    <span class="help-block">{{ $errors->first('hbl') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group @if ($errors->has('gw')) has-error @endif">
                                                <label for="gw">GW</label>
                                                <input type="text" class="form-control" id="gw" name="gw"
                                                    placeholder="Enter gw" value="{{ old('gw') }}">
                                                @if ($errors->has('gw'))
                                                    <span class="help-block">{{ $errors->first('gw') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group @if ($errors->has('etd_pol')) has-error @endif">
                                                <label for="etd_pol">ETD Pool</label>
                                                <input type="date" class="form-control" id="etd_pol" name="etd_pol"
                                                    placeholder="Enter etd_pol" value="{{ old('etd_pol') }}">
                                                @if ($errors->has('etd_pol'))
                                                    <span class="help-block">{{ $errors->first('etd_pol') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group @if ($errors->has('note')) has-error @endif">
                                                <label for="note">Note</label>
                                                <input type="text" class="form-control" id="note" name="note"
                                                    placeholder="Enter note" value="{{ old('note') }}">
                                                @if ($errors->has('note'))
                                                    <span class="help-block">{{ $errors->first('note') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group @if ($errors->has('validity')) has-error @endif">
                                                <label for="validity">Validity</label>
                                                <input type="text" class="form-control" id="validity"
                                                    name="validity" placeholder="Enter validity"
                                                    value="{{ old('validity') }}">
                                                @if ($errors->has('validity'))
                                                    <span class="help-block">{{ $errors->first('validity') }}</span>
                                                @endif
                                            </div>

                                        </div>
                                    </div>

                                    <input type="hidden" name="invoice" value="{{ $invoice }}">

                                    <div class="box-footer">
                                        <a href="{{ route('invoices.index') }}" class="btn btn-danger">Back</a>
                                        <button type="submit" class="btn btn-primary">Create Invoice</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Data Orders</h3>
                                <div class="float-right">
                                    {{-- <div class="section-header-button">
                                        <a href="javascript.void(0)" class="btn btn-primary" data-target="#ModalAdd"
                                            data-toggle="modal"><i class="fas fa-plus"></i> Add Orders</a>
                                    </div> --}}
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
                                                {{-- <tr>
                                                    <th style="width:50%">Grand Total :</th>
                                                    <td align="right">IDR {{ number_format($invoice->grand_total) }}</td>
                                                </tr> --}}

                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <hr>

                                {{-- <!-- this row will not appear when printing -->
                                <div class="row no-print">
                                    <div class="col-12">
                                        <a href="{{ route('invoices.download', $invoice->invoice) }}" rel="noopener"
                                            target="_blank" class="btn btn-primary"><i class="fas fa-download"></i> Download
                                            PDF</a>

                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
