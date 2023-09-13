@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create Documents</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Create Documents</li>
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
                                <h3 class="card-title">Create Documents</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <!-- form start -->
                                <form role="form" method="post" action="{{ route('documents.store') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-6">

                                            <div class="form-group @if ($errors->has('job')) has-error @endif">
                                                <label for="job">Job</label>
                                                <input type="text" class="form-control" id="job" disabled
                                                    name="job" placeholder="Enter job" value="{{ $job }}">
                                                @if ($errors->has('job'))
                                                    <span class="help-block">{{ $errors->first('job') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group @if ($errors->has('customer')) has-error @endif">
                                                <label for="customer">Customer</label>
                                                <input type="text" class="form-control" id="customer" name="customer"
                                                    placeholder="Enter customer" value="{{ old('customer') }}">
                                                @if ($errors->has('customer'))
                                                    <span class="help-block">{{ $errors->first('customer') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group @if ($errors->has('consignee')) has-error @endif">
                                                <label for="consignee">Consigne</label>
                                                <input type="text" class="form-control" id="consignee" name="consignee"
                                                    placeholder="Enter consignee" value="{{ old('consignee') }}">
                                                @if ($errors->has('consignee'))
                                                    <span class="help-block">{{ $errors->first('consignee') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group @if ($errors->has('shipper')) has-error @endif">
                                                <label for="shipper">Shipper</label>
                                                <input type="text" class="form-control" id="shipper" name="shipper"
                                                    placeholder="Enter shipper" value="{{ old('shipper') }}">
                                                @if ($errors->has('shipper'))
                                                    <span class="help-block">{{ $errors->first('shipper') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group @if ($errors->has('pod')) has-error @endif">
                                                <label for="pod">POD</label>
                                                <input type="text" class="form-control" id="pod" name="pod"
                                                    placeholder="Enter pod" value="{{ old('pod') }}">
                                                @if ($errors->has('pod'))
                                                    <span class="help-block">{{ $errors->first('pod') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group @if ($errors->has('country')) has-error @endif">
                                                <label for="country">Country</label>
                                                <input type="text" class="form-control" id="country" name="country"
                                                    placeholder="Enter country" value="{{ old('country') }}">
                                                @if ($errors->has('country'))
                                                    <span class="help-block">{{ $errors->first('country') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-6">


                                            <div class="form-group @if ($errors->has('freight')) has-error @endif">
                                                <label for="freight">Freight</label>
                                                <input type="text" class="form-control" id="freight" name="freight"
                                                    placeholder="Enter freight" value="{{ old('freight') }}">
                                                @if ($errors->has('freight'))
                                                    <span class="help-block">{{ $errors->first('freight') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group @if ($errors->has('emk')) has-error @endif">
                                                <label for="emk">EMK</label>
                                                <input type="text" class="form-control" id="emk" name="emk"
                                                    placeholder="Enter emk" value="{{ old('emk') }}">
                                                @if ($errors->has('emk'))
                                                    <span class="help-block">{{ $errors->first('emk') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-group @if ($errors->has('carrier')) has-error @endif">
                                                <label for="carrier">Carrier</label>
                                                <input type="text" class="form-control" id="carrier" name="carrier"
                                                    placeholder="Enter carrier" value="{{ old('carrier') }}">
                                                @if ($errors->has('carrier'))
                                                    <span class="help-block">{{ $errors->first('carrier') }}</span>
                                                @endif
                                            </div>


                                            <div class="form-group @if ($errors->has('no_bl')) has-error @endif">
                                                <label for="no_bl">No BL</label>
                                                <input type="text" class="form-control" id="no_bl" name="no_bl"
                                                    placeholder="Enter no_bl" value="{{ old('no_bl') }}">
                                                @if ($errors->has('no_bl'))
                                                    <span class="help-block">{{ $errors->first('no_bl') }}</span>
                                                @endif
                                            </div>


                                            <h5><b> Date And Time</b></h5>
                                            <span> Tell event-goers when your event starts and ends so they can make a plans
                                                to
                                                attend</span>

                                            <div class="form-group @if ($errors->has('stuffin')) has-error @endif">
                                                <label for="stuffin">Stuffing</label>
                                                <input type="date" class="form-control" id="stuffin" name="stuffin"
                                                    placeholder="Enter stuffin" value="{{ old('stuffin') }}">
                                                @if ($errors->has('stuffin'))
                                                    <span class="help-block">{{ $errors->first('stuffin') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group @if ($errors->has('etd')) has-error @endif">
                                                <label for="etd">ETD</label>
                                                <input type="date" class="form-control" id="etd" name="etd"
                                                    placeholder="Enter etd" value="{{ old('etd') }}">
                                                @if ($errors->has('etd'))
                                                    <span class="help-block">{{ $errors->first('etd') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <input type="hidden" name="job" value="{{ $job }}">
                                        <div class="box-footer">
                                            <a href="{{ route('documents.index') }}" class="btn btn-danger">Back</a>
                                            <button type="submit" class="btn btn-primary">Create Documents</button>
                                        </div>
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
                                <h3 class="card-title">Data Containers</h3>
                                {{-- <div class="float-right">
                                    <div class="section-header-button">
                                        <a href="javascript.void(0)" class="btn btn-primary" data-target="#ModalAdd"
                                            data-toggle="modal"><i class="fas fa-plus"></i> Add Containers</a>
                                    </div>
                                </div> --}}
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="dataTable" class="table table-bordered table-striped">

                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Container</th>
                                            <th>No Seal</th>
                                            <th>Volume</th>
                                            <th>Vessel</th>
                                            <th>Created Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
