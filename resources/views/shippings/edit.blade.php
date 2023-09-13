@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Shippings</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit Shippings</li>
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
                                <h3 class="card-title">Edit Shippings</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <!-- form start -->
                                <form role="form" method="post" action="{{ route('shippings.update', $shipping->id) }}">
                                    @method('PUT')
                                    @csrf

                                    <div class="form-group @if ($errors->has('id')) has-error @endif">
                                        <label for="id">Shipping No</label>
                                        <input type="text" class="form-control" disabled id="id" name="id"
                                            placeholder="Enter id" value="{{ $shipping->id }}">
                                        @if ($errors->has('id'))
                                            <span class="help-block">{{ $errors->first('id') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group @if ($errors->has('to')) has-error @endif">
                                        <label for="to">To</label>
                                        <input type="text" class="form-control" id="to" name="to"
                                            placeholder="Enter to" value="{{ old('to') ?? $shipping->to }}">
                                        @if ($errors->has('to'))
                                            <span class="help-block">{{ $errors->first('to') }}</span>
                                        @endif
                                    </div>


                                    <div class="form-group @if ($errors->has('attn')) has-error @endif">
                                        <label for="attn">ATTN</label>
                                        <input type="text" class="form-control" id="attn" name="attn"
                                            placeholder="Enter attn" value="{{ old('attn') ?? $shipping->attn }}">
                                        @if ($errors->has('attn'))
                                            <span class="help-block">{{ $errors->first('attn') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group @if ($errors->has('phone')) has-error @endif">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone"
                                            placeholder="Enter phone" value="{{ old('phone') ?? $shipping->phone }}">
                                        @if ($errors->has('phone'))
                                            <span class="help-block">{{ $errors->first('phone') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group @if ($errors->has('shipper')) has-error @endif">
                                        <label for="shipper">Shipper</label>
                                        <input type="text" class="form-control" id="shipper" name="shipper"
                                            placeholder="Enter shipper" value="{{ old('shipper') ?? $shipping->shipper }}">
                                        @if ($errors->has('shipper'))
                                            <span class="help-block">{{ $errors->first('shipper') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group @if ($errors->has('shipper_address')) has-error @endif">
                                        <label for="shipper_address">Shipper Address</label>
                                        <textarea class="form-control" name="shipper_address" rows="3">{{ old('shipper_address') ?? $shipping->shipper_address }}</textarea>
                                        @if ($errors->has('shipper_address'))
                                            <span class="help-block">{{ $errors->first('shipper_address') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group @if ($errors->has('consigne')) has-error @endif">
                                        <label for="consigne">Consigne</label>
                                        <input type="text" class="form-control" id="consigne" name="consigne"
                                            placeholder="Enter consigne"
                                            value="{{ old('consigne') ?? $shipping->consigne }}">
                                        @if ($errors->has('consigne'))
                                            <span class="help-block">{{ $errors->first('consigne') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group @if ($errors->has('consigne_address')) has-error @endif">
                                        <textarea class="form-control" name="consigne_address" rows="3" placeholder="Enter ...">{{ old('consigne_address') ?? $shipping->consigne_address }}</textarea>
                                        @if ($errors->has('consigne_address'))
                                            <span class="help-block">{{ $errors->first('consigne_address') }}</span>
                                        @endif
                                    </div>



                                    <div class="form-group @if ($errors->has('stuffin_date')) has-error @endif">
                                        <label for="stuffin_date">Stuffin Date</label>
                                        <input type="date" class="form-control" id="stuffin_date" name="stuffin_date"
                                            placeholder="Enter stuffin_date"
                                            value="{{ old('stuffin_date') ?? $shipping->stuffin_date }}">
                                        @if ($errors->has('stuffin_date'))
                                            <span class="help-block">{{ $errors->first('stuffin_date') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group @if ($errors->has('stuffin_time')) has-error @endif">
                                        <label for="stuffin_time">Stuffin Time</label>
                                        <input type="time" class="form-control" id="stuffin_time" name="stuffin_time"
                                            placeholder="Enter stuffin_time"
                                            value="{{ old('stuffin_time') ?? $shipping->stuffin_time }}">
                                        @if ($errors->has('stuffin_time'))
                                            <span class="help-block">{{ $errors->first('stuffin_time') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group @if ($errors->has('destination')) has-error @endif">
                                        <label for="destination">Destination</label>
                                        <input type="text" class="form-control" id="destination" name="destination"
                                            placeholder="Enter destination"
                                            value="{{ old('destination') ?? $shipping->destination }}">
                                        @if ($errors->has('destination'))
                                            <span class="help-block">{{ $errors->first('destination') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group @if ($errors->has('port_loading')) has-error @endif">
                                        <label for="port_loading">Port Loading</label>
                                        <input type="text" class="form-control" id="port_loading" name="port_loading"
                                            placeholder="Enter port_loading"
                                            value="{{ old('port_loading') ?? $shipping->port_loading }}">
                                        @if ($errors->has('port_loading'))
                                            <span class="help-block">{{ $errors->first('port_loading') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group @if ($errors->has('qty')) has-error @endif">
                                        <label for="qty">QTY</label>
                                        <input type="text" class="form-control" id="qty" name="qty"
                                            placeholder="Enter qty" value="{{ old('qty') ?? $shipping->qty }}">
                                        @if ($errors->has('qty'))
                                            <span class="help-block">{{ $errors->first('qty') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group @if ($errors->has('gross_weight')) has-error @endif">
                                        <label for="gross_weight">Gross Weight</label>
                                        <input type="text" class="form-control" id="gross_weight" name="gross_weight"
                                            placeholder="Enter gross_weight"
                                            value="{{ old('gross_weight') ?? $shipping->gross_weight }}">
                                        @if ($errors->has('gross_weight'))
                                            <span class="help-block">{{ $errors->first('gross_weight') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group @if ($errors->has('net_weight')) has-error @endif">
                                        <label for="net_weight">Net Weight</label>
                                        <input type="text" class="form-control" id="net_weight" name="net_weight"
                                            placeholder="Enter net_weight"
                                            value="{{ old('net_weight') ?? $shipping->net_weight }}">
                                        @if ($errors->has('net_weight'))
                                            <span class="help-block">{{ $errors->first('net_weight') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group @if ($errors->has('measurement')) has-error @endif">
                                        <label for="measurement">Measurement</label>
                                        <input type="text" class="form-control" id="measurement" name="measurement"
                                            placeholder="Enter measurement"
                                            value="{{ old('measurement') ?? $shipping->measurement }}">
                                        @if ($errors->has('measurement'))
                                            <span class="help-block">{{ $errors->first('measurement') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group @if ($errors->has('volume')) has-error @endif">
                                        <label for="volume">Volume</label>
                                        <input type="text" class="form-control" id="volume" name="volume"
                                            placeholder="Enter volume" value="{{ old('volume') ?? $shipping->volume }}">
                                        @if ($errors->has('volume'))
                                            <span class="help-block">{{ $errors->first('volume') }}</span>
                                        @endif
                                    </div>


                                    <div class="form-group @if ($errors->has('notify')) has-error @endif">
                                        <label for="notify">Notify</label>
                                        <input type="text" class="form-control" id="notify" name="notify"
                                            placeholder="Enter notify" value="{{ old('notify') ?? $shipping->notify }}">
                                        @if ($errors->has('notify'))
                                            <span class="help-block">{{ $errors->first('notify') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group @if ($errors->has('freight')) has-error @endif">
                                        <label for="freight">Freight</label>
                                        <input type="text" class="form-control" id="freight" name="freight"
                                            placeholder="Enter freight"
                                            value="{{ old('freight') ?? $shipping->freight }}">
                                        @if ($errors->has('freight'))
                                            <span class="help-block">{{ $errors->first('freight') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group @if ($errors->has('vessel')) has-error @endif">
                                        <label for="vessel">Vessel</label>
                                        <input type="text" class="form-control" id="vessel" name="vessel"
                                            placeholder="Enter vessel" value="{{ old('vessel') ?? $shipping->vessel }}">
                                        @if ($errors->has('vessel'))
                                            <span class="help-block">{{ $errors->first('vessel') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-group @if ($errors->has('stuffing_palace')) has-error @endif">
                                        <label for="stuffing_palace">Stuffing Palace</label>
                                        <input type="text" class="form-control" id="stuffing_palace"
                                            name="stuffing_palace" placeholder="Enter stuffing_palace"
                                            value="{{ old('stuffing_palace') ?? $shipping->stuffing_palace }}">
                                        @if ($errors->has('stuffing_palace'))
                                            <span class="help-block">{{ $errors->first('stuffing_palace') }}</span>
                                        @endif
                                    </div>

                                    <input type="hidden" id="id" name="id"
                                        value="{{ old('id') ?? $shipping->id }}">

                                    <div class="box-footer">
                                        <a href="{{ route('shippings.index') }}" class="btn btn-danger">Back</a>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>
@endsection
