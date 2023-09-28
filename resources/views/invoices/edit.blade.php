@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Invoices</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit Invoices</li>
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
                                <h3 class="card-title">Edit Invoices</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" method="post" action="{{ route('invoices.update', $invoice->invoice) }}">
                                @method('PUT')
                                @csrf
                                <div class="card-body">
                                    <div class="form-group @if ($errors->has('invoice')) has-error @endif">
                                        <label for="invoice">Invoice</label>
                                        <input type="text" readonly class="form-control" id="invoice" name="invoice"
                                            placeholder="Enter invoice" value="{{ old('invoice') ?? $invoice->invoice }}">
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
                                            placeholder="Enter address" value="{{ old('address') ?? $invoice->address }}">
                                        @if ($errors->has('address'))
                                            <span class="help-block">{{ $errors->first('address') }}</span>
                                        @endif
                                    </div>


                                    <div class="form-group @if ($errors->has('issued_date')) has-error @endif">
                                        <label for="issued_date">Issued Date</label>
                                        <input type="date" class="form-control" id="issued_date" name="issued_date"
                                            placeholder="Enter issued_date"
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
                                            placeholder="Enter vessel" value="{{ old('vessel') ?? $invoice->vessel }}">
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
                                        <input type="text" class="form-control" id="validity" name="validity"
                                            placeholder="Enter validity"
                                            value="{{ old('validity') ?? $invoice->validity }}">
                                        @if ($errors->has('validity'))
                                            <span class="help-block">{{ $errors->first('validity') }}</span>
                                        @endif
                                    </div>

                                    <input type="hidden" name="invoice" value="{{ $invoice->invoice }}">

                                    <div class="box-footer">
                                        <a href="{{ route('invoices.index') }}" class="btn btn-danger">Back</a>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
