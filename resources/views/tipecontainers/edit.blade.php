@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Tipe Container</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit Tipe Container</li>
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
                                <h3 class="card-title">Edit Tipe Container</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <!-- form start -->
                                <form role="form" method="post" action="{{ route('tipecontainers.update', $tipecontainer->id) }}">
                                    @method('PUT')
                                    @csrf

                                    <div class="form-group @if ($errors->has('no_container')) has-error @endif">
                                        <label for="name">No Container</label>
                                        <input type="text" class="form-control" id="no_container" name="no_container"
                                            placeholder="Masukkan Nomor Kontainer" value="{{ old('no_container') ?? $tipecontainer->no_container }}">
                                        @if ($errors->has('no_container'))
                                            <span class="help-block">{{ $errors->first('no_container') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group @if ($errors->has('volume')) has-error @endif">
                                        <label for="name">Volume</label>
                                        <input type="text" class="form-control" id="volume" name="volume"
                                            placeholder="Masukkan Volume Kontainer" value="{{ old('volume') ?? $tipecontainer->volume }}">
                                        @if ($errors->has('volume'))
                                            <span class="help-block">{{ $errors->first('volume') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group @if ($errors->has('vessel')) has-error @endif">
                                        <label for="name">Vessel</label>
                                        <input type="text" class="form-control" id="vessel" name="vessel"
                                            placeholder="Masukkan Vessel Kontainer" value="{{ old('vessel') ?? $tipecontainer->vessel }}">
                                        @if ($errors->has('vessel'))
                                            <span class="help-block">{{ $errors->first('vessel') }}</span>
                                        @endif
                                    </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="card-footer">
                                <a href="{{ route('tipecontainers.index') }}" class="btn btn-danger">Back</a>
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
